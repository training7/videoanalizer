<?php
session_start(); 
if (isset($_SESSION['username1'])) {
	header("location:../test.php");
	exit;
}
?>
<html>
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
		<link rel="stylesheet" href="css/screen.css"> 
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script> 
  
   <script src="js/jquery.js"></script> 
   <script src="js/jquery.validate.js"></script>   
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/additional-methods.min.js"></script>
  <script  src="js/javascript.js"></script>
  
  <title>responsiveform</title>
  
</head>
<body>
  <header id="header">
<div class="container text-center">
    <h1 style="font-family: 'Fredoka One', cursive">Video Analyzer</h1>
    <p>Upload Transcribe & Analyze</p>
  </div>  </header>
  <section id="maincontent">
  	<div id="container">

  		<div id="tabbox">  	  			
        <a href="#" id="signin" class="tab select">signin</a>
        <a href="#" id="signup" class="tab signup">signup</a>
  		</div>
  		<div id="formpanel">
  			<div id="signinbox">
  				<form action="login.php" id="signinform" method="post">
  			<label for="username1">User Name</label>
            <input type="text" name="username1" id="username1" class="txtfield" tabindex="1" autocomplete="off" maxlength="8" required>
                       
            <label for="password">Password </label>
            <input type="password" name="password" id="password" class="txtfield" tabindex="2" autocomplete="off">           
            
            <input type="submit" name="loginbtn" id="submitlogin" value="LOGIN" class="btn" tabindex="3">
  				</form>
  			</div>
  			<div id="signupbox">
  				<form action="registration.php"  id="signupform"method="post">
  			<label for="username">User Name</label>
            <input type="text" name="username" id="username" class="txtfield" tabindex="4" maxlength="6" autocomplete="off">
        <label for="firstname">First Name</label>

            <input type="text" name="firstname" id="firstname" class="txtfield" tabindex="4" autocomplete="off">
            <label for="lastname">Last Name</label>
            <input type="text" name="lastname" id="lastname" class="txtfield" tabindex="4" autocomplete="off">
                            
          <label for="newemail">Email Address</label>
          <input type="email" name="newemail" id="newemail" class="txtfield" tabindex="5" autocomplete="off">
           
          <label for="password1">Password</label>
          <input type="password" name="password1" id="password1" class="txtfield" tabindex="6"  autocomplete="off">
         
          <label for="password2">Confirm Password</label>
          <input type="password" name="password2" id="password2" class="txtfield" tabindex="7" autocomplete="off"> 

          <label for="city">City</label>
          <input type="text" name="city" id="city" class="txtfield" tabindex="13" autocomplete="off">
          <label for="address">Address</label>
          <textarea name="address" id="aaddress" class="txtfield" tabindex="8" autocomplete="off"></textarea>
          <label for="gender">Gender</label>
        
          <div class="styled-select">
          <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          </div>
          <label for="number">Mobile Number</label>
          <input type="number" name="num" id="num" class="txtfield" tabindex="11" maxlength="10" autocomplete="off">
          <input type="submit" name="registerbtn" id="registerbtn" value="SIGN UP" class="btn" tabindex="12">
  				</form>
  			</div>
  		</div>
  	</div>
  </section>  <footer id="footer">
  	<p>
		Video Analyzer 	&copy; 2018 || 
		<a href="#" class="fa fa-facebook"></a>
		<a href="#" class="fa fa-twitter"></a>
		<a href="#" class="fa fa-google"></a>
		<a href="#" class="fa fa-linkedin"></a>
	</p>
  </footer>
</body>
</html>