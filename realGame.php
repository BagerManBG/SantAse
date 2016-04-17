<!DOCTYPE html>
<html>
	<head>
		<title>SantAse</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script type="text/javascript" src="JS/jquery.js"></script>

		<script type="text/javascript" src="JS/realGame.js"></script>
		<script type="text/javascript" src="JS/cardAnimation.js"></script>
		<script type="text/javascript" src="JS/cardHover.js"></script>

		<link rel="shortcut icon" type="image/png" href="images/favicon/favicon.ico">

		<link rel="stylesheet" type="text/css" href="CSS/reset.css">
		<link rel="stylesheet" type="text/css" href="CSS/realGame.css">
	</head>
	<body>
		
		<div class="container">
			<img src="images/game/table.jpg" id="bg">

			<h2 class="playerName" id="player_1">Player 1</h2>
			<h2 class="playerName" id="player_2">Player 2</h2>

			<h2 class="playerName" id="myTurn">Your Turn!</h2>

			<img src="images/cards/pile/pile.png" id="pile">

			<div class="hand" id="player_1_hand">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
			</div>

			<div class="hand" id="player_2_hand">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
				<img src="images/cards/back/back.png" id="">
			</div>

			<img src="images/cards/back/back.png" id="trump">

			<img src="images/cards/back/back.png" class="playedCard" id="player_1_playedCard">
			<img src="images/cards/back/back.png" class="playedCard" id="player_2_playedCard">
		</div>

	</body>
</html>