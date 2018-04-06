<script type="text/javascript">
	$("#div2").click(function(){
  
    $("#cloud").hide();
   
});

$('.vw').click(function(){
$("#cloud").show();
});
</script>
<style>
	#div2{
	float: right;
	margin-right: 50px;
	margin-top: 50px;
}
</style>

<?php

require_once('../connection.php');

if (isset($_POST['VID'])) {
	
	$hi=$_POST['VID'];

	 $query = "SELECT * from wordcloud where id='$hi'";
  $result = mysqli_query($conn, $query);
 
    $row = mysqli_fetch_array($result);

    ?>
   	<div class="row">
            <div class="col-md-6 text-center"> 
    <div id="show">
   <img src="<?php echo $row['wordcloud_img']; ?>" class="img-responsive">
  </div>
  </div>
  <div class="col-md-6 text-right"> 
<button id="div2">Close</button>
	</div>
	</div>
<?php
}

?>