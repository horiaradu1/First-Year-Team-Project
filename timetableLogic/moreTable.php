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
      <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
          <table data-vertable="ver1.1">
            <thead>
              <tr class="row100 head">
                <th class="column100 column1" data-column="column1"></th>
                <th class="column100 column3" data-column="column3">Monday</th>
                <th class="column100 column4" data-column="column4">Tuesday</th>
                <th class="column100 column5" data-column="column5">Wednesday</th>
                <th class="column100 column6" data-column="column6">Thursday</th>
                <th class="column100 column7" data-column="column7">Friday</th>
                <th class="column100 column8" data-column="column8">Saturday</th>
                  <th class="column100 column2" data-column="column2">Sunday</th>
              </tr>
            </thead>
          </table>
          <div class="scroll">
            <table data-vertable="ver1" >
            <tbody>
              <?php
                for ($i = 0; $i < 7; $i++) {
                  for ($j = 0; $j < 24; $j++) {
                    ?>
                      <tr class="row100">
                        <td class="column100 column1" data-column="column1"><?php echo ($time) ?></td>
                        <td class="column100 column2" data-column="column2"><?php echo ($monday) ?></td>
                        <td class="column100 column3" data-column="column3"><?php echo ($tuesday) ?></td>
                        <td class="column100 column4" data-column="column4"><?php echo ($wednesday) ?></td>
                        <td class="column100 column5" data-column="column5"><?php echo ($thursday) ?></td>
                        <td class="column100 column6" data-column="column6"><?php echo ($friday) ?></td>
                        <td class="column100 column7" data-column="column7"><?php echo ($saturday) ?></td>
                        <td class="column100 column8" data-column="column8"><?php echo ($sunday) ?></td>
                      </tr>
                <?php
                    }
                 }
                 ?>
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</body>
</html>