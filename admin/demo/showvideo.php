<style>
	.loader {
    border: 16px solid #f3f3f3; /* Light grey */
    border-top: 16px solid #3498db; /* Blue */
    border-radius: 50%;
    width: 80px;
    height: 80px;
    animation: spin 2s linear infinite;
    margin-left: 505px;

}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

#transcription{
	 width: 500px;
    padding: 10px;
     border: 2px solid gray;
   
}
</style>

<script>
$("#transcription").hide();
$("divv1").hide();
//$("#transcription").show();
 $('#loader').hide();
  $('#wait').hide();
$("#div2").click(function(){
    var videoID='vid1';
    $("#div1").hide();
    $('#'+videoID).get(0).pause();
});
$('#dataTables-example tbody').on('click','tr', function(){
    $("#div1").show();

});

$("#Transcribe").click(function(){
	$('#loader').show();
   $('#wait').show();
    //$("#transcription").show();
    var vid = $("#vid").val();
     var vpath = $("#vpath").val();
    $.ajax({
                url: 'transcribe.php',
                method: 'POST',
                data: {VID : vid, video_path : vpath},
                success: function(data){
                	$("#transcription").show();
            $('#transcription').append(data);
          
            
            
        },
         complete: function(){
        $('#loader').hide();
         $('#wait').hide();
         $('#Transcribe').hide();
      }
    });
});

</script>
<style>
	#div2{
	float: right;
	margin-right: 50px;
	margin-top: 50px;
}
#vid1{

 width: 60%;
 margin-top: 2em;
}
#show{
   margin-top: 10em;
}
#Transcribe{
  margin-bottom: 2em;
}
#videodetails{
  margin-left: 8em;
  
    width: 50%;
}
textarea{
  text-align: justify;
}
</style>
<?php

require_once('../connection.php');

if (isset($_POST['VID'])) {
	
	$hi=$_POST['VID'];
  $ui=$_POST['ID'];

	$sql = "SELECT * from videos where id='{$hi}'";
  $result = mysqli_query($conn, $sql);

  	$sql1 = "SELECT * from users where id='{$ui}'";
    $result1 = mysqli_query($conn, $sql1);
$row1=mysqli_fetch_array($result1,MYSQLI_ASSOC);

  $sql2 = "SELECT * from transcription where video_id='{$hi}'";
  $result2 = mysqli_query($conn, $sql2);
  $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
  	$trans=$row2['transcription'];
  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
 	{
 			$vurl="../../uploaded/video/";
  			 $video = $vurl.$row["video_path"];
  			 ?>
       <?php
        $st=$row['flag'];
        
       ?>
  			 <input type="hidden" name="vid" id="vid" value="<?php echo $row['id']; ?>">
  			  <input type="hidden" name="vpath" id="vpath" value="<?php echo $row['video_path']; ?>">
  			   
           <div class="col-md-6 text-center">
         
  			 	
  			 	<video id="vid1" controls>
	   					<source src="<?php echo $video; ?>" type="video/mp4">
	   					Your browser does not support the video tag.
	 					</video>
	 			<br><br><div id="videodetails">
        <div class="table-responsive">
        <table class="table">
          <tr>
            <td>
              Username:
            </td>
            <td>
              <?php echo $row1['username']; ?>
            </td>
          </tr>
          <tr>
            <td>
              Video ID:
            </td>
            <td>
              <?php echo $row['id']; ?>
            </td>
          </tr>
          <tr>
            <td>
              Video Description:
            </td>
            <td>
              <?php echo $row['video_description']; ?>
            </td>
          </tr>
          <tr>
            <td>
              Upload Time:
            </td>
            <td>
              <?php echo $row['upload_datetime']; ?>
            </td>
          </tr>
        </table>
      </div>
        </div>
        <br>
           <a href="#loader"> <button <?php if($st==1) {?> style="visibility:hidden" <?php } ?> id="Transcribe">Transcribe</button></a>
        </div>
        <div class="row">
            <div class="col-md-6 text-center"> <button id="div2">Close</button>
            <div id="show">
             
            <i id="loader" class="fa fa-spinner fa-spin" style="font-size:124px"></i>
            <div id="wait">Video is being sent for transcription...Please wait.</div>
            </div>
            <textarea id="transcription" style="height:12.500em;width:31.250em;" disabled>
            </textarea>
            <?php if($st==1) {?>
             <textarea id="transcription1" style="height:12.500em;width:31.250em;" disabled>
             <?php echo $trans; ?>
            </textarea>
            <br><br>
            <div id="videodetails">
             <div class="table-responsive">
        <table class="table">
          <tr>
            <td>
              Retailer:
            </td>
            <td>
              <?php echo $row2['retailer']; ?>
            </td>
          </tr>
          <tr>
            <td>
              Notice Brand:
            </td>
            <td>
              <?php echo $row2['brand']; ?>
            </td>
          </tr>
          </table>
          </div>
          </div>
            <?php } ?>
             <!-- <div id="transcription" style="height:200px;width:500px;overflow:scroll;overflow-x:hidden;overflow-y:scroll;">
                
            

              </div>-->
           
          </div>
  				  </div>
	 	 		
			
	 	 		</div>
	 			
	 	 </div>
     </div>
		<?php 
	}  
}
else {
	echo "# code";
}

?>