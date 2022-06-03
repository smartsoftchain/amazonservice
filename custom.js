function moveArrow(){
	$('.arrow-btn').animate({backgroundPosition:'-=20px'},800).animate({backgroundPosition:'+=20px'},800);
	setTimeout('moveArrow()',1600);
}
$(document).ready(function(){
	$('.anihv').addClass('hvr-wobble-top');
	$('.anihv').append('<div class="arrow-btn"></div>');
	$(function(){
		//setTimeout('moveArrow()');
		$('.arrow-btn').animate({backgroundPosition:'-=20px'},800).animate({backgroundPosition:'+=20px'},800);
		setTimeout('moveArrow()',1600);
	});
});