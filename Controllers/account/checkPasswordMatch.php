<?php 

	$conf = $_POST['confirm'];
	$pass = $_POST['pass'];


	if(strcmp($conf, $pass) != 0 || strlen($conf) == 0)
	{
		echo "Password and confirmaiton must match";
		exit;
	}
?>