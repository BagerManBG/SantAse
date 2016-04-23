<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `turn_winner` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$winner = $result[0]['winner'];

	if($winner == $id)
	{
		echo 'winner';
	}
	else
	{
		echo 'no';
	}
?>