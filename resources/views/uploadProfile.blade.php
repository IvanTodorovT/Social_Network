@extends('layouts.app2')
 @section('content')
<a style='display: inline-block;font-size:2em;margin-left:1em;' href='javascript:history.back(1);'>Back</a><br><br />
<div id='msg'></div>
<hr />
<div style="margin-left: 32em;margin-top:3em; border:1px solid black; display: inline-block;width: 30em;height: 15em">
<form method='post' enctype="multipart/form-data">
<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   	<div>
   		<h2 style="margin-left:2.5em;margin-top:1em;" for='file'>Select new picture:</h2><br />
   		<input style='display: inline-block;margin-left:6.3em;margin-top:1em;' id='file' type="file" name="file"><br />
 
	<br /><input style='display: inline-block;margin-left:12em;margin-top:1em;' type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
</div>
<script>
$(function (){
	$("form").submit(function(e) {

	    var formData = new FormData($(this)[0]);

	    $.ajax({
	        url: window.location.pathname + "/upload",
	        type: 'POST',
	        data: formData,
	        async: true,
	        success: function (data) {
	            if (data){
					$("#msg").html("<h3>" + data + "</h3><hr>");
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