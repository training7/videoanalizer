<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<style>
    textarea{
        margin-top: 5em;
        margin-bottom: 5em;
    }
    #details{
        padding-top: 1em;
        margin-left: 2em;
    }
    #cp{
      margin-bottom: 2em;
    }
</style>
<script>
function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $temp.remove();
}
</script>
<?php

if (isset($_POST['VID'])) {

	$hi=$_POST['VID'];

	$s=json_encode($hi);
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
    ?>
    <h3 id="details">
    Transcription Of Selected Videos:~
    </h3>
    <center>
    <textarea id="text" style="height:30em;width:75.000em;" disabled>
            
   <?php echo $query; ?>

    </textarea>
    </center>
    <center>
<button id="cp" onclick="copyToClipboard('#text')" class="btn btn-default btn-md">Copy</button>
</center>
    
<?php
}
?>