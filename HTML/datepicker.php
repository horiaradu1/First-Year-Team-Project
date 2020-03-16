<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Create event</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <link rel="stylesheet" href="/jquery-timepicker/jquery.timepicker.css">
  <script src="/jquery-timepicker/jquery.timepicker.min.js"></script>


  <script>
  $( function() {
    $( "#picker" ).datepicker();
    $( "#datepicker" ).datepicker();
    $('startTime').timepicker(options);
  } );
  </script>


  <script>
  $( function() {

    $('endTime').timepicker(options);
  } );
  </script>


</head>
<body>

<p>Start date: <input type="text" id="picker"></p>
<p>Start time: <input type="text" id="startTime"/></p>

<p>End date: <input type="text" id="datepicker"></p>
<p>Start time: <input type="text" id="startTime"/></p>

<form action="welcome.php">
  <label for="duration">Duration in hours:</label>
  <input type="text" id="time" ><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
