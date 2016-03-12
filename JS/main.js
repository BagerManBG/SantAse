$(document).ready(function(){

	$('.register').hide();
	$('.login').hide();
	$('.cover').hide();

	$('#register').click(function(){

		$('.cover').fadeIn(200);
		$('.register').fadeIn(400);
	});

	$('#logIn').click(function(){

		$('.cover').fadeIn(200);
		$('.login').fadeIn(400);
	});

	$('.cover').click(function(){

		$('.cover').fadeOut(200);
		$('.register').fadeOut(400);
		$('.login').fadeOut(400);
	});

	//$('.register').fadeOut(400);
	//$('.register').fadeIn(400);
});