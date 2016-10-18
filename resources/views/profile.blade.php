@extends('layouts.app')

@section('content')


<link rel="stylesheet" type="text/css"
	href="=\resources\assets\template.css">

</head>
<body>
<?php 

$string = Auth::user()->profile_pic;
/* $string= empty($_POST['profile_pic']) ? '..\resources\uploads\default.jpg' : $_POST['profile_pic'];
DB::table('users2')->where('id', '=', Auth::user()->id)
->update(
		array('profile_pic' => $string)
		); */



$string = empty(Auth::user()->profile_pic) ? '..\resources\uploads\default.jpg' : Auth::user()->profile_pic;
DB::table('users2')->where('id', '=', Auth::user()->id)
->update(
		array('profile_pic' => $string)
		);
		
$output = explode("\\",$string);


?>
<div class="anchor">
<a href="wall" >Wall</a>
<a href="edit" style="margin-left:3em;">Edit</a>
<a href="searchText" style="margin-left:3em;">Search</a>
<a href="search" style="margin-left:3em;">FollowMe</a>
</div>
<hr  height:2px/>
<div style="margin-left: 3em;">
<h1 >My profile page</h1>

		<div class="container" style="margin-top:3em;margin-left:0em;margin-bottom:1em;">
		<div style="width:206px; height:206px"  id="imageTag"><img style="width:200px; height:200px;margin-bottom: 2em;" src="..\resources\uploads\<?= $output[count($output)-1]?>" alt="no pic" /></div><br>
			<label class="names" for="">Firstname:&nbsp; </label><label for=""> {{  Auth::user()->firstname }}</label> <br>
			<label class="names" for="">Lastname: &nbsp; </label><label for="">{{  Auth::user()->lastname }}</label> <br>
			<label class="names" for="">Username: &nbsp; </label><label for="">{{  Auth::user()->username }}</label> <br>
			<label class="names" for="">Registered at: &nbsp; </label><label for=""> {{  Auth::user()->created_at }}</label><br> 
			<label class="names" for="">E-mail: &nbsp; </label><label for=""> {{  Auth::user()->email }}</label><br>
			<label class="names" for="">Last info update: &nbsp; </label><label for=""> {{  Auth::user()->updated_at }}</label> <br>
			
		</div>




<div id='msg' style="margin-top:3em;"></div>

<section id='uploadForm'>
<p>Make post</p>
</section>

</body>
<script type="text/javascript" src="js/addUploadForm.js"></script>

@endsection

