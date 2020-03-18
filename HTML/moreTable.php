<!--All of the HTML and css files were created using templates from colorlib, namely:
    Login Form v2 - https://colorlib.com/wp/template/login-form-v2/
    Contact Form v9 - https://colorlib.com/wp/template/contact-form-v9/-->
<?php error_reporting(E_ERROR); ?>
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
include("session.php"); ?>
<body>
  <div class="limiter">
    <div class="navbar">
      <div class = "picture">
      <a href="moreTable.php">Home</a>
    </div>
    <div class = "picture">
      <a href="meet.php">Meeting</a>
    </div>
    <div class = "date">
      <a>
      <?php
          try {
            $week = $_GET['week'];
          } catch (Exception $e) {}
          $sMonth = date('F',time()+( 1+(7*$week) - date('w'))*24*3600);
          $eMonth = date('F',time()+( 7+(7*$week) - date('w'))*24*3600);
          $sDay = date('d',time()+( 1+(7*$week) - date('w'))*24*3600); //date('d');
          $eDay = date('d',time()+( 7+(7*$week) - date('w'))*24*3600);

          $thisWeek = ($sDay . " " . $sMonth . " - " . $eDay . " " . $eMonth);
          echo $thisWeek;
        ?>

      </a>
    </div>
  <div class="text100">
        <a href = "logout.php">Sign Out</a>
    </div>
    <div class="text100">
        <a><?php echo($login_session) ?></a>
    </div>
    <div class="text100">
      <a href="ContactForm.php">Contact Us</a>
    </div>
    <div class="text100">
      <a href="AboutUs.php">About Us</a>
    </div>
    <div class="text100">
      <a href="invites.php">Inbox</a>
    </div>
    </div>
    <div class="container-table100">
      <!-- <div class="week"> -->
        <?php

          // try {
          //   $week = $_GET['week'];
          // } catch (Exception $e) {}
          // $sMonth = date('F',time()+( 1+(7*$week) - date('w'))*24*3600);
          // $eMonth = date('F',time()+( 7+(7*$week) - date('w'))*24*3600);
          // $sDay = date('d',time()+( 1+(7*$week) - date('w'))*24*3600); //date('d');
          // $eDay = date('d',time()+( 7+(7*$week) - date('w'))*24*3600);

          // $thisWeek = ($sDay . " " . $sMonth . " - " . $eDay . " " . $eMonth);
          // echo $thisWeek;
        ?>
      <!-- </div> -->
      <div class="logo">
        <img src = "Logo.png">
      </div>
      <div class="btn-container" align="left">
				<div class="btn1">
				<button <button onclick="window.location.href = '/g34904ps/team/HTML/addEvent.php';"class="btn">CREATE EVENT</button>
			</div>
			<div class="btn2">
				<button onclick="window.location.href = '/g34904ps/team/HTML/meet.php';" class="btn">CREATE MEETING</button>
			</div>
      <div class="btn3">
        <button onclick="window.location.href = '/g34904ps/team/HTML/addCourses.php';" class="btn">ADD COURSE</button>
      </div>
			</div>
      <div class="before">
      <a href="/g34904ps/team/HTML/moreTable.php?week=<?php $week -= 1; echo $week; ?>" class="previous round">&#8249;</a>
    </div>
    <div class="after">
      <a href="/g34904ps/team/HTML/moreTable.php?week=<?php $week += 2; echo $week; ?> " class="previous round">&#8250;</a>
    </div>
      <div class="wrap-table100">
        <div class="table100 ver1 m-b-110">
          <table data-vertable="ver1.1">
            <thead>
              <tr class="row100 head">
                <th class="column100 column1" data-column="column1"><?php //echo $thisWeek; ?></th>
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

