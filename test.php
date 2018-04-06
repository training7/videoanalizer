<?php
session_start(); 
require_once('form/connection.php');
if (!isset($_SESSION['username1'])) {
	header("location:form/index.php");
	exit;
}
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Video Analyzer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="custom.css">
<style type="text/css">
footer {
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  text-align: center;
}
</style>
</head>
<body>
<div class="jumbotron">
	<div class="container text-center">
		<h1 style="font-family: 'Fredoka One', cursive">Video Analyzer</h1>
		<p>Upload Transcribe & Analyze</p>
	</div>
</div>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			
		</div>
		<div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				
				<li><a href="#">Feedback</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<li><a href="#"><button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">+ Upload Video</button></a></li>
				<li>
				 <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>&nbsp; My Account
    </button>
    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
      <li role="presentation"><a role="menuitem" tabindex="-1" href="account.php" target="_blank">Account Setting</a></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="form/logout.php">Log Out</a></li>
    </ul>
  </div>
			</ul>
		</div>
	</div>
</nav>
<div class="container">
<ul>
<?php 

 $username = $_SESSION['username1'];
 $uid = $_SESSION['uid'];


  $sql = "SELECT * from videos  where user_id='{$uid}'";
  $result = mysqli_query($conn, $sql);
  $vid_url = "uploaded/video/";

  
  	
  while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
 {
  			 $video = $vid_url.$row["video_path"];
  			//$video_name = $row["video_name"];
  			
  
  	?>
  		<li>
  						
	 					<center><video width="250px" height="250px" controls>
	   					<source src="<?php echo $video; ?>" type="video/mp4">
	   					Your browser does not support the video tag.
	 					</video></center> 
 		</li>
<?php
	
	}
?>
</ul>
</div>
<footer class="container-fluid text-center">
	<p>
		Video Analyzer 	&copy; 2018 || 
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-google"></a>
		<a href="#" class="fa fa-linkedin"></a>
	</p>
</footer>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Upload Video</h4>
      </div>
      <div class="modal-body">
		<form action="form/upload.php" class="form-horizontal" method="post" enctype="multipart/form-data" id="upload">
		<div class="form-group">
			<label class="control-label col-md-2" for="file">Filename:</label>
			<div class="col-md-10">
				<input type="file" class="form-control" name="video" id="video" required /> 
			</div>
    	</div>
    	<div class="form-group">
			<label class="control-label col-md-2" for="vd">Video Description:</label>
			<div class="col-md-10">
				<input type="text" class="form-control" name="vd" id="vd" required/> 
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="zc">Zip Code:</label>
			<div class="col-md-10">
			<input type="number" class="form-control" name="zc" id="zc" required/> 
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-md-2" for="city">City:</label>
			<div class="col-md-10">
			<input type="text" class="form-control" name="city" id="city"required /> 
			</div>
		</div>
		<div class="form-group">
		<div class="col-md-12">
		<center>
			<input type="submit" name="upload" value="Upload" id="upload" />
		</center>
		</div>
		</div>
		</form>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        
      </div>
    </div>

  </div>
</div>

<script src="test.js"></script>
</body>
</html>
