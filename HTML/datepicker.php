




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

</head>
<body>

<!--  first line: -->
<p>Start date: <input type="text" id="datepicker">
  Start time: <input type="text" id = "StartTime"> </p>

<!-- Second line -->
<p>End date: <input type="text" id="datepicker">
  End time: <input type="text" id = "EndTime"></p>


<form action="welcome.php">
  <label for="name">Name of the event:</label>
  <input type="text" id="name" name="name"><br>


  <label for="name">Description:</label>
  <input type="text" id="description" name="description"><br>

  <input type="submit" value="Submit">

</form>

</body>
</html>
