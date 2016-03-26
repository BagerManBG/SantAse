<?php 

	session_start();
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "UPDATE `users` SET `lastOnline`='".strtotime('now')."' WHERE `id`='".$id."'";
	$db->fetchArray($q);
?>