<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE-Login</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "LoginPage.css">
	<link rel = "icon" type = "image/x-icon" href = "https://images.gr-assets.com/users/1582104594p8/110300593.jpg">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
	<style>
	.message{
	 color: #e3503b;
	}
  .error{
    color: #e3503b;
 	  font-family: Ariel, Helvetica, sans-serif;
 	  font-size: 15px;
  }
	.navbar {
		font-family: Ariel, Helvetica, sans-serif;
		font-weight: bold;
	  overflow: hidden;
	  background-color: #336fb2;
	  position: fixed; /* Set the navbar to fixed position */
	  top: 0; /* Position the navbar at the top of the page */
	  width: 100%; /* Full width */
	  z-index: 2;
		max-height: 50px;
	}

	/* Links inside the navbar */
	.navbar a {
	  /*float: left;*/
	  display: block;
	  color: #f2f2f2;
	  text-align: center;
	  padding: 14px 16px;
	  text-decoration: none;
	}

	/* Change background on mouse-over */
	.navbar a:hover {
	  background: #5a9de9;
	}
	.picture{
		float:left;
	}
	.text100{
		float: right;
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

	         header("location: welcome.php");
				 }
	   }
	?>
	<div class="limiter">
		<div class="navbar">
			<div class = "picture">
			<a href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/moreTable.php">Home</a>
		</div>
		<div class = "picture">
			<a href="https://web.cs.manchester.ac.uk/g34904ps/team/HTML/meet.php">Meeting</a>
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
		<div class="container-login100">

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

            <span class = "error">Incorrect username/password.</span>

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

							<a class="txt2" href="file:///home/q24360yk/StupidProject/RegistrationPage.html">
								Sign Up
							</a>
						</div>
						</form>
			</div>
		<div class="move-useless-text">
			<span class="useless-text">
				I can put whatever I want here Sorana!!!
			</span>
		</div>
		</div>
	</div>


	<!-- <div id="dropDownSelect1"></div> -->
  <!-- <script src = "bootstrap.js"> -->
	<!-- <script src = "try.js"> -->
</body>
</html>
