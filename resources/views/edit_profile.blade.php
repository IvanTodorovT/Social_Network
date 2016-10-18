

@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css"
	href="\resources\assets\template-edit.css">
	

</head>
<body>

<div id="anchor" style="font-size: 2em;"></div>
<a style="font-size: 2em;margin-left: 13em;" href="wall" style="margin-left:40em;">Wall</a>

<a style="font-size: 2em;margin-left: 2em;" href="profile" style="margin-left:3em;">Profile</a>
<a style="font-size: 2em;margin-left: 2em;" href="search" style="margin-left: 3em;">FollowMe</a>
<a style="font-size: 2em;margin-left: 2em;" href="searchText" style="margin-left: 3em;">Search</a>
<hr />
<h1 style="margin-left: 1em">Edit your profile:</h1>
<div class="edit" style="margin-left: 26em;margin-top:3em; border:1px solid black; display: inline-block;width: 35em;height: 35em">


<form method="post" action="{{route('edit.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<h2 style="margin-left: 3.6em">Change your info:</h2>
	<input style="margin-left: 11em;margin-top:2em;" type="text" name="new_firstname" placeholder="New firstname:"/><br><br>
	<input style="margin-left: 11em;" type="text" name="new_lastname" placeholder="New lastname:"/><br><br>
	<input style="margin-left: 11em;" type="text" name="new_username" placeholder="New username:"/><br><br>
	<textarea style="margin-left: 6em;" name="new_description"  cols="40" rows="5" placeholder="Say some words for you:"></textarea><br />
	
  
	
	<input style="margin-left: 14em;display: inline-block;margin-top:1em;"  type="submit" value= "Change" />
	
	
	
</form>



<br>

<a style="margin-left: 12em;display: inline-block;margin-top:1em;" href="upload2" style="margin-left:3em;">Change profile picture</a>





</div>
@endsection