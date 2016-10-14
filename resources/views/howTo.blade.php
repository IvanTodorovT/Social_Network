@extends('layouts.app')
@section('content')


<p>This is how an upload form is added</p>

<section id='uploadForm'></section>

<script type="text/javascript" src="js/addUploadForm.js"></script>

<p>The path to the uploaded images is:</p>
<p>$path = resource_path() . DIRECTORY_SEPARATOR . 'uploads';</p>
<br><hr><br>

<p>This is how Like/Dislike/Comment buttons are added:</p>

<div class='likeButtons'></div>

@stop