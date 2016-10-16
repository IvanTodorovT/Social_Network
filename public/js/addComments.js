/**
 * To include like buttons to a view just include a block element(s) with class='likeButtons' and css: overflow: auto;
 * tag: <script type="text/javascript" src="js/addUploadForm.js"></script>
 */

$(function (){
	$('body').append('<div id="likeButtonsPopUp">POP</div>')

	$('.likeButtons').append(
			'<i class="fa fa-thumbs-up" aria-hidden="true"></i>' +
			'<i class="fa fa-thumbs-down" aria-hidden="true"></i>' +
			'<i class="fa fa-comment" aria-hidden="true"></i>'
	);
	
	$('.likeButtons:parent').css({"overflow": "auto"});

	$('.likeButtons i').on('click', function(e){
		//function getStatus()
		var status = '';
		if ($(e.target).hasClass('fa-thumbs-up')){
			status = 'like';
		} else if ($(e.target).hasClass('fa-thumbs-down')) {
			status = 'dislike';
		}
		
		//function getTable()
		var classes = $(e.target).parent().parent().attr("class");
		var table = '';
		if (classes.match('album')) {
			table = 'album';
		} else if (classes.match('post')) {
			table = 'post';
		} else if (classes.match('comment')) {
			table = 'comment';
		}
		
		//function getId()
		var id = parseInt($(e.target).parent().parent().attr("id"));
		
		if (!table || !id || !status){
			console.log ('Bugsplash! \n table = ' + table + '\n id = ' + id + '\n status = ' + status);
		}
		var post = $.get("like", {table: table, refId: id, status: status})
		.done(function(data){
			$('#likeButtonsPopUp').html(data);
			$('#likeButtonsPopUp').css({'display': 'inline-block',
				'left': e.pageX, 'top': e.pageY
			});
		    $("#likeButtonsPopUp").fadeOut(2500);
		})
		.fail(function(err){
			console.log(err)
		});
	});
});