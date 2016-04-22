<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `packs` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$pack_str = $result[0]['pack_order'];

	$pack_arr = explode(',', $pack_str);

	if($pack_arr[0] == null)
	{
		echo 0;
	}
	else
	{
		echo count($pack_arr);
	}
	//print_r($pack_arr);
?>