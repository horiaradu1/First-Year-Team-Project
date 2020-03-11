<!DOCTYPE html>
<html lan="en">
<head>
  <title>TIMEonTABLE - Timetable</title>
  <meta charset = "UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="moreTable.css">
  <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
    type = "image/x-icon">
</head>
<body>
  <div class="limiter">
    <div class="navbar">
      <div class = "picture">
      <a href="moreTable.html">Home</a>
    </div>
    <div class = "picture">
      <a href="meet.html">Meeting</a>
    </div>
  <div class="text100">
      <a href="#news">Log out</a>
    </div>
    <div class="text100">
      <a href="ContactForm.html">Contact Us</a>
    </div>
    <div class="text100">
      <a href="AboutUs.html">About Us</a>
    </div>
    </div>
    <div class="container-table100">
      <div class="week">
        2 MAR - 8 MAR 2020
      </div>
      <div class="logo">
        <img src = "Logo.png">
      </div>
      <div class="btn-container" align="left">
				<div class="btn1">
				<button class="btn">CREATE EVENT</button>
			</div>
			<div class="btn2">
				<button class="btn">CREATE MEETING</button>
			</div>
			</div>
      <div class="before">
      <a href="#" class="previous round">&#8249;</a>
    </div>
    <div class="after">
      <a href="#" class="previous round">&#8250;</a>
    </div>
    
    <div class="timetable">
      <?php include 'timetablePHP.php';?>
    </div>

  </div>
</body>
</html>
