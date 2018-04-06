<?php
session_start(); 
if (isset($_SESSION['admin'])) {
	header("location:demo/index.php");
	exit;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Admin login</title>
		<link rel="stylesheet" type="text/css" href="style.css"></link>
	</head>

	<body>
		<div class="container">
			<img src="men.png" />
			<form method="post" action="login.php" >
				<div class="font-input">
					<input type="text" name="username" placeholder="Enter Username">
				</div>
				<div class="font-input">
					<input type="password" name="password" placeholder="Enter Password">
				</div>
				<input type="submit" name="submit" value="Login" class="btn-login"><br>
				<a href="#"><p>forgot password?</p></a>
			</form>
		</div>
	</body>
</html>