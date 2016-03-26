<?php 

	session_start();
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "UPDATE `users` SET `inRoom`='1' WHERE `id`='".$id."'";
	$db->fetchArray($q);
?>