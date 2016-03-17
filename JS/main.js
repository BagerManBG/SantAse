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

	$('#play').click(function(){

		$('.cover').fadeIn(200);
		$('.login').fadeIn(400);
	});

	$('.cover').click(function(){

		$('.cover').fadeOut(200);
		$('.register').fadeOut(400);
		$('.login').fadeOut(400);
	});
	
	var nameError = true;	
	var mailError = true;
	var passError = true;
	var confError = true;

	$('.register input[name=username]').addClass('error');
	$('.register input[name=email]').addClass('error');
	$('.register input[name=password]').addClass('error');
	$('.register input[name=password_confirm]').addClass('error');

	setInterval(function(){

		var name = $('.register input[name=username]').val();

		$.ajax({
			url: "../PHP/account/checkUser.php",
			type: "POST",
			data: {name: name},
			success: function(result) {
				if(result != '')
				{
					//alert(result);
					nameError = true;
					$('.register input[name=username]').addClass('error');
				}	
				else
				{
					nameError = false;
					$('.register input[name=username]').removeClass('error');
				}
			}
		});
	}, 100);

	setInterval(function(){

		var email = $('.register input[name=email]').val();

		$.ajax({
			url: "../PHP/account/checkEmail.php",
			type: "POST",
			data: {email: email},
			success: function(result) {
				if(result != '')
				{
					//alert(result);
					mailError = true;
					$('.register input[name=email]').addClass('error');
				}
				else
				{
					mailError = false;
					$('.register input[name=email]').removeClass('error');
				}	
			}
		});
	}, 100);

	setInterval(function(){

		var pass = $('.register input[name=password]').val();

		$.ajax({
			url: "../PHP/account/checkPassword.php",
			type: "POST",
			data: {pass: pass},
			success: function(result) {
				if(result != '')
				{
					//alert(result);
					passError = true;
					$('.register input[name=password]').addClass('error');
				}	
				else
				{
					passError = false;
					$('.register input[name=password]').removeClass('error');
				}
			}
		});
	}, 100);

	setInterval(function(){

		var confirm = $('.register input[name=password_confirm]').val();
		var pass = $('.register input[name=password]').val();

		$.ajax({
			url: "../PHP/account/checkPasswordMatch.php",
			type: "POST",
			data: {confirm: confirm,
						pass: pass},
			success: function(result) {
				if(result != '')
				{
					//alert(result);
					confError = true;
					$('.register input[name=password_confirm]').addClass('error');
				}	
				else
				{
					confError = false;
					$('.register input[name=password_confirm]').removeClass('error');s
				}
			}
		});
	}, 100);

	setInterval(function(){

		if (nameError || mailError || passError || confError)
		{
			$('.register input[type=submit]').addClass('disabled');
			$('.register input[type=submit]').attr('disabled', 'disabled');
		}
		else
		{
			$('.register input[type=submit]').removeClass('disabled');
			$('.register input[type=submit]').removeAttr('disabled');
		}
	}, 100);
});