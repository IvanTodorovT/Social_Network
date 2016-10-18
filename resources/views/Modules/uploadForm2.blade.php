<?php
use App\Tags;

$options = Tags::getDropDownOptions();
?>
@extends('layouts.app')

@section('content')
<a style='display: inline-block;font-size:2em;margin-left:1em;' href='javascript:history.back(1);'>Back</a><br><br />
<hr />
<div style="margin-left: 20em;margin-top:3em;display: inline-block;margin-top:1em;border:1px solid black;width:50em; height: 30em">
<div id='up-frm-msg'></div>
<form method='post' enctype="multipart/form-data">
<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   	<div style="margin-top:3em;margin-left:8em;">
   		<label for='file'>Upload cover photo: &nbsp</label>
   		<input  style='display: inline-block ' id='file' type="file" name="file"><br /><br />
   	</div>
   	<div>
   	<label style="margin-top:1em;margin-left:7em; for="name">Enter name of album:</label>
   	<input type="text" name="name"/><br /><br />
   
   	</div>
		<div >
	        <textarea style="margin-top:1em;margin-left:10.8em;" rows="5" cols="50" name='text' placeholder='Add description to your album..'></textarea><br /><br />
		</div>
<!-- 	<div> -->
<!-- 		<p> Would you like to select tags for your photo? </p> -->
<!-- 		<select id='tag1' name='tag1'> -->
			
<!-- 	    </select> -->
<!-- 		<select name='tag2'> -->
			
<!-- 	       </select> -->
<!-- 		<select name='tag3'> -->
			
<!-- 		</select> -->

	<input style="margin-top:1em;margin-left:20em;" type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	</div>
</form>
</div>
<script>
$(function (){
	$("form").submit(function(e) {

	    var formData = new FormData($(this)[0]);

	    $.ajax({
	        url: "upload",
	        type: 'POST',
	        data: formData,
	        async: true,
	        success: function (data) {
	            if (data){
					$("#up-frm-msg").html("<h3>" + data + "</h3><hr>");
	            }
	        },
	        cache: false,
	        contentType: false,
	        processData: false
	    });
	    
	    e.preventDefault();
	});
});
</script>

@endsection