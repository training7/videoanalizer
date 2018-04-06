<?php

session_start(); 
if (!isset($_SESSION['username1'])) {
	header("location:index.php");
}
else{
	header("location:../test.php");
}


require_once('connection.php');

if(isset($_POST["registerbtn"]))
{
	$u1=$_POST["username"];
	$username=mysqli_real_escape_string($conn,$_POST["username"]);
	$firstname=mysqli_real_escape_string($conn,$_POST["firstname"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["lastname"]);
	$email=mysqli_real_escape_string($conn,$_POST["newemail"]);
	$password=md5($_POST["password1"]);
	$city=mysqli_real_escape_string($conn,$_POST["city"]);
	$address=mysqli_real_escape_string($conn,$_POST["address"]);
	$gender=mysqli_real_escape_string($conn,$_POST["gender"]);
	$number=mysqli_real_escape_string($conn,$_POST["num"]);
	
	$st=1;


	$count=0;
	$chq = "SELECT * from users  where 'username'='$u1'";
  	$res = mysqli_query($conn, $chq);
  	$count= mysqli_num_rows($res);
  	if ($count>0) {
  		echo "<script> alert('Username Already Taken!'); </script>";
  		echo "<script> window.open('index.php','_self'); </script>";
  	}
  	else{
	$ins = "INSERT INTO users(username,first_name,last_name,email,password,city,address,gender,m_number,status) VALUES ('$username','$firstname','$lastname','$email','$password','$city','$address','$gender','$number','$st')"; 
		mysqli_query($conn,$ins);
		  		echo "<script>alert('Registered!');</script>";

		header("location:index.php");
}
}


?>