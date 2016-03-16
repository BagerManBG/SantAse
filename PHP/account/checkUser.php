<?php 

	$username = $_POST['name'];

	if(strlen($username) == 0)
	{
		echo "You must fill in username !!!";
		exit;
	}

	if(strlen($username) < 4)
	{
		echo "Username is too short !!!";
		exit;
	}

	if(!preg_match('/^(?=.{4})(?!.{21})[\w.-]*[a-z][\w-.]*$/i', $username))
	{
		echo "Username cannot contain special chars !!!";
		exit;
	}
?>