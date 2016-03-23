<!DOCTYPE html>
<html>
	<head>
		<title>SantAse</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
		<script type="text/javascript" src="JS/main.js"></script>
		<script type="text/javascript" src="JS/game.js"></script>

		<link rel="shortcut icon" type="image/png" href="images/favicon/favicon.ico">

		<link rel="stylesheet" type="text/css" href="CSS/reset.css">
		<link rel="stylesheet" type="text/css" href="CSS/main.css">
		<link rel="stylesheet" type="text/css" href="CSS/game.css">
	</head>
	<body>
		<nav>
			<div class="middleNav">
				<div class="nav">
					<a href="index.php" class="disable-select">Home</a>
					<a href="rules.php" class="disable-select">Rules</a>
					<a href="#" class="disable-select">Contact</a>
				</div>
			</div>
		</nav>

			<div class="chatAndRoom">
				<form class="chat">
					<div> 
						<label> Chat </label>
					</div>	


			 	 <div id="messages">
			 	 	 <div class="discussion"> </div>
			        <input type="text" id="myMessage">
			    	<input type="submit" value="Send" id="send">
			    	 				
	   		 	 </div> 	

					 
				</form>

				<div class="rooms">
					<div> <label> Rooms </label> </div>
					 	<div class="border"> </div>
					 		<button> Start game </button>
	   	   	    </div>
	   		</div>
	</body>
</html>