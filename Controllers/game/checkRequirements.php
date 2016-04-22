<?php 

	error_reporting(0);
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];
	$card_index = $_POST['index'];

	$q = "SELECT * FROM `cards_this_turn` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$rival_card = $result[0]['player_1_card'];

	if($rival_card == 'null')
	{
		$rival_card = $result[0]['player_2_card'];
	}

	$q = "SELECT * FROM `hand` WHERE `player`='".$id."'";

	$result = $db->fetchArray($q);

	$hand_str = $result[0]['hand'];
	$hand_arr = explode(',', $hand_str);
	$hand_arr_2;

	$q = "SELECT * FROM `trump` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$trump = explode('_', $result[0]['trump']);

	foreach ($hand_arr as $key => $val) 
	{
		$hand_arr_2[$key] = explode('_', $val);
	}

	$player_card = $hand_arr[$card_index];

	$rival_card_arr = explode('_', $rival_card);
	$player_card_arr = explode('_', $player_card);

	if($player_card_arr[1] !=  $rival_card_arr[1])
	{
		$flag = false;

		foreach ($hand_arr_2 as $key => $val) 
		{
			if($hand_arr_2[$key][1] == $rival_card_arr[1])
			{
				$flag = true;
			}
			else if($hand_arr_2[$key][1] == $trump[1] && $player_card_arr[1] != $trump[1])
			{
				$flag = true;
			}
		}

		if($flag)
		{
			echo 'no';
			exit;
		}
	}

	echo 'yes';
?>