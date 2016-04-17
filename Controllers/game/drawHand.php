<?php 

	//exit; //Definitely remove later !!!!
	error_reporting(E_ERROR | E_PARSE);
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];

	$q = "SELECT * FROM `packs` WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$result = $db->fetchArray($q);

	$packOrder = explode(',', $result[0]['pack_order']);

	$hand = array(
		array_pop($packOrder),
		array_pop($packOrder),
		array_pop($packOrder),
		array_pop($packOrder),
		array_pop($packOrder),
		array_pop($packOrder));

	$packOrderNew = implode(',', $packOrder);

	$q = "UPDATE `packs` SET `pack_order`='".$packOrderNew."' WHERE `player_1`='".$id."' OR `player_2`='".$id."'";

	$db->fetchArray($q); //remove comment later !!!

	$handString = implode(',', $hand);

	$info = array(
		"player" => $id,
		"hand" => $handString);

	$db->saveArray('hand', $info); //remove comment later !!!

	echo $handString;
?>