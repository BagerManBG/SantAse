<?php 

	require_once('Models/database/db.class.php');

	$q1 = "DELETE FROM `turn_winner` WHERE 1";
	$q2 = "DELETE FROM `points` WHERE 1";
	$q3 = "DELETE FROM `packs` WHERE 1";
	$q4 = "DELETE FROM `hand` WHERE 1";
	$q5 = "DELETE FROM `turn_winner` WHERE 1";
	$q6 = "DELETE FROM `cards_this_turn` WHERE 1";

	$db->fetchArray($q1);
	$db->fetchArray($q2);
	$db->fetchArray($q3);
	$db->fetchArray($q4);
	$db->fetchArray($q5);
	$db->fetchArray($q6);
?>