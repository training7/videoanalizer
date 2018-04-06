<?php
require_once('../connection.php');


if (isset($_POST['img'])) {
	$hi=$_POST['img'];
	$o=$_POST['id'];
  $update_text=$_POST['plainText'];
	$q="UPDATE wordcloud SET wordcloud_img='$hi',wordcloud_text='$update_text' WHERE id='$o'";

	$f=mysqli_query($conn,$q);



           
  /*$query = "SELECT * from wordcloud where id='$o'";
  $result = mysqli_query($conn, $query);
  if(mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    echo "<br><br>";
    echo '<img src="'.$row['wordcloud_img'].'">';
  
}*/
	//echo '<img src="data:image/png;base64,' . $hi . '" />';



	//$img = $_POST['img'];
	/*$hi = str_replace('data:image/png;base64,', '', $hi);
	$hi = str_replace(' ', '+', $hi);
	$data = base64_decode($hi);
echo '<img src="data:image/png;base64,' . $data . '" />';*/
}

?>
