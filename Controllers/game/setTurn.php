<?php 

	//exit; //Definitely remove later !!!!
	require_once("../../Models/database/db.class.php");
	
	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `turns` WHERE `player_1` = '".$id."' ";

	$result = $db->fetchArray($q);

	if(count($result) != 0)
	{
		exit;
	}

	$q = "SELECT * FROM `challenge` WHERE `challenger_id` = '".$id."'";

	$result = $db->fetchArray($q);

	if(count($result) == 0)
	{
		echo 0;
		exit;
	}
	
	$player_1 = $result[0]['challenger_id'];
	$player_2 = $result[0]['rival_id'];

	$num = Rand(1, 2);

	if($num == 1)
	{
		$first = $player_1;
	}
	else if($num == 2)
	{
		$first = $player_2;
	}

	$info = array(
		"player_1" => $player_1,
		"player_2" => $player_2,
		"turn" => $first);

	$db->saveArray('turns', $info);
?>