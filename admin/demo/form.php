<?php
session_start(); 
if (!isset($_SESSION['admin'])) {
    header("location:../index.php");
}
$u_name = $_SESSION['admin'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:08 GMT -->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add User</title>
	
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
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 

   <script type="text/javascript">

       window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);
   </script></head>
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
                        <a href="video.php" class="waves-effect waves-dark"><i class="fa fa-qrcode"></i>Videos</a>
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
                             Add User
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="index.php">Home</a></li>
					  <li><a href="#">Add User</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
        <div class="form-group">
        <div class="col-sm-10">

            <?php if(isset($_SESSION['result'])){
echo $_SESSION['result'];} ?>    
        </div>
    </div>
		<center>
            <div id="page-inner"> 
			 <div class="row">
			 <div class="col-lg-12">
			 <div class="card">
                        <div class="card-action">
                          <h2>  Add User </h2>
                        </div>
                        <div class="card-content">
    <form action="adduser.php" id="registration_form" method="post" class="col s12">
    <div class="row">
        <div class="input-field col s6">
          <input id="username" name="username" type="text" class="validate" required>
          <label for="username">Username</label>
          <span id="username_error_message"></span>
        </div>
        <div class="input-field col s6">
          <input id="email" name="email" type="email" class="validate" required>
          <label for="email">Email</label>
          <span id="email_error_message"></span>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s6">
          <input id="first_name" name="first_name" type="text" class="validate"required>
          <label for="first_name">First Name</label>
          <span id="firstname_error_message"></span>

        </div>
        <div class="input-field col s6">
          <input id="last_name" name="last_name" type="text" class="validate"required>
          <label for="last_name">Last Name</label>
          <span id="lastname_error_message"></span>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s6">
          <input id="password" name="password" type="password" class="validate" required/>
          <label for="password">Password</label>
            <span id="password_error_message"></span>
        </div>
        <div class="input-field col s6">
          <input id="password1" name="password1" type="password" class="validate" required/>
          <label for="password1">Confirm Password</label>
          <span id="confirmpassword_error_message"></span>
        </div>
      </div>
        <div class="row">
        <div class="input-field col s6">
        Gender:
      <input class="with-gap" checked="checked" name="group1" type="radio" id="male" value="Male"  />
      <label for="male">Male</label>
       <input class="with-gap" name="group1" type="radio" id="female" value="Female" />
      <label for="female">Female</label>
    </div>
      <div class="input-field col s6">
          <input id="mobile" name="mobile" type="number" class="validate" required/>
          <label for="mobile">Mobile Number</label>
          <span id="mobile_error_message"></span>
        </div>
    </div>
    <div class="row">

        <div class="input-field col s6">
          <input id="city" name="city" type="text" class="validate" required/>
          <label for="city">City</label>
        </div>
        <div class="input-field col s6">
          <input id="address" name="address" type="text" class="validate" required/>
          <label for="address">Address</label>
        </div>
      </div>
      
      <div class="row">
        <div class="input-field col s12 center-block"> 
          <input type="submit" name="adduser" class="btn btn-primary center-block" />
          </div>
    </div>
    </form>
	<div class="clearBoth"></div>
  </div>
    </div>
 </div>	
	 </div>		
         
                               
                           
                <!-- /.col-lg-12 --> 
			<footer><p>All right reserved by: <a href="http://nailbiter.co/">Nailbiter.Co</a></p></footer>
			</div>
            </center>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	 <script src="assets/js/jquery.validate.js"></script>   
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
	
    <!-- Custom Js -->
    
    <script src="assets/js/custom-scripts.js"></script> 
    

</body>


<!-- Mirrored from webthemez.com/demo/target-free-responsive-bootstrap-admin-template/form.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 13:32:08 GMT -->
</html>
