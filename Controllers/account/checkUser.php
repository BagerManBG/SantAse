<?php 
	
	require_once("../../Models/database/db.class.php");

	$username = $_POST['name'];

	if(strlen($username) == 0)
	{
		echo "You must fill in username";
		exit;
	}

	if(strlen($username) < 4)
	{
		echo "Username is too short";
		exit;
	}

	if(strlen($username) > 20)
	{
		echo "Username is too long";
		exit;
	}

	if(!preg_match('/^(?=.{4})(?!.{21})[^\W_]*[a-z][^\W_]*$/i', $username))
	{
		echo "Username cannot contain special chars or only numbers";
		exit;
	}

	$q = "SELECT * FROM `users` WHERE `username`= '".$username."'";
	$result = $db->fetchArray($q);

	if(count($result) > 0)
	{
		echo "Username already taken";
		exit;
	}
?>