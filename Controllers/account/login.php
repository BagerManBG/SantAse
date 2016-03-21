<?php 
	session_start();
	require_once("../../Models/database/db.class.php");
	require_once("../../Models/account/login.class.php");

	$info = $_POST;
	$_SESSION['error'] = 'false';

	if( !( isset($_POST['username']) || isset($_POST['password']) ) )
	{
		header("Location: ../../index.php");
	}

	$user = $info['username'];
	$pass = $info['password'];

	$log->setLoginData($user, $pass);

	$user = $log->getUsername();
	$pass = $log->getPassword();

	$q = "SELECT * FROM `users` WHERE `username` = '".$user."' AND `password` = '".$pass."'";

	$result = $db->fetchArray($q);

	if($result != null)
	{
		$_SESSION['user'] = $user;
	}
	else
	{
		$_SESSION['error'] = 'true';
	}

	header("Location: ../../index.php");
?>