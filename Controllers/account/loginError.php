<?php 

	session_start();

	if($_SESSION['error'] == 'true')
	{
		echo "error";
		$_SESSION['error'] = 'false'; 
	}
?>