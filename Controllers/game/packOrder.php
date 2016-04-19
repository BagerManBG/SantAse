<?php 

	//exit; //Definitely remove later !!!!
	require_once("../../Models/database/db.class.php");
	
	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `packs` WHERE `player_1` = '".$id."' ";

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

	$packArray = array(
		'1_c', '9_c', '10_c', '11_c', '12_c', '13_c',
		'1_d', '9_d', '10_d', '11_d', '12_d', '13_d',
		'1_h', '9_h', '10_h', '11_h', '12_h', '13_h',
		'1_s', '9_s', '10_s', '11_s', '12_s', '13_s',);

	shuffle($packArray);
	shuffle($packArray);
	shuffle($packArray);

	$packString = implode(',', $packArray);

	$info = array(
		"player_1" => $player_1,
		"player_2" => $player_2,
		"pack_order" => $packString);

	$db->saveArray('packs', $info);

	$info = array(
		"player_1" => $player_1,
		"player_2" => $player_2,
		"winner" => 'null');

	$db->saveArray('turn_winner', $info);
?>