<?php 
	
	require_once("../../Models/database/db.class.php");

	$id = $_SESSION['user_id'];
	$pl_2_id;

	$q = "SELECT * FROM `challenge` WHERE `challenger_id`='".$id."' OR `rival_id`='".$id."'";
	$result = $db->fetchArray($q);

	if($result[0]['challenger_id'] == $id)
	{
		$q = "SELECT * FROM `challenge` INNER JOIN `users` ON `challenge`.`challenger_id`=`users`.`id` WHERE `challenger_id`='".$id."' OR `rival_id`='".$id."'";

		$result = $db->fetchArray($q);
		$player_1 = $result[0]['username'];

		if($result[0]['challenger_id'] == $id)
		{
			$pl_2_id = $result[0]['rival_id'];
		}
		else
		{
			$pl_2_id = $result[0]['challenger_id'];
		}

		$q = "SELECT * FROM `challenge` INNER JOIN `users` ON `challenge`.`rival_id`=`users`.`id` WHERE `challenger_id`='".$pl_2_id."' OR `rival_id`='".$pl_2_id."'";

		$result = $db->fetchArray($q);
		$player_2 = $result[0]['username'];
	}
	else
	{
		$q = "SELECT * FROM `challenge` INNER JOIN `users` ON `challenge`.`rival_id`=`users`.`id` WHERE `challenger_id`='".$id."' OR `rival_id`='".$id."'";

		$result = $db->fetchArray($q);
		$player_1 = $result[0]['username'];

		if($result[0]['challenger_id'] == $id)
		{
			$pl_2_id = $result[0]['rival_id'];
		}
		else
		{
			$pl_2_id = $result[0]['challenger_id'];
		}

		$q = "SELECT * FROM `challenge` INNER JOIN `users` ON `challenge`.`challenger_id`=`users`.`id` WHERE `challenger_id`='".$pl_2_id."' OR `rival_id`='".$pl_2_id."'";

		$result = $db->fetchArray($q);
		$player_2 = $result[0]['username'];
	}

	echo $player_1.' '.$player_2;
?>