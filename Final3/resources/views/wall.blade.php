@extends('layouts.app') @section('content')

<div style="margin-left: 3em;">
	<a href="profile" style="margin-left: 35em;">Profile</a> <a
		href="/ittalents/Final/social_lara/Final3/public/"
		style="margin-left: 3em;">Welcome</a> <a href="search"
		style="margin-left: 3em;">Search</a>

	<h1>Wall page<h1>
	
			</body>

			@foreach ($posts as $post)
			<h3>User with id: {{$post->user_id}} say: {{$post->text}}</h3>
			@endforeach
</div>

@endsection
