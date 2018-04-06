<?php


session_start(); 
/*if (!isset($_SESSION['admin'])) {
	header("location:index.php");
}
*/
require_once('../connection.php');
if (isset($_POST['status'])){
	$hi1=$_POST['username'];
  	$uid=$_POST['ID'];
	$username=$_POST["username"];
	$firstname=$_POST["first_name"];
	$lastname=$_POST["last_name"];
	$email=$_POST["email"];
	
	$city=$_POST["city"];
	$address=$_POST["address"];
	$number=$_POST["m_number"];
	$status=$_POST['status'];
	if ($status == 0) {
		$st1 = 1;
	}
	else {
		$st1 = 0;
	}
	

	
	$spl = "UPDATE users SET username='{$username}', first_name='{$firstname}', last_name='{$lastname}', email='{$email}', city='{$city}', address='{$address}', m_number='{$number}', status='{$st1}' WHERE id='{$uid}'";
		 $resut = mysqli_query($conn, $spl);
		//echo "<script> alert('Profile Updated Successfully!'); </script>";
		if ($st1 == 1) {
			$status = 1;
			echo "Activated";
		}
		else{
			$status = 0;
			echo "Deactivated";
		}
}
?>