<nav>
		<div class="middleNav">
			<a href="index.php" target="_blank">Home</a>
			<a href="#" class="activePage">Rules</a>
			<a href="#" target="_blank">Contact</a>

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
	</div>