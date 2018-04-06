<?php 

	session_start();
	 unset($_SESSION['wcid']); 
 	unset($_SESSION['wi']); 
  
	header("location:transcribedvideo1.php");
 ?>