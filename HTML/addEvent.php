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
    $( "#startDate" ).datepicker( altFormat: "yy-mm-dd");
    $( "#endDate" ).datepicker( altFormat: "yy-mm-dd");

  } );
  </script>




</head>
<body>

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


<script type="text/javascript">
    var js_variable = <?php echo json_encode($php_variable); ?>;
</script>
<!-- snip -->

</body>
</html>
