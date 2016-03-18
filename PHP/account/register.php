<?php 

	require_once("../../Classes/database/db.class.php");
	
	$info = $_POST;
	$hasError = false;

	if(strlen($info['username']) == 0)
	{
		$hasError = true;
	}

	if(strlen($info['username']) < 4)
	{
		$hasError = true;
	}

	if(strlen($info['username']) > 20)
	{
		$hasError = true;
	}

	if(!preg_match('/^(?=.{4})(?!.{21})[\w]*[a-z.][\w]*$/i', $info['username']))
	{
		$hasError = true;
	}

	$q = "SELECT * FROM `users` WHERE `username`= '".$username."'";
	$result = $db->fetchArray($q);

	if(count($result) > 0)
	{
		$hasError = true;
	}

	$regex = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";

	if(strlen($info['email']) == 0)
	{
		$hasError = true;
	}

	if(!preg_match($regex, $info['email']))
	{
		$hasError = true;
	}

	if(!preg_match('/^[a-z0-9@._]+$/i', $info['email']))
	{
		$hasError = true;
	}

	if(strlen($info['password']) == 0)
	{
		$hasError = true;
	}

	if(strlen($info['password']) < 4)
	{
		$hasError = true;
	}

	if(strlen($info['password']) > 20)
	{
		$hasError = true;
	}

	if(!preg_match('/^(?=.{4})(?!.{21})[\w.-]*[a-z0-9][\w-.]*$/i', $info['password']))
	{
		$hasError = true;
	}

	if(strcmp($info['password_confirm'], $info['password']) != 0)
	{
		$hasError = true;
	}

	if(!$hasError)
	{
		unset($info['password_confirm']);
		$info['password'] = md5($info['password']);

		$db->saveArray('users', $info);
	}
	
	header("Location: ../../index.php");
?>