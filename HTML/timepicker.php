<!DOCTYPE html>
<html lang="en">
<head>

  	<meta charset="utf-8">
  	<title>Timepicker for jQuery – Demos and Documentation</title>
  	<meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar. Add a user-friendly javascript timepicker dropdown to your app in minutes.">
  	<script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script type="text/javascript" src="jquery-timepicker/jquery.timepicker.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="jquery-timepicker/jquery.timepicker.css">


</head>
<body>

  	<section id="examples">
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
