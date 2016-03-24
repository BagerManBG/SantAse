<?php 
	
	//session_start();
	require_once("../../Models/database/db.class.php");
	require_once("../../Models/chat/chat.class.php");

	$user_id = $_SESSION['user_id'];

	$q = "SELECT * FROM `chat` INNER JOIN `users` ON `chat`.`user_id` = `users`.`id`";
	
	$result = $db->fetchArray($q);

	//echo "<pre>";
	//print_r($result);

	foreach ($result as $key => $val) 
	{
		echo "<p class='name";
		if($user_id == $val['user_id'])
		{
			echo " my";
		}
		echo "'>".$val['username'].": </p>";

		echo "<p class='message'>".$val['message']."</p>";
	}
?>