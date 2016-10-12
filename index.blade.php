@extends('layouts.app')

@section('content')

<section id='uploadForm'></section>

<script>
	$.get(window.location.pathname + "/upload", function(r){
		$('#uploadForm').html(r);
	});
</script>
@stop