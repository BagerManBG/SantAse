<?php 

	$password = $_POST['pass'];

	if(strlen($password) == 0)
	{
		echo "You must fill in password !!!";
		exit;
	}

	if(strlen($password) < 4)
	{
		echo "Password is too short !!!";
		exit;
	}

		
?>