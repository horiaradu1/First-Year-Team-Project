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
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->

</head>
<?php
include("session.php"); 
$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$conn = new mysqli($servername, $username, $password, $dbname);

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
        // else if (in_array($input, $attempts)) {
        //     echo "Yo";
        // }

        else {
            // array_push($attempts, $input);
            $items[] = $_POST['item'];
        }

    }
    if(isset($_POST['items']) && is_array($_POST['items'])) {
        foreach($_POST['items'] as $item) {
            $items[] = $item;
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

				<div class="wrap-login100">
					<form class="login100-form validate-form">
						<div class="put-it-here-to-include-padding">
						<span class="login100-form-title p-b-26">
							Meeting Planner
						</span>
					  </div>

						<div class="wrap-input100 validate-input" >
							<input class="input100" type="text" name="title" placeholder="Title" id="title" required value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>"><br><br>">
							<span class="focus-input100" placeholder="Title"></span>
						</div>
            <div class="wrap-input100 validate-input" >
							<input class="input100" type="text" name="participants" placeholder="Participants" required>
							<span class="focus-input100" placeholder="Participants"></span>
						</div>
						<div class="container-login100-form-btn plus">
							<div class="wrap-login100-form-btn plus">
								<div class="login100-form-bgbtn plus"></div>
								<button class="login100-form-btn plus" input type="submit" value="<?php error_reporting(E_ERROR);  
                                                try {$title = $_POST['title'];} 
                                                catch (Exception $e) {} ?>">
									+
								</button>
							</div>
						</div>
            <!-- <div class="wrap-input100 three">
              <input class="input100" type="text" name="location" placeholder="Location">
              <span class="focus-input100" placeholder="Location"></span>
            </div> -->

						<div class="container-login100-form-btn send">
							<div class="wrap-login100-form-btn">
								<div class="login100-form-bgbtn"></div>
								<button class="login100-form-btn" action="/g63968ef/deploymenttest/visualPlanner/timetablePHP.php?title=<?php echo $title?>" method=post>
									Plan meeting
								</button>
							</div>
						</div>

						<!-- <div class="text-center p-t-115">
							<span class="txt1">
								Don’t have an account?
							</span>

							<a class="txt2" href="file:///home/q24360yk/StupidProject/RegistrationPage.html">
								Sign Up
							</a> -->
						</div>
				</form>
			</div>

</div>


	<!-- <div id="dropDownSelect1"></div> -->
  <!-- <script src = "bootstrap.js"> -->
	<!-- <script src = "try.js"> -->
</body>
</html>
