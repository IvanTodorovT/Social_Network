<?php
use App\Tags;

$options = Tags::getDropDownOptions();
?>

<div id='up-frm-msg'></div>
<form method='post' enctype="multipart/form-data">
<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">
   	<div>
   		<label for='file'>Upload:</label>
   		<input style='display: inline-block' id='file' type="file" name="file">
   	</div>
		<div>
	        <textarea rows="5" cols="50" name='text' placeholder='What do you think?'></textarea>
		</div>
		
		<div><?php 

$albums = DB::table('albums')->get();

?>
<label for="album">Select album for your post:</label>
<select name="album">

    @foreach($albums as $album)
     <option value="{{ $album->id }}">{{ $album->name}} </option>

    @endforeach
</select> <label for="">or</label><a href="createAlbum"> Create new album</a>
</div>
		
	<div>
		<p> Would you like to select tags for your photo? </p>
		<select id='tag1' name='tag1'>
			<?= $options?>
	    </select>
		<select name='tag2'>
			<?= $options?>
	       </select>
		<select name='tag3'>
			<?= $options?>
		</select>
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