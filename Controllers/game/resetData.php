<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "UPDATE `cards_this_turn` SET `player_1_card` = 'null', `player_2_card` = 'null' WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$db->fetchArray($q);
?>