//--------------------------------------------------------------------------------------------
//Display Timetable of $username

              function hours_between($date1, $date2) {
                $date1 = strtotime($date1);
                $date2 = strtotime($date2);
                $diff = $date2 - $date1;
                $hoursBetween = $diff/3600;
                return $hoursBetween;
              }

                $servername = "dbhost.cs.man.ac.uk";
                $username = "g63968ef";
                $password = "database";
                $dbname = "2019_comp10120_y4";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);}

                //$monday = date('Y-m-d 00:00:00',time()+( 1+(7*$week) - date('w'))*24*3600);
                //echo("Monday is " . $monday);
                //OLD SCRIPT FOR MONDAY, KEEP HERE FOR BUG FIX

                $monday = date('Y-m-d 00:00:00',time()+( 1+(7*$week) - date('w')-7)*24*3600);
                //echo("Monday is " . $monday);

                //$username = "horia"; // CHANGE USERNAME BASED ON WHO IS LOGGED IN

                $username = $login_session;

                for ($i = 0; $i < 24; $i++) {
                     $m = $i+1;
                     ?>
                  <tr class="row100">
                        <td class="column100 column1" data-column="column1"><?php echo ("$i:00 - $m:00") ?></td>
                  <?php
                    for ($j = 0; $j < 7; $j++) {
                      $event = NULL;
                      $conflict = false;
                      $listOfEventIDs = array();
                      $listOfCourses = array();
                      $listOfLabs = array();
                      $classStyle = "column100 column2"; //BASIC STYLE FOR EMPTY BOXES

                      $result1 = $conn->query("SELECT eventID FROM HasEvent WHERE username = '" . $username . "';");
                      foreach($result1->fetch_all(MYSQLI_ASSOC) as $row) {
                        array_push($listOfEventIDs, $row["eventID"]);
                        }

                      $result2 = $conn->query("SELECT course, lab FROM HasCourse WHERE username = '" . $username . "';");
                      foreach($result2->fetch_all(MYSQLI_ASSOC) as $row) {
                        array_push($listOfCourses, $row["course"]);
                        array_push($listOfLabs, $row["lab"]);
                        }

                      foreach($listOfCourses as $ids) {
                          foreach($listOfLabs as $lab) {
                            $sqlQuery2 = ("SELECT startTime, endTime, name, description FROM CourseEvents WHERE name = '" . $ids . "' AND  lab = '" . $lab ."';");
                            $fetchedEvent2 = $conn->query($sqlQuery2);
                          }

                          foreach($fetchedEvent2->fetch_all(MYSQLI_ASSOC) as $row) {
                            $timeTillEventStart = hours_between($monday, $row["startTime"]);
                            $timeTillEventHoursStart = $timeTillEventStart%24;
                            $timeTillEventDaysStart = $timeTillEventStart/24;
                            $timeTillEventHoursStart = (int)$timeTillEventHoursStart;
                            $timeTillEventDaysStart = (int)$timeTillEventDaysStart;
                            $timeTillEventEnd = hours_between($monday, $row["endTime"]);
                            $timeTillEventHoursEnd = $timeTillEventEnd%24;
                            $timeTillEventDaysEnd = $timeTillEventEnd/24;
                            $timeTillEventHoursEnd = (int)$timeTillEventHoursEnd;
                            $timeTillEventDaysEnd = (int)$timeTillEventDaysEnd;

                          if ($timeTillEventHoursStart <= $i && $timeTillEventDaysStart <= $j && $timeTillEventHoursEnd > $i && $timeTillEventDaysEnd >= $j){
                            //$event = "$event" . $row["name"] . "\n (" . $row["description"] . ")";
                            if ($event == NULL){
                              $event = $row["name"] . "\n (" . $row["description"] . ") ";
                            }
                            else {
                              $event = "$event and" . $row["name"] . "\n (" . $row["description"] . ") ";
                              $conflict = true;
                            }
                            if ($row["name"] == "COMP11120"){
                              $classStyle = "column100 green";
                            }elseif ($row["name"] == "COMP11212"){
                              $classStyle = "column100 red";
                            }elseif ($row["name"] == "COMP13212"){
                              $classStyle = "column100 blue";
                            }elseif ($row["name"] == "COMP15212"){
                              $classStyle = "column100 pink";
                            }elseif ($row["name"] == "COMP16412"){
                              $classStyle = "column100 purple";
                            }elseif ($row["name"] == "COMP1PASS"){
                              $classStyle = "column100 orange";
                            }elseif ($row["name"] == "COMP10120"){
                              $classStyle = "column100 bluegreen";
                            }else $classStyle = "column100 darkblue";
                            //CHANGE COLOURS HERE IF YOU WANT
                            //MAYBE INSERT POPUP WITH EVENT DESCRIPTION AND TIME
                            }
                          }
                        }
                      

                      foreach($listOfEventIDs as $ids) {
                        $sqlQuery1 = "SELECT startTime, endTime, name FROM Events WHERE eventID = " . $ids;
                        $fetchedEvent1 = $conn->query($sqlQuery1);
                        foreach($fetchedEvent1->fetch_all(MYSQLI_ASSOC) as $row) {
                          $timeTillEventStart = hours_between($monday, $row["startTime"]);
                          $timeTillEventHoursStart = $timeTillEventStart%24;
                          $timeTillEventDaysStart = $timeTillEventStart/24;
                          $timeTillEventHoursStart = (int)$timeTillEventHoursStart;
                          $timeTillEventDaysStart = (int)$timeTillEventDaysStart;
                          $timeTillEventEnd = hours_between($monday, $row["endTime"]);
                          $timeTillEventHoursEnd = $timeTillEventEnd%24;
                          $timeTillEventDaysEnd = $timeTillEventEnd/24;
                          $timeTillEventHoursEnd = (int)$timeTillEventHoursEnd;
                          $timeTillEventDaysEnd = (int)$timeTillEventDaysEnd;

                          if ($timeTillEventHoursStart <= $i && $timeTillEventDaysStart <= $j && $timeTillEventHoursEnd > $i && $timeTillEventDaysEnd >= $j){
                            //NEED TO IMPLEMENT A LONGER THAN A DAY EVENT
                            //WITH THE EVENT START AND END IN IF STATEMENT
                            if ($event == NULL){
                              $event = $row["name"];
                            }
                            else {
                              $event = "$event and " . $row["name"] . " ";
                              $conflict = true;
                            }
                            $colorIndex = $ids%5;
                            $listOfColors = array("gray", "lightblue", "lightgreen", "lightsalmon", "gold");
                            echo $listOfColors[$colorIndex];
                            $classStyle = "column100 " . $listOfColors[$colorIndex];//CHANGE COLOR OF ARBITRARY EVENT IF YOU WANT
                            }
                          }
                        }

                        if ($conflict == true){
                          $event = "$event " . " (CONFLICT)";
                          $conflict = false;
                        }
                    ?>

                    <?php
                    if ($j == 0) {
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column2"><?php echo ($event) ?></td>
                    <?php
                    }elseif ($j == 1){
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column3"><?php echo ($event) ?></td>
                    <?php
                    }elseif ($j == 2){
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column4"><?php echo ($event) ?></td>
                    <?php
                    }elseif ($j == 3){
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column5"><?php echo ($event) ?></td>
                    <?php
                    }elseif ($j == 4){
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column6"><?php echo ($event) ?></td>
                    <?php
                    }elseif ($j == 5){
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column7"><?php echo ($event) ?></td>
                    <?php
                    }elseif ($j == 6){
                    ?>
                          <td class="<?php echo $classStyle ?>" data-column="column8"><?php echo ($event) ?></td>
                    <?php } ?>

                <?php } ?>
                    </tr>
                <?php }

//----------------------------------------------------------------------------------

                ?>
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
