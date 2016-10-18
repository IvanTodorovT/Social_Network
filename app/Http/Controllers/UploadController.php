<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use function League\Flysystem\get;

class UploadController extends Controller {
	
	public function uploadForm()
	{
		return view('Modules.uploadForm');
	}
	
	public function uploadFiles()
	{
		$maxSize = 2097152; //2MB
		$user_id = \Auth::id();
		if (!$user_id){
			return 'You have to be logged in to upload!';
		}
		if (empty($_FILES['file']['type'])){
			return 'Uploading an image is mendatory!';
		}
		if ($_FILES['file']['size'] > $maxSize){
			$inMB = $maxSize / 1048576;
			return "File can't be larger then $inMB MBs";
		}
		if (!preg_match('#^image/[A-z\-]{3,6}$#', $_FILES['file']['type'])){
			$this->deleteTmp();
			return 'You can upload only images';
		}
		$copy = file_get_contents($_FILES['file']['tmp_name']);
		$path = resource_path() . DIRECTORY_SEPARATOR . 'uploads';
		if (!@is_dir($path)){
			if (!@mkdir($path)){
				$this->deleteTmp();
				return 'Acces denied!';
			}
		}
		do {
		$fileName = rand(0000, 9999) . $_FILES['file']['name'];
		$photo = $path . DIRECTORY_SEPARATOR . $fileName;
		} while(file_exists($photo));
		
		file_put_contents($photo, $copy);
		$this->deleteTmp();
		
		$album_id = empty($_POST['album']) ? '12' : $_POST['album'];
		
		var_dump($album_id);

		$text = empty($_POST['text']) ? NULL : $_POST['text'];
		$tag1 = empty($_POST['tag1']) ? NULL : $_POST['tag1'];
		$tag2 = empty($_POST['tag2']) ? NULL : $_POST['tag2'];
		$tag3 = empty($_POST['tag3']) ? NULL : $_POST['tag3'];
		try {
			$id = @\DB::table('posts')->insertGetId([
					'user_id' => $user_id, 
					'album_id' => $album_id,
					'text' => $text,
					'photo' => $fileName,
					'tag1' => $tag1,
					'tag2' => $tag2,
					'tag3' => $tag3
			]);
		} catch (\Throwable $e) {
			return $e->getMessage();
		}
		return 'Upload successful!';
	}
	
	private function deleteTmp()
	{
		unlink( $_FILES['file']['tmp_name'] );
	}
	
	private function validateAlbumExistance ($album_id)
	{
		return @\DB::table('albums')->where('id', $album_id)->first();
	}
}