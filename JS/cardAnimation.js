var myTurn = false;
var myCardVis = false;
var rivalCardVis = false;
var mustDraw = false;
var interval;
var interval_2;
var interval_3;
var interval_4;
var noCardsInPack = false;
var removeCard = true;
var requirementsMet = false;
var obj;
var flag = true;

$(document).ready(function(){

	createCardData();

	interval = setInterval(getRivalCard, 2000);
	interval_2 = setInterval(hideCards, 1000);
	interval_3 = setInterval(drawCard, 1000);
	interval_4 = setInterval(getPackCardsRemaining_1, 1000);

	$('.playedCard').hide();

	$('.container #player_1_hand img').click(function(){

		getTurn();
		var interval = setInterval(getPoints, 2000);
		var player_2_visible = $('#player_2_playedCard').is(':visible');
		//alert(1);

		obj = $(this);

		if(myTurn)
		{
			checkForKingQueen($(this).index());
		}

		if(noCardsInPack && player_2_visible && myTurn)//finish later
		{
			var index = $(obj).index();//finish later
			$.ajax({

				url: "../Controllers/game/checkRequirements.php",
				type: "POST",
				data: {index: index},
				success: function(result) {
					//alert(result);
					if(result == 'no')
					{
						requirementsMet = false;
					}
					if(result == 'yes')
					{
						requirementsMet = true;

						var src = $(obj).attr('src');
			
						$(obj).fadeOut(200);

						setTimeout(function(){

							$('#player_1_playedCard').attr('src', src);
							$('#player_1_playedCard').fadeIn(200);
							$(obj).attr('src', 'images/cards/back/back.png');
						}, 200);

						myCardVis = true;

						changeTurn();
						writeCardData($(obj).index());

						if(myCardVis && rivalCardVis)
						{
							winner = 'null';
							setTimeout(calculateResult, 1000);
							//reset data
						}

						mustDraw = true;
					}
				}
			});
		}

		else if(myTurn) //finish later
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

	$('#trump').click(function(){

		if(myTurn && !rivalCardVis)
		{
			replaceTrumpWithNine();
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

				if(rivalCardVis)
				{
					flag = true;
				}
			}
			else
			{
				$('#myTurn').hide();
				myTurn = false;
				flag = true;
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

			if(result != 'null' && flag)
			{
				clearInterval(interval);

				var i = result.indexOf('_');
				var partOne = result.slice(0, i).trim();
				var partTwo = result.slice(i + 1, result.length).trim();

				$('#player_2_playedCard').attr('src', 'images/cards/'+partTwo+'/'+result+'.png');
				$('#player_2_playedCard').fadeIn(200);

				flag = false;

				$('#player_2_hand img:last-of-type').fadeOut(200);

				if(noCardsInPack && removeCard)
				{
					$('#player_2_hand img:hidden').remove();
					removeCard = false;
				}
				
				rivalCardVis = true;

				getPoints();
			}
		}
	});
}

function calculateResult()
{
	$.ajax({

		url: "../Controllers/game/calculateResult.php",
		success: function(result) {
			//alert(result);
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
		clearInterval(interval);

		setTimeout(function(){

			setTimeout(function(){

				var interval = setInterval(getRivalCard, 2000);

			}, 1500);

			$('#player_1_playedCard').fadeOut(200);
			$('#player_2_playedCard').fadeOut(200);

			myCardVis = false;
			rivalCardVis = false;
			removeCard = true;

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
	if(mustDraw && myTurn && !myCardVis && !rivalCardVis && !noCardsInPack)
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

function getPackCardsRemaining_1()
{
	$.ajax({

		url: '../Controllers/game/getPackCardsRemaining.php',
		success: function(result) {

			if(result == 0)
			{
				clearInterval(interval_3);
				clearInterval(interval_4);
				noCardsInPack = true;
			}
		}
	});
}

function replaceTrumpWithNine()
{
	$.ajax({

		url: "../Controllers/game/replaceTrumpWithNine.php",
		success: function(result) {
			
			var result_arr = result.split(',');

			//alert(result);
			//alert(result_arr[0]);
			//alert(result_arr[1]);
			//alert(result_arr[2]);

			if(result_arr[0] == 'yes')
			{			
				var i = result_arr[1].indexOf('_');
				var partOne = result_arr[1].slice(0, i).trim();
				var partTwo = result_arr[1].slice(i + 1, result_arr[1].length).trim();

				$('#player_1_hand img:nth-of-type('+result_arr[2]+')').attr('src', 'images/cards/' + partTwo + '/' + result_arr[1] + '.png');

				$('#trump').attr('src', 'images/cards/' + partTwo + '/9_' + partTwo + '.png');
			}
		}
	});
}

function checkForKingQueen(index)
{
	$.ajax({

		url: "../Controllers/game/checkForKingQueen.php",
		type: "POST",
		data: {index: index},
		success: function(result) {
			//alert(result);
		}
	});
}