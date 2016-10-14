@extends('layouts.app')

@section('content')




</head>
<body>
<?php 

$string = Auth::user()->photo;
$output = explode("\\",$string);



?>

<a href="wall" style="margin-left:40em;">Wall</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="edit" style="margin-left:3em;">Edit</a>
<a href="upload" style="margin-left:3em;">Upload photo</a>
<a href="search" style="margin-left:3em;">Search</a>

<div style="margin-left: 3em;">
<h1 >Profile page:</h1>
		<div class="container" style="margin-top:3em;">
		<img style="width:150px; height:150px;" src="..\resources\uploads\<?= $output[count($output)-1]?>" alt="no pic" /><br>
			<label for="">First name: {{  Auth::user()->firstname }}</label> <br>
			<label for="">Last name: {{  Auth::user()->lastname }}</label> <br>
			<label for="">Username: {{  Auth::user()->username }}</label> <br>
			<label for="">Created at: {{  Auth::user()->created_at }}</label><br> 
			<label for="">Email: {{  Auth::user()->email }}</label><br>
			<label for="">Last info update: {{  Auth::user()->updated_at }}</label> <br>
			
		</div>



<form method="post" action="{{route('post.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input style="margin-left: 3.5em;" type="text" name="content" placeholder="Enter your post here:"/><br><br>
	<!-- <input  style="margin-left: 3.5em;" id='file' type="file" name="photo"><br><br>-->
  
	<input style="margin-left: 3.5em;" type="submit" />
	
</form>

<div id='msg' style="margin-top:3em;"></div>


<section id='uploadForm'></section>


</body>
<script type="text/javascript" src="js/addUploadForm.js"></script>

@endsection
