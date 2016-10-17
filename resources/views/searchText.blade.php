<?php
use Illuminate\Http\Request;
use App\Post;
use App\User;
?>
@extends('layouts.app')
@section('content')


<body>

<div style="margin-left: 3em;">
<a href="profile" style="margin-left:40em;">Profile</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="wall" style="margin-left:3em;">Wall</a>

<h1>SearchTag page<h1>
<form method="post" action="{{route('searchText.submit')}}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input style="margin-left: 5em;" type="text" name="content4"/>
	<input type="submit" value="Search"/>
	

	<?php


	
	foreach ( $postove as $post ) :
	

	$post_photo = $post->photo;
	$output_post = explode("\\",$post_photo);
	
	
	$user_pic = $post->profile_pic;
	$output_prof = explode("\\",$user_pic)
	?>

<!-- 	I added an inline style here! Remove it if you write css -->
<!-- 	PS: You get Invalid tag location warning! -->
	<div class="post" id=<?= $post->id; ?> style="width: 60%;"> 	
		<hr style = 'border: 1px solid black' />
		
		<img style="width:50px; height:50px;" src="..\resources\uploads\<?= $output_prof[count($output_prof)-1]?>" alt="no pic" />
		
		
		
		<a href="{{ URL('profile_preview/'.$post->id )}}""><?=  $post->firstname,' ', $post->lastname;?></a><p>say: </p><p>{{ $post->text}}</p>
		
		<img style="width:100px; height:100px;" src="..\resources\uploads\<?= $output_post[count($output_post)-1]?>" alt="no pic" /><br><br />
		<div class='likeButtons'></div>
		
	</div>
<?php endforeach;?>
</form>
</body>

</html>
@endsection