<?php
/*//step1
$cSession = curl_init(); 
//step2
curl_setopt($cSession,CURLOPT_URL,"http://www.google.com/search?q=curl");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3
$result=curl_exec($cSession);
//step4
curl_close($cSession);
//step5
echo $result;*/

 $username = "950dfd9f-10f9-4cda-9cd2-f3a47b160559";
 $password = "837lgBJy5Uqp";
 $url = 'https://stream.watsonplatform.net/speech-to-text/api/v1/recognize';
 $file = fopen('/opt/lampp/htdocs/va/uploaded/audio/cvs2.flac', 'r');
 $size = filesize('/opt/lampp/htdocs/va/uploaded/audio/cvs2.flac');
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

 $file = fopen("cvss2.json", 'w+'); // Create a new file, or overwrite the existing one.
fwrite($file, $executed);
$f1 = fopen("cvs2.txt", 'w+');
$json_data = file_get_contents('cvss2.json');
$json=json_decode($json_data, true);

foreach ($json['results'] as $key) {
	# code
	foreach ($key['alternatives'] as $keys){
	print_r ($keys['transcript']);
	$output = print_r ($keys['transcript'],true);
	fwrite($f1,$output);
}
}


 



fclose($file);
 //var_dump($executed);
?>
