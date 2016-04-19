<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `challenge` WHERE `challenger_id` = '".$id."' OR `rival_id` = '".$id."'";

	$result = $db->fetchArray($q);

	$rival_id = $result[0]['challenger_id'];

	if($rival_id == $id)
	{
		$rival_id = $result[0]['rival_id'];
	}

	$q = "SELECT * FROM `points` WHERE `player` = '".$id."'";

	$result = $db->fetchArray($q);

	$myScore = $result[0]['points'];

	$q = "SELECT * FROM `points` WHERE `player` = '".$rival_id."'";

	$result = $db->fetchArray($q);

	$rivalScore = $result[0]['points'];

	echo $myScore.' '.$rivalScore;
?>