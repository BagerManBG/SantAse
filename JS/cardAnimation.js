var myTurn = false;
var myCardVis = false;
var rivalCardVis = false;
var mustDraw = false;
var interval;
var interval_2;
var interval_3;

$(document).ready(function(){

	createCardData();

	interval = setInterval(getRivalCard, 2000);
	interval_2 = setInterval(hideCards, 1000);
	interval_3 = setInterval(drawCard, 1000);

	$('.playedCard').hide();

	$('.container #player_1_hand img').click(function(){

		getTurn();
		var interval = setInterval(getPoints, 2000);
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
				winner = 'null';
				setTimeout(calculateResult, 1000);
				//reset data
				//draw card
			}

			mustDraw = true;
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

				$('#player_2_hand img:last-of-type').fadeOut(200);

				rivalCardVis = true;
			}
		}
	});
}

function calculateResult()
{
	$.ajax({

		url: "../Controllers/game/calculateResult.php",
		success: function(result) {

		}
	});
}

function getPoints()
{
	//if(myCardVis && rivalCardVis)
	//{
		$.ajax({

			url: "../Controllers/game/getPoints.php",
			success: function(result) {

				var i = result.indexOf(' ');
				var partOne = result.slice(0, i).trim();
				var partTwo = result.slice(i + 1, result.length).trim();

				$('#player_1_sc').text(partOne);
				$('#player_2_sc').text(partTwo);
			}
		});
	//}
}

function hideCards()
{
	if(myCardVis && rivalCardVis)
	{
		setTimeout(function(){

			clearInterval(interval);
			setTimeout(function(){

				var interval = setInterval(getRivalCard, 2000);
			}, 1500);

			$('#player_1_playedCard').fadeOut(200);
			$('#player_2_playedCard').fadeOut(200);

			myCardVis = false;
			rivalCardVis = false;

			resetData();
			setTimeout(drawCard, 1000);
		}, 3000);
	}
}

function resetData()
{
	$.ajax({

		url: "../Controllers/game/resetData.php",
		success: function(result) {

		}
	});
}

function drawCard()
{
	if(mustDraw && myTurn && !myCardVis && !rivalCardVis)
	{
		mustDraw = false;
		$.ajax({

			url: "../Controllers/game/drawCard.php",
			success: function(result) {

				//alert(result);

				var hand = result.split(',');

				for(var j = 0; j < 6; j++)
				{
					var i = hand[j].indexOf('_');
					var partTwo = hand[j].slice(i + 1, hand[j].length).trim();

					$('#player_1_hand img:nth-of-type('+(j+1)+')').attr('src', 'images/cards/' + partTwo + '/' + hand[j] + '.png');
					$('#player_1_hand img:nth-of-type('+(j+1)+')').show();

					$('#player_2_hand img:last-of-type').show();
				}
				
				changeTurn();
			}
		});
	}
}