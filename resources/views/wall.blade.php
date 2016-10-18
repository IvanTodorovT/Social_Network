<?php
use App\Post;
use App\Http\Controllers\FollowController;

?>
@extends('layouts.app')
 @section('content')


<div style="margin-left: 3em;">
<a href="profile" style="margin-left:13.5em;font-size:2em;">Profile</a> 
<a href="search" style="margin-left:3em;font-size:2em;">FollowMe</a>
<a href="searchText" style="margin-left:3em;font-size:2em;">Search</a>
<hr />
	
	<h1>See all news from your friends:<h1>
	
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
		
		
		
		<a style="display: inline;" href="{{ URL('profile_preview/'.$post->uid )}}""><h2 style="display: inline;"><?=  $post->firstname,' ', $post->lastname;?></h2></a><p style="display: inline;"> say: </p><p style="display: inline;">{{ $post->text}} &nbsp&nbsp</p>
		
		<img style="width:150px; height:150px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />

		<p>At: {{$post->created_at}}</p>
		
		<p style="display: inline;">Album: </p><a href="{{ URL('album_preview/'.$post->aid )}}""><?=  $post->name?></a>
		
		
		

		<div class="likeButtons">
			<span class="countComments">{{$comments}} </span>
			<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>
			<span class="countDislikes">{{$dislikes}}</span>
			<i style="color: red;" class="fa fa-thumbs-down {{$dislikeStatus}}" aria-hidden="true"></i>
			<span class="countLikes">{{$likes}}</span>
			<i style="color: green;" class="fa fa-thumbs-up {{$likeStatus}}" aria-hidden="true"></i>
		</div>

	
	</div>
<?php endforeach;?>

</div>

@endsection
