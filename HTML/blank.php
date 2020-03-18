<?php

$sMonth = date('F',time()+( 1 - date('w'))*24*3600);
$eMonth = date('F',time()+( 7 - date('w'))*24*3600);
$sDay = date('d',time()+( 1 - date('w'))*24*3600); 
$eDay = date('d',time()+( 7 - date('w'))*24*3600);

//echo ($sDay . " " . $sMonth . " - " . $eDay . " " . $eMonth);

$day =  $_GET['day']; 

$hour = $_GET['hour']; 

$title =  $_GET['title']; 

?>
<br></br>
<?php

$timediff = date('H')-$hour;
$hoursPassed = date('H'); // hours passed today (subtract later)
$clickedTime = date('Y-m-d', strtotime("+$hour hours, +$day days, -$hoursPassed hours"));

//echo "Hour, day, month: " . $clickedTime; //echo "day: " . $day . " hours: " . $hour;



$people = $_GET['people'];
//echo $people;
$arrayPeople = explode(",", $people);
//print_r($arrayPeople);


include("session.php");

// responsible for adding the event
if (isset($_POST["submit"])) {


  $name=$_POST["name"];
  $description=$_POST["description"];
  $startDate=$_POST["startDate"];
  $startTime=$_POST["startTime"];
  $endDate=$_POST["endDate"];
  $endTime=$_POST["endTime"];

  $space = " ";
  $start = $startDate.$space.$startTime;
  $end = $endDate.$space.$endTime;

  $sqlAddEvent= "INSERT INTO Events (startTime, endTime, name, description)
    VALUES (\"$start\", \"$end\", \"$name\", \"$description\");";

    //echo $sqlAddEvent;

    $db->query($sqlAddEvent);
    echo $db->error;

if (in_array($login_session, $arrayPeople)) {
    $sqlAssign = "INSERT into HasEvent (username, eventID)
    VALUES(\"$login_session\", (SELECT MAX(eventID) FROM Events) )";


    $db->query($sqlAssign);
    echo $db->error;

    if (($key = array_search($login_session, $arrayPeople)) !== false) {
        unset($arrayPeople[$key]);
    }
}

foreach ($arrayPeople as $person) {
$sqlAssign = "INSERT into Inbox (username, eventID)
    VALUES(\"$person\", (SELECT MAX(eventID) FROM Events) )";


    $db->query($sqlAssign);
    echo $db->error;
}

header("Location: https://web.cs.manchester.ac.uk/g34904ps/team/HTML/invites2.php");



}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create event</title>

  <?php ///////////////////////////// ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "RegistrationPage_1.css">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
	<style>
	.error{
	 color: #e3503b;
	 font-family: Ariel, Helvetica, sans-serif;
	 font-size: 15px;
	 /*position: absolute;*/
	 display: block;
	 width: 100%;
	 height: 15px;
	 /*top: 0;
	 left: 0;*/
	}
	.message{
	 color: #e3503b;
	}
	.logo{
		align: center;
		position: relative;
		top: -350px;
		right: 550px;
	}
    </style>
    
    <?php ///////////////////////////// ?>

  <!-- timepicker -->
  <script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="jquery-timepicker/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery-timepicker/jquery.timepicker.css">


  <!-- date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script>
  $( function() {
    $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
  </script>




</head>
<body>


<div class="container-login100">
			<div class="logo" >
				<img src = "Logo.png">
			</div>
			<div class="wrap-register">
				<!-- <form class="register-form validate-form"> -->
					<div class="put-it-here-to-include-padding">
					<span class="register-form-title p-b-26">
						Register
					</span>
				  </div>
					<!-- <p><span class="error">* required fields</span></p> -->
					<form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>">
						<!-- <span class="focus-input100" data-placeholder="First Name"></span> -->
						<span class="error"><?php echo $fnameErr;?></span>
					</div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>">
            <!-- <span class="focus-input100" data-placeholder="Last Name"></span> -->
						<span class="error"><?php echo $lnameErr;?></span>
          </div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username;?>">
						<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
						<span class="error"><?php echo $usernameErr;?></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
						<!-- <span class="focus-input100" data-placeholder="Email"></span> -->
						<span class="error"><?php echo $emailErr;?></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?php echo $password;?>">
						<!-- <span class="focus-input100" data-placeholder="Password"></span> -->
						<span class="error"><?php echo $passwordErr;?></span>
					</div>

          <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm Password">
						<!-- <value="<?php echo $cpassword;?>"> -->
						<!-- <span class="focus-input100" data-placeholder="Confirm Password"></span> -->
						<span class="error"><?php echo $cpasswordErr;?></span>
					</div>

					<div class="container-register-form-btn">
						<div class="wrap-register-form-btn">
							<div class="register-form-bgbtn"></div>
							<button class="register-form-btn">
								Register
							</button>
						</div>
					</div>
					<span class="message"><?php echo $final;?></span>
					<div class="text-center p-t-115">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="https://web.cs.manchester.ac.uk/g34904ps/team/php/login.php">
							Login
						</a>
					</form>
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>

<form method=POST>

  <!-- Name input box-->
Name of the event: <input id = "name" name="name" value="<?php echo $title ?>" required>
<!-- DESCRIPTION input box-->
Description: <input id = "desc" name="description" required>

<!-- Start datepicker input box-->
<p>From: <input type="text"name="startDate" id="startDate" value="<?php echo $clickedTime; ?>" required>
  <input type="text"name="startTime" id="startTime" value="<?php echo $hour ?>" class="time ui-timepicker-input" autocomplete="off" required /></p>
<!-- function to assign this timepicker, and change the format to a desired one -->
<script>
$(function() {
  $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60 });
});
</script>


<!-- End datepicker window box -->
<p>To: <input type="text"name="endDate" id="endDate" required>
<input type="text" name="endTime" id="endTime" class="time ui-timepicker-input" autocomplete="off" required/></p>
<!-- the function -->
<script>
$(function() {
  $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60});
});
</script>


<!-- Button to submit -->
<button name="submit">Plan meeting!</button>
</form>

</body>
</html>