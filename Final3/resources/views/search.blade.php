@extends('layouts.app')
@section('content')
</head>
<body>

<div style="margin-left: 3em;">
<a href="profile" style="margin-left:40em;">Profile</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="wall" style="margin-left:3em;">Wall</a>



<h1>Search page<h1>


<form method="post" action="{{route('post.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input style="margin-left: 5em;" type="text" name="content"/>
	<input type="submit" value="Search"/>
	
	
</form>

</body>
@foreach ($users as $user)
<h3>{{$user->firstname}} {{$user->lastname}}</h3>
@endforeach
</html>

</div>

@endsection