<!DOCTYPE html>
<html lang="en">
<head>

  	<meta charset="utf-8">
  	<title>Timepicker for jQuery – Demos and Documentation</title>
  	<meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar. Add a user-friendly javascript timepicker dropdown to your app in minutes.">
  	<script async="" src="https://www.google-analytics.com/analytics.js"></script><script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  	<script type="text/javascript" src="jquery.timepicker.js"></script>
  	<link rel="stylesheet" type="text/css" href="jquery.timepicker.css">
  	<script type="text/javascript" src="lib/bootstrap-datepicker.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker.css">
  	<script type="text/javascript" src="lib/site.js"></script>
  	<link rel="stylesheet" type="text/css" href="lib/site.css">

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
  		<article>
  			<div class="demo">
  				<h2>Set Time Example</h2>
  				<p>Dynamically set the time using a Javascript Date object.</p>
  				<p>
  					<input id="setTimeExample" type="text" class="time ui-timepicker-input" autocomplete="off">
  					<button id="setTimeButton">Set current time</button>
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#setTimeExample').timepicker();
  				$('#setTimeButton').on('click', function() {
  					$('#setTimeExample').timepicker('setTime', new Date());
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#setTimeExample'</span>).<span class="function call">timepicker</span>();<span class="selector">
  $</span>(<span class="string">'#setTimeButton'</span>).<span class="function call">on</span>(<span class="string">'click'</span>, <span class="storage function">function</span> (){
  <span class="selector">	$</span>(<span class="string">'#setTimeExample'</span>).<span class="function call">timepicker</span>(<span class="string">'setTime'</span>, <span class="keyword">new</span> <span class="function call">Date</span>());
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Duration Example</h2>
  				<p>Set a starting time and see duration from that starting time. You can optionally set an maxTime as well.</p>
  				<p>
  					<input id="durationExample" type="text" class="time ui-timepicker-input" autocomplete="off">
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#durationExample').timepicker({
  					'minTime': '2:00pm',
  					'maxTime': '11:30pm',
  					'showDuration': true
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#durationExample'</span>).<span class="function call">timepicker</span>({
  	<span class="string">'minTime'</span>: <span class="string">'2:00pm'</span>,
  	<span class="string">'maxTime'</span>: <span class="string">'11:30pm'</span>,
  	<span class="string">'showDuration'</span>: <span class="constant language">true</span>
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Event Example</h2>
  				<p>Trigger an event after selecting a value. Fires before the input onchange event.</p>
  				<p>
  					<input id="onselectExample" type="text" class="time ui-timepicker-input" autocomplete="off">
  					<span id="onselectTarget" style="margin-left: 30px;"></span>
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#onselectExample').timepicker();
  				$('#onselectExample').on('changeTime', function() {
  					$('#onselectTarget').text($(this).val());
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#onselectExample'</span>).<span class="function call">timepicker</span>();<span class="selector">
  $</span>(<span class="string">'#onselectExample'</span>).<span class="function call">on</span>(<span class="string">'changeTime'</span>, <span class="keyword">function</span>() {
  <span class="selector">	$</span>(<span class="string">'#onselectTarget'</span>).<span class="function call">text</span>($(<span class="keyword">this</span>).<span class="function call">val</span>());
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>DisableTimeRanges Example</h2>
  				<p>Prevent selection of certain time values.</p>
  				<p>
  					<input id="disableTimeRangesExample" type="text" class="time ui-timepicker-input" autocomplete="off">
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#disableTimeRangesExample').timepicker({ 'disableTimeRanges': [
  						['1am', '2am'],
  						['3am', '4:01am']
  					] });
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#disableTimeRangesExample'</span>).<span class="function call">timepicker</span>({
  	<span class="string">'disableTimeRanges'</span>: [
  		[<span class="string">'1am'</span>, <span class="string">'2am'</span>],
  		[<span class="string">'3am'</span>, <span class="string">'4:01am'</span>]
  	]
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>noneOption Example</h2>
  				<p>Custom options can be added to the dropdown menu.</p>
  				<p>
  					<input id="noneOptionExample" type="text" class="time ui-timepicker-input" autocomplete="off">
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#noneOptionExample').timepicker({
  					'noneOption': [{
  							'label': 'Foobar',
  							'className': 'shibby',
  							'value': '42'
  						},
  						'Foobar2'
  					]
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#noneOptionExample'</span>).<span class="function call">timepicker</span>({
  	<span class="string">'noneOption'</span>: [
  		{
  			<span class="string">'label'</span>: <span class="string">'Foobar'</span>,
  			<span class="string">'className'</span>: <span class="string">'shibby'</span>,
  			<span class="string">'value'</span>: <span class="string">'42'</span>
  		},
  		<span class="string">'Foobar2'</span>
  	]
  });
  		</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>timeFormat Example</h2>
  				<p>timepicker.jquery uses the time portion of <a href="http://php.net/manual/en/function.date.php">PHP's date formatting commands</a>.</p>
  				<p>
  					<input id="timeformatExample1" type="text" class="time ui-timepicker-input" autocomplete="off">
  					<input id="timeformatExample2" type="text" class="time ui-timepicker-input" autocomplete="off">
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#timeformatExample1').timepicker({ 'timeFormat': 'H:i:s' });
  				$('#timeformatExample2').timepicker({ 'timeFormat': 'h:i A' });
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#timeformatExample1'</span>).<span class="function call">timepicker</span>({ <span class="string">'timeFormat'</span>: <span class="string">'H:i:s'</span> });<span class="selector">
  $</span>(<span class="string">'#timeformatExample2'</span>).<span class="function call">timepicker</span>({ <span class="string">'timeFormat'</span>: <span class="string">'h:i A'</span> });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Step Example</h2>
  				<p>Generate drop-down options with varying levels of precision.</p>
  				<p>
  					<input id="stepExample1" type="text" class="time ui-timepicker-input" autocomplete="off">
  					<input id="stepExample2" type="text" class="time ui-timepicker-input" autocomplete="off">
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#stepExample1').timepicker({ 'step': 15 });
  				$('#stepExample2').timepicker({
  					'step': function(i) {
  						return (i % 2) ? 15 : 45;
  					}
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#stepExample1'</span>).<span class="function call">timepicker</span>({ <span class="string">'step'</span>: <span class="constant numeric">15</span> });<span class="selector">
  $</span>(<span class="string">'#stepExample2'</span>).<span class="function call">timepicker</span>({
  	<span class="string">'step'</span>: <span class="keyword">function</span>(i) {
  		<span class="keyword">return</span> (i%<span class="constant numeric">2</span>) ? <span class="constant numeric">15</span> : <span class="constant numeric">45</span>;
  	}
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>forceRoundTime Example</h2>
  				<p>jquery-timepicker allows entering times via the keyboard. Setting forceRoundTime to true will round the entered time to the nearest option on the dropdown list.</p>
  				<p>
  					<input id="roundTimeExample" type="text" class="time ui-timepicker-input" autocomplete="off"> </p>
  			</div>
  			<script>
  			$(function() {
  				$('#roundTimeExample').timepicker({ 'forceRoundTime': true });
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#roundTimeExample'</span>).<span class="function call">timepicker</span>({ <span class="string">'forceRoundTime'</span>: <span class="constant language">true</span> });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Select Example</h2>
  				<p>jquery-timepicker can render itself as a select element too.</p>
  				<p>
  					<input id="selectExample" class="time ui-timepicker-input" name="foo" autocomplete="off">
  					<button id="selectButton">Toggle</button>
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#selectExample').timepicker();
  				$('#selectButton').click(function(e) {
  					$('#selectExample').timepicker('option', { useSelect: true });
  					$(this).hide();
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#selectExample'</span>).<span class="function call">timepicker</span>();<span class="selector">
  $</span>(<span class="string">'#selectButton'</span>).<span class="function call">click</span>(<span class="keyword">function</span>(e) {
   <span class="selector"> $</span>(<span class="string">'#selectExample'</span>).<span class="function call">timepicker</span>(<span class="string">'option'</span>, { useSelect: <span class="constant language">true</span> });
   <span class="selector"> $</span>(<span class="keyword">this</span>).<span class="function call">hide</span>();
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Non-input Example</h2>
  				<p>jquery-timepicker can be bound to any visibile DOM element, such as spans or divs.</p>
  				<p><span id="spanExample" style="background:#f00; padding:0 10px; margin-right:100px;" class="ui-timepicker-input"></span>
  					<button id="openSpanExample">Pick Time</button>
  				</p>
  			</div>
  			<script>
  			$(function() {
  				$('#spanExample').timepicker();
  				$('#openSpanExample').on('click', function() {
  					$('#spanExample').timepicker('show');
  				});
  			});
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="selector">$</span>(<span class="string">'#spanExample'</span>).<span class="function call">timepicker</span>();
  <span class="selector">	$</span>(<span class="string">'#openSpanExample'</span>).<span class="function call">on</span>(<span class="string">'click'</span>, <span class="keyword">function</span>(){
  <span class="selector">	$</span>(<span class="string">'#spanExample'</span>).<span class="function call">timepicker</span>(<span class="string">'show'</span>);
  });</pre>
  		</article>
  		<article>
  			<div class="demo">
  				<h2>Datepair Plugin Example</h2>
  				<p>jquery-timepicker is designed to work with the <a href="http://jonthornton.github.com/Datepair.js">jquery-datepair plugin</a>.
  					</p><p id="datepairExample">
  						<input type="text" class="date start">
  						<input type="text" class="time start ui-timepicker-input" autocomplete="off"> to
  						<input type="text" class="time end ui-timepicker-input" autocomplete="off">
  						<input type="text" class="date end">
  					</p>
  			</div>
  			<script src="http://jonthornton.github.io/Datepair.js/dist/datepair.js"></script>
  			<script src="http://jonthornton.github.io/Datepair.js/dist/jquery.datepair.js"></script>
  			<script>
  			$('#datepairExample .time').timepicker({
  				'showDuration': true,
  				'timeFormat': 'g:ia'
  			});

  			$('#datepairExample .date').datepicker({
  				'format': 'm/d/yyyy',
  				'autoclose': true
  			});

  			$('#datepairExample').datepair();
  			</script>
  			<pre class="code rainbow" data-language="javascript"><span class="keyword operator">&lt;</span>p id<span class="keyword operator">=</span><span class="string">"datepairExample"</span><span class="keyword operator">&gt;</span>
  	<span class="keyword operator">&lt;</span>input type<span class="keyword operator">=</span><span class="string">"text"</span> <span class="keyword">class</span><span class="keyword operator">=</span><span class="string">"date start"</span> /<span class="keyword operator">&gt;</span>
  	<span class="keyword operator">&lt;</span>input type<span class="keyword operator">=</span><span class="string">"text"</span> <span class="keyword">class</span><span class="keyword operator">=</span><span class="string">"time start"</span> /<span class="keyword operator">&gt;</span> to
  	<span class="keyword operator">&lt;</span>input type<span class="keyword operator">=</span><span class="string">"text"</span> <span class="keyword">class</span><span class="keyword operator">=</span><span class="string">"time end"</span> /<span class="keyword operator">&gt;</span>
  	<span class="keyword operator">&lt;</span>input type<span class="keyword operator">=</span><span class="string">"text"</span> <span class="keyword">class</span><span class="keyword operator">=</span><span class="string">"date end"</span> /<span class="keyword operator">&gt;</span>
  <span class="keyword operator">&lt;</span>/p<span class="keyword operator">&gt;</span>

  <span class="support tag script">&lt;</span><span class="entity tag script">script</span> <span class="entity tag script">type</span>=<span class="string">"text/javascript"</span> <span class="entity tag script">src</span>=<span class="string">"datepair.js"</span><span class="support tag script">&gt;</span><span class="support tag script">&lt;/</span><span class="entity tag script">script</span><span class="support tag script">&gt;</span>
  <span class="support tag script">&lt;</span><span class="entity tag script">script</span> <span class="entity tag script">type</span>=<span class="string">"text/javascript"</span> <span class="entity tag script">src</span>=<span class="string">"jquery.datepair.js"</span><span class="support tag script">&gt;</span><span class="support tag script">&lt;/</span><span class="entity tag script">script</span><span class="support tag script">&gt;</span>
  <span class="support tag script">&lt;</span><span class="entity tag script">script</span><span class="support tag script">&gt;</span>
  	<span class="comment">// initialize input widgets first</span>
  <span class="selector">	$</span>(<span class="string">'#datepairExample .time'</span>).<span class="function call">timepicker</span>({
  		<span class="string">'showDuration'</span>: <span class="constant language">true</span>,
  		<span class="string">'timeFormat'</span>: <span class="string">'g:ia'</span>
  	});

  <span class="selector">	$</span>(<span class="string">'#datepairExample .date'</span>).<span class="function call">datepicker</span>({
  		<span class="string">'format'</span>: <span class="string">'yyyy-m-d'</span>,
  		<span class="string">'autoclose'</span>: <span class="constant language">true</span>
  	});

  	<span class="comment">// initialize datepair</span>
  <span class="selector">	$</span>(<span class="string">'#datepairExample'</span>).<span class="function call">datepair</span>();
  <span class="support tag script">&lt;/</span><span class="entity tag script">script</span><span class="support tag script">&gt;</span></pre>
  		</article>
  	</section>
  	<section>
  		<h2>Need Help?</h2>
  		<p>Check <a href="https://github.com/jonthornton/jquery-timepicker#timepicker-plugin-for-jquery">the documentation</a> or <a href="https://github.com/jonthornton/jquery-timepicker/issues?state=open">submit an issue</a> on GitHub.</p>
  	</section>
  	<footer>
  		<p>© 2014 <a href="http://jonthornton.com">Jon Thornton</a></p>
  	</footer>
  	<script>
  	(function(i, s, o, g, r, a, m) {
  		i['GoogleAnalyticsObject'] = r;
  		i[r] = i[r] || function() {
  			(i[r].q = i[r].q || []).push(arguments)
  		}, i[r].l = 1 * new Date();
  		a = s.createElement(o),
  			m = s.getElementsByTagName(o)[0];
  		a.async = 1;
  		a.src = g;
  		m.parentNode.insertBefore(a, m)
  	})(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

  	ga('create', 'UA-15605525-4', 'auto');
  	ga('send', 'pageview');
  	</script>




  <div class="ui-timepicker-wrapper" tabindex="-1" style="position: absolute; top: 381.3px; left: 20px; display: block;"><ul class="ui-timepicker-list"><li class="ui-timepicker-am ui-timepicker-selected">12:00am</li><li class="ui-timepicker-am">12:30am</li><li class="ui-timepicker-am">1:00am</li><li class="ui-timepicker-am">1:30am</li><li class="ui-timepicker-am">2:00am</li><li class="ui-timepicker-am">2:30am</li><li class="ui-timepicker-am">3:00am</li><li class="ui-timepicker-am">3:30am</li><li class="ui-timepicker-am">4:00am</li><li class="ui-timepicker-am">4:30am</li><li class="ui-timepicker-am">5:00am</li><li class="ui-timepicker-am">5:30am</li><li class="ui-timepicker-am">6:00am</li><li class="ui-timepicker-am">6:30am</li><li class="ui-timepicker-am">7:00am</li><li class="ui-timepicker-am">7:30am</li><li class="ui-timepicker-am">8:00am</li><li class="ui-timepicker-am">8:30am</li><li class="ui-timepicker-am">9:00am</li><li class="ui-timepicker-am">9:30am</li><li class="ui-timepicker-am">10:00am</li><li class="ui-timepicker-am">10:30am</li><li class="ui-timepicker-am">11:00am</li><li class="ui-timepicker-am">11:30am</li><li class="ui-timepicker-pm">12:00pm</li><li class="ui-timepicker-pm">12:30pm</li><li class="ui-timepicker-pm">1:00pm</li><li class="ui-timepicker-pm">1:30pm</li><li class="ui-timepicker-pm">2:00pm</li><li class="ui-timepicker-pm">2:30pm</li><li class="ui-timepicker-pm">3:00pm</li><li class="ui-timepicker-pm">3:30pm</li><li class="ui-timepicker-pm">4:00pm</li><li class="ui-timepicker-pm">4:30pm</li><li class="ui-timepicker-pm">5:00pm</li><li class="ui-timepicker-pm">5:30pm</li><li class="ui-timepicker-pm">6:00pm</li><li class="ui-timepicker-pm">6:30pm</li><li class="ui-timepicker-pm">7:00pm</li><li class="ui-timepicker-pm">7:30pm</li><li class="ui-timepicker-pm">8:00pm</li><li class="ui-timepicker-pm">8:30pm</li><li class="ui-timepicker-pm">9:00pm</li><li class="ui-timepicker-pm">9:30pm</li><li class="ui-timepicker-pm">10:00pm</li><li class="ui-timepicker-pm">10:30pm</li><li class="ui-timepicker-pm">11:00pm</li><li class="ui-timepicker-pm">11:30pm</li></ul></div>
</body>
</html>
