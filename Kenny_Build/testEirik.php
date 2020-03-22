<!DOCTYPE html>
<html lang="en">
<head>
	<title>TIMEonTABLE - Meetings</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "meet.css">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">

        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="mainpage.css">
  <link rel = "icon" href="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">
  <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> -->

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
					<form action="/g34904ps/team/HTML/timetablePHP.php?title=<?php if (isset($_POST['title'])) echo $_POST['title']; else echo "Undefined"?>" method=post>	
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
