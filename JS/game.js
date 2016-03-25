var flag = true;

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

	$('#send').click(function(){

		var message = $('.messages .sender textarea').val()
		$('.messages .sender textarea').attr("value", ""); 

		$.ajax({
			url: "../Controllers/chat/sendMessage.php",
			type: "POST",
			data: {message: message},
			success: function(result){

				checkMessages();
			}
		});
	});

	setInterval(function(){

		checkMessages();
	}, 200);
});

function checkMessages()
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