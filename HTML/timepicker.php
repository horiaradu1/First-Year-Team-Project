<!DOCTYPE html>
<html lang="en">
<head>

  	<meta charset="utf-8">
  	<title>Timepicker for jQuery – Demos and Documentation</title>
  	<meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar. Add a user-friendly javascript timepicker dropdown to your app in minutes.">
  	<script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script type="text/javascript" src="jquery-timepicker/jquery.timepicker.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="jquery-timepicker/jquery.timepicker.css">



    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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

                  <div class="demo">
                      <h2>Date-only Example</h2>

                      <p>You can use datepair with just dates, or just times.</p>

                      <p id="dateOnlyExample">
                          <input type="text" class="date start"> to
                          <input type="text" class="date end">
                      </p>

                      <p id="timeOnlyExample">
                          <input type="text" class="time start ui-timepicker-input" autocomplete="off"> to
                          <input type="text" class="time end ui-timepicker-input" autocomplete="off">
                      </p>
                  </div>

                  <pre class="code rainbow" data-language="javascript"><span class="comment">// HTML not shown for brevity</span>
      <span class="selector">
      $</span>(<span class="string">'#timeOnlyExample .time'</span>).<span class="function call">timepicker</span>({
          <span class="string">'showDuration'</span>: <span class="constant language">true</span>,
          <span class="string">'timeFormat'</span>: <span class="string">'g:ia'</span>
      });

      <span class="keyword">var</span> timeOnlyExampleEl <span class="keyword operator">=</span> <span class="support">document</span>.<span class="support method">getElementById</span>(<span class="string">'timeOnlyExample'</span>);
      <span class="keyword">var</span> timeOnlyDatepair <span class="keyword operator">=</span> <span class="keyword">new</span> <span class="function call">Datepair</span>(timeOnlyExampleEl);
      <span class="selector">
      $</span>(<span class="string">'#dateOnlyExample .date'</span>).<span class="function call">datepicker</span>({
          <span class="string">'format'</span>: <span class="string">'yyyy-m-d'</span>,
          <span class="string">'autoclose'</span>: <span class="constant language">true</span>
      });

      <span class="keyword">var</span> dateOnlyExampleEl <span class="keyword operator">=</span> <span class="support">document</span>.<span class="support method">getElementById</span>(<span class="string">'dateOnlyExample'</span>);
      <span class="keyword">var</span> dateOnlyDatepair <span class="keyword operator">=</span> <span class="keyword">new</span> <span class="function call">Datepair</span>(dateOnlyExampleEl);
                  </pre>

                  <script>
                      $('#timeOnlyExample .time').timepicker({
                          'showDuration': true,
                          'timeFormat': 'g:ia'
                      });

                      var timeOnlyExampleEl = document.getElementById('timeOnlyExample');
                      var timeOnlyDatepair = new Datepair(timeOnlyExampleEl);

                      $('#dateOnlyExample .date').datepicker({
                          'format': 'yyyy-m-d',
                          'autoclose': true
                      });

                      var dateOnlyExampleEl = document.getElementById('dateOnlyExample');
                      var dateOnlyDatepair = new Datepair(dateOnlyExampleEl);
                  </script>

  	</body>
</html>
