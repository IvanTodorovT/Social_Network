<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Redirect;

class UploadProfileController extends Controller {
	
	public function uploadForm()
	{
		return view('uploadProfile');
	}
	
	public function uploadFiles()
	{
		$maxSize = 2097152; //2MB
		$user_id = \Auth::id();; // got t0 take this from the session or something when we have 100% working users
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
		
// 		$album = empty($_POST['album']) ? NULL : $_POST['album'];
// 		if ($album) { 
// 			if (!$this->validateAlbumExistance ($album)) {
// 				return view('UploadForm', ['message'=>'Album does not exist']);
// 			}
// 		}  // decided to upload but without an album

	
		
		$id = @\DB::table('users2')->where('id', Auth::user()->id)->update([
				
				'photo' => $photo,
				
		]);
		// two ways in laravel
// 		\DB::insert('INSERT INTO posts (user_id, text, photo, tag1, tag2, tag3) VALUES (?, ?, ?, ?, ?, ?)',
// 		[$user_id, $text, $photo, $tag1, $tag2, $tag3]);

		$album = empty($_POST['album']) ? NULL : $_POST['album'];
		if ($album) {
			$error = $this->addPostToAlbum($album, $id, $user_id);
			if ($error){
				return $error;
			}
		}
		
		return Redirect::route('profile.show');
	}
	
	private function deleteTmp()
	{
		unlink( $_FILES['file']['tmp_name'] );
	}
	
	private function validateAlbumExistance ($album)
	{
		
	}
	
	private function addPostToAlbum ($albumName, $postId, $userId)
	{
		$cols = ['name', 'user_id', 'created_at'];
		$array = @(array)\DB::table('albums')->select($cols)->where([
				['name', $albumName],
				['user_id', $userId],
				])->get()[0];
		
		if (empty($array)){
			$msg = 'Album does not exist. Try adding your image to an album from the options';
			return $msg;
		}
		$array['post_id'] = $postId;
		$cols[] = 'post_id';
		$qm = [];
		for ($i = 0; $i < count($array); $i++){
			$qm[] = '?';
		}
		$success = \DB::insert("INSERT INTO albums (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $qm) . ")",
		array_values($array));
		
		// Version where the id is copied as well, but it's primary key, so...
//  	$cols = ['id', 'name', 'user_id', 'created_at'];
// 		$array = @(array)\DB::table('albums')->select($cols)->where([
// 				['name', $albumName],
// 				['user_id', $userId],
// 				])->get()[0]; 
// 		if (empty($array)){
// 			$msg = 'Album does not exist. Your post was added to your profile without and album';
// 			return view('UploadForm', ['message'=>$msg]);
// 		}
// 		$array['post_id'] = $postId;
// 		$cols[] = 'post_id';
// 		$qm = [];
// 		for ($i = 0; $i < count($array); $i++){
// 			$qm[] = '?';
// 		}
// 		\DB::insert("INSERT INTO albums (" . implode(', ', $cols) . ") VALUES (" . implode(', ', $qm) . ")",
// 		array_values($array));

		if (!$success){ return 'Adding to album failed. Try a different album.';}
	}
}