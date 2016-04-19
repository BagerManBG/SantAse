var myTurn = false;
var myCardVis = false;
var rivalCardVis = false;

$(document).ready(function(){

	createCardData();

	var interval = setInterval(getRivalCard, 2000);

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

			myCardVis = true;

			changeTurn();
			writeCardData($(this).index());

			if(myCardVis && rivalCardVis)
			{
				calculateResult();
				//reset data
				//draw card
				//deside whose turn it is
				//display points
			}
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

function writeCardData(index)
{
	//alert(index);
	
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

function getRivalCard()
{
	$.ajax({

		url: "../Controllers/game/getRivalCard.php",
		success: function(result) {

			//alert(result);
			//clearInterval(interval);

			if(result != 'null')
			{
				var i = result.indexOf('_');
				var partOne = result.slice(0, i).trim();
				var partTwo = result.slice(i + 1, result.length).trim();

				$('#player_2_playedCard').attr('src', 'images/cards/'+partTwo+'/'+result+'.png');
				$('#player_2_playedCard').fadeIn(200);

				rivalCardVis = true;
			}
		}
	});
}

function calculateResult() //tommorow
{
	$.ajax({

		url: "../Controllers/game/calculateResult.php",
		success: function(result) {

			alert(result);
		}
	});
}