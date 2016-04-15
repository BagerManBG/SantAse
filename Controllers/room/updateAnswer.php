<?php 

	require_once("../../Models/database/db.class.php");

	$user_id = $_SESSION['user_id'];
	
	if($_POST['answer'])
	{
		$answer = 'yes';
	}
	else
	{
		$answer = 'no';
	}

	$q = "SELECT * FROM `challenge` WHERE `rival_id`='".$user_id."'";

	$result = $db->fetchArray($q);

	$info = array(
		'id' => $result[0]['id'],
		'challenger_id' => $result[0]['challenger_id'],
		'rival_id' => $result[0]['rival_id'],
		'rival_confirm' => $answer);

	$db->saveArray('challenge' ,$info);
?>