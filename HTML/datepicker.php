




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



  <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- jQuery timepicker library -->
<link rel="stylesheet" href="jquery-timepicker/jquery.timepicker.min.css">
<script src="jquery-timepicker/jquery.timepicker.min.js"></script>


  <script>
  $( function() {
    $( "#startDate" ).datepicker();
    $( "#endDate" ).datepicker();


    $(document).ready(function(){
    $('#startTime').timepicker();

    $('#endTime').timepicker();
});

  } );
  </script>

</head>
<body>


<!--  first line: -->
<p>Start date: <input type="text" id="startDate">
  Start time: <input type="text" id = "startTime"> </p>

<!-- Second line -->
<p>End date: <input type="text" id="endDate">
  End time: <input type="text" id = "endTime"></p>


<form action="welcome.php">
  <label for="name">Name of the event:</label>
  <input type="text" id="name" name="name"><br>


  <label for="name">Description:</label>
  <input type="text" id="description" name="description"><br>

  <input type="submit" value="Submit">

</form>

</body>
</html>
