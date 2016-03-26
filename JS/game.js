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

	$.ajax({
		url: "../Controllers/room/addPlayingUser.php",
		success: function(result) {

			//do something
			getUsers();
		}
	});

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

	checkMessages(true);
	setInterval(function(){

		checkMessages(false);
		getUsers();
	}, 200);
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

function getUsers()
{
	$.ajax({
		url: "../Controllers/room/getPlayingUsers.php",
		success: function(result){
			$('.list').empty();
			$('.list').append(result);
		}
	});
}