<?php 

	$date = date('m/d/Y h:i:s a', time());
	echo $date."<br>";
	echo strtotime($date);
?>