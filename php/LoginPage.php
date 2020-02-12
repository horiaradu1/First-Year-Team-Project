<?php
require_once('connect.php');
print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login page</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "LoginPage.css">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="contact-us-button-contain">
				<div class="contact-us-button-wrap">
					<div class="contact-us-button"></div>
					<button class="contact-us">
						Contact us
					</button>
				</div>
			</div>
			<div class="logo" >
				<img src = "Logo.png">
			</div>
				<div class="wrap-login100">
					<form class="login100-form validate-form">
						<div class="put-it-here-to-include-padding">
						<span class="login100-form-title p-b-26">
							Login
						</span>
					  </div>

						<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
							<input class="input100" type="text" name="email">
							<span class="focus-input100" data-placeholder="Email"></span>
						</div>

						<div class="wrap-input100 validate-input" data-validate="Enter password">
							<input class="input100" type="password" name="pass" >
							<span class="focus-input100" data-placeholder="Password"></span>
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


	<div id="dropDownSelect1"></div>
  <!-- <script src = "bootstrap.js"> -->
	<!-- <script src = "try.js"> -->
</body>
</html>
