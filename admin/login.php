<?php
session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location:index.php");
}
else{
	header("location:demo/index.php");
}


require_once('connection.php');
if(isset($_POST['submit'])){
	$user = $_POST['username'];
	$psd = md5($_POST['password']);
	$sql = "SELECT * FROM admin WHERE username='$user' AND password='$psd'";
	$result = mysqli_query($conn,$sql);
	$row= mysqli_fetch_array($result);
	$s=$row['status'];
	$count = mysqli_num_rows($result);
	if($s==1){
	if ($count == 1) {
			$_SESSION['admin'] = $user;
			header("location:demo/index.php");
			
	}

	else{
		echo "<script> alert('Invalid Username Or Password'); </script>";
		echo "<script> window.open('index.php','_self'); </script>";
	}
}
	else{
			echo "<script> alert('Your accout is dectivated'); </script>";
		echo "<script> window.open('index.php','_self'); </script>";
	}	
}
?>