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

        $sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
        $fetchedInvite = $conn->query($sqlQuery);
        if($fetchedInvite->num_rows == 0) {
          ?>
          <br></br>
          <br></br>
          <br></br>
          <br></br>
          <div class = "wrap-message">
          <span class="text">
            <h1 style="text-align: center; font-style:bold;">You do not have any invites :O</h1>
            <div class="w3-section">
            
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

              if(@$_POST["sqlAccept"]==$id)
              {
                $sqlAddEvent= "INSERT INTO HasEvent (username, eventID)
                VALUES (\"$login_session\", \"$id\");";
                $db->query($sqlAddEvent);

                $sqlRemoveInvite= "DELETE FROM Inbox WHERE username = " . "'" . $login_session . "' " . "AND eventID = " . "'" . $id . "'";
                $db->query($sqlRemoveInvite);
                header("Location: https://web.cs.manchester.ac.uk/g34904ps/team/HTML/invites.php");
                
                
              }
              else if ((@$_POST["sqlDecline"]==$id))
              {
                $sqlRemoveInvite= "DELETE FROM Inbox WHERE username = " . "'" . $login_session . "' " . "AND eventID = " . "'" . $id . "'";
                $db->query($sqlRemoveInvite);
                header("Location: https://web.cs.manchester.ac.uk/g34904ps/team/HTML/invites.php");
              }
              else {
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
                <!-- <form action=""> -->
                <input type=button onclick="sqlformAccept<?php echo $id?>.submit();" class="w3-button w3-green" value="Accept">
                <!-- </form>
                <form action=""> -->
                <input type=button onclick="sqlformDecline<?php echo $id?>.submit();" class="w3-button w3-red" value="Decline">
                <!-- </form> -->
                <form name="sqlformAccept<?php echo $id?>" method=post>
                <input type=hidden name="sqlAccept" value="<?php echo $id?>">
                </form>

                <form name="sqlformDecline<?php echo $id?>" method=post>
                <input type=hidden name="sqlDecline" value="<?php echo $id?>">
                </form>
          
        </div>
              </span>
            </div>
            <br></br>
            <?php
          }
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
      <a href="invites.php">Inbox(<?php if ($fetchedInvite->num_rows < 10) {echo $fetchedInvite->num_rows;} else {echo "+9";} ?>)</a>
    </div>
	</div>
				<div class="logo" align="left">
					<img src = "Logo.png">
				</div>
</div>
</body>
</html>
