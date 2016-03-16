<?php 

	require_once("../../Classes/database/db.class.php");
	
	$info = $_POST;

	unset($info['password_confirm']);
	$db->saveArray('users', $info);
	header("Location: ../../index.php");
?>