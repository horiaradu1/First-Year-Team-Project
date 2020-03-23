<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE - Contact form</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel = "icon" type = "image/x-icon" href = "https://images.gr-assets.com/users/1582104594p8/110300593.jpg">
        <link rel = "stylesheet" type = "text/css" href = "meet.css">
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="mainpage.css">
  <link rel = "stylesheet" type = "text/css" href = "contactForm.css">
  <link rel = "icon" href="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
</head>
<?php
include("session.php"); 
$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$conn = new mysqli($servername, $username, $password, $dbname);
$sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
$fetchedInvite = $conn->query($sqlQuery);
?>

<body>
<nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" style="margin-right: 0rem;" href="moreTable.php"><i class="far fa-clock"></i> TimeOnTable   </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <?php 
      $conn = new mysqli($servername, $username, $password, $dbname);
      $sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
      $fetchedInvite = $conn->query($sqlQuery);
      ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="meet.php">Meeting Planner<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Welcome, <?php echo($login_session) ?>!</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="invites.php">Inbox(<?php if ($fetchedInvite->num_rows < 10) {echo $fetchedInvite->num_rows;} else {echo "+9";} ?>)</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="AboutUs.php">About Us</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ContactForm.php">Contact</i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="logout.php">Sign Out</i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
		<div class="logo" >
			<img src = "Logo.png">
		</div>
    <div class="wrap-contact">
      <form class="form">
      <span class="form-title">
        <h3 style="text-align: center;">Contact us</h3>
      </span>

      <div class="wrap-input100 validate-input" data-validate="Please enter your name">
        <input class="input100" type="text" name="name" placeholder="Full Name"  required>
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate="Please enter your name">
        <input class="input100" type="text" name="email" placeholder="Email"  required>
        <span class="focus-input100"></span>
      </div>

      <div class="wrap-input100 validate-input" data-validate = "Please enter your message">
        <textarea class="input100" name="message" placeholder="Your Message"  required></textarea>
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
