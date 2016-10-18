

@extends('layouts.app')

@section('content')

<link rel="stylesheet" type="text/css"
	href="=\resources\assets\template-edit.css">

</head>
<body>

	
<a href="wall" style="margin-left:40em;">Wall</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="profile" style="margin-left:3em;">Profile</a>
		<a href="search" style="margin-left: 3em;">FollowMe</a>
		<a href="searchText" style="margin-left: 3em;">Search</a>

<div class="edit" style="margin-left: 3em;">
<h1 >Edit profile page:</h1>

<form method="post" action="{{route('edit.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input style="margin-left: 3.5em;" type="text" name="new_firstname" placeholder="New firstname:"/><br><br>
	<input style="margin-left: 3.5em;" type="text" name="new_lastname" placeholder="New lastname:"/><br><br>
	<input style="margin-left: 3.5em;" type="text" name="new_username" placeholder="New username:"/><br><br>
	<textarea name="new_description"  cols="40" rows="5" placeholder="Say some words for you:"></textarea><br />
	
  
	
	<input type="submit" value= "Change" />
	
	
	
</form>



<br>

<a href="upload2" style="margin-left:3em;">Change profile picture</a>





</div>
@endsection