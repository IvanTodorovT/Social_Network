<?php
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;
?>
@extends('layouts.app')
@section('content')


<body>

<div style="margin-left: 3em;">
<a style="font-size: 2em;margin-left: 12em;" href="profile" style="margin-left:40em;">Profile</a>
<a style="font-size: 2em;margin-left: 2em;" href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a style="font-size: 2em;margin-left: 2em;" href="wall" style="margin-left:3em;">Wall</a>
<a style="font-size: 2em;margin-left: 2em;" href="searchText" style="margin-left:3em;">Search</a>

<hr />
<h1>Follow new users<h1>

<form method="post" action="{{route('search.submit')}}">

	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<input style="margin-left: 9em;" type="text" name="content3"/>
	<input type="submit" value="Search"/>
	
</form>
@if(!empty($users))
@foreach($users as $u)
<div>

<!-- <form method="POST" action="{{route('user.follow')}}">
<input type="hidden" value="{{$u->id}}" name="user_id"/>
{{$u->firstname}}
<input type="submit" value="follow">
</form> -->



<h2 style="display: inline;margin-top:2em;">{{$u->firstname}} {{ $u->lastname}} &nbsp</h2>

@if(in_array($u->id,$followers_ids))
<button style="display: inline;margin-top:1em;margin-left:2em;" onclick="unfollow(this,{{$u->id}})">Unfollow</button>
@else
<button style="display: inline;margin-top:1em;margin-left:3em;" onclick="follow(this,{{$u->id}})">Follow</button>
@endif
</div>
@endforeach
@endif

</div>
<script type="text/javascript">
function follow(el,user_id){

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
			    alert(response.error);
		    }else{
			    el.innerHTML = "Unfollow";
			    el.setAttribute("onclick","unfollow(this,"+user_id+")");
		    }
	    }
	}
	
	http.send(params);
}

function unfollow(el,user_id){
	var http = new XMLHttpRequest();
	
	var url = '{{route('user.unfollow')}}';
	
	var params = "_token={{csrf_token()}}&user_id="+user_id;
	http.open("POST", url, true);

	//Send the proper header information along with the request
	http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

	http.onreadystatechange = function() {//Call a function when the state changes.
	    if(http.readyState == 4 && http.status == 200) {
		   
		    response = JSON.parse(http.responseText)
		    if(response.error != ""){
			    alert("Error with unfollowing user");
		    }else{
			    el.innerHTML = "Follow";
			    el.setAttribute("onclick","follow(this,"+user_id+")");
		    }
	    }
	}
	
	http.send(params);
}
</script>
</body>

</html>
@endsection