<?php
use App\Post;

?>
@extends('layouts.app')
 @section('content')


<div style="margin-left: 3em;">
	<a href="profile" style="margin-left: 35em;">Profile</a> <a
		href="/ittalents/Final/social_lara/Final3/public/"
		style="margin-left: 3em;">Welcome</a> <a href="search"
		style="margin-left: 3em;">Search</a>

	
	<h1>Wall page<h1>
	

	<img src="C:\xampp\htdocs\ittalents\Final\social_lara\Final3\resources\uploads\4032test.jpg" alt="nee" />
			</body>

		<!-- 	@foreach ($posts as $post)
			<h3>User with id: {{$post->user_id}} say: {{$post->text}}</h3>
			@endforeach -->
			
		
		
		
	
		
		
	<?php

	
	
	
	
	
	
	
	
	$posts = Post::where('user_id',3)->get();;
/* 	
	$posts = DB::table('posts')
	->where('user_id', '=', 3)->get(); */
	
	
/* 	
	DB::table('posts')
	->join('users', function($join)
	{
		$join->on('{{Auth:user()->id}}', '=', 'posts.user_id'),
		
		whereIn(DB::table('users_friends')>pluck('friend_id')
		->where('user_id' '=' '{{Auth::user()->id}}')),
		
		->orderBy('created_at', 'status'),
	})
	->get();
	 */
	
	
	
	foreach ( $posts as $post ) :
	$post->first();

	
	$string = $post->photo;
	$output = explode("\\",$string);


	
	?>
	
	
	<hr style = 'border: 1px solid black' />
	
   <p><?php echo 'User with id:'.$post->user_id .' says:'.$post->text; ?></p>
   <img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output[count($output)-1]?>" alt="no pic" />
  	
  	
			<br />
<?php endforeach;?>


	

</div>

@endsection
