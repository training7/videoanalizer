$(document).ready(function(){
	$('img.p1').mouseenter(function(){
		$(this).css({
			'transform':'scale(1.1,1.1)',
			'transition' : '0.5s ease'
		});
	});
		$('img.p1').mouseout(function(){
		$(this).css({
			'transform':'scale(1,1)',
			'transition' : '0.5s ease'
		});
	});
		
});