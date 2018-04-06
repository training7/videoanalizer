<?php
session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location:../index.php");
}

require_once('../connection.php');
echo "<response>";
if (isset($_POST['ust'])) {
	$u=$_POST['uid'];

	$s=$_POST['st'];
	//echo $_SESSION['uid'];
    //echo $_SESSION['st'];
	if($s==0)
	{
		$t=1;
	}
	else{
		$t=0;
	}
	date_default_timezone_set('Asia/Kolkata');

	$upt=date('Y-m-d H:i:s');

	$q="UPDATE registration SET status='$t',Update_time='$upt' WHERE ID='$u'";
	$r=mysqli_query($conn,$q);

	$c=mysqli_affected_rows($conn);
	if($c>0)
	{
		$_SESSION['v']=1;
		header("location:table.php");
		//echo "<script> alert('Updated Successfully!'); </script>";
		$_SESSION['result1']='<div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> Status Updated Successfully!
</div>';
		//echo "<script> window.open('table.php','_self'); </script>";

	}
	else{
		//$_SESSION['v']=0;
		echo "Error!";
	}


}
echo "</response>";
?>