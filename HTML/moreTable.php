<!DOCTYPE html>
<html lan="en">
<head>
  <title>TIMEonTABLE - Timetable</title>
  <meta charset = "UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="moreTable.css">
  <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
    type = "image/x-icon">
</head>
<?php
include("php/session.php"); ?>
<body>
  <div class="limiter">
    <div class="navbar">
      <div class = "picture">
      <a href="moreTable.php">Home</a>
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
        <?php
          $sMonth = date('F',time()+( 1 - date('w'))*24*3600);
          $eMonth = date('F',time()+( 7 - date('w'))*24*3600);
          $sDay = date('d',time()+( 1 - date('w'))*24*3600); //date('d');
          $eDay = date('d',time()+( 7 - date('w'))*24*3600);

          echo ($sDay . " " . $sMonth . " - " . $eDay . " " . $eMonth);
        ?>
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
              <tr class="row100">
                <td class="column100 column1" data-column="column1">7:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">8:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">9:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 yellow" data-column="column3">COMP16412</td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">10:00</td>
                <td class="column100 green" data-column="column2">COMP11212</td>
                <td class="column100 pink" data-column="column3">COMP13212</td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 darkblue" data-column="column8">Volleyball</td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">11:00</td>
                <td class="column100 red" data-column="column2">COMP11120</td>
                <td class="column100 green" data-column="column3">COMP11212</td>
                <td class="column100 green" data-column="column4">COMP11212</td>
                <td class="column100 red" data-column="column5">COMP11120</td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">12:00</td>
                <td class="column100 purple" data-column="column2">COMP10120</td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 pink" data-column="column5">COMP13212</td>
                <td class="column100 blue" data-column="column6">COMP1TUT</td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">13:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 yellow" data-column="column3">COMP16412</td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 red" data-column="column6">COMP11120</td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">14:00</td>
                <td class="column100 yellow" data-column="column2">COMP16412</td>
                <td class="column100 yellow" data-column="column3">COMP16412</td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 orange" data-column="column5">COMP15212</td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">15:00</td>
                <td class="column100 yellow" data-column="column2">COMP16412</td>
                <td class="column100 purple" data-column="column3">COMP10120</td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 bluegreen" data-column="column7">Chinese</td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">16:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 orange" data-column="column3">COMP15212</td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 pink" data-column="column5">COMP13212</td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">17:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 pink" data-column="column5">COMP13212</td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">18:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">19:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">20:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>

              <tr class="row100">
                <td class="column100 column1" data-column="column1">21:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">22:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">23:00</td>
                <td class="column100 column2" data-column="column2"></td>
                <td class="column100 column3" data-column="column3"></td>
                <td class="column100 column4" data-column="column4"></td>
                <td class="column100 column5" data-column="column5"></td>
                <td class="column100 column6" data-column="column6"></td>
                <td class="column100 column7" data-column="column7"></td>
                <td class="column100 column8" data-column="column8"></td>
              </tr>
              <!-- <tr class="row100">
                <td class="column100 column1" data-column="column1">00:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">01:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">02:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">03:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">04:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">05:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr>
              <tr class="row100">
                <td class="column100 column1" data-column="column1">06:00</td>
                <td class="column100 column2" data-column="column2">8:00 AM</td>
                <td class="column100 column3" data-column="column3">--</td>
                <td class="column100 column4" data-column="column4">--</td>
                <td class="column100 column5" data-column="column5">8:00 AM</td>
                <td class="column100 column6" data-column="column6">--</td>
                <td class="column100 column7" data-column="column7">5:00 PM</td>
                <td class="column100 column8" data-column="column8">8:00 AM</td>
              </tr> -->
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
