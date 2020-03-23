<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE - Meetings</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "stylesheet" type = "text/css" href = "meet.css">
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="mainpage.css">
  <link rel = "icon" href="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">
  

  <!-- add from addEvent -->
  <!-- timepicker -->
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
function inBase($string) {
	global $conn, $items;
	$result = $conn->query("SELECT * FROM Users WHERE Username = '$string'"); // not injection proof
        if (!$result) echo $conn->error;

        if($result->num_rows == 0) {
            
        } 

        else {
            array_push($items, $string);
        }

    }

$title = "";
$items = array();
$result = "";
if('POST' === $_SERVER['REQUEST_METHOD']) {
    if( ! empty($_POST['item'])) {

        //echo $_POST['pickedDate']; /////////////

        $input = $_POST['item'];  
        // $attempts = array();
        $result = $conn->query("SELECT * FROM Users WHERE Username = '$input'"); // not injection proof
        if (!$result) echo $conn->error;

        if($result->num_rows == 0) {
            
        } 

        else {
            
			$items[] = strtoupper($_POST['item']);
			
        }

    }
    if(isset($_POST['items']) && is_array($_POST['items'])) {
        foreach($_POST['items'] as $item) {
            $items[] = strtoupper($item);
		}
	$items = array_unique($items);
    }
}
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
            <a class="nav-link" href="aboutus_final.php">About Us</a>
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

				<div class="wrap-login100">
					<div class="login100-form validate-form">
						<div class="put-it-here-to-include-padding">
						<span class="login100-form-title p-b-26">
							Meeting Planner
						</span>
					  </div>
						<form method="post">
							<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="title" placeholder="Title" id="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>" required>
								<span class="focus-input100" placeholder="Title"></span>
							</div>
								<div class="wrap-input100 validate-input">
								<input class="input100" type="text" name="item" id="item" placeholder="Participants">
								<span class="focus-input100" placeholder="Participants"></span>
							</div>
							<div class="container-login100-form-btn plus" >
								<div class="wrap-login100-form-btn plus">
									<div class="login100-form-bgbtn plus"></div>
									<?php if($items): ?>
										<?php foreach($items as $item): ?>
											<input type="hidden" name="items[]" value="<?php echo $item;?>" />
										<?php endforeach; ?>
									<?php endif; ?>
									<button class="login100-form-btn plus" type="submit">
										+
									</button>
								</div>
							</div>
						</form>
					<form action="/g34904ps/team/Kenny_Build/timetablePHP.php?title=<?php if (isset($_POST['title'])) echo $_POST['title']; else echo "Undefined"?>" method=post>	
						<input type='hidden' name='items' value="<?php echo htmlentities(serialize($items));?>" />			
							<div class="container-login100-form-btn <?php if (count($items) == 0) echo "disabled"; ?> send">
								<div class="wrap-login100-form-btn">
									<div class="login100-form-bgbtn"></div>
									<button class="login100-form-btn" type="submit" <?php if (count($items) <= 0) echo "disabled"?>>
										Plan meeting
									</button>
								</div>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class = "wrap-text">
      <span class="text">
		  <h4 style="text-align: center;">Participants:</h4>
		  <ul style="color: black;">
		  <br></br>
		<?php if($items): ?>
			<?php foreach($items as $item): ?>
				<li><?php echo "• " . $item ?></li>
			<?php endforeach; ?>
		<?php endif; ?>
		</ul>
      </span>
    </div>
</body>
</html>
