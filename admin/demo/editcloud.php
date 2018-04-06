<?php 
require_once('../connection.php');
session_start();
if (isset($_POST['EID'])) {
	$ei = $_POST['EID'];
	 $query = "SELECT * from wordcloud where id='$ei'";
  $result = mysqli_query($conn, $query);
 
    $row = mysqli_fetch_array($result);

    $_SESSION['wcid']=$row['wordcloud_text'];
    $_SESSION['wi']=$row['id'];
     $_SESSION['x']=1;



}



?>