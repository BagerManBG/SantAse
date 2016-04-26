<?php 

	require_once("../../Models/database/db.class.php");
	require_once("../../Models/account/register.class.php");

	if( !( isset($_POST['username']) || isset($_POST['email']) || isset($_POST['password']) || isset($_POST['password_confirm']) ) )
	{
		header("Location: ../../index.php");
	}
	
	$info = $_POST;

	$user = $info['username'];
	$mail = $info['email'];
	$pass = $info['password'];
	$conf = $info['password_confirm'];

	$reg->setData($user, $mail, $pass, $conf);

	if(!$reg->getError())
	{
		$q = "SELECT * FROM `users` WHERE `username`= '".$user."'";
		$result = $db->fetchArray($q);

		if(count($result) > 0)
		{
			header("Location: ../../index.php");
			exit;
		}

		unset($info['password_confirm']);
		$info['password'] = md5($info['password']);

		$info['lastOnline'] = 0;
		$info['wins'] = 0;
		$info['loses'] = 0;

		$db->saveArray('users', $info);

		$q = "SELECT * FROM `users` WHERE `username`='".$user."'";

		$result = $db->fetchArray($q);

		$_SESSION['user_id'] = $result[0]['id'];
		$_SESSION['user'] = $result[0]['username'];
	}	
	
	header("Location: ../../index.php");
?>