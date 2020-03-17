<!DOCTYPE html>
<html lang="en">
<head>

  	<meta charset="utf-8">
  	<title>Timepicker for jQuery – Demos and Documentation</title>
  	<meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar. Add a user-friendly javascript timepicker dropdown to your app in minutes.">
  	<script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script type="text/javascript" src="jquery-timepicker/jquery.timepicker.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="jquery-timepicker/jquery.timepicker.css">

  	<!-- <script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css">
  	<script type="text/javascript" src="lib/site.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/site.css"> -->

</head>
<body>


  	<section>
  		<header>
  		<h1><a href="https://github.com/jonthornton/jquery-timepicker">jquery.timepicker</a></h1>
  		<p class="body-text">
  			A lightweight, customizable javascript timepicker plugin for jQuery inspired by Google Calendar.
  		</p>
  		<ul id="header-links">
  			<li><a href="https://github.com/jonthornton/jquery-timepicker#timepicker-plugin-for-jquery">Documentation</a></li>
  			<li><a href="https://github.com/jonthornton/jquery-timepicker">Source code on GitHub</a></li>
  			<li><a href="https://github.com/jonthornton/jquery-timepicker/zipball/master">Download (zip)</a></li>
  			<li><a href="https://github.com/jonthornton/jquery-timepicker/issues?state=open">Help</a></li>
  		</ul>
  	</header><p class="body-text">Use this plugin to unobtrusively add a timepicker dropdown to your forms. It's lightweight (2.7kb minified and gzipped) and easy to customize.</p>
  	</section>
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
  				$('#basicExample').timepicker();
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#basicExample'</span>).<span class="function call">timepicker</span>();</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Scroll Default Example</h2>
  				<p>Set the scroll position to local time if no value selected.</p>
  				<p>
  					<input id="scrollDefaultExample" type="text" class="time ui-timepicker-input" autocomplete="off">
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#scrollDefaultExample').timepicker({ 'scrollDefault': 'now' });
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#scrollDefaultExample'</span>).<span class="function call">timepicker</span>({ <span class="string">'scrollDefault'</span>: <span class="string">'now'</span> });</pre>
  		</article>
  	</body>
</html>
