@extends('layouts.app')
@section('content')

<?php
use App\Tags;

$options = Tags::getDropDownOptions();
?>

<a href="wall" style="margin-left:13.5em;font-size:2em;">Wall</a>
<a href="profile" style="margin-left:3em;font-size:2em;">Profile</a>

<a href="search" style="margin-left:3em;font-size:2em;">FollowMe</a>
<div style="margin-right: 4em;">
<form id='searchPhotoByTagForm' style='margin: 5vh; text-align: center;'>
	<input id="token" type="hidden" name="_token" value="{{ csrf_token() }}">
	<div>
		<p style='font-size: 1.3em'> Choose tags to search photos by </p>
		<select><?= $options?></select>
		<select><?= $options?></select>
		<select><?= $options?></select>
	</div>
	<div>
		<select><?= $options?></select>
		<select><?= $options?></select>
		<select><?= $options?></select>
	</div>
	<button type='submit' style="margin-top: 1vh">Search</button>
</form>
<div id='resultContainer'>
</div>
</div>
<script>
$(function (){
	$("#searchPhotoByTagForm").submit(function(e) {
	    e.preventDefault();
	    var i = 0;
	    var tags = [];
	    $(this).find('select').each(function(){
	    	if($(this).val() && $(this).val() != 'NULL') {
		    	tags[i] = $(this).val();
		    	i++;
	    	}
		});

		$.post('searchTag', {tags: tags, _token: $('#token').val()})
		.done(function(view){
			$('#resultContainer').html(view);
		})
		.fail(function(err){
			console.log(err.responseText);
		});
	});
});
</script>

@stop