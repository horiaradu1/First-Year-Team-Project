
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE-Login</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "LoginPage.css">
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<link rel = "icon" type = "image/x-icon" href = "https://images.gr-assets.com/users/1582104594p8/110300593.jpg">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
	<style>
	.message{
	 color: #e3503b;
	}
	</style>
</head>
<body>
	<?php
	   include("config.php");
	   session_start();

	   if($_SERVER["REQUEST_METHOD"] == "POST") {
	      // username and password sent from form
	      $error = "";

	      $myusername = mysqli_real_escape_string($db,$_POST['username']);

	      $sql = "SELECT * FROM Users WHERE username = '$myusername'";
	      $result = mysqli_query($db,$sql);
	      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

	      if (!password_verify($_POST['password'], $row['hash'])) {
	        header("location: login_wrong.php");
	      }

	      // If result matched $myusername and $mypassword, table row must be 1 row
				else{
	         echo "loged in";
	         $_SESSION['login_user'] = $myusername;

	         header("location:https://web.cs.manchester.ac.uk/g34904ps/team/HTML/moreTable.php");
				 }
	   }
	?>
	<div class="limiter">
		<div class="navbar">
			<div class = "picture">
			<a href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/moreTable.php">Home</a>
		</div>
		<div class = "picture">
			<a href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/meet.html">Meeting</a>
		</div>
	<div class="text100">
				<a href = "https://web.cs.manchester.ac.uk/g34904ps/team/HTML/RegistrationPage_1.php">Register</a>
		</div>
		<div class="text100">
			<a href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/ContactForm.php">Contact Us</a>
		</div>
		<div class="text100">
			<a href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/AboutUs.php">About Us</a>
		</div>
		</div>

			<div class="logo" >
				<img src = "Logo.png">
			</div>
				<div class="wrap-login100">
						<div class="put-it-here-to-include-padding">
						<span class="login100-form-title p-b-26">
							Login
						</span>
					  </div>
						<form action = "" method = "post">
						<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
							<input class="input100" type="text" name="username" placeholder="Username">
							<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="password" placeholder="Password">
							<!-- <span class="focus-input100" data-placeholder="Password"></span> -->
						</div>

						<div class="container-login100-form-btn">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn">
									Login
								</button>
							</div>
						</div>
						<div class="text-center p-t-115">
							<span class="txt1">
								Don’t have an account?
							</span>

							<a class="txt2" href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/RegistrationPage_1.php">
								Sign Up
							</a>
						</div>
						</form>
			</div>
		<div class="move-useless-text">
			<span class="useless-text">
				TEXT
			</span>
		</div>
		</div>
	</div>


	<!-- <div id="dropDownSelect1"></div> -->
  <!-- <script src = "bootstrap.js"> -->
	<!-- <script src = "try.js"> -->
</body>
</html>
