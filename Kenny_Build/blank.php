<?php
error_reporting(E_ERROR);

$sMonth = date('F',time()+( 1 - date('w'))*24*3600);
$eMonth = date('F',time()+( 7 - date('w'))*24*3600);
$sDay = date('d',time()+( 1 - date('w'))*24*3600); 
$eDay = date('d',time()+( 7 - date('w'))*24*3600);

//echo ($sDay . " " . $sMonth . " - " . $eDay . " " . $eMonth);

$day =  $_GET['day']; 

$hour = $_GET['hour']; 
$hourToShow = gmdate("H:i:s", $hour*3600);
$title =  $_GET['title']; 

?>
<br></br>
<?php
$hoursPassed = date('H'); // hours passed today (subtract later)
$clickedTime = date('Y-m-d', strtotime("+$hour hours, +$day days, -$hoursPassed hours"));

//echo "Hour, day, month: " . $clickedTime; //echo "day: " . $day . " hours: " . $hour;



$people = $_GET['people'];
//echo $people;
$arrayPeople = explode(",", $people);
//print_r($arrayPeople);

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


    $db->query($sqlAddEvent);
    echo $db->error;

if (in_array(strtoupper($login_session), $arrayPeople)) {
    $sqlAssign = "INSERT into HasEvent (username, eventID)
    VALUES(\"$login_session\", (SELECT MAX(eventID) FROM Events) )";


    $db->query($sqlAssign);
    echo $db->error;

    if (($key = array_search($login_session, $arrayPeople)) !== false) {
        unset($arrayPeople[$key]);
    }
}

foreach ($arrayPeople as $person) {
  if ($person != strtoupper($login_session)) {
$sqlAssign = "INSERT into Inbox (username, eventID)
    VALUES(\"$person\", (SELECT MAX(eventID) FROM Events) )";


    $db->query($sqlAssign);
    echo $db->error;
  }
}
header("Location: https://web.cs.manchester.ac.uk/g34904ps/team/Kenny_Build/invites2.php");



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

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "blank.css">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">


  <!-- timepicker -->
  <script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="jquery-timepicker/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery-timepicker/jquery.timepicker.css">


  <!-- date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="mainpage.css">
  <link rel = "icon" href="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">


  <script>
  $( function() {
    $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' });

  } );
  </script>




</head>
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

<div class="container-login100">
			<div class="wrap-register">
				<!-- <form class="register-form validate-form"> -->
					<div class="put-it-here-to-include-padding">
					<span class="register-form-title p-b-26">
						<?php echo $title ?>
					</span>
				  </div>
			
					<form method ="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <!-- <div class="wrap-input100 validate-input">
          <p style="text-align: center;">Title: </p> -->
          <input id = "name" name="name" type="hidden" value="<?php echo $title ?>" required>						
					<!-- </div> -->

          <div class="wrap-input100 validate-input">
          <p style="text-align: center;">Description: </p>
          <input id = "desc" name="description" required>            <!-- <span class="focus-input100" data-placeholder="Last Name"></span> -->
						
          </div>

					<div class="wrap-input100 validate-input">
          <p style="text-align: center;">Start date: </p>
                    <input type="text"name="startDate" id="startDate" value="<?php echo $clickedTime; ?>" required>
						<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
						
					</div>

					<div class="wrap-input100 validate-input">
          <p style="text-align: center;">End date: </p>
                    <input type="text"name="endDate" id="endDate" required>
						<!-- <span class="focus-input100" data-placeholder="Email"></span> -->
						
					</div>

					<div class="wrap-input100 validate-input">
            <p style="text-align: center;">Start time: </p>
                    <input type="text"name="startTime" id="startTime" value="<?php echo $hourToShow ?>" class="time ui-timepicker-input" autocomplete="off" required />
                    <script>
                    $(function() {
                    $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60 });
                    });
                    </script>
						<!-- <span class="focus-input100" data-placeholder="Password"></span> -->
				
					</div>

          <div class="wrap-input100 validate-input">
          <p style="text-align: center;">End time: </p>
          <input type="text" name="endTime" id="endTime" class="time ui-timepicker-input" autocomplete="off" required/>
          <script>
            $(function() {
            $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60});
            });
            </script>
						<!-- <value="<?php //echo $cpassword;?>"> -->
						<!-- <span class="focus-input100" data-placeholder="Confirm Password"></span> -->
						
					</div>

					<div class="container-register-form-btn">
						<div class="wrap-register-form-btn">
							<div class="register-form-bgbtn"></div>
							<button class="register-form-btn" name="submit">
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