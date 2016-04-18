<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `challenge` WHERE `challenger_id` = '".$id."'";

	$result = $db->fetchArray($q);

	if(count($result) == 0)
	{
		echo 1;
		exit;
	}

	$rival = $result[0]['rival_id'];

	$q = "SELECT * FROM `cards_this_turn` WHERE `player_1` = '".$id."'";

	$result = $db->fetchArray($q);

	if(count($result) != 0)
	{
		echo 2;
		exit;
	}

	$info = array(
		"player_1" => $id,
		"player_2" => $rival,
		"player_1_card" => "null",
		"player_2_card" => "null");

	$db->saveArray('cards_this_turn', $info);
	echo 3;
?>