<?php 

	require_once("../../Models/database/db.class.php");

	$chall_id = $_SESSION['user_id'];
	$rival_id = $_POST['rival_id'];

	$info = array(
		'id' => '',
		'challenger_id' => $chall_id,
		'rival_id' => $rival_id,
		'rival_confirm' => 'neutral');

	$db->saveArray('challenge', $info);
?>