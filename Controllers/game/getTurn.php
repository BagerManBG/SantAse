<?php 

	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `turns` WHERE `turn` = '".$id."'";

	$result = $db->fetchArray($q);

	if(count($result) == 1)
	{
		echo "turn";
	}
?>