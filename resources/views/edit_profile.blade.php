

@extends('layouts.app')

@section('content')

echo "baba";

<form method="post" action="{{route('post.submit')}}">

<input type="hidden" name="_token" value="{{ csrf_token() }}">

<input style="margin-left: 3.5em;" type="text" name="content" placeholder="Enter your post here:"/>





<input type="submit" />

<?php 

$content = "Novo_ime_babata";

DB::table('users2')
->where('id', 9)
->update(array('firstname' => $content));

?>
@endsection