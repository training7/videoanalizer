 <?php
session_start(); 
if (!isset($_SESSION['admin'])) {
  header("location:../index.php");
}
$u_name = $_SESSION['admin'];
require_once('../connection.php');
if(isset($_GET['a'])){
  $wordcloudid=$_GET['a'];
   $wc_old = "SELECT * FROM wordcloud WHERE id='$wordcloudid'";
      $wcold_res = mysqli_query($conn, $wc_old);
      $wcold_row=mysqli_fetch_array($wcold_res);
      $video_ids=$wcold_row['video_id'];
          // echo $video_ids;
            //$video_ids=explode(",", $video_ids)
            $v = explode(",",  $video_ids);
            $v1="";
           $wordcloud_name=$wcold_row['wordcloud_name']; 
          
    }
    else{
       $wordcloudid=0;
    }
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:07 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transcribed Video</title>
  
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
     <link href="assets/css/table.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
       $("#displaycloud").hide();
    </script>
    <script>
    $("#copy").click(function(){
    $("#copy1").select();
    document.execCommand('copy');
});
</script>
    <script>


    function checkbox(){
      var checkboxes = $("input[type='checkbox']");
      if ($('#wcname').val() == ""){
            alert('Please enter Word Cloud name!');
        }
      else if(!checkboxes.is(":checked")){
          alert('Please Select the Video');
        }

  else{  var checkboxes = document.getElementsByName('vehicle');
  //var wcname =  document.getElementById("wcname");
  var why = $('input[name="wcname"]').val();
 var getid= "<?php echo $wordcloudid; ?>";
 // alert($('input[name="vehicle"]').attr('id'));
  var checkboxesChecked = [];
  var checkboxes1Checked = [];
  // loop over them all
  for (var i=0; i<checkboxes.length; i++) {
     // And stick the checked ones onto an array...
     if (checkboxes[i].checked) {
        checkboxesChecked.push(checkboxes[i].id);
         checkboxes1Checked.push(checkboxes[i].value);
     }
  }
  document.getElementById("show").value = checkboxesChecked;
document.getElementById("show1").value = checkboxes1Checked;
  $.ajax({
                url: 'x1.php',
                method: 'POST',
                data: {VID : checkboxesChecked, wcn : why , ts : checkboxes1Checked , getid : getid},  
                success: function(result){
           // $('#displaycloud').html(result);
            window.location.href = 'wc1.php?c=<?php echo $wordcloudid; ?>';
            /*success = true;

            if(success){ //AND THIS CHANGED
      window.open('wc1.php');
    }*/
        }});
   

}
}
</script>

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
                        <a class="waves-effect waves-dark" href="#"><i class="fa fa-qrcode"></i>Transcribed Video</a>
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
                           Transcribed Video
                        </h1>
            <ol class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Video Details</a></li>
            <li class="active">Data</li>
          </ol> 
                  
    </div>
   
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             Video Details
                        </div>
                         
                        <div class="card-content">
                       <b> Word Cloud Name:</b> &nbsp; <input type="text" style="width: auto;" name="wcname" id="wcname" value="<?php if(isset($_GET['a'])){ echo $wordcloud_name; }?>" />
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>
                                        <tr>
                                            <th>Select</th>
                                            <th>Transcribe Id</th>
                                          <th>Video Id</th>
                                            <th>User Id</th>
                                            <th>Video Name</th>
                                            <th>Retailer</th>
                                             <th>Brands</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php

                                      //  $sql = "SELECT * FROM transcription ORDER BY t_ID DESC";
                                        $sql = "SELECT transcription.id,transcription.transcription,transcription.retailer,transcription.brand,videos.user_id,transcription,video_id,videos.video_path FROM transcription INNER JOIN videos ON transcription.video_id=videos.id";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        if ($result -> num_rows >0) {
                                            while ($row = $result -> fetch_assoc() ) {
                                                $video = $row['video_path'];
                                            $vname = basename($video,".mp4");
                                                ?>
                                                 <tr>
                                                  <td><input type="checkbox" value="<?php echo $row["id"]; ?>" id="<?php echo $row["transcription"]; ?>" name="vehicle" 

                                                  <?php
                                                  if(isset($_GET['a'])){
                                                     $v1="";
                                                  foreach ($v as $key => $value) {

                                                //$v1 .=$value;
                                                if ($value == $row['id']) echo 'checked'; 
                                                }

                                                  }
                                                  ?>








                                                  ></input></td>
                                                  <td><?php echo $row["id"]; ?> </td>
                                                <td><?php echo $row["video_id"]; ?> </td>
                                                 <td><?php echo $row["user_id"]; ?> </td>
                                                   <td><?php echo $vname; ?></td>
                                                     <td><?php echo $row["retailer"]; ?></td>
                                                      <td><?php echo $row["brand"]; ?></td>


                                                    </tr>  
                                            <?php 
                                            }
                                        }
                                        ?>



                                      
                                 
                                    </tbody>
                                </table>
                            </div>

                           <br><center> <button class="btn btn-default btn-md" onclick="checkbox()" >Next<span class="glyphicon glyphicon-chevron-right"></span></button></center>
                            <input type="hidden" id="show" name="vehicle"><br>
                          <input type="hidden" id="show1" name="vehicle"><br>
                             </form> 
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
            <div class="row">
             <div class="card">
            <div id="displaycloud">
            
            </div>
             </div>
             </div>
          
                <!-- /. ROW  -->
       <!--  <div class="row">
             <div class="card">
             <div id="div1" ></div>
             </div>-->
         </div>
               <footer><p>All right reserved by: <a href="http://nailbiter.co/">Nailbiter.Co</a></p></footer>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
 

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
       <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();


            });

    </script>
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
 

</body>


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:08 GMT -->
</html>
