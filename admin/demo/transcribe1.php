<?php
require_once('../connection.php');
if (isset($_POST['VID'])) {
	
	$hi = $_POST['VID'];

	$hi1 = $_POST['video_path'];
	$s="SELECT * FROM transcription where VID='$hi'";
	$b=mysqli_query($conn,$s);
	$srow=mysqli_fetch_array($b);
	$st=$srow['flag'];
	$t=$srow['transcription'];
	if($st==0){
	$vurl="../";
	$video = $vurl.$_POST['video_path'];
	$vname = basename($video,".mp4");

	$p="/opt/lampp/htdocs/va/uploaded/audio/";
	
	$q="/opt/lampp/htdocs/va/uploaded/json/";
		$r="/opt/lampp/htdocs/va/uploaded/text/";
	$a=$vname;
	$c=$p.$vname;
	$t=$q.$vname;
	$tx=$r.$vname;
 	$audio = $c . '.flac';
 	$tj= $t . '.json';
 	$x= $tx . '.txt';

	echo shell_exec("ffmpeg -i $video $audio 2> /opt/lampp/htdocs/ffmpeg/out.txt &");

	 $username = "997747c0-716d-43e3-9768-b89af7a8bbff";
 $password = "tfoYj8Q81b0r";
 $url = 'https://stream.watsonplatform.net/speech-to-text/api/v1/recognize';
 $file = fopen($audio, 'r');
 $size = filesize($audio);
 $fildata = fread($file,$size);
 $headers = array(    "Content-Type: audio/flac",
                      "Transfer-Encoding: chunked");
                      
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, $url);
 curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
 curl_setopt($ch, CURLOPT_POST, TRUE);
 curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 curl_setopt($ch, CURLOPT_BINARYTRANSFER, TRUE);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $fildata);
 curl_setopt($ch, CURLOPT_INFILE, $file);
 curl_setopt($ch, CURLOPT_INFILESIZE, $size);
 curl_setopt($ch, CURLOPT_VERBOSE, true);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 $executed = curl_exec($ch);
 curl_close($ch);
 $result = json_decode($executed, true);

 $file = fopen($tj, 'w+'); // Create a new file, or overwrite the existing one.
fwrite($file, $executed);
$file1 = fopen($x, 'w+'); // Create a new file, or overwrite the existing one.

$json_data = file_get_contents($tj);
$json=json_decode($json_data, true);

foreach ($json['results'] as $key) {
	

	
	foreach ($key['alternatives'] as $keys){
	
	print_r ($keys['transcript']);
	$output= print_r($keys['transcript'],true);
	fwrite($file1, $output);	
}
}
$l=file_get_contents($x);
$a=mysqli_real_escape_string($conn,$l);
$s=1;
$i="INSERT INTO transcription(VID,transcription,flag) VALUES ('$hi','$a','$s')";
$r=mysqli_query($conn,$i);
$c=mysqli_affected_rows($conn);
	if($c>0){
		
	}
	else{
		echo "Error!";
	}

fclose($file);
}
else{
	echo $t;
}
}
else {
	echo "string";
}
?>