<?php 

	require_once("../../Models/database/db.class.php");

	$user_id = $_SESSION['user_id'];

	$q = "SELECT * FROM `challenge` INNER JOIN `users` ON `challenge`.`challenger_id` = `users`.`id` WHERE `rival_id` = '".$user_id."'";

	$result = $db->fetchArray($q);

	echo $result[0]['username'];
?>