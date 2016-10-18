
$(function (){
	imageZooms();
});
	
function imageZooms(){
	$('img').on('click', function (e) {
		var target = $(e.target);
		
		var width = target.width();
		var height = target.height();
		
		if (target.hasClass('zoomed')){
			
			target.animate({
				height: height,
				width: width,
				display: 'inline-block',
			}, 'slow');
			
		} else {
			target.animate({
				height: '90vh',
				width: 'auto',
//				max-width: '90vw',
				dosplay: 'block',
			}, 'slow');
		}
		target.toggleClass('zoomed');
	})
};