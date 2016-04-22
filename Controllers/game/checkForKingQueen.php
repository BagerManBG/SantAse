<?php 
	
	//error_reporting(0);
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];
	$index = $_POST['index'];

	$q = "SELECT * FROM `hand` WHERE `player`='".$id."'";

	$result = $db->fetchArray($q);

	$hand_str = $result[0]['hand'];
	$hand_arr = explode(',', $hand_str);

	$card = $hand_arr[$index];

	$card_arr = explode('_', $card);

	if($card_arr[0] == '12' || $card_arr[0] == '13')
	{
		foreach ($hand_arr as $key => $val) 
		{
			$val_arr = explode('_', $val);

			if( ($val_arr[0] == '12' || $val_arr[0] == '13') && $val_arr[0] != $card_arr[0] && $val_arr[1] == $card_arr[1])
			{
				//echo 'yes';
				//exit;

				$points = '20';

				$q = "SELECT * FROM `trump` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

				$result = $db->fetchArray($q);

				$trump_arr = explode('_', $result[0]['trump']);

				if($trump_arr[1] == $card_arr[1])
				{
					$points = '40';
				}

				$q = "SELECT * FROM `points` WHERE `player`='".$id."'";

				$result = $db->fetchArray($q);

				$points += $result[0]['points'];

				$q = "UPDATE `points` SET `points`='".$points."' WHERE `player`='".$id."'";

				$db->fetchArray($q);

				echo 'yes';
			}
		}
	}

	//echo 'no';
?>