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

</head>
<br></br>
<br></br>
<?php
include("session.php"); 
$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$invites = array();






$conn = new mysqli($servername, $username, $password, $dbname);

$sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'1'";
        $fetchedInvite = $conn->query($sqlQuery);
        if($fetchedInvite->num_rows == 0) {
          ?>
          <br></br>
          <br></br>
          <br></br>
          <br></br>
          <div class = "wrap-message">
          <span class="text">
              <h1 style="text-align: center;">You do not have any invites yet :O</h1>
            <div class="w3-section">
            <button class="w3-button w3-green">Accept</button>
          <button class="w3-button w3-red">Decline</button>
    </div>
    </span>
            </div>
            <br></br>
    <?php
        } 
        else {
          foreach($fetchedInvite->fetch_all(MYSQLI_ASSOC) as $row) {
              $id = $row['eventID'];
              $getQuery = "SELECT startTime, endTime, name, description FROM Events WHERE eventID = " . $id;
              $fetchedEvent = $conn->query($getQuery);
              $event = $fetchedEvent->fetch_row();
              ?>
              <div class = "wrap-text">
              <span class="text">
                  <h4 style="text-align: center; text-decoration: underline;"><?php echo $event[2] ?></h4>
                  <h5 style="text-align: center; font-style: italic; color: #2B547E;"><?php echo $event[0] . " to " . $event[1]?></h5>
                  <br></br>
                  <ul style="color: black; text-align:center;">
                  
                  <?php echo $event[3] ?>
        
        
                </ul>
                <div class="w3-section">
          <button class="w3-button w3-green">Accept</button>
          <button class="w3-button w3-red">Decline</button>
        </div>
              </span>
            </div>
            <br></br>
            <?php
          }
        }
?>
<body>
	<div class="limiter">
		<div class="navbar">
      <div class = "picture">
      <a href="moreTable.php">Home</a>
    </div>
    <div class = "picture">
      <a href="meet.php">Meeting</a>
    </div>
  <div class="text100">
      <a href = "logout.php">Sign Out</a>
	</div>
	<div class="text100">
        <a><?php echo($login_session) ?></a>
    </div>
    <div class="text100">
      <a href="ContactForm.php">Contact Us</a>
    </div>
    <div class="text100">
      <a href="AboutUs.php">About Us</a>
    </div>
    <div class="text100">
      <a href="invites.php">Inbox</a>
    </div>
	</div>
		<!-- <div class="container-login100">
			<div class="btn-container" align="left"><
				<div class="btn1">
				<button class="btn">RECEIVED INVITATIONS</button>
			</div>
			<div class="btn2">
				<button class="btn">SENT INVITATIONS</button>
			</div>
			<div class="btn3">
				<button class="btn">UPCOMING EVENTS</button>
			</div>
			<div class="btn4">
				<button class="btn">PAST EVENTS</button>
			</div>
			</div> -->
			<!-- <div class="contact-us-button-contain">
				<div class="contact-us-button-wrap">
					<div class="contact-us-button"></div>
					<button class="contact-us">
						Contact us
					</button>
				</div>
			</div> -->
				<div class="logo" align="left">
					<img src = "Logo.png">
				</div>
			<!-- <div class="logo" align="left">
				<img src = "Logo.png">
			</div> -->

				

</div>


	<!-- <div id="dropDownSelect1"></div> -->
  <!-- <script src = "bootstrap.js"> -->
	<!-- <script src = "try.js"> -->
</body>
</html>
