@extends('layouts.app2')
 @section('content')
<a href='javascript:history.back(1);'>Back</a><br><br />
<div id='msg'></div>
<form method='post' enctype="multipart/form-data">
<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   	<div>
   		<label for='file'>Select new picture:</label><br />
   		<input style='display: inline-block' id='file' type="file" name="file"><br />
 
	<br /><input type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

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