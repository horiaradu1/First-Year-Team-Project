<!doctype html>
<html lang="en">
<head>

  	<meta charset="utf-8">
  	<title>Timepicker for jQuery </title>
  	<meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar.">
  	<script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script type="text/javascript" src="jquery.timepicker.js"></script>
  	<link rel="stylesheet" type="text/css" href="jquery.timepicker.css">
  	<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css">
  	<script type="text/javascript" src="lib/site.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/site.css">

</head>
<body>

<p>Start time: <input class="time ui-timepicker-input" autocomplete = "off" type="text" id="startTime"/></p>
<script>
$(function() { $('#startTime').timepicker(); });
</script>
<p>End time: <input type="text" id="startTime"/></p>

<form action="welcome.php">
  <input type="submit" value="Submit">
</form>

</body>
</html>
