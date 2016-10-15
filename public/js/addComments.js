/**
 * To include like buttons to a view just include a block element(s) with class='likeButtons' and css: overflow: auto;
 * tag: <script type="text/javascript" src="js/addUploadForm.js"></script>
 */

$(function (){
	//function getTable()
	var classes = $('comments').parent().attr("class");
	var table = '';
	if (classes.match('album')) {
		table = 'album';
	} else if (classes.match('post')) {
		table = 'post';
	} else if (classes.match('comment')) {
		table = 'comment';
	}
	
	//function getId()
	var id = parseInt($('comments').parent().attr("id"));
	
	console.log("comments/" + table + '/' + id)
});