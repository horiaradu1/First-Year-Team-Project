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

error_reporting(E_ERROR);
include("session.php");

$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$conn = new mysqli($servername, $username, $password, $dbname);

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
$conn = new mysqli($servername, $username, $password, $dbname);
$sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
$fetchedInvite = $conn->query($sqlQuery);
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
  <link rel = "stylesheet" type = "text/css" href = "blank.css">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
	<!-- <style>
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
    </style> -->
    
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
    
<div class="navbar">
      <div class = "picture">
      <a href="moreTable.php">Home</a>
       <!-- connect to the login -->
    </div>
    <div class = "picture">
      <a href="meet.php">Meeting</a>
       <!-- connect to the login -->
    </div>
  <div class="text100">
      <a href="logout.php">Sign out</a>
       <!-- connect to the login -->
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

<div class="container-login100">
			<div class="wrap-register">
				<!-- <form class="register-form validate-form"> -->
					<div class="put-it-here-to-include-padding">
					<span class="register-form-title p-b-26">
						Details:
					</span>
				  </div>
					<!-- <p><span class="error">* required fields</span></p> -->
					<form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="wrap-input100 validate-input">
          <input id = "name" name="name" value="<?php echo $title ?>" required>
						<!-- <span class="focus-input100" data-placeholder="First Name"></span> -->
						
					</div>

          <div class="wrap-input100 validate-input">
          <input id = "desc" name="description" required>            <!-- <span class="focus-input100" data-placeholder="Last Name"></span> -->
						
          </div>

					<div class="wrap-input100 validate-input">
                    <input type="text"name="startDate" id="startDate" value="<?php echo $clickedTime; ?>" required>
						<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
						
					</div>

					<div class="wrap-input100 validate-input">
                    <input type="text"name="endDate" id="endDate" required>
						<!-- <span class="focus-input100" data-placeholder="Email"></span> -->
						
					</div>

					<div class="wrap-input100 validate-input">
                    <input type="text"name="startTime" id="startTime" value="<?php echo $hour ?>" class="time ui-timepicker-input" autocomplete="off" required />
						<!-- <span class="focus-input100" data-placeholder="Password"></span> -->
				
					</div>

          <div class="wrap-input100 validate-input">
          <input type="text" name="endTime" id="endTime" class="time ui-timepicker-input" autocomplete="off" required/>
						<!-- <value="<?php echo $cpassword;?>"> -->
						<!-- <span class="focus-input100" data-placeholder="Confirm Password"></span> -->
						
					</div>

					<div class="container-register-form-btn">
						<div class="wrap-register-form-btn">
							<div class="register-form-bgbtn"></div>
							<button class="register-form-btn">
								Create Meeting
							</button>
						</div>
					</div>
	
					<div class="text-center p-t-115">
					</form>
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>

</body>
</html>