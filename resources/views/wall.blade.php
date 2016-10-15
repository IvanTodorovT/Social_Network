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
	
			</body>

	<?php

	
	
	$posts = Post::where('user_id', '>', 3)->get();;
	
	
	

	/* $posts = DB::table('posts')
	->join('users', function($join)
	{
		$join->on('{{Auth:user()->id}}', '=', 'posts.user_id')
		->whereIn(DB::table('users_friends')->pluck('friend_id')
				->where('user_id', '=' ,'{{Auth::user()->id}}'))
				->orderBy('created_at')
	})
	->get(); */
	

	
/* 	
$posts = DB::select('SELECT u.firstname,u.lastname,p.text,p.created_at FROM posts as p JOIN users as u ON u.id = p.user_id WHERE p.user_id IN (SELECT friend_id FROM users_friends WHERE user_id = ?) ORDER BY p.created_at DESC'
		,array(3)); */
	


/* 	$posts1 = DB::select('SELECT friend_id FROM users_friends WHERE user_id = 3');
 $posts2 = DB::select('SELECT firstname FROM posts JOIN users  ON users.id = posts.user_id WHERE posts.user_id = 3');
 var_dump($posts2); */
	
	
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
