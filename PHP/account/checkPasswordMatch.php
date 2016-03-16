<?php 

	$conf = $_POST['confirm'];
	$pass = $_POST['pass'];


	if(strcmp($conf, $pass) != 0)
	{
		echo "Password and confirmaiton do not match !!!";
	}
?>