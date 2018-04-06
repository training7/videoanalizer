<?php


session_start(); 
/*if (!isset($_SESSION['admin'])) {
	header("location:index.php");
}
*/
require_once('../connection.php');

if(!empty($_POST["username"])) {
	$count=0;
	$chq = "SELECT * from registration  where 'username'='$username'";
  	$res = mysqli_query($conn, $chq);
  	$count= mysqli_num_rows($res);
  if($count>0) {
      echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
      echo "<span class='status-available'> Username Available.</span>";
  }
}

/* $username = $_POST['username'];
	$count=0;
	$chq = "SELECT * from registration  where 'username'='$username'";
  	$res = mysqli_query($conn, $chq);
  	$count= mysqli_num_rows($res);
  	if ($count>0) {
  		echo "Username Already Taken!";
  	}
  	else{
  		echo "You can take Username";
  	}*/
?>