$(document).ready(function(){

	$('.container #player_1_hand img').hover(function(){

		$(this).css('bottom', '15%');
	});

	$('.container #player_1_hand img').mouseout(function(){

		$(this).css('bottom', '0px');
	});

	$('.container img#trump').hover(function(){

		$(this).css('left', '12%');
	});

	$('.container img#trump').mouseout(function(){

		$(this).css('left', '8%');
	});
});