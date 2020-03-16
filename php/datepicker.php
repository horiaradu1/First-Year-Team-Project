<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>





	<title>TIMEonTABLE - Add event</title>
  <link rel = "stylesheet" type = "text/css" href = "meet.css">
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->

</head>
<?php
include("session.php");
$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$conn = new mysqli($servername, $username, $password, $dbname);

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
    </div>
				<div class="logo" align="left">
					<img src = "Logo.png">
				</div>
				<div class="wrap-login100">
					<div class="login100-form validate-form">
						<div class="put-it-here-to-include-padding">
						<span class="login100-form-title p-b-26">
							Add en event to the timetable
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
								<button class="login100-form-btn" type="submit" <?php if (count($items) == 0) echo "disabled"?>>
									Plan meeting
								</button>
							</div>
						</div>
					</form>

				</div>
			</div>

</div>


</body>
</html>





<!doctype html>
<html lang="en">
<head>

</head>
<body>

<p>Start: <input type="text" id="datepicker"></p>

<form action="welcome.php">
  <label for="duration">Duration in hours:</label>
  <input type="text" id="duration" name="duration"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
