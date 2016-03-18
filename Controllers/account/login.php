<?php 
	session_start();
	require_once("../../Models/database/db.class.php");

	$user = $_POST;

	//$user['username'] = "     /\|[])(){}$*& ~ + = -   Tes% t.A'd# m`@  !i^n/";
	//$user['password'] = "     /\|[])(){}$*& ~ + = -   a_d.m% in'# `@  !^/";

	$user['username'] = str_replace(' ', '-', $user['username']);
   	$user['username'] = preg_replace('/[^A-Za-z0-9._]/', '', $user['username']);

   	$user['password'] = str_replace(' ', '-', $user['password']);
   	$user['password'] = preg_replace('/[^A-Za-z0-9]/', '', $user['password']);

	echo "<pre>";
	print_r($user);

	$user['password'] = md5($user['password']);

	$q = "SELECT * FROM `users` WHERE `username` = '".$user['username']."' AND `password` = '".$user['password']."'";

	echo $q;

	$result = $db->fetchArray($q);

	if($result != null)
	{
		$_SESSION['user'] = $user['username'];
	}
	else
	{
		$_SESSION['error'] = true;
	}

	header("Location: ../../index.php");

	//echo "<pre>";
	//print_r($_SESSION);
?>