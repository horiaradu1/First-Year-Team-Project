<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create event2</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jQuery timepicker library -->
<link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.min.css">
<script src="jquery-timepicker/jquery.timepicker.min.js"></script>


  <script>
  $(document).ready(function(){
      $('#startTime').timepicker();
  });
  </script>




</head>
<body>

<p>Start time: <input type="text" id="startTime"/></p>

<p>End time: <input type="text" id="startTime"/></p>

<form action="welcome.php">
  <input type="submit" value="Submit">
</form>

</body>
</html>
