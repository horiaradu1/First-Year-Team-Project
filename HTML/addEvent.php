

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



    $sqlID= "SELECT MAX(eventID) FROM Events";
    $db->query($sqlID);
    echo $db->error;

    $sqlAssign = "INSERT into HasEvent
    VALUES(\"$login_session\", \"$sqlID\")";
    
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
Name of the event: <input id = "name" name="name">
<!-- DESCRIPTION input box-->
Description: <input id = "desc" name="description">

<!-- Start datepicker input box-->
<p>From: <input type="text"name="startDate" id="startDate">
  <input type="text"name="startTime" id="startTime" class="time ui-timepicker-input" autocomplete="off"/></p>
<!-- function to assign this timepicker, and change the format to a desired one -->
<script>
$(function() {
  $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now' });
});
</script>


<!-- End datepicker window box -->
<p>To: <input type="text"name="endDate" id="endDate"><input type="text" name="endTime" id="endTime" class="time ui-timepicker-input" autocomplete="off"/></p>
<!-- the function -->
<script>
$(function() {
  $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now'});
});
</script>


<!-- Button to submit -->
<button name="submit">Click to add to your timetable!</button>
</form>

</body>
</html>
