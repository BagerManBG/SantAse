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

	if(strlen($password) > 20)
	{
		echo "Password is too long !!!";
		exit;
	}

	if(!preg_match('/^(?=.{4})(?!.{21})[\w.-]*[a-z0-9][\w-.]*$/i', $password))
	{
		echo "Password cannot contain special chars !!!";
		exit;
	}	
?>