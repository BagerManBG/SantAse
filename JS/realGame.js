var myTurn = false;
var firstTurn = true;

$(document).ready(function(){

	$('#myTurn').hide();

	getPayerNames();
	shufflePack();

	setInterval(function() {

		getTrumpCard();
		getTurn();
		drawHand();

	}, 200);

	turnSet();
});

function getPayerNames()
{
	$.ajax({

		url: '../Controllers/game/getPlayerNames.php',
		success: function(result) {

			var i = result.indexOf(' ');
			var partOne = result.slice(0, i).trim();
			var partTwo = result.slice(i + 1, result.length).trim();

			//alert(partOne);
			//alert(partTwo);

			$('.container h2#player_1').text(partOne);
			$('.container h2#player_2').text(partTwo);
		}
	});
}

function shufflePack()
{
	$.ajax({

		url: '../Controllers/game/packOrder.php',
		success: function(result) {

			//alert(result);
		}
	});
}

function getTrumpCard()
{
	$.ajax({

		url: '../Controllers/game/trumpCard.php',
		success: function(result) {

			var i = result.indexOf('_');
			var partTwo = result.slice(i + 1, result.length).trim();

			//alert(result);

			$('#trump').attr('src', 'images/cards/' + partTwo + '/' + result + '.png')
		}
	});
}

function turnSet()
{
	$.ajax({

		url: '../Controllers/game/setTurn.php',
		success: function(result) {

			//alert(result);
		}
	});
}

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

function drawHand()
{
	if(myTurn && firstTurn)
	{
		firstTurn = false;
		myTurn = false;

		$.ajax({

			url: "../Controllers/game/drawHand.php",
			success: function(result) {

				//alert(result);

				var hand = result.split(',');

				for(var j = 0; j < 6; j++)
				{
					var i = hand[j].indexOf('_');
					var partTwo = hand[j].slice(i + 1, hand[j].length).trim();

					$('#player_1_hand img:nth-of-type('+(j+1)+')').attr('src', 'images/cards/' + partTwo + '/' + hand[j] + '.png');
				}
				
				changeTurn();
			}
		});
	}
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