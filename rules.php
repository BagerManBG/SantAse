<!DOCTYPE html>
<html>
<head>
	<title>SantAse</title>

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script type="text/javascript" src="JS/main.js"></script>

	<link rel="shortcut icon" type="image/png" href="images/favicon/favicon.ico">

	<link rel="stylesheet" type="text/css" href="CSS/reset.css">
	<link rel="stylesheet" type="text/css" href="CSS/main.css">
	<link rel="stylesheet" type="text/css" href="CSS/rules.css">
</head>
<body>
	<nav>
		<div class="middleNav">
			<a href="index.php" >Home</a>
			<a href="#" class="activePage">Rules</a>
			<a href="#" >Contact</a>

			<button class="sign_UpIn" id="register">Sign Up</button>
			<button class="sign_UpIn" id="logIn">Log In</button>
		</div>
	</nav>

	<?php require_once("includes/form.php"); ?>
</body>
</html>