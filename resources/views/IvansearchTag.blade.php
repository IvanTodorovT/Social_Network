@extends('layouts.app')
@section('content')

<?php
use App\Tags;

$options = Tags::getDropDownOptions();
?>

<form id='searchPhotoByTagForm'>
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

		$.get('searchByTag', {tags: tags})
		.done(function(data){
			console.log(data)
		})
		.fail(function(err){
			console.log(err)
		});
	});
});
</script>

@stop