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

<!DOCTYPE html>
<html lan="en">
<html>
  <head>
  <meta charset = "UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="moreTable.css">
  <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
    type = "image/x-icon">
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
  <!-- NAV BAR -->
  <div class="limiter">
    <div class="navbar">
      <div class = "picture">
      <a href="moreTable.php">Home</a>
    </div>
    <div class = "picture">
      <a href="meet.php">Meeting</a>
    </div>
    <div class="text100">
        <a href = "logout.php">Sign Out</a>
    </div>
    <div class="text100">
      <a href="ContactForm.php">Contact Us</a>
    </div>
    <div class="text100">
      <a href="AboutUs.php">About Us</a>
    </div>
    <!-- Welcomes the user, using it's username. -->
    <div class="text100">
      <a> Welcome <?php echo $login_session; ?></a>
    </div>

    <div class="container-table100">
      <div class="wrap-login100">
				<div class="put-it-here-to-include-padding">
            <b>Course Selector</b>
        </div>

        


        <div class="container-login100-form-btn">
          <div class="wrap-login100-form-btn">
            <div class="login100-form-bgbtn"></div>
            <!-- button which sends selected course and lab events to data base -->
            <button name="submit">Click to add to your timetable</button>
          </div>
        </div>
      </div>
    </div>
  </div>  


      



     
      

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

   </body>

</html>
