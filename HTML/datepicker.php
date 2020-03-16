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


  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>

<script>
$(document).ready(function(){
    $('#time').timepicker();
});
</script>

</head>
<body>

<p>Start: <input type="text" id="datepicker"></p>
<p>Duration: <input type="text" id="time"/></p>

<form action="welcome.php">
  <label for="duration">Duration in hours:</label>
  <input type="text" id="duration" name="duration"><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
