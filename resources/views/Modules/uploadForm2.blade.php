<?php
use App\Tags;

$options = Tags::getDropDownOptions();
?>

<div id='up-frm-msg'></div>
<form method='post' enctype="multipart/form-data">
<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   	<div>
   		<label for='file'>Upload cover photo:</label>
   		<input style='display: inline-block' id='file' type="file" name="file"><br /><br />
   	</div>
   	<div>
   	<label for="name">Enter name of album:</label>
   	<input type="text" name="name"/><br /><br />
   
   	</div>
		<div>
	        <textarea rows="5" cols="50" name='text' placeholder='Add description to your album..'></textarea><br /><br />
		</div>
<!-- 	<div> -->
<!-- 		<p> Would you like to select tags for your photo? </p> -->
<!-- 		<select id='tag1' name='tag1'> -->
			
<!-- 	    </select> -->
<!-- 		<select name='tag2'> -->
			
<!-- 	       </select> -->
<!-- 		<select name='tag3'> -->
			
<!-- 		</select> -->
	</div>
	<input type="submit">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

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