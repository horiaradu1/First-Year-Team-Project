<?php
include("session.php");
// responsible for adding the courses from course selector
if (isset($_POST["submit"])) {

  // $course = mysqli_real_escape_string($db, $_POST["new_course"]);
  $course = $_POST["new_course"];
  $lab = $_POST["new_lab"];
  // echo $course;
  //
  // echo $lab;
  // $lab = mysqli_real_escape_string($db, $_POST["new_lab"]);
  //var_dump($_POST["new_course"]);
  $sqlAddCourse = "INSERT INTO HasCourse (username, course, lab)
    VALUES (\"$login_session\", \"$course\", \"$lab\");";

    // echo $sqlAddCourse;

    $db->query($sqlAddCourse);
    // echo $db->error;
}

// ----------------TIMETABLE INFORMATION: ------------------

// ---------------ALL EVENTS AND COURSES----------------
// This part of code requests all events
$sqlGetEvents = "SELECT * FROM Events
    WHERE eventID in
  (SELECT eventID FROM HasEvent WHERE username = \"$login_session\")";

// saving the result of the query (actual information) into a variable
$resultEvents = mysqli_query($db, $sqlGetEvents);

// Selecting all COURSES.
$sqlGetCoursesEvents="SELECT * FROM CourseEvents
  WHERE name in
  (SELECT course FROM HasCourse WHERE username = \"$login_session\")";

  // saving the result of that query to a variable
$resultCoursesEvents = mysqli_query($db, $sqlGetCoursesEvents);

// creating array data types in php.
$data_array = array();

while($row = mysqli_fetch_array($resultEvents, MYSQLI_ASSOC)){
  array_push($data_array, $row);
}
while($x = mysqli_fetch_array($resultCoursesEvents, MYSQLI_ASSOC)){
  array_push($data_array, $x);
}

// ----------------COURSES------------------
// Selecting all different courses, save the result to an array (like above)
$sqlGetCourses = "SELECT DISTINCT name  FROM CourseEvents";
$resultCourses = mysqli_query($db, $sqlGetCourses);
$courses_array = array();

while($c = mysqli_fetch_array($resultCourses, MYSQLI_ASSOC)){
  array_push($courses_array, $c);
}

 // if you want to check the prevwie of the array in a nicely formated way
 // echo '<pre>';
 // print_r($courses_array);
 // echo '</pre>';

 // ----------------LABS------------------
  // Like above, but for LABS not courses.
 $sqlGetLab = "SELECT DISTINCT lab  FROM CourseEvents";
 $resultLab = mysqli_query($db, $sqlGetLab);
 $lab_array = array();

 while($c = mysqli_fetch_array($resultLab, MYSQLI_ASSOC)){
   array_push($lab_array, $c);
 }

// ------------ END OF PHP ----------------
?>

<!--All of the HTML and css files were created using templates from colorlib, namely:
    Login Form v2 - https://colorlib.com/wp/template/login-form-v2/
    Contact Form v9 - https://colorlib.com/wp/template/contact-form-v9/-->
<?php error_reporting(E_ERROR); ?>

<!--  ------------------ADDEVENT.php -->
<?php
include("session.php");

// responsible for adding the event
if (isset($_POST["submit"])) {

  $name=$_POST["name"];
  $description=$_POST["description"];
  $startDate=$_POST["startDate"];
  $startTime=$_POST["startTime"];
  $endDate=$_POST["endDate"];
  $endTime=$_POST["endTime"];

  $space = " ";
  $start = $startDate.$space.$startTime;
  $end = $endDate.$space.$endTime;

  $sqlAddEvent= "INSERT INTO Events (startTime, endTime, name, description)
    VALUES (\"$start\", \"$end\", \"$name\", \"$description\");";

    //echo $sqlAddEvent;

    $db->query($sqlAddEvent);
    echo $db->error;


    $sqlAssign = "INSERT into HasEvent (username, eventID)
    VALUES(\"$login_session\", (SELECT MAX(eventID) FROM Events) )";


    $db->query($sqlAssign);
    echo $db->error;
}
?>


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

  <!-- add from addEvent -->
  <!-- timepicker -->
  <script async="" src="https://www.google-analytics.com/analytics.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script type="text/javascript" src="jquery-timepicker/jquery.timepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery-timepicker/jquery.timepicker.css">

  <!-- date picker -->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script>
  $( function() {
    $( "#startDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
    $( "#endDate" ).datepicker({ dateFormat: 'yy-mm-dd' });
  } );
  </script>
</head>

<?php
include("session.php"); 
$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$conn = new mysqli($servername, $username, $password, $dbname);
$sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
$fetchedInvite = $conn->query($sqlQuery);
?>

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
      <a href="invites.php">Inbox(<?php if ($fetchedInvite->num_rows < 10) {echo $fetchedInvite->num_rows;} else {echo "+9";} ?>)</a>
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

      <!-- LHS Button -->
      <div class="btn-container" ,align="left">
        <div class="btn1">
          <a href="#popup1">CREATE COURSE</a>
			  </div>
				<div class="btn1">
          <a href="#popup2">CREATE EVENT</a>
			  </div>
			</div>

      <!-- POPUP1_Create Course-->
      <div id="popup1" class="overlay">
        <div class="popup1 form1" style= "height: 520px;">
          <form method=POST>
            <!-- selection box for all courses -->
            <h1><b>Course Selector</b></h1>
            <a class="close" href="#">&times;</a>
            <!-- Selector 1: -->
            <div><label for="sel">Course: </label><br></div>
            <div class="custom-select">
              <select id = "sel" name="new_course">
                <option selected>Select course</option>
                <?php foreach ($courses_array as $val) { ?>
                    <option id = "dropdown" value="<?php echo $val["name"]; ?>">
                    <?php echo $val["name"]; ?>
                  </option>
                <?php } ?>
              </select>
            </div>
            <!-- Selector 2: -->
            <div><label for="sel2">Lab Session: </label><br></div>
            <div class="custom-select">
              <select id = "sel2" name="new_lab">
                <option>Select your lab</option>
                <?php foreach ($lab_array as $val) { ?>
                <option id = "dropdown2" value="<?php echo $val["lab"]; ?>">
                <?php echo $val["lab"]; ?>
                </option>
                <?php } ?>
              </select>
            </div>
            <!-- button which sends selected course and lab events to data base -->
            <button name="submit">Submit</button>
          </form>

          <!-- JavaScript  -->
          <script>
          function addEvent(){
                  var ddl = document.getElementById("dropdown");
                  var selectedValue = ddl.options[ddl.selectedIndex].value;
            if (selectedValue == "Select course")
            {
            alert("Please select a card type");
            }
            else{
            }
          }
          // turn it to json and encode from json
          var b = JSON.parse('<?php echo json_encode($data_array); ?>');
          // displaying/hiding events
          var myBool = true;
          function myFunction() {
            if(myBool){
            document.getElementById("timetable").classList.remove("hidden");
            myBool = false;
            }
            else{
              document.getElementById("timetable").classList.add("hidden");
              myBool = true;
            }
          }
          </script>
        </div>
      </div> 
    
      <!-- POPUP2_Create Event -->
      <div id="popup2" class="overlay">
        <div class="popup2 form2" style= "height: 660px;">
          <!-- selection box for all courses -->
          <h1><b>Add Event</b></h1>
          <a class="close" href="#">&times;</a>

          <form method=POST>
            <!-- NAME input box-->
            <input type="text" placeholder="NAME" id = "name" name="name"/>
            <!-- DESCRIPTION input box-->
            <input type="text" placeholder="DESCRIPTION" id = "desc" name="description"/>

            <!-- Start datepicker input box-->
            <p style="font-size:18px;">From: 
              <input type="text" name="startDate" id="startDate" placeholder="START DATE">
              <input type="text" name="startTime" id="startTime" placeholder="START TIME" class="time ui-timepicker-input" autocomplete="off"/>
            </p>
            
            <!-- function to assign this timepicker, and change the format to a desired one -->
            <script>
            $(function() {
              $('#startTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60 });
            });
            </script>
            <!-- End datepicker window box -->
            <p style="font-size:18px;">To: 
              <input type="text" name="endDate" id="endDate" placeholder="END DATE">
              <input type="text" name="endTime" id="endTime" placeholder="END TIME" class="time ui-timepicker-input" autocomplete="off"/>
            </p>
            <!-- the function -->
            <script>
            $(function() {
              $('#endTime').timepicker({ 'timeFormat': 'H:i:s', 'scrollDefault': 'now', 'step' : 60});
            });
            </script>

            <!-- Button to submit -->
            <button name="submit">Submit</button>
          </form>
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
                            $listOfColors = array("MediumSeaGreen", "lightblue", "lightgreen", "lightsalmon", "gold"); // ADD COLORS HERE WITH CORROLATING CSS VALUE
                            $colorIndex = $ids%count($listOfColors);
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
