 <?php
session_start(); 
if (!isset($_SESSION['admin'])) {
  header("location:../index.php");
}
$u_name = $_SESSION['admin'];
require_once('../connection.php');
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:07 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WordCloud</title>
  
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
$(document).ready(function(){
    
    $('.vw').click(function(){  
    var cid = $(this).attr('id');  
        $.ajax({
                url: 'showcloud.php',
                method: 'POST',
                data: {VID : cid}, 
                success: function(result){
            $('#cloud').html(result);

        }});
     });
    $('.ed').click(function(){  
    var eid = $(this).attr('id');  
        $.ajax({
                url: 'editcloud.php',
                method: 'POST',
                data: {EID : eid}, 
                success: function(result){
           // $('#cloud').html(result);
           
 window.location.href = 'wc1.php';

        }});
     });
    });
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
                        <a class="waves-effect waves-dark" href="transcribedvideo1.php"><i class="fa fa-qrcode"></i>Transcribed Video</a>
                    </li>
                    <li>
                        <a class="waves-effect waves-dark" href="#"><i class="fa fa-qrcode"></i>WordCloud</a>
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
                          WordCloud
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
                             WordCloud Details


                        </div>
                        <div class="card-content">
                       
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                    <thead>
                                        <tr>
                                            
                                            <th>WordCloud Id</th>
                                          <th>Video Id</th>
                                           <th>WordCloud Name</th>
                                            <th>Generated By</th>
                                            <th>Generated Date-Time</th>
                                            <th>View</th>
                                            <th>Edit</th>
                                           
                                             
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $sql = "SELECT * FROM wordcloud ORDER BY id DESC";
                                        $result = mysqli_query($conn, $sql);
                                    
                                        if ($result -> num_rows >0) {
                                            while ($row = $result -> fetch_assoc() ) {
                                             
                                                ?>
                                                <!--//$video = $vid_url.$row["video_name"];
                                                //$video_name = $row["video_name"]; -->
                                                <tr>
                                                <td><?php echo $row["id"]; ?> </td>
                                                <td><?php echo $row["video_id"]; ?> </td>
                                                <td><?php echo $row["wordcloud_name"]; ?></td>
                                                <td><?php echo $row["generated_by"]; ?></td>
                                                 <td><?php echo $row["generated_datetime"]; ?></td>
                                                 <td><button type="button" class="btn btn-default btn-sm vw" id="<?php echo $row['id']; ?>">
          <span class="glyphicon glyphicon-eye-open"></span>
        </button></td> 
                                                 <td><a href="wc1.php?b=<?php echo $row['id']; ?>"><button type="button" class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-edit"></span>
        </button></td></a>


     </tr>  
                                            <?php 
                                            }
                                        }
                                        ?>
                                 
                                       
                                    </tbody>
                                </table>
                            </div>
  
                           
                             </form> 
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
           <div class="row">
             <div class="card">
             <div id="cloud" ></div>
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
