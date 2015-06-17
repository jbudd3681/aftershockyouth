<?php 
	session_start();
	include('../assets/inc/config.php');
	session_destroy();
	header("Location: ../login/?status=loggedout");
	exit(); 	
	?>