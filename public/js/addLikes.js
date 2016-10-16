/**
 * To include like buttons to a view just include a block element(s) with class='likeButtons' and css: overflow: auto;
 * tag: <script type="text/javascript" src="js/addUploadForm.js"></script>
 */

$(function (){
	addLikes();
});

function addLikes(){
	$('body:not(:has("#likeButtonsPopUp"))').append('<div id="likeButtonsPopUp">POP</div>')

	var likeButtonsDestinations = $(".likeButtons:not(:has(i))");
	likeButtonsDestinations.each(function(){
		if($(this).parent().hasClass('album') || $(this).parent().hasClass('post')) {
			$(this).append('<i style="color: orange;" class="fa fa-comment" aria-hidden="true"></i>');
		}
		$(this).append(
				'<i style="color: red;" class="fa fa-thumbs-down" aria-hidden="true"></i>' +
				'<i style="color: green;" class="fa fa-thumbs-up" aria-hidden="true"></i>'
		);	
	});
	
	
	likeButtonsDestinations.parent().css({"overflow": "auto"});

	likeButtonsDestinations.find('i').on('click', function(e){
		var target = $(e.target);
		//function getTable()
		var classes = target.parent().parent().attr("class");
		var table = '';
		if (classes.match('album')) {
			table = 'album';
		} else if (classes.match('post')) {
			table = 'post';
		} else if (classes.match('comment')) {
			table = 'comment';
		}
		
		//function getId()
		var id = parseInt(target.parent().parent().attr("id"));

		//function getStatus()
		var status = '';
		if (target.hasClass('fa-thumbs-up')){
			status = 'like';
		} else if (target.hasClass('fa-thumbs-down')) {
			status = 'dislike';
		} else if (target.hasClass('fa fa-comment')) {
			
			//function getComments()
			if (target.parent().parent().find('.comments').length != 0){
				target.parent().parent().find('.comments').first().toggle()
			} else {
		
				$.get("comments/" + table + '/' + id, function(r){
					target.parent().parent().append(r);
				})
				.fail(function(err){
					console.log(err.responseText)
				});
			}
			return 'comments';
		}
		
		if (!table || !id || !status){
			console.log ('Bugsplash! \n table = ' + table + '\n id = ' + id + '\n status = ' + status);
		}
		$.get("like", {table: table, refId: id, status: status})
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
};