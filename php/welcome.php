<?php
include("session.php");



// responsible for adding the courses from course selector
if (isset($_POST["submit"])) {

  $course = mysqli_real_escape_string($db, $_POST["new_course"]);

  $lab = mysqli_real_escape_string($db, $_POST["new_lab"]);

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
  WHERE course in
  (SELECT course FROM HasCourse WHERE Username = $login_session)";

// saving the result of that query to a variable
$resultCoursesEvents = mysqli_query($db, $sqlGetCoursesEvents);

// creating array data types in php.
$events_array = array();
$data_array = array();


// looping through the information saved in variables created above
// to save it into the arrays. Sort of "append" in python.
while($row = mysqli_fetch_array($resultEvents, MYSQLI_ASSOC)){
  array_push($events_array, $row);
}
while($x = mysqli_fetch_array($resultCoursesEvents, MYSQLI_ASSOC)){
  array_push($data_array, $x);
}



// ----------------COURSES------------------
// Selecting all different courses, save the result to an array (like above)
$sqlGetCourses = "SELECT DISTINCT course  FROM CourseEvents";
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
  /* hides the events from users, so they arent displayed ( a lot of them ) */
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
        <?php foreach ($events_array as $val) { ?>
          <tr>
            <td><?php
            echo $val["Name"];
            echo ": ";
            echo $val["Description"];
            echo "\n";
      // as you can see we could get any information when needed

            // echo "Starts at: ";
            // echo $val ["StartTime"];
            // echo "\n";
            // echo "Ends at: ";
            // echo $val ["EndTime"];

             ?></td>
          </tr>
        <?php } ?>
        <?php foreach ($data_array as $val) { ?>
          <tr>
            <td><?php
            echo $val["course"];
            echo ": ";
            echo $val["description"];
            echo "\n";
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
              <?php echo $val["course"]; ?>">
              <?php echo $val["course"]; ?></option>
        <?php } ?>
      </select>

      <!-- selection box for labsp -->
      <select id = "sel2" name="new_lab">
        <option>Select lab</option>
        <?php foreach ($lab_array as $val) { ?>
            <option id = "dropdown2" value="
            <?php echo $val["lab"]; ?>">
            <?php echo $val["lab"]; ?></option>
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
              var ddl2 = document.getElementById("dropdown2");
              var selectedValue2 = ddl2.options[ddl2.selectedIndex].value;


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

      <p><b> Date and time </b></p>
      <br>

      Date: <input type="text" id="date" size="100"
                  value="Sunday, July 30th in the Year 1967 CE" /><br/>
      Time: <input type="text" id="time" value="12:12" />
      <br>
      <br>
      <a href = "logout.php">Sign Out</a>
   </body>

</html>
