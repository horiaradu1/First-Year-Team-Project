<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE - Contact form</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "contactForm.css">
	<link rel = "icon" type = "image/x-icon" href = "https://images.gr-assets.com/users/1582104594p8/110300593.jpg">
</head>
<?php
include("session.php"); ?>
<body>
  <div class="container-form">
		<div class="navbar">
			<div class = "picture">
			<a href="moreTable.php">Home</a>
		</div>
		<div class = "picture">
			<a href="meet.php">Meeting</a>
		</div>
	<div class="text100">
			<a href="#news">Sign out</a>
    </div>
    <div class="text100">
        <a><?php echo("Hello " . $login_session) ?></a>
    </div>
		<div class="text100">
			<a href="ContactForm.php">Contact Us</a>
		</div>
		<div class="text100">
			<a href="AboutUs.php">About Us</a>
		</div>
		</div>
		<div class="logo" >
			<img src = "Logo.png">
		</div>
    <div class="wrap-contact">
      <form class="form">
      <span class="form-title">
        <h3 style="text-align: center;">Contact us</h3>
      </span>

      <div class="wrap-input100 validate-input" data-validate="Please enter your name">
        <input class="input100" type="text" name="name" placeholder="Full Name">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Please enter your name">
        <input class="input100" type="text" name="name" placeholder="Email">
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
        <textarea class="input100" name="message" placeholder="Your Message"></textarea>
        <span class="focus-input100"></span>
      </div>

      <div class="container-contact100-form-btn">
				<div class="wrap-contact-form-btn">
					<div class="contact-form-bgbtn"></div>
        <button class="contact100-form-btn">
          Send Email
        </button>
      </div>
    </form>
    </div>
  </div>

</html>
