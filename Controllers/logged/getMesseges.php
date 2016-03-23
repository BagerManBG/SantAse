<?php

require_once("db.class.php");

$query = "SELECT * FROM `messages` ORDER BY `ondate` ASC";

$messages = $db->fetchArray($query);

foreach($messages as $k=>$v)
{
	?>
		<div class='messageLine'>
			<span class='timestamp'><?php echo $v['ondate']?></span>
			<span class='sender'><?php echo $v['sender']?></span> 
			<span class='message'><?php echo $v['message']?> </span>
		</div>
	<?php
}