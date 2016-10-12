<div id='msg'></div>
<form method='post' enctype="multipart/form-data">
<!-- <form action='upload' method="post" enctype="multipart/form-data"> -->
   	<div>
   		<label for='file'>Upload:</label>
   		<input style='display: inline-block' id='file' type="file" name="file">
   	</div>
		<div>
	        <textarea rows="5" cols="50" name='text' placeholder='What do you think?'></textarea>
		</div>
	<div>
		<p> Would you like to select tags for your photo? </p>
		<select id='tag1' name='tag1'>
	       	<option value='NULL'>---</option>
	       	<option value='landscape'>Landscape</option>
	       	<option value='portrait'>Portrait</option>
	       	<option value='animals'>Animals</option>
	       	<option value='food'>Food</option>
	       	<option value='sci-fi'>Sci-Fi</option>
	       	<option value='fantasy'>Fantasy</option>
	       	<option value='cars'>Cars</option>
	       </select>
		<select name='tag2'>
	       	<option value='NULL'>---</option>
	       	<option value='landscape'>Landscape</option>
	       	<option value='portrait'>Portrait</option>
	       	<option value='animals'>Animals</option>
	       	<option value='food'>Food</option>
	       	<option value='sci-fi'>Sci-Fi</option>
	       	<option value='fantasy'>Fantasy</option>
	       	<option value='cars'>Cars</option>
	       </select>
		<select name='tag3'>
	       	<option value='NULL'>---</option>
	       	<option value='landscape'>Landscape</option>
	       	<option value='portrait'>Portrait</option>
	       	<option value='animals'>Animals</option>
	       	<option value='food'>Food</option>
	       	<option value='sci-fi'>Sci-Fi</option>
	       	<option value='fantasy'>Fantasy</option>
	       	<option value='cars'>Cars</option>
		</select>
	</div>
	<input type="submit">
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