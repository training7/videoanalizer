<?php

session_start(); 
/*if (!isset($_SESSION['username'])) {
	header("location:index.php");
}
else{
	header("location:../test.php");
}
*/

require_once('../connection.php');

if(isset($_POST["adduser"]))
{
	$u1=$_POST["username"];
	$username=mysqli_real_escape_string($conn,$_POST["username"]);
	$firstname=mysqli_real_escape_string($conn,$_POST["first_name"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["last_name"]);
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$password=md5($_POST["password"]);
	$gender=mysqli_real_escape_string($conn,$_POST["group1"]);

	$city=mysqli_real_escape_string($conn,$_POST["city"]);
	$address=mysqli_real_escape_string($conn,$_POST["address"]);
	$mnumber=mysqli_real_escape_string($conn,$_POST["mobile"]);
	
	$st=1;


	$count=0;
	$chq = "SELECT * from users where 'username'='$u1'";
  	$res = mysqli_query($conn, $chq);
  	$count= mysqli_num_rows($res);
  	if ($count>0) {
  		echo "<script> alert('Username Already Taken!'); </script>";
  		echo "<script> window.open('index.php','_self'); </script>";
  	}
  	else{
	$ins = "INSERT INTO users(username,first_name,last_name,email,password,city,address,gender,m_number,status) VALUES ('$username','$firstname','$lastname','$email','$password','$city','$address','$gender','$mnumber','$st')"; 
		$r=mysqli_query($conn,$ins);
		$c=mysqli_affected_rows($conn);
		if($c>0){
			header("location:form.php");
			$_SESSION['result']='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You have been signed in successfully!
</div>';
		
		}
		else{
			header("location:index.php");
		}
				

		
}
}


?>