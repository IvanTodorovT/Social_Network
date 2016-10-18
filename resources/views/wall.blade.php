<?php
use App\Post;
use App\Http\Controllers\FollowController;

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
	
	//$test = array(9,1);
	
	$followers_ids = Auth::user()->getFollowersIds();
	//$test = implode(',',$followers_ids);
	
	
	
	//$array=array_map('intval', explode(',', $followers_ids));
	$followers_ids = implode("','",$followers_ids);
	
	
	
 	 $postove = DB::select("SELECT u.firstname, u.lastname,u.profile_pic,u.id as uid,p.id as pid,p.photo,p.text,p.created_at,a.name, a.id as aid FROM
	 users2 u  JOIN posts p ON
	 u.id = p.user_id
	 JOIN albums a

	 on p.album_id= a.id WHERE p.user_id IN ('$followers_ids') order by p.created_at DESC ");
 
	 	
 	 //$followers_ids = array_values($followers_ids);


	foreach ( $postove as $post ) :

	
	$comments = isset($numbers['comments'][$post->pid]) ? $numbers['comments'][$post->pid] : 0;
	$likes = isset($numbers['like'][$post->pid]) ? $numbers['like'][$post->pid] : 0;
	$dislikes = isset($numbers['dislike'][$post->pid]) ? $numbers['dislike'][$post->pid] : 0;
	$likeStatus = $dislikeStatus = '';
	if (isset($numbers['status'][$post->pid])){
		if ($numbers['status'][$post->pid] == 'like'){
			$likeStatus = 'inactive';
		} else if ($numbers['status'][$post->pid] == 'dislike') {
			$dislikeStatus = 'inactive';
		}
	}

	$post_photo = $post->photo;
	
	$output_post = explode("\\",$post_photo);
	
	
	$user_pic = $post->profile_pic;
	
	$output_prof = explode("\\",$user_pic)
	?>


	<div class="post" id=<?= $post->pid; ?> style="width: 70%;"> 	

		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a href="{{ URL('profile_preview/'.$post->uid )}}""><?=  $post->firstname,' ', $post->lastname;?></a><p>say: </p><p>{{ $post->text}}</p>
		
		<img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />

		<p>Posted at:{{$post->created_at}}</p>
		
		<p>Album:</p><a href="{{ URL('album_preview/'.$post->aid )}}""><?=  $post->name?></a>
		
		
		

		<div class="likeButtons">
			<i style="color: green;" class="fa fa-thumbs-up ' . $likeStatus . '" aria-hidden="true"></i>
			<span class="countLikes">{{$likes}}</span>
			<i style="color: red;" class="fa fa-thumbs-down ' . $dislikeStatus . '" aria-hidden="true"></i>
			<span class="countDislikes">{{$dislikes}}</span>
			<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
			<span class="countComments">{{$comments}} </span>
		</div>

	
	</div>
<?php endforeach;?>

</div>

@endsection
