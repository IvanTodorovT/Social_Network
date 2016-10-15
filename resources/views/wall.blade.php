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

	/* $posts = DB::table('posts')
	->join('users', function($join)
	{
		$join->on('{{Auth:user()->id}}', '=', 'posts.user_id')
		->whereIn(DB::table('users_friends')->pluck('friend_id')
				->where('user_id', '=' ,'{{Auth::user()->id}}'))
				->orderBy('created_at')
	})
	->get(); */
	


$posts = DB::select('SELECT users2.firstname, users2.lastname,users2.photo as user_pic,posts.photo as post_photo, posts.text , posts.created_at from posts JOIN users2 on users2.id = posts.user_id where posts.user_id IN (SELECT friend_id from users_friends where user_id = ?) ORDER BY posts.created_at DESC', array(Auth::user()->id));
	
	
	foreach ( $posts as $post ) :
	

	$post_photo = $post->post_photo;
	$output_post = explode("\\",$post_photo);
	
	
	$user_pic = $post->user_pic;
	$output_prof = explode("\\",$user_pic)
	?>

<!-- 	I added an inline style here! Remove it if you write css -->
<!-- 	PS: You get Invalid tag location warning! -->
	<div class="post" id=<?= $post->id; ?> style="width: 50%;"> 	
		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		<?= $post->firstname .' '. $post->lastname . ' say: '. $post->text;?>
		
		<img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />
		<div class='likeButtons'></div>
	</div>
<?php endforeach;?>

</div>

@endsection
