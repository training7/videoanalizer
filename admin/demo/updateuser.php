<?php


session_start(); 
/*if (!isset($_SESSION['admin'])) {
	header("location:index.php");
}
*/
require_once('../connection.php');

if (isset($_POST['username'])) {
  
  	$hi1=$_POST['username'];
  	$uid=$_POST['ID'];
	$username=$_POST["username"];
	$firstname=$_POST["first_name"];
	$lastname=$_POST["last_name"];
	$email=$_POST["email"];
	$password=$_POST['password'];
	$city=$_POST["city"];
	$address=$_POST["address"];
	$number=$_POST["m_number"];
	
	$count=0;
	$chq = "SELECT * from users  where 'username'='$hi1'";
  	$res = mysqli_query($conn, $chq);
  	$count= mysqli_num_rows($res);
  	if ($count>0) {
  		//echo "<script> alert('Username Already Taken!'); </script>";
  		//echo "<script> window.open('index.php','_self'); </script>";
  		header('location:table.php');
  	}
	else{
	$spl = "UPDATE users SET username='{$username}', first_name='{$firstname}', last_name='{$lastname}', email='{$email}', city='{$city}', address='{$address}', m_number='{$number}' WHERE id='{$uid}'";
		 $resut = mysqli_query($conn, $spl);
		echo "<script> alert('Profile Updated Successfully!'); </script>";
		//echo "<script> window.open('test.php','_self'); </script>";
}
}


?>