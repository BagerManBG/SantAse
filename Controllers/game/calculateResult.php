<?php 
	
	error_reporting(0);
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `cards_this_turn` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$q = "SELECT * FROM `packs` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result_tr = $db->fetchArray($q);

	$card_1 = $result[0]['player_1_card'];
	$card_2 = $result[0]['player_2_card'];

	echo $card_1.' '.$card_2; //debug

	if($result[0]['player_1'] == $id)
	{
		$first = $card_2;
	}
	if($result[0]['player_2'] == $id)
	{
		$first = $card_1;
	}

	$trump_card_str = $result_tr[0]['pack_order'];
	$trump_card_arr = explode(',', $trump_card_str);
	$trump_card = $trump_card_arr[0];

	$q1 = "SELECT * FROM `card_points` WHERE `card` = '".$card_1."'";
	$q2 = "SELECT * FROM `card_points` WHERE `card` = '".$card_2."'";
	$q_tr = "SELECT * FROM `card_points` WHERE `card` = '".$trump_card."'";

	$result_card_1 = $db->fetchArray($q1);
	$result_card_2 = $db->fetchArray($q2);
	$result_trump_card = $db->fetchArray($q_tr);

	print_r($result_card_1); //debug
	print_r($result_card_2); //debug

	if($card_1 == $first && $result_card_1[0]['paint'] != $result_card_2[0]['paint'])
	{
		$winner = $result[0]['player_1'];

		if($result_card_2[0]['paint'] == $result_trump_card[0]['paint'])
		{
			$winner = $result[0]['player_2'];
		}
	}

	if($card_2 == $first && $result_card_1[0]['paint'] != $result_card_2[0]['paint'])
	{
		$winner = $result[0]['player_2'];

		if($result_card_1[0]['paint'] == $result_trump_card[0]['paint'])
		{
			$winner = $result[0]['player_1'];
		}
	}

	if($result_card_1[0]['power'] > $result_card_2[0]['power'])
	{
		$winner = $result[0]['player_1'];
	}

	if($result_card_2[0]['power'] > $result_card_1[0]['power'])
	{
		$winner = $result[0]['player_2'];
	}

	$q = "UPDATE `turn_winner` SET `winner`='".$winner."' WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$db->fetchArray($q);

	if($id == $winner)
	{
		echo "winner";
	}
	else
	{
		echo "no";
	}

	$points = $result_card_1[0]['points'] + $result_card_2[0]['points'];

	$q = "UPDATE `points` SET `points`='".$points."' WHERE `player`='".$winner."'";

	$db->fetchArray($q);
?>