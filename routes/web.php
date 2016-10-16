<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

 Route::get('/home', 'HomeController@profile');
// Auth::routes(); 

Route::get('/profile', ['as'=>'profile.show','uses'=>'HomeController@profile']);
 
Route::post('/follow}',['as'=>'user.follow','uses'=>'FollowController@follow']);
Route::post('/unfollow',['as'=>'user.unfollow','uses'=>'FollowController@unfollow']);

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
	
	
/* 
	  	Route::get('search', function () {
	 	$users = App\User::all();
	
		$data = array (
			'users' => $users
		);
		 
		return view('search', $data);
	});  */
		 
		
		
/**
 * Uploading files
 * include /upload to the url or make a GET request to get an upload Form
 * image upload is always post / the form handles it fine
 */
Route::get('/upload', 'UploadController@uploadForm');
Route::post('/upload', 'UploadController@uploadFiles');	

Route::get('/upload2', 'UploadProfileController@uploadForm');
Route::post('/upload2', 'UploadProfileController@uploadFiles');

/**
 * Liking
 * Just add a tag with class='likeButtons' and JQ does the rest.
 * check the howTo or addLikes.js for info on params
 * to add more like options aside to like/dislike edit the $statuses array in LikeController
 * any value is accepted for $table resulting in an uncaught exception for invalid value 
 * - can't happen unless someone tries to do stupid stuff with the DB
 */
// Route::get('/like', 'LikeController@getButtons'); //replaced with JQ
Route::get('/like', 'LikeController@like');

/**
 * Commenting
 */
Route::get('comments/{table}/{id}', 'CommentsController@getComments');
Route::post('comments/{table}/{id}', 'CommentsController@submitComment');

/**
 * This route has to be deleted at some point. Used for testing purposes
 */
Route::get('/howTo', function () {
	return view('howTo');
});
		
			
Route::get('/edit', function () {
	return view('edit_profile');
});
	
 
	Route::post('/edit',['as'=>'edit.submit','uses'=>'EditController@submit']);
	Route::get('/edit/{edit_id}',['as'=>'edit.test','uses'=>'EditController@show']);
	
	
	Route::post('/search',['as'=>'search.submit','uses'=>'SearchController@submit']);
	Route::get('/search',['as'=>'search.test','uses'=>'SearchController@show']);
