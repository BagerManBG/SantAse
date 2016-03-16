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

	$('.register input[name=username]').blur(function(){

		var name = $('input[name=username]').val();

		$.ajax({
			url: "../PHP/account/checkUser.php",
			type: "POST",
			data: {name: name},
			success: function(result) {
				if(result != '')
				{
					alert(result);
				}	
			}
		});
	});

	$('.register input[name=email]').blur(function(){

		var email = $('input[name=email]').val();

		$.ajax({
			url: "../PHP/account/checkEmail.php",
			type: "POST",
			data: {email: email},
			success: function(result) {
				if(result != '')
				{
					alert(result);
				}	
			}
		});
	});

	$('.register input[name=password]').blur(function(){

		var pass = $('input[name=password]').val();

		$.ajax({
			url: "../PHP/account/checkPassword.php",
			type: "POST",
			data: {pass: pass},
			success: function(result) {
				if(result != '')
				{
					alert(result);
				}	
			}
		});
	});
});