<?php 

	session_start();
	unset($_SESSION["username1"]);
	header("location:index.php");
 ?>