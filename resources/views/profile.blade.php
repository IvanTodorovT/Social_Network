@extends('layouts.app')

@section('content')




</head>
<body>
<?php 

$string = Auth::user()->profile_pic;
$string= empty($_POST['profile_pic']) ? '..\resources\uploads\default.jpg' : $_POST['profile_pic'];
DB::table('users2')->where('id', '=', Auth::user()->id)
->update(
		array('profile_pic' => $string)
		);
$output = explode("\\",$string);


?>

<a href="wall" style="margin-left:40em;">Wall</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="edit" style="margin-left:3em;">Edit</a>
<a href="searchText" style="margin-left:3em;">Search</a>
<a href="search" style="margin-left:3em;">FollowMe</a>

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




<div id='msg' style="margin-top:3em;"></div>

<section id='uploadForm'></section>

</body>
<script type="text/javascript" src="js/addUploadForm.js"></script>

@endsection
