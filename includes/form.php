<div class="cover"></div>

<div class="form register">
	<h2 class="disable-select">Registration</h2>
	<form method="POST" action="Controllers/account/register.php">
		<label>
			<!--<p>Username:</p>-->
			<input type="text" name="username" placeholder="Username" id="username">
			<p class="username">*Required</p>
		</label>

		<label>
			<!--<p>Email:</p>-->
			<input type="text" name="email" placeholder="Email" id="email">
			<p class="email">*Required</p>
		</label>

		<label>
			<!--<p>Password:</p>-->
			<input type="password" name="password" placeholder="Password">
			<p class="password">*Required</p>
		</label>

		<label>
			<!--<p>Confirm:</p>-->
			<input type="password" name="password_confirm" placeholder="Confirm Password">
			<p class="password_confirm">*Required</p>
		</label>

		<input type="submit" value="Sign Up" class="reg disabled" disabled="disabled">
	</form>
</div>

<div class="form login">
	<h2 class="disable-select">Login</h2>
	<form method="POST" action="Controllers/account/login.php">
		<label>
			<!--<p>Username:</p>-->
			<input type="text" name="username" placeholder="Username">
		</label>

		<label>
			<!--<p>Password:</p>-->
			<input type="password" name="password" placeholder="Password">
			<p class="loginError"></p>
		</label>

		<input type="submit" value="Log In" class="log">
	</form>
</div>