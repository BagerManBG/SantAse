<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `turns` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	if($result[0]['player_1'] == $id)
	{
		$idNew = $result[0]['player_2'];
	}
	else
	{
		$idNew = $result[0]['player_1'];
	}

	$q = "UPDATE `turns` SET `turn`='".$idNew."'";

	$db->fetchArray($q);
?>