<?php 

	require_once("../../Models/database/db.class.php");

	$user_id = $_SESSION['user_id'];
	$answer;

	//var_dump( $_POST['answer']);
	//exit;
	
	if($_POST['answer'] == 'true')
	{
		$answer = 'yes';
	}
	else
	{
		$answer = 'no';

		$q = "DELETE FROM `challenge` WHERE `rival_id`='".$user_id."'";
		$db->fetchArray($q);

		exit;
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