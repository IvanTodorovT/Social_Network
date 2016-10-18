<?php
use App\Post;

?>
@extends('layouts.app')
 @section('content')


<div style="margin-left: 3em;">
	<a href="profile" style="margin-left: 35em;">Profile</a> <a
		href="/ittalents/Final/social_lara/Final3/public/"
		style="margin-left: 3em;">Welcome</a> 
		<a href="search" style="margin-left: 3em;">Search</a>

	
	<h1>Wall page<h1>
	
			</body>

	<?php

 	 $postove = DB::select('SELECT u.firstname, u.lastname,u.profile_pic,u.id as uid,p.id as pid,p.photo,p.text,a.name, a.id as aid FROM
	 users2 u  JOIN posts p ON
	 u.id = p.user_id
	 JOIN albums a
<<<<<<< HEAD
	 on p.album_id= a.id');
	 	
	foreach ( $postove as $post ) :
=======
	 on p.album_id= a.id');  */

	foreach ( $posts as $post ) :
>>>>>>> 220e29f010fd113f86149b2a69daffaf6bb34a55
	
	$comments = isset($numbers['comments'][$post->id]) ? $numbers['comments'][$post->id] : 0;
	$likes = isset($numbers['like'][$post->id]) ? $numbers['like'][$post->id] : 0;
	$dislikes = isset($numbers['dislike'][$post->id]) ? $numbers['dislike'][$post->id] : 0;
	$likeStatus = $dislikeStatus = '';
	if (isset($numbers['status'][$post->id])){
		if ($numbers['status'][$post->id] == 'like'){
			$likeStatus = 'inactive';
		} else if ($numbers['status'][$post->id] == 'dislike') {
			$dislikeStatus = 'inactive';
		}
	}

	$post_photo = $post->photo;
	$output_post = explode("\\",$post_photo);
	
	
	$user_pic = $post->profile_pic;
	$output_prof = explode("\\",$user_pic)
	?>

<!-- 	I added an inline style here! Remove it if you write css -->
<!-- 	PS: You get Invalid tag location warning! -->
<<<<<<< HEAD
	<div class="post" id=<?= $post->pid; ?> style="width: 60%;"> 	
=======
	<div class="post" id=<?= $post->id; ?> style="width: 70%;"> 	
>>>>>>> 220e29f010fd113f86149b2a69daffaf6bb34a55
		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a href="{{ URL('profile_preview/'.$post->uid )}}""><?=  $post->firstname,' ', $post->lastname;?></a><p>say: </p><p>{{ $post->text}}</p>
		
		<img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />

		
<<<<<<< HEAD
		
		
		<p>Album:</p><a href="{{ URL('album_preview/'.$post->aid )}}""><?=  $post->name?></a>
		
		
		<div class='likeButtons'></div>
=======
		<div class="likeButtons">
			<i style="color: green;" class="fa fa-thumbs-up ' . $likeStatus . '" aria-hidden="true"></i>
			<span class="countLikes">{{$likes}}</span>
			<i style="color: red;" class="fa fa-thumbs-down ' . $dislikeStatus . '" aria-hidden="true"></i>
			<span class="countDislikes">{{$dislikes}}</span>
			<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
			<span class="countComments">{{$comments}} </span>
		</div>
>>>>>>> 220e29f010fd113f86149b2a69daffaf6bb34a55
	
	</div>
<?php endforeach;?>

</div>

@endsection
