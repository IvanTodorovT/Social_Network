@extends('layouts.app')
@section('content')

<?php
use App\Tags;

$options = Tags::getDropDownOptions();
?>

<div id='resultContainer'>
	<form id='searchPhotoByTagForm'>
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
		<button type='submit'>Search</button>
	</form>
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
			console.log(err)
		});
	});
});
</script>

@stop