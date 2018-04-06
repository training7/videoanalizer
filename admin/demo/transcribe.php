<?php
require_once('../connection.php');
if (isset($_POST['VID'])) {
	
	$hi = $_POST['VID'];

	$hi1 = $_POST['video_path'];
	

	

	$vurl="../../uploaded/video/";
	$video = $vurl.$_POST['video_path'];
	$vname = basename($video,".mp4");

	$p="/opt/lampp/htdocs/va/uploaded/audio/";
	
	$q="/opt/lampp/htdocs/va/uploaded/json/";
	$r="/opt/lampp/htdocs/va/uploaded/text/";
	$a=$vname;
	$c=$p.$vname;
	$tans=$q.$vname;
	$tx=$r.$vname;
 	$audio = $c . '.flac';
 	$tj= $tans . '.json';
 	$x= $tx . '.txt';
								
								

								echo shell_exec("ffmpeg -i $video $audio 2> /opt/lampp/htdocs/ffmpeg/out.txt &");

								 $username = "1dc61d8f-2f2e-401a-9326-44b7875fd158";
							 $password = "U23fTbECOdQ7";
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
											$lines1 = file("a.txt");
											$data2 = file_get_contents($x);

											$y=strtolower($data2);
											$string="";

											foreach($lines1 as $line1){
											$line1 = trim($line1);
											$yx=strtolower($line1);


											if (preg_match("/\b$yx\b/i", $y)) {
										        //print "$yx\n";
										        $string .= $yx.' ';
											echo "<br />";
										    }

											}
											$b1 = file("b.txt");
											$d2 = file_get_contents($x);

											$by=strtolower($d2);
											$string1="";

											foreach($b1 as $bb1){
											$bb1 = trim($bb1);
											$bx=strtolower($bb1);


											if (preg_match("/\b$bx\b/i", $by)) {
										        //print "$yx\n";
										        $string1 .= $bx.' ';
											echo "<br />";
										    }

											}
							$l=file_get_contents($x);
							$trans=mysqli_real_escape_string($conn,$l);
							$o=1;
							$i="INSERT INTO transcription(video_id,transcription,retailer,brand) VALUES ('$hi','$trans','$string','$string1')";
							$i1="UPDATE videos SET flag=$o WHERE id='{$hi}'";
							$r1=mysqli_query($conn,$i1);
							$r=mysqli_query($conn,$i);
							$c=mysqli_affected_rows($conn);
											if($c>0){
												
											}
											else{
												echo "Error!";
											}

							fclose($file);
							
							



}
else {
	echo "string";
}
?>