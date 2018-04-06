<?php  
session_start();

require_once('connection.php');

if(isset($_POST["loginbtn"]))
{
	$username=mysqli_real_escape_string($conn,$_POST["username1"]);
	$password=md5($_POST["password"]);
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	$result = mysqli_query($conn,$sql);

	$count = mysqli_num_rows($result);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	if ($count == 1) {

		$check = "SELECT status FROM users WHERE username='$username'";
		$result1 = mysqli_query($conn,$sql);
		$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);
		if ($row1['status'] == 1) {
			$_SESSION['username1'] = $username;
			$_SESSION['uid'] = $row["id"];
			header("location:../test.php");
		}
		else{
		echo "<script> alert('User Deactivated'); </script>";
		echo "<script> window.open('index.php','_self'); </script>";
	}	
			
	}
	else{
		echo "<script> alert('Invalid Username Or Password'); </script>";
		echo "<script> window.open('index.php','_self'); </script>";
	}
	
}




?>