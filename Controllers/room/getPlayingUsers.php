<?php 

	require_once("../../Models/database/db.class.php");

	$date = strtotime('now') - 3;

	$q = "SELECT * FROM `users` WHERE `lastOnline` > '".$date."'";
	$result = $db->fetchArray($q);

	if(count($result) == 1)
	{
		echo 'first';
		exit;
	}

	foreach ($result as $key => $val) 
	{
		if($val['id'] != $_SESSION['user_id'])
		{
			echo "<div class='user'>";
			echo "<p class='online'>".$val['username']."</p>";
			echo "<p class='online data'>Wins: ".$val['wins']." Loses: ".$val['loses']."</p>";
			echo "</div>";
		}
	}
?>