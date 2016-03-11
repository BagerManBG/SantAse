$(document).ready(function(){

	$('.register').hide();
	$('.logIn').hide();
	$('.cover').hide();

	$('#register').click(function(){

		$('.cover').fadeIn(200);
		$('.register').fadeIn(400);
	});

	$('#logIn').click(function(){

		$('.cover').fadeIn(200);
		$('.logIn').fadeIn(400);
	});

	$('.cover').click(function(){

		$('.cover').fadeOut(200);
		$('.register').fadeOut(400);
		$('.logIn').fadeOut(400);
	});

	//$('.register').fadeOut(400);
	//$('.register').fadeIn(400);
});