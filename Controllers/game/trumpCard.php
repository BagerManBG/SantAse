<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `trump` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$trumpCard = $result[0]['trump'];

	echo $trumpCard;
?>