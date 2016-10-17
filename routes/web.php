<?php
use App\Post;
Route::get('/test',function(){
	$post = Post::with('author')->first();
	var_dump($post->author->firstname);
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

 Route::get('/home', 'HomeController@profile');
// Auth::routes(); 

Route::group(['middleware'=>'auth'],function(){
	Route::get('/profile', ['as'=>'profile.show','uses'=>'HomeController@profile']);
	
	Route::post('/follow}',['as'=>'user.follow','uses'=>'FollowController@follow']);
	Route::post('/unfollow',['as'=>'user.unfollow','uses'=>'FollowController@unfollow']);
	
	Route::post('/post',['as'=>'post.submit','uses'=>'PostController@submit']);
	
	Route::get('/wall',['as'=>'post.test_all','uses'=>'PostController@listAll']);
});
 
 Route::get('/post/{post_id}',['as'=>'post.test','uses'=>'PostController@show']);


	
	
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
	
/**
 * SearchController is originally used for user searches, but since it's general name I'm using it for 
 * post searches by tag. The access URIs are different, so no conflicts should occur
 */
Route::post('/search',['as'=>'search.submit','uses'=>'SearchController@submit']);
Route::get('/search',['as'=>'search.test','uses'=>'SearchController@show']);
// Route::get('/searchPosts','SearchController@searchPostForm');
Route::get('/searchByTag','SearchController@getSearchByTagResults');
	
	

	Route::get('/profile_preview', function () {
		 return view('profile_preview');
	});
	
	
	
Route::get('/profile_preview/{user_id}',['as'=>'edit.test','uses'=>'PostController@listAll2']);
	
Route::post('/searchTag',['as'=>'searchTag.submit','uses'=>'SearchTagController@submit']);
Route::get('/searchTag',['as'=>'searchTag.test','uses'=>'SearchTagController@show']);
