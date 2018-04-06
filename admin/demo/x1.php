<?php
session_start(); 
if (!isset($_SESSION['admin'])) {
  header("location:../index.php");
}
$u_name = $_SESSION['admin'];
require_once('../connection.php');

if($_POST['VID'] && $_POST['getid']==0){

$vi=$_POST['VID'];
$wname=$_POST['wcn'];
$trans=$_POST['ts'];


$s=json_encode($vi);
  $x=print_r($s,true);

  $commonwords = file_get_contents('x.txt');

  $a=strtolower($commonwords);

$a = explode(",", $a);



$search = strtolower($s);

$search = explode(" ", $search);

foreach($search as $value){
    if(!in_array($value, $a)){
        //echo "$value<br/>";
        $query[] = $value;
        
    }
}   
$query = implode(" ", $query);
$query=preg_replace('/[^\p{L}\p{N}\s]/u', '', $query);
$transc=mysqli_real_escape_string($conn,$query);



























/*foreach($vi as $value){
  
 $transcription[]= $value;
}
//$transcription = implode(",", $transcription);
//echo $transcription;
$transcription = implode(",", $transcription);
$transc=mysqli_real_escape_string($conn,$transcription);
*/
foreach($trans as $value){
 $wc_id[]= $value;
}
$wc_id = implode(",", $wc_id);

$wcnew="INSERT INTO wordcloud(wordcloud_name,video_id,wordcloud_text,generated_by) VALUES('$wname','$wc_id','$transc','$u_name')";
mysqli_query($conn,$wcnew);
}

else if (isset($_POST['getid'])) {

  $vi=$_POST['VID'];
$wname=$_POST['wcn'];
$trans=$_POST['ts'];
$id=$_POST['getid'];




$s=json_encode($vi);
  $x=print_r($s,true);

  $commonwords = file_get_contents('x.txt');

  $a=strtolower($commonwords);

$a = explode(",", $a);



$search = strtolower($s);

$search = explode(" ", $search);

foreach($search as $value){
    if(!in_array($value, $a)){
        //echo "$value<br/>";
        $query[] = $value;
        
    }
}   
$query = implode(" ", $query);
$query=preg_replace('/[^\p{L}\p{N}\s]/u', '', $query);
$transc=mysqli_real_escape_string($conn,$query);

/*foreach($vi as $value){
  
 $transcription[]= $value;
}
//$transcription = implode(",", $transcription);
//echo $transcription;
$transcription = implode(",", $transcription);
$transc=mysqli_real_escape_string($conn,$transcription);
*/
foreach($trans as $value){
 $wc_id[]= $value;
}
$wc_id = implode(",", $wc_id);
 $y="UPDATE wordcloud SET wordcloud_name='$wname', video_id='$wc_id', wordcloud_text='$transc' WHERE id='$id'";
      $z=mysqli_query($conn,$y);
}



?>