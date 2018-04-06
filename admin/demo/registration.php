<?php

session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location:../index.php");
}
else{
	header("location:index.php");
}


require_once('connection.php');

if(isset($_POST["registerbtn"]))
{
	$username=mysqli_real_escape_string($conn,$_POST["username"]);
	$firstname=mysqli_real_escape_string($conn,$_POST["firstname"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
	$email=mysqli_real_escape_string($conn,$_POST["newemail"]);
	$password=$_POST["password1"];
	$password2=$_POST["password2"];
	$city=mysqli_real_escape_string($conn,$_POST["city"]);
	$address=mysqli_real_escape_string($conn,$_POST["address"]);
	$gender=mysqli_real_escape_string($conn,$_POST["gender"]);
	$number=mysqli_real_escape_string($conn,$_POST["num"]);

	$count=0;
	$chq = "SELECT * from registration  where username='{$username}'";
  	$res = mysqli_query($conn, $sql);
  	$count= mysqli_num_rows($res);
  	if ($count == 0) {
  		$ins = "INSERT INTO registration(username,first_name,last_name,email,password,confirm_password,city,address,gender,m_number) VALUES ('$username','$firstname','$lastname','$email','$password','$password2','$city','$address','$gender','$number')"; 
		mysqli_query($conn,$ins);
		
		header("location:index.php");
  	}
  	else{
	
		echo "<script> alert('Username Already Taken!'); </script>";
  		echo "<script> window.open('index.php','_self'); </script>";
}
}


?>