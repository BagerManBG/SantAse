<!DOCTYPE html>
<html>
<head>
	<title>SantAce</title>

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
			<a href="#">Rules</a>
			<a href="#">Contact</a>

			<button class="sign_UpIn" id="register">Sign Up</button>
			<button class="sign_UpIn" id="logIn">Log In</button>
		</div>
	</nav>

	<div class="cover"></div>

	<div class="form register">
		<h2>Registration</h2>
		<form method="POST" action="">
			<label>
				<!--<p>Username:</p>-->
				<input type="text" name="username" placeholder="Username">
			</label>

			<label>
				<!--<p>Email:</p>-->
				<input type="text" name="email" placeholder="Email">
			</label>

			<label>
				<!--<p>Password:</p>-->
				<input type="password" name="password" placeholder="Password">
			</label>

			<label>
				<!--<p>Confirm:</p>-->
				<input type="password" name="password_confirm" placeholder="Confirm Password">
			</label>

			<input type="submit" value="Sign Up">
		</form>
	</div>

	<div class="form login">
		<h2>Login</h2>
		<form method="POST" action="">
			<label>
				<!--<p>Username:</p>-->
				<input type="text" name="username" placeholder="Username">
			</label>

			<label>
				<!--<p>Password:</p>-->
				<input type="password" name="password" placeholder="Password">
			</label>

			<input type="submit" value="Log In">
		</form>
	<div>
</body>
</html>