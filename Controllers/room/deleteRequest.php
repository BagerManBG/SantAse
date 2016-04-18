<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "DELETE FROM `challenge` WHERE `challenger_id` = '".$id."' OR `rival_id` = '".$id."'";

	$db->fetchArray($q);
?>