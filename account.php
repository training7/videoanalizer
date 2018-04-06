<?php
session_start(); 
require_once('form/connection.php');
if (!isset($_SESSION['username1'])) {
	header("location:form/index.php");
	exit;
}
  $username = $_SESSION['username1'];
  $uid=$_SESSION['uid'];

  $sql = "SELECT * from users where id='{$uid}'";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_array($result))
            {
            	$_SESSION['uid']= $row['id'];
                $username = $row['username'];
                $first_name = $row['first_name'];
                $last_name = $row['last_name'];
                $email = $row['email'];
                $city = $row['city'];
                $address = $row['address'];
                $m_number = $row['m_number'];
            }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>My Account | Video Analyzer</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  
   <script src="form/js/jquery.js"></script> 
   <script src="form/js/jquery.validate.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
  <script  src="form/js/cp.js"></script>
   <style>

footer {
  
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  text-align: center;
}

   .fa {
  
  font-size: 20px;
  height: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

.fa-google {
  background: #dd4b39;
  color: white;
}

.fa-linkedin {
  background: #007bb5;
  color: white;
}

    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 0px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    button#menu1 {
    margin-top: 17px;
}
   .navbar-nav>li>a {
    padding-top: 17px;
    font-size: 20px;
    padding-bottom: 12px;
} 
#myNavbar1{

	border: solid;
	border-width:2px;  
    border-top-style:inset;
    border-left-style:initial;
    border-right-style:initial;
}
#d1{
	border-left: double;
  }

  #d2{
  	margin-top: 20px;
  }
  label{
	display:block;
	padding:3px;
	text-transform: uppercase;
	
}
.txtfield{
	border-radius:5px;
	height:25px;
	width:80%;
}
.btn1{
	display:block;
	padding:10px;
	border-radius:7px;
	background-color:#fff;
	color:#000;
	font-size:15px;
	margin:10px 0px 0px 15px;
	box-shadow:0px 0px 5px #fff;
}
  </style>


</head>
<body>

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
			<ul class="nav navbar-nav navbar-right">
			<li ><a href="test.php"><button type="button" class="btn btn-primary btn-md" >  Back To Home</button></a></li>
				
    </ul>
  </div>
			</ul>
		</div>
	</div>
</nav>
<div class="jumbotron">
	<div class="container text-center">
		<h2>Welcome,<span style="font-family: 'Fredoka One', cursive; font-size: 25px"><?php echo $username; ?>!</span></h2>
	</div>
</div>
<nav class="navbar navbar-default" >
  <div class="container-fluid" id="myNavbar1">
    
    <ul class="nav navbar-nav"  style="margin-left: 200px">
      <li><a href="#">Basic</a></li>
      
    </ul>
  </div>
</nav>
<div class="row">
  <div class="col-md-4 text-right">
  	<h1>Basic</h1>
  </div>
  <div class="col-md-6" id="d1">
  <div class="list-group" id="d2">
 <h2>Details:~</h2>
  <a data-toggle="collapse" href="#collapse1" class="list-group-item">Change Password</a>
  <div id="collapse1" class="panel-collapse collapse">
	<div class="panel-body">
		<div id="changepass">
  			<form action="changepass.php" id="changepass" method="post">
  			<label for="Password">Old Password:</label>
            <input type="Password" name="opassword" id="password5" class="txtfield" tabindex="1" autocomplete="off" required>
              <br>    
  			<label for="Password">New Password:</label>
            <input type="Password" name="npassword" id="password3" class="txtfield" tabindex="1" autocomplete="off" required>
              <br>         
            <label for="password1">Confirm Password:</label>
            <input type="password" name="cpassword" id="password4" class="txtfield" tabindex="2" autocomplete="off"required>           
            <br>
            <input type="submit" name="change" id="change" value="Submit" class="btn1" tabindex="3">
  				</form>
  			</div>
	</div>
  </div>
 <a data-toggle="collapse" href="#collapse2" class="list-group-item">Change Profile Details</a>
  <div id="collapse2" class="panel-collapse collapse">
	<div class="panel-body">
		<div id="changemn">
  			<form action="changepass.php" id="changemn" method="post">
  			<label for="Username">Username:</label>
            <input type="text" name="uname" id="uname" class="txtfield" autocomplete="off" value="<?php echo $username; ?>" required>
              <br>    
  			<label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" class="txtfield" autocomplete="off" value="<?php echo $first_name; ?>" required>
              <br>         
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" class="txtfield" autocomplete="off" value="<?php echo $last_name; ?>" required>
              <br> 
              <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="txtfield" autocomplete="off" value="<?php echo $email; ?>" required>
              <br> 
              <label for="city">City:</label>
            <input type="text" name="city" id="city" class="txtfield" autocomplete="off" value="<?php echo $city; ?>" required>
              <br> 
              <label for="address">Address:</label>
            <input type="text" name="add" id="add" class="txtfield" autocomplete="off" value="<?php echo $address; ?>" required>
              <br>
              
          <label for="number">Mobile Number</label>
          <input type="number" name="num" id="num" class="txtfield" tabindex="11" value="<?php echo $m_number; ?>" maxlength="10" autocomplete="off"><br>
            <input type="submit" name="update" id="update" value="Update" class="btn1" tabindex="3">
  				</form>
  			</div>
	</div>
  </div>
  
	</div>
  </div>
</div>
  
  </div>
</div>

<footer class="container-fluid text-center">
	<p>
		Online Store 	&copy; 2018 || 
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-google"></a>
		<a href="#" class="fa fa-linkedin"></a>
	</p>
</footer>
</body>
</html>
