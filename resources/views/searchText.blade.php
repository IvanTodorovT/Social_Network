<?php
use Illuminate\Http\Request;
use App\Post;
use App\User;
?>
@extends('layouts.app')
@section('content')


<body>

<div style="margin-left: 3em;">
<a style="font-size: 2em;margin-left:13em;" href="profile" style="margin-left:30em;">Profile</a>

<a style="font-size: 2em;margin-left:3em;" href="wall" style="margin-left:3em;">Wall</a>

<a style="font-size: 2em;margin-left:3em;" href="search" style="margin-left:3em;">FollowMe</a>
<hr />
<div style="width: 100%">
<h1 style="display: inline">Search by # </h1><h3 style="display: inline" >&nbsp or &nbsp  </h3><a style="text-decoration: none; font-size: 3em;" href="searchTag">Categories</a>
</div><br />


<form method="post" action="{{route('searchText.submit')}}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input style="margin-left: 25em;width:30em;" type="text" name="content4"/>
	<input type="submit" value="Search"/><br /><br /><br />
	

	<?php

	
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

<!-- 	I added an inline style here! Remove it if you write css -->
<!-- 	PS: You get Invalid tag location warning! -->
	<div  class="post" id=<?= $post->pid; ?> style="width: 60%;margin-left:15em;"> 	
		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a style="font-size: 2em;margin-left:1em;" href="{{ URL('profile_preview/'.$post->uid )}}"><?=  $post->firstname,' ', $post->lastname;?></a><p>say: </p><p>{{ $post->text}}</p>
		
		<img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />
		<p>{{$post->created_at}}</p>
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
</form>
</body>

</html>
@endsection