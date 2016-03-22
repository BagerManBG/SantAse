var generalCheck;
var nameError = true;	
var mailError = true;
var passError = true;
var confError = true;

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

			$('.register input[name=username]').addClass('default');
			$('.register input[name=email]').addClass('default');
			$('.register input[name=password]').addClass('default');
			$('.register input[name=password_confirm]').addClass('default');

			$('.register input').bind("input",function(){

				UserCheck();
				EmailCheck();
				PassCheck();
				ConfCheck();

				generalCheck = setInterval(GeneralCheck, 200);
			});

			$('.register input').blur(function(){

				clearInterval(generalCheck);
			});

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

						$('.login input[name=username]').bind("input",function(){

							$('.login input[name=username]').removeClass('error');
						});

						$('.login input[name=password]').bind("input",function(){

							$('.login input[name=password]').removeClass('error');
						});
					}
				}
			});

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

function UserCheck()
{
	var name = $('.register input[name=username]').val();
	$('.register input[name=username]').removeClass('default');

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
				$('.register p.username').css('opacity', '1');
				$('.register p.username').css('color', '#ef470a');
				$('.register p.username').text(result);
			}	
			else
			{
				nameError = false;
				$('.register input[name=username]').removeClass('error');
				$('.register p.username').css('color', '#12ab12');
				$('.register p.username').text("Correct");
			}
		}
	});
}

function EmailCheck()
{
	var email = $('.register input[name=email]').val();
	$('.register input[name=email]').removeClass('default');

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
				$('.register p.email').css('opacity', '1');
				$('.register p.email').css('color', '#ef470a');
				$('.register p.email').text(result);
			}
			else
			{
				mailError = false;
				$('.register input[name=email]').removeClass('error');
				$('.register p.email').css('color', '#12ab12');
				$('.register p.email').text("Correct");
			}	
		}
	});
}

function PassCheck()
{
	var pass = $('.register input[name=password]').val();
	$('.register input[name=password]').removeClass('default');

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
				$('.register p.password').css('opacity', '1');
				$('.register p.password').css('color', '#ef470a');
				$('.register p.password').text(result);
			}	
			else
			{
				passError = false;
				$('.register input[name=password]').removeClass('error');
				$('.register p.password').css('color', '#12ab12');
				$('.register p.password').text("Correct");
			}
		}
	});
}

function ConfCheck()
{
	var confirm = $('.register input[name=password_confirm]').val();
	var pass = $('.register input[name=password]').val();
	$('.register input[name=password_confirm]').removeClass('default');

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
				$('.register p.password_confirm').css('opacity', '1');
				$('.register p.password_confirm').css('color', '#ef470a');
				$('.register p.password_confirm').text(result);
			}	
			else
			{
				confError = false;
				$('.register input[name=password_confirm]').removeClass('error');
				$('.register p.password_confirm').css('color', '#12ab12');
				$('.register p.password_confirm').text("Correct");
			}
		}
	});
}

function GeneralCheck()
{
	//alert(nameError);
	//alert(mailError);
	//alert(passError);
	//alert(confError);

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
}