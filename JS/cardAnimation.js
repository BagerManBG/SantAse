var myTurn = false;

$(document).ready(function(){

	createCardData();

	$('.playedCard').hide();

	$('.container #player_1_hand img').click(function(){

		getTurn();
		if(myTurn)
		{

			var src = $(this).attr('src');
			
			$(this).fadeOut(200);

			setTimeout(function(){

				$('#player_1_playedCard').attr('src', src);
				$('#player_1_playedCard').fadeIn(200);
				$(this).attr('src', 'images/cards/back/back.png');
			}, 200);

			changeTurn();
			writeCardData($(this).index());
		}
	});
});

function getTurn()
{
	$.ajax({

		url: "../Controllers/game/getTurn.php",
		success: function(result) {

			if(result == "turn")
			{
				$('#myTurn').show();
				myTurn = true;
			}
			else
			{
				$('#myTurn').hide();
				myTurn = false;
			}
		}
	});
}

function changeTurn()
{
	$.ajax({
		url: "../Controllers/game/changeTurn.php",
		success: function(result) {

			$('#myTurn').hide();
		}
	});
}

function writeCardData(index) //I'm leaving this for tonight
{
	$.ajax({

		url: "../Controllers/game/writeCardData.php",
		type: "POST",
		data: {index: index},
		success: function(result) {
			//alert(result);
		}
	});
}

function createCardData()
{
	$.ajax({

		url: "../Controllers/game/createCardData.php",
		success: function(result) {
			//alert(result);
		}
	});
}