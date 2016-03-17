<!DOCTYPE html>
<html>
<head>
	<title>SantAse</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="JS/main.js"></script>

	<link rel="shortcut icon" type="image/png" href="images/favicon/favicon.ico">

	<link rel="stylesheet" type="text/css" href="CSS/reset.css">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
	<link rel="stylesheet" type="text/css" href="CSS/home.css">
</head>
<body>
	<nav>
		<div class="middleNav">
			<a href="#" class="activePage">Home</a>
			<a href="rules.php">Rules</a>
			<a href="#" >Contact</a>
			<a href="#" >Game</a>

			<button class="sign_UpIn" id="register">Sign Up</button>
			<button class="sign_UpIn" id="logIn">Log In</button>
		</div>
	</nav>
	<div class="playGame"> 
		<h1> SantAse<h1/>
        <h3> Best way to kill some time </h3>
        <button> Play Game </button>

	</div>

	<?php require_once("./includes/form.php"); ?>
</body>
</html>