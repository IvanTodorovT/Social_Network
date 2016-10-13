<?php

use Illuminate\Support\Facades\Input;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
/**
 * Uploading files
 */
Route::get('/upload', 'UploadController@uploadForm');
Route::post('/upload', 'UploadController@uploadFiles');

 Route::get('/home', 'HomeController@profile');
// Auth::routes(); 

Route::get('/profile', ['as'=>'profile.show','uses'=>'HomeController@profile']);
// Auth::routes();

 Route::post('/post',['as'=>'post.submit','uses'=>'PostController@submit']);
 Route::get('/post/all',['as'=>'post.test_all','uses'=>'PostController@listAll']);
 
 Route::get('/post/{post_id}',['as'=>'post.test','uses'=>'PostController@show']);
// Auth::routes();
 

	Route::get('wall', function () {
	 	$posts = App\Post::all();
	
		$data = array (
			'posts' => $posts
		);
		 
		return view('wall', $data);
	});
	
	

		Route::get('search', function () {
	 	$users = App\User::all();
	
		$data = array (
			'users' => $users
		);
		 
		return view('search', $data);
	});


/**
 * Load Frontpage if no resource is specified
 */
Route::get("/", 'SiteController@index');

Auth::routes();