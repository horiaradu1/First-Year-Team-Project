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


?>





<?php
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


    $sqlAssign = "INSERT into HasEvent (username, eventID)
    VALUES(\"$login_session\", (SELECT MAX(eventID) FROM Events) )";


    $db->query($sqlAssign);
    echo $db->error;



}
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create event</title>

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




<form method=POST>

  <!-- Name input box-->
Name of the event: <input id = "name" name="name" value="<?php echo $title ?>">
<!-- DESCRIPTION input box-->
Description: <input id = "desc" name="description">

<!-- Start datepicker input box-->
<p>From: <input type="text"name="startDate" id="startDate" value="<?php echo $clickedTime; ?>">
  <input type="text"name="startTime" id="startTime" value="<?php echo $hour ?>" class="time ui-timepicker-input" autocomplete="off"/></p>
<!-- function to assign this timepicker, and change the format to a desired one -->
<script>
$(function() {
  $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60 });
});
</script>


<!-- End datepicker window box -->
<p>To: <input type="text"name="endDate" id="endDate"><input type="text" name="endTime" id="endTime" class="time ui-timepicker-input" autocomplete="off"/></p>
<!-- the function -->
<script>
$(function() {
  $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60});
});
</script>


<!-- Button to submit -->
<button name="submit">Click to add to your timetable!</button>
</form>

</body>
</html>