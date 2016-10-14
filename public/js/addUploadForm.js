/**
 * To include an upload form to a view you have to include this JS to the view and a block element with id='#uploadForm'
 * tag: <script type="text/javascript" src="js/addUploadForm.js"></script>
 */

	$.get("upload", function(r){
		$('#uploadForm').html(r);
	});