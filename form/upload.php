<?php

session_start();
require_once('connection.php');
$username = $_SESSION['username1'];
$uid= $_SESSION['uid'];

if (isset($_POST['upload'])) {
	$vdes=$_POST['vd'];
	$ct=$_POST['city'];
		$zcd=$_POST['zc'];
		

	$file = $_FILES['video'];
	
	$fileName = $_FILES['video']['name'];
	$fileTmpName = $_FILES['video']['tmp_name'];
	$fileSize = $_FILES['video']['size'];
	$fileError = $_FILES['video']['error'];
	$fileType = $_FILES['video']['type'];
	$s=0;
	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('mp4','mov');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 2000000000) {
				//$fileNameNew = uniqid('',true).".".$fileActualExt;
				$fileDestination = '../uploaded/video/'.$fileName;
				move_uploaded_file($fileTmpName, $fileDestination);

				$ins = "INSERT INTO videos (user_id,video_path,video_description,zip_code,city,flag) VALUES ('$uid','$fileName','$vdes','$zcd','$ct','$s')";
				mysqli_query($conn,$ins);
				echo "<script> alert('Your video uploaded!'); </script>";
				echo "<script> window.open('../test.php','_self'); </script>";
			}
			else{
				echo "<script> alert('Your File is too big!'); </script>";
				echo "<script> window.open('../test.php','_self'); </script>";
			}
		}
		else{
			echo "<script> alert('There was error!'); </script>";
			echo "<script> window.open('../test.php','_self'); </script>";
		}
	}
	else{
		echo "<script> alert('Only upload mp4 file'); </script>";
		echo "<script> window.open('../test.php','_self'); </script>";
		
	}
}


?>