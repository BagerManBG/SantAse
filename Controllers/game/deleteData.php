<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];
	$status = $_POST['status'];

	$q = "SELECT * FROM `users` WHERE `id`='".$id."'";

	$result = $db->fetchArray($q);

	$wins = $result[0]['wins'];
	$loses = $result[0]['loses'];

	if($status == 'win')
	{
		$wins++;

		$q_upd = "UPDATE `users` SET `wins`='".$wins."' WHERE `id`='".$id."'";
	}
	else if($status == 'lose')
	{
		$loses++;

		$q_upd = "UPDATE `users` SET `loses`='".$loses."' WHERE `id`='".$id."'";
	}

	$db->fetchArray($q_upd);

	$q1 = "DELETE FROM `cards_this_turn` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";
	$q2 = "DELETE FROM `challenge` WHERE `challenger_id`='".$id."' OR `rival_id`='".$id."'";
	$q3 = "DELETE FROM `hand` WHERE `player`='".$id."'";
	$q4 = "DELETE FROM `packs` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";
	$q5 = "DELETE FROM `points` WHERE `player`='".$id."'";
	$q6 = "DELETE FROM `trump` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";
	$q7 = "DELETE FROM `turns` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";
	$q8 = "DELETE FROM `turn_winner` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$db->fetchArray($q1);
	$db->fetchArray($q2);
	$db->fetchArray($q3);
	$db->fetchArray($q4);
	$db->fetchArray($q5);
	$db->fetchArray($q6);
	$db->fetchArray($q7);
	$db->fetchArray($q8);
?>