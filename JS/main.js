$(document).ready(function(){

	$.ajax({
		url: "../includes/form.php",
		success: function(result) {
			
			$('body').append(result);

			$('.register').hide();
			$('.login').hide();
			$('.cover').hide();

			$('.cover').click(function(){

				$('.cover').fadeOut(200);
				$('.register').fadeOut(400);
				$('.login').fadeOut(400);
			});
		}
	});	

	$('.sign_UpIn').hide();

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
			url: "../Controllers/account/checkUser.php",
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
			url: "../Controllers/account/checkEmail.php",
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
			url: "../Controllers/account/checkPassword.php",
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
			url: "../Controllers/account/checkPasswordMatch.php",
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

	$.ajax({
		url: "../Controllers/logged/loggedUserContent.php",
		success: function(result) {
			if(result != '')
			{
				var name = result;

				var url = window.location.pathname;
				var filename = url.substring(url.lastIndexOf('/')+1);

				if(filename == "game.php")
				{
					$('.nav').append('<a href="game.php" class="activePage disable-select">Game</a>');
				}
				else
				{
					$('.nav').append('<a href="game.php" class="disable-select">Game</a>');
				}

				$('.form, .cover').remove();

				$('.sign_UpIn').remove();
				
				$('.nav').append('<div class=\'logout\'><img src=\'images/main/logout-1.png\'></div>');
				$('.nav').append('<p>Welcome, ' + name + '</p>');

				$('#play').click(function(){

					$('.register').hide();
					$('.login').hide();
					$('.cover').hide();
					window.location.href = "game.php";
				});

				$('.logout').click(function(){

					$.ajax({
						url: "../Controllers/logged/logout.php",
						success: function(result) {

							location.reload();
						}
					});
				});
			}
			else
			{
				$('.sign_UpIn').show();
			}
		}
	});

	$.ajax({

		url: "../Controllers/account/loginError.php",
		success: function(result) {

			if(result == 'error')
			{
				$('.cover').fadeIn(200);
				$('.login').fadeIn(400);

				$('.login input[name=username]').addClass('error');
				$('.login input[name=password]').addClass('error');

				$('.login input[name=username]').keyup(function(){

					$('.login input[name=username]').removeClass('error');
				});

				$('.login input[name=password]').keyup(function(){

					$('.login input[name=password]').removeClass('error');
				});
			}
		}
	});
});

$(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        $('.cover').fadeOut(200);
		$('.register').fadeOut(400);
		$('.login').fadeOut(400);
    }
});