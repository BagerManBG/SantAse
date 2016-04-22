<?php 

	error_reporting(0);
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];
	$flag = false;

	$q = "SELECT * FROM `trump` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$trump = $result[0]['trump'];
	$trump_arr = explode('_', $trump);

	$q = "SELECT * FROM `hand` WHERE `player`='".$id."'";

	$result = $db->fetchArray($q);

	$hand_str = $result[0]['hand'];
	$hand_arr = explode(',', $hand_str);

	foreach ($hand_arr as $key => $val) 
	{
		$val_arr = explode('_', $val);

		if($val_arr[1] == $trump_arr[1] && $val_arr[0] == '9')
		{
			$flag = true;
			$trump_new = $val;
			$k = $key;
		}
	}

	if($flag)
	{

		$card_new = $trump;

		$k++;
		echo 'yes,'.$card_new.','.$k;
		$k--;

		$hand_arr[$k] = $card_new;

		$hand_str = implode(',', $hand_arr);

		$q_upd_1 = "UPDATE `trump` SET `trump` = '".$trump_new."' WHERE `player_1`='".$id."' OR `player_2`='".$id."'";
		$q_upd_2 = "UPDATE `hand` SET `hand` = '".$hand_str."' WHERE `player`='".$id."'";

		$db->fetchArray($q_upd_1);
		$db->fetchArray($q_upd_2);
	}
?>