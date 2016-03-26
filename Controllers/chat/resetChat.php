<?php 

	require_once("../../Models/database/db.class.php");

	$q = "DELETE FROM `chat` WHERE 1";
	$db->fetchArray($q);
?>