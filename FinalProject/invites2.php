<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE - Meetings</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "invites.css">
  <link rel = "stylesheet" type = "text/css" href = "w3.css">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">
  <!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="mainpage.css">
  <link rel = "icon" href="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">

</head>
<br></br>
<br></br>
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
          <br></br>
          <br></br>
          <br></br>
          <br></br>
          <div class = "wrap-message">
          <span class="text">
            <h1 style="text-align: center; font-style:bold;">Sucessfully scheduled meeting!</h1>
            <div class="w3-section">
            
    </div>
    </span>
            </div>
            <br></br>
    
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
				<div class="logo" align="left">
					<img src = "Logo.png">
				</div>
</div>
</body>
</html>
