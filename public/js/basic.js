
$(function (){
	imageZooms();
});
	
function imageZooms(){
	$('img').on('click', function (e) {
		var target = $(e.target);
		var canvas = $('#enlarger');
		
		var ctx = canvas.getContext('2d');
		
		ctx.drawImage(target, 0, 0);
	})
};