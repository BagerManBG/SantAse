var rivalError = true;
var id = null;
var username = null;

$(document).ready(function(){

	$.ajax({
		url: "../Controllers/logged/redirect.php",
		success: function(result) {

			if(result == "redirect")
			{
				window.location.href = "index.php";
			}
		}
	});

	$('form').remove();

	$('#send').click(function(){

		var message = $('.messages .sender textarea').val()
		$('.messages .sender textarea').attr("value", ""); 


		$.ajax({
			url: "../Controllers/chat/sendMessage.php",
			type: "POST",
			data: {message: message}
		});
		checkMessages(true);
	});

	$('#challenge').click(function(){

		if(id == null)
		{
			alert('No player is selected!');
		}
		else
		{
			$.ajax({

				url: '../Controllers/room/challengePlayer.php',
				type: "POST",
				data: {rival_id: id},
				success: function(result) {

					alert('Request successfully sent! Wait for a response.');
					checkAnswer();
				}
			});
		}
	});

	

	checkMessages(true);
	updateTime();
	getUsers(true);
	setInterval(function(){

		checkMessages(false);
		updateTime();
		getUsers(false);
	}, 1000);

	getRequest();
});

$(document).keydown(function(e) {

    if (e.keyCode == 13) 
    {
       $('#send').click();
    }

    if (e.keyCode == 13 && !e.shiftKey)
	{
	    e.preventDefault();
	}

	if (e.keyCode == 27) 
     {
        $('.cover').fadeOut(200);
		$('.challenge').fadeOut(400);
    }
});

function checkMessages(flag)
{
	$.ajax({
		url: "../Controllers/chat/getMessages.php",
		success: function(result){
			$('.discussion').empty();
			$('.discussion').append(result);
			if(flag)
			{
				$('.discussion').scrollTop(10000);
				flag = false;
			}	
		}
	});
}

function getUsers(flag)
{
	$.ajax({
		url: "../Controllers/room/getPlayingUsers.php",
		success: function(result){
			if(result == 'first' && flag)
			{
				$.ajax({
					url: "../Controllers/chat/resetChat.php"
				});
			}

			else if(result != 'first')
			{
				$('.list').empty();
				$('.list').append(result);

				if($('#'+id).length == 0)
				{
					$('#challenge').text('Challenge Player');
					id = null;
					username = null;
				}

				$('.user').click(function(event){

					id = $(this).attr('id');
					username = $(this).attr('name');

					$('#challenge').text('Challenge '+ username);
				});
			}

			else
			{
				$('.list').empty();
			}
		}
	});
}

function updateTime()
{
	$.ajax({
		url: "../Controllers/room/updateTime.php"
	});
}

function checkAnswer()
{
	var interval = setInterval(function(){

		//alert(1);
		$.ajax({

			url: "../Controllers/room/checkRivalAnswer.php",
			success: function(result) {

				if(result == 'yes')
				{
					clearInterval(interval);
					//alert('The player accepted your invitation!');
					window.location.href = "realGame.php";
				}

				if(result == 'no')
				{
					clearInterval(interval);

					$.ajax({

						url: "../Controllers/room/deleteRequest.php",
						success: function(result) {

							alert('The player denied your invitation!');
						}
					});
				}
			}
		});

	}, 2000);
}

function getRequest()
{
	var interval = setInterval(function(){

		//alert(1);
		$.ajax({

			url: "../Controllers/room/receiveDuelRequest.php",
			success: function(result) {

				if(result != '' && result.length < 21)
				{
					clearInterval(interval);
					var answer = confirm('You have been challenged by ' + result + '. Do you accept?');

					$.ajax({

						url: "../Controllers/room/updateAnswer.php",
						type: "POST",
						data: {answer: answer},
						success: function(result) {

							if(answer)
							{
								window.location.href = "realGame.php";
							}	
						}
					});
				}
			}
		});

	}, 2000);
}