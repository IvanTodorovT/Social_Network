<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use function League\Flysystem\get;
use DB;
use Auth;
use function Barryvdh\Debugbar\alert;

class CreateAlbumController extends Controller {
	
	public function uploadForm()
	{
		return view('Modules.uploadForm2');
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
		
		$album_id = empty($_POST['album']) ? '1' : $_POST['album'];
		if ($album_id) { 
			if (!$this->validateAlbumExistance ($album_id)) {
				return 'Album does not exist';
			}
		}

		$text = empty($_POST['text']) ? NULL : $_POST['text'];
		$name = empty($_POST['name']) ? NULL : $_POST['name'];
		
		try {
	
			$id = DB::table('albums')->insert([
					'user_id' => Auth::user()->id, 
					'description' => $text,
					'cover_photo' => $fileName,
					'name' => $name,
					
			]);
		} catch (\Throwable $e) {
			return $e->getMessage();
		}
		
		$message = "Upload successful!";
		echo "<script type='text/javascript'>alert('$message');</script>";
		return view('profile');
	}
	
	private function deleteTmp()
	{
		unlink( $_FILES['file']['tmp_name'] );
	}
	
	private function validateAlbumExistance ($album_id)
	{
		return @\DB::table('albums')->where('id', $album_id)->first();
	}
	
	
	
	public function preview($album_id){
	
		$album = DB::table('albums')->where('id', '=', $album_id)->first();
	
		$data = array (
				'album' => $album
		);
	
	
	
	
	
		return view('album_preview', $data);
	
	}
	
	
	
	
}