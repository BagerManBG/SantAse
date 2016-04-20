<?php 

	error_reporting(0);
	require_once("../../Models/database/db.class.php");
	require_once("handCardsSort.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `packs` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$pack_str = $result[0]['pack_order'];

	$pack_arr = explode(',', $pack_str);

	$card = array_pop($pack_arr);

	$pack_str = implode(',', $pack_arr);

	$q = "SELECT * FROM `hand` WHERE `player` = '".$id."'";

	$result = $db->fetchArray($q);

	$hand = $result[0]['hand'];

	$hand_arr = explode(',', $hand);

	foreach ($hand_arr as $key => $val) 
	{
		if($val == 'null')
		{
			$hand_arr[$key] = $card;
		}
	}

	$hand = implode(',', $hand_arr);

	$hand = SortHand($hand);

	$q = "UPDATE `hand` SET `hand`='".$hand."' WHERE `player` = '".$id."'";

	$db->fetchArray($q);

	$q = "UPDATE `packs` SET `pack_order`='".$pack_str."' WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$db->fetchArray($q);

	echo $hand;
?>