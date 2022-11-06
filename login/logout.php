<?php
	session_start();
	unset($_SESSION["userId"]);
	unset($_SESSION["userName"]);

	
	//login_main.php로 이동
	header("Location:login_name.php");
	exit();
?>
