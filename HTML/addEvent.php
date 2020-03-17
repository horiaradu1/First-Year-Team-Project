

<?php
include("session.php");

// responsible for adding the courses from course selector
if (isset($_POST["submitTT"])) {

  // $course = mysqli_real_escape_string($db, $_POST["new_course"]);
    //
    // $name = $_POST["new_course"];
    // $description = $_POST["new_lab"];
  $start = $_POST["start"];
    // $end =$_POST[""];

    //
    // echo $name;
    // echo $description;
  echo $start;
    // echo $end;


      // $sqlAddCourse = "INSERT INTO HasCourse (username, course, lab)
      //   VALUES (\"$login_session\", \"$course\", \"$lab\");";
      //
      //   echo $sqlAddCourse;
      //
      //   $db->query($sqlAddCourse);
      //   echo $db->error;
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
<p>From: <input type="text" id="startDate">
  <input type="text" id="startTime" class="time ui-timepicker-input" autocomplete="off"/></p>
<!-- function to assign this timepicker, and change the format to a desired one -->
<script>
$(function() {
  $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now' });
});
</script>


<!-- End datepicker window box -->
<p>To: <input type="text" id="endDate"><input type="text" id="endTime" class="time ui-timepicker-input" autocomplete="off"/></p>
<!-- the function -->
<script>
$(function() {
  $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now'});
});
</script>


<!-- Button to submit -->
<button name="submit">Click to add to your timetable!</button>
</form>


<form method="POST" id="insert">

<!-- type should be hidden -->
<input name="start"/>

<script>
$('#insert').bind('submitTT', function(){
                        var sDate = $('[name=startDate]').val();
                        var sTime = $('[name=startTime]').val();
                        $('[name=start]').val(sDate+'@'+sTime);
                      });
</script>

<button name="submitTT">Click to test!</button>
</form>

</body>
</html>
