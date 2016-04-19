<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];
	$cardIndex = $_POST['index'];

	$q = "SELECT * FROM `cards_this_turn` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$q2 = "SELECT * FROM `hand` WHERE `player`='".$id."'";

		$result2 = $db->fetchArray($q2);

		$hand = explode(',', $result2[0]['hand']);

		$card = $hand[$cardIndex];
		$hand[$cardIndex] = 'null';

	if($result[0]['player_1'] == $id)
	{
		$q3 = "UPDATE `cards_this_turn` SET `player_1_card`='".$card."'";
		echo 1;
	}
	if($result[0]['player_2'] == $id)
	{
		$q3 = "UPDATE `cards_this_turn` SET `player_2_card`='".$card."'";
		echo 2;
	}

	$db->fetchArray($q3);

	$handNew = implode(',', $hand);

	$q4 = "UPDATE `hand` SET `hand`='".$handNew."' WHERE `player`='".$id."'";
	$db->fetchArray($q4);
?>