<?php

session_start(); 
if (!isset($_SESSION['username1'])) {
	header("location:index.php");
}



require_once('form/connection.php');

if(isset($_POST["change"]))
{
	$opassword = md5($_POST['opassword']);
	$npassword = md5($_POST['npassword']);
	$cpassword = md5($_POST['cpassword']);
	$username = $_SESSION['username1'];


$sql = "SELECT password FROM users where username='{$username}'";
$result = mysqli_query($conn, $sql);
$odata = mysqli_fetch_row($result);
if ($opassword==$odata[0]) {
	if ($npassword == $cpassword) {

		$sqll = "UPDATE users SET password='{$npassword}' WHERE username='{$username}'";
		$resultt = mysqli_query($conn, $sqll);
		echo "<script> alert('Password Updated Successfully!'); </script>";
		echo "<script> window.open('account.php','_self'); </script>";
	}
	else{
	echo "<script> alert('Password are not same!'); </script>";
				echo "<script> window.open('account.php','_self'); </script>";
			}
}
else{
	echo "<script> alert('Invalid Old password!'); </script>";
				echo "<script> window.open('account.php','_self'); </script>";
			}


}

if(isset($_POST["update"]))
{
	$uid=$_SESSION['uid'];
	$username=mysqli_real_escape_string($conn,$_POST["uname"]);
	$firstname=mysqli_real_escape_string($conn,$_POST["fname"]);
	$lastname=mysqli_real_escape_string($conn,$_POST["lname"]);
	$email=mysqli_real_escape_string($conn,$_POST["email"]);
	$city=mysqli_real_escape_string($conn,$_POST["city"]);
	$address=mysqli_real_escape_string($conn,$_POST["add"]);
	
	$number=mysqli_real_escape_string($conn,$_POST["num"]);
	

	
	$spl = "UPDATE users SET username='{$username}', first_name='{$firstname}', last_name='{$lastname}', email='{$email}', city='{$city}', address='{$address}', m_number='{$number}' WHERE id='{$uid}'";
		 $resut = mysqli_query($conn, $spl);
		echo "<script> alert('Profile Updated Successfully!'); </script>";
		echo "<script> window.open('account.php','_self'); </script>";

}
?>