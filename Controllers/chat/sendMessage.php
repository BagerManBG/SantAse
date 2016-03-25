<?php 

	session_start();
	require_once("../../Models/database/db.class.php");
	require_once("../../Models/chat/chat.class.php");

	$message = $_POST['message'];
	$user_id = $_SESSION['user_id'];

	$ch->setData($user_id, $message);

	$user_id = $ch->getSender();
	$message = $ch->getMessage();

	if($message == '')
	{
		exit;
	}

	$q = "INSERT INTO `chat` (`id`, `user_id`, `message`) VALUES ('','".$user_id."','".$message."')";
	$db->fetchArray($q);
?>