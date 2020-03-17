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
    $( "#picker" ).datepicker();
    $( "#datepicker" ).datepicker();

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




<article>
  <div class="demo">
    <h2>Basic Example</h2>
    <p>
      <input id="basicExample" type="text" class="time ui-timepicker-input" autocomplete="off">
    </p>
  </div>
  <script>
  $(function() {
    $('#basicExample').timepicker({ 'timeFormat': 'H:i:s' });
  });
  </script>
  <pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#basicExample'</span>).<span class="function call">timepicker</span>();</pre>
</article>



</body>
</html>
