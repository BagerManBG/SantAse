<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `packs` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	if(count($result) == 0)
	{
		exit;
	}

	$arr = explode(",", $result[0]['pack_order']);
	$first = $arr[0];

	$trumpCard = $first;

	echo $trumpCard;
?>