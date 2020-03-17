<?php
include("session.php");

// responsible for adding the courses from course selector
if (isset($_POST["submit"])) {

  // $course = mysqli_real_escape_string($db, $_POST["new_course"]);

  $course = $_POST["new_course"];
  $lab = $_POST["new_lab"];

  echo $course;

  echo $lab;


  // $lab = mysqli_real_escape_string($db, $_POST["new_lab"]);

  //var_dump($_POST["new_course"]);
  $sqlAddCourse = "INSERT INTO HasCourse (username, course, lab)
    VALUES (\"$login_session\", \"$course\", \"$lab\");";

    echo $sqlAddCourse;

    $db->query($sqlAddCourse);
    echo $db->error;
}
// ------------ END OF PHP ----------------
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

<!-- script for enabling the datepicker -->
  <script>
  $( function() {
    $( "#startDate" ).datepicker();
    $( "#endDate" ).datepicker();

  } );
  </script>

  <!-- end of head -->
</head>

<!-- body -->
<body>
<h1> Add new event </h1>
<p>Description: <input type="text" id="description"></p>
<p>Name of the event:<input tpye="text" id="name"></p>
<p>From: <input type="text" id="startDate">
  <input type="text" id="startTime" class="time ui-timepicker-input" autocomplete="off"/></p>

<script>
$(function() {
  $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now' });
});
</script>

<p>To: <input type="text" id="endDate"><input type="text" id="endTime" class="time ui-timepicker-input" autocomplete="off"/></p>

<script>
$(function() {
  $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now'});
});
</script>

<!-- snip -->
<script>
    var data = <?php echo json_encode("42", JSON_HEX_TAG); ?>; // Don't forget the extra semicolon!
</script>
<!-- snip -->

</body>
</html>
