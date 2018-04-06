<?php
session_start(); 
if (!isset($_SESSION['admin'])) {
	header("location:../index.php");
}



$u_name = $_SESSION['admin'];
require_once('../connection.php');

if (isset($_GET['b']) || !empty($_GET['c'])) {
  if(isset($_GET['b']))
  {
  $id = $_GET['b']; 
  }
  else if(isset($_GET['c']))
  {
  $id = $_GET['c'];
}
   $wc_new = "SELECT * FROM wordcloud WHERE id ='$id'";
  $wc_result = mysqli_query($conn, $wc_new);
     $wc_row=mysqli_fetch_array($wc_result);
      $get_transcription=$wc_row['wordcloud_text'];
      $wordcloud_id=$wc_row['id'];
      $wordcloud_name=$wc_row['wordcloud_name'];
}
else {

 
  $wc_new = "SELECT * FROM wordcloud ORDER BY id DESC limit 1";
  $wc_result = mysqli_query($conn, $wc_new);
     $wc_row=mysqli_fetch_array($wc_result);
      $get_transcription=$wc_row['wordcloud_text'];
      $wordcloud_id=$wc_row['id'];
      $wordcloud_name=$wc_row['wordcloud_name'];
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:07 GMT -->
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF8">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Word Cloud</title>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
     <link href="assets/css/tabel.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   
<script src="/ww1/html2canvas.js"></script>
    <link rel="stylesheet" type="text/css" href="/ww1/styles.css">
   
    <style type="text/css">

      textarea{
  text-align: justify;
}
#text{
  margin-left: 3em;
}
#text1{
  margin-left: 3em;
}
    </style>

</head>
<body>

    <div id="wrapper">
        <nav class="navbar navbar-default top-navbar" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.php"><i class="large material-icons">track_changes</i> <strong>Nail-Biter</strong></a>
				
		    <div id="sideNav" href="#"><i class="material-icons dp48">toc</i></div>
            </div>

            <ul class="nav navbar-top-links navbar-right"> 
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1"><i class="fa fa-user fa-fw"></i> <b><?php echo $u_name; ?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="#"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
</li> 
<li><a href="../logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>
	   <!--/. NAV TOP  -->
        <!--/. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">

                    <li>
                        <a href="index.php" class="waves-effect waves-dark"><i class="fa fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="video.php" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i> Videos</a>
                    </li>
                   <li>
                        <a class="waves-effect waves-dark" href="transcribedvideo1.php"><i class="fa fa-qrcode"></i>Transcribed Video</a>
                    </li> 
                    <li>
                        <a class="waves-effect waves-dark" href="wordcloud1.php"><i class="fa fa-qrcode"></i>WordCloud</a>
                    </li> 
                   <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown2"><i class="fa fa-table"></i>User<i class="material-icons right">arrow_drop_down</i></a></li>
                   

                    <ul id="dropdown2" class="nav">
                    <br><br>
                     <li>
                        <a href="table.php" class="waves-effect waves-dark"><i class="fa fa-table"></i>User Details</a>
                    </li>
                    <li>
                        <a href="form.php" class="waves-effect waves-dark"><i class="fa fa-edit"></i> Add User </a>
                    </li>

                    </li> 
                    
                    </ul>
                  


                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		    <div class="header"> 
                        <h1 class="page-header">
                           Word Cloud

                        </h1>
						<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li><a href="#">Word Cloud</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		    </div>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                           Word Cloud : <?php echo $wordcloud_name; ?> <a style="float: right;"href="transcribedvideo1.php?a=<?php echo $wordcloud_id; ?>" class="btn btn-default btn-sm glyphicon glyphicon-step-backward">Back</a>
                        </div>
                        <div class="card-content">
                        <form id="form">

                          <div style="text-align: center">
                            <div id="presets"></div>
                            <div id="custom-area">
                              <p id="text1" ><label for="text">Paste your text below!</label></p>
                              <p><textarea id="text" style="height:12.500em;width:75em;"><?php echo $get_transcription; ?></textarea></p>
                              <button type="button" class="btn btn-default btn-md" id="btn-Preview-Image" onClick="hello()"><span class="glyphicon glyphicon-eye-open"></span> Generate Cloud</button>
                               
                            </div>
                          </div>
                          <br><br>
                         <div id="html-content-holder" class="word-cloud"></div>
                          


                          </form>
  <div id="imgid"></div>

           <br><br><center><button id="btn-Convert-Html2Image1" type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-saved"></span>Save
        </button></center>
                          <!--<input type="button" value="Preview"/>-->
                             <br><br><center> 
                              <a class="btn btn-default btn-sm" id="btn-Convert-Html2Image" href="#" > <span class="glyphicon glyphicon-download-alt"></span>Download</a></center>
                              <br/>
                            
   <!--  <h3>Preview :</h3>
   <div id="previewImage">
    </div>-->



            
                <!-- /. ROW  -->
       <!--  <div class="row">
             <div class="card">
             <div id="div1" ></div>
             </div>-->
        
         
             </div>
             </div>
             </div>
             </div>
             </div>

               <footer><p>All right reserved by: <a href="http://nailbiter.co/">Nailbiter.Co</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
 <script>
 $("#btn-Convert-Html2Image1").hide(); 
    $("#btn-Convert-Html2Image").hide(); 
     $("#vu").hide();
      $("#vuu").hide();
$(document).ready(function(){
        $("#html-content-holder").css("backgroundColor","white");
  
var element = $("#html-content-holder"); // global variable
var getCanvas; // global variable
 
    $("#btn-Preview-Image").on('click', function () {
     
    $("#btn-Convert-Html2Image1").show(); 
    $("#vu").show();
 $("#vuu").show();

         html2canvas(element, {
         onrendered: function (canvas) {
                $("#previewImage").append(canvas);
                             getCanvas = canvas;
             }
         });
    });

  $("#btn-Convert-Html2Image1").on('click', function () {
    $("#btn-Convert-Html2Image").show(); 
    $("#btn-Convert-Html2Image1").hide(); 
    var d="<?php echo $wordcloud_id; ?>";
    var plainText = document.getElementById('text').value.toLowerCase();
    var imgageData = getCanvas.toDataURL("image/png");
    // Now browser starts downloading it instead of just showing it
    var newData = imgageData.replace(/^data:image\/png/, "data:application/octet-stream");
    $("#btn-Convert-Html2Image").attr("download", "<?php echo $wordcloud_name; ?>.png").attr("href", newData);
 
     $.ajax({
                url: 'xx1.php',
                method: 'POST',
                data: {img : newData, id : d,plainText : plainText},  
                success: function(result){
           $('#imgid').html(result);
        }});
  });

});

</script>

<script src="wc.js" charset="utf-8"></script>
<script  src="/ww1/d3.layout.cloud.js"></script>
  <script src="why.js"></script>

    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
  
  <!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
  
  <script src="assets/materialize/js/materialize.min.js"></script>
  
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
  
  <script src="assets/js/easypiechart.js"></script>
  <script src="assets/js/easypiechart-data.js"></script>
  
   <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
   <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
     
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 


</body>


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:08 GMT -->
</html>