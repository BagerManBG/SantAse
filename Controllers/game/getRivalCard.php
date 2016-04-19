<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `cards_this_turn` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	if($result[0]['player_1'] == $id)
	{
		if($result[0]['player_2_card'] != 'null')
		{
			echo $result[0]['player_2_card'];
		}
		else
		{
			echo 'null';
		}
	}
	if($result[0]['player_2'] == $id)
	{
		if($result[0]['player_1_card'] != 'null')
		{
			echo $result[0]['player_1_card'];
		}
		else
		{
			echo 'null';
		}
	}
?>