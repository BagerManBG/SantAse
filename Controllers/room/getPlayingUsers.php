<?php 

	require_once("../../Models/database/db.class.php");

	$q = "SELECT * FROM `users` WHERE `inRoom` = '1'";
	$result = $db->fetchArray($q);

	foreach ($result as $key => $val) 
	{
		echo "<div class='user'>";
		echo "<p class='online'>".$val['username']."</p>";
		echo "<p class='online data'>Wins: ".$val['wins']." Loses: ".$val['loses']."</p>";
		echo "</div>";
	}
?>