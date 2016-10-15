<?php
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
?>
@extends('layouts.app')
@section('content')


<body>

<div style="margin-left: 3em;">
<a href="profile" style="margin-left:40em;">Profile</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="wall" style="margin-left:3em;">Wall</a>

<h1>Search page<h1>
<form method="post" action="{{route('search.submit')}}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input style="margin-left: 5em;" type="text" name="content3"/>
	<input type="submit" value="Search"/>
	
</form>
@if(!empty($users))
@foreach($users as $u)
<div>

<!-- <form method="POST" action="{{route('user.follow',$u->id)}}">
{{$u->firstname}}
<input type="submit" value="follow">
</form> -->



{{$u->firstname}}
<button onclick="follow({{$u->id}})">Follow</button>
</div>
@endforeach
@endif

</div>
<script type="text/javascript">
function follow(user_id){

	var http = new XMLHttpRequest();
	
	var url = '{{route('user.follow')}}';
	
	var params = "_token={{csrf_token()}}&user_id="+user_id;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
		   
		    response = JSON.parse(http.responseText)
		    if(response.error != ""){
			    alert("Error with following user");
		    }else{
			   
			    alert("Success");
		    }
	    }
	}
	
	http.send(params);
}
</script>
</body>

</html>
@endsection