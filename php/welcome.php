<?php
include("session.php");

// responsible for adding the courses from course selector
if (isset($_POST["submit"])) {

  $course = mysqli_real_escape_string($db, $_POST["new_course"]);

  $lab = mysqli_real_escape_string($db, $_POST["new_lab"]);

  //var_dump($_POST["new_course"]);
  $sqlAddCourse = "INSERT INTO HasCourse (username, course, lab)
VALUES ($login_session, '$course', '$lab');";

mysqli_query($db, $sqlAddCourse);
}


// ----------------TIMETABLE INFORMATION: ------------------

// ---------------ALL EVENTS AND COURSES----------------
// This part of code requests all events
$sqlGetEvents = "SELECT * FROM Events
    WHERE EventID in
  (SELECT EventID FROM HasEvent WHERE Username = $login_session)";

// saving the result of the query (actual information) into a variable
$resultEvents = mysqli_query($db, $sqlGetEvents);

// Selecting all COURSES.
$sqlGetCoursesEvents="SELECT * FROM CourseEvents
  WHERE Name in
  (SELECT course FROM HasCourse WHERE Username = $login_session)";

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
$sqlGetCourses = "SELECT DISTINCT Name  FROM CourseEvents";
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


<html>
   <head>
      <!-- include jquery in this document -->
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

      <title>Welcome </title>
      <style>
        .hidden {
          display: none;
        }
      </style>
   </head>

   <body>
       <!-- Welcomes the user, using it's username! -->
      <h1>Welcome <?php echo $login_session; ?></h1>

      <p id = "demo">Heyo! Welcome to our page.</p>

      <!-- Button which hides or unhides users timetable values -->
<button onclick="myFunction()">Click to display/hide events</button>

      <table id="timetable" class="hidden">

        <!-- For loop to select description from event/. -->
        <?php foreach ($data_array as $val) { ?>
          <tr>
            <td><?php
            echo $val["Name"];
            echo ": ";
            echo $val["Description"];
            echo "\n\t";
      // as you can see we could get any information when needed
            // echo "Starts at: ";
            // echo $val ["StartTime"];
            // echo "\n";
            // echo "Ends at: ";
            // echo $val ["EndTime"];
             ?></td>
          </tr>
        <?php } ?>
      </table>

      <br>
      <br>
            <p><b>Course selector<b></p>

      <!-- input from the selection boxes below, sent by POST -->
      <form method=POST>

        <!-- selection box for all courses -->
      <select id = "sel" name="new_course">
        <option>Select course</option>
        <?php foreach ($courses_array as $val) { ?>
            <option id = "dropdown" value="
            <?php echo $val["Name"]; ?>">
            <?php echo $val["Name"]; ?>
          </option>
        <?php } ?>

      </select>



      <select id = "sel2" name="new_lab">
        <option>Select your lab</option>
        <?php foreach ($lab_array as $val) { ?>
            <option id = "dropdown2" value="
            <?php echo $val["lab"]; ?>">
            <?php echo $val["lab"]; ?>
            </option>
        <?php } ?>

      </select>
      <!-- button which sends selected course and lab events to data base -->
      <button name="submit">Click to add to your timetable</button>
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
      <br>
      <a href = "logout.php">Sign Out</a>
   </body>

</html>
