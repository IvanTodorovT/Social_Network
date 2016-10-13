<?php

use Illuminate\Support\Facades\Input;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

 Route::get('/home', 'HomeController@profile');
// Auth::routes(); 

Route::get('/profile', ['as'=>'profile.show','uses'=>'HomeController@profile']);


 Route::post('/post',['as'=>'post.submit','uses'=>'PostController@submit']);
 Route::get('/wall',['as'=>'post.test_all','uses'=>'PostController@listAll']);
 
 Route::get('/post/{post_id}',['as'=>'post.test','uses'=>'PostController@show']);

 

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
		 
		
		
		//upload photo

	
			Route::get('/upload', 'UploadController@uploadForm');
			Route::post('/upload', 'UploadController@uploadFiles');
		
		
		//new
		
			/* 
			Route::post('/search',['as'=>'search.submit','uses'=>'SearchController@submit']);
			Route::get('/search', ['as'=>'search.show','uses'=>'SearchController@show']);
		
			 */
			
			
			Route::get('/edit', function () {
				return view('edit_profile');
			});
			
			
			
			