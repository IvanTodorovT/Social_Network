@extends('layouts.app')

@section('content')




</head>
<body>


<a href="wall" style="margin-left:40em;">Wall</a>
<a href="/ittalents/Final/social_lara/Final3/public/" style="margin-left:3em;">Welcome</a>
<a href="#" style="margin-left:3em;">Edit</a>
<a href="search" style="margin-left:3em;">Search</a>

<div style="margin-left: 3em;">
<h1 >Profile page:</h1>
		<div class="container" style="margin-top:3em;">
			<label for="">First name: {{  Auth::user()->firstname }}</label> <br>
			<label for="">Last name: {{  Auth::user()->lastname }}</label> <br>
			<label for="">Username: {{  Auth::user()->username }}</label> <br>
			<label for="">Created at: {{  Auth::user()->created_at }}</label><br> 
			<label for="">Email: {{  Auth::user()->email }}</label><br>
			<label for="">Last info update: {{  Auth::user()->updated_at }}</label> <br>
			
		</div>



<form method="post" action="{{route('post.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<input style="margin-left: 3.5em;" type="text" name="content" placeholder="Enter your post here:"/>
	
  
	
	
	
	<input type="submit" />
	
	
</form>
	</div>
</body>



@endsection
