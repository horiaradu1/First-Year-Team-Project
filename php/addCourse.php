<?php
include("session.php");

// responsible for adding the courses from course selector
if (isset($_POST["submit"])) {

echo "SENDING!!!!!!!!!";
  // $course = mysqli_real_escape_string($db, $_POST["new_course"]);

  $course = $_POST["new_course"];
  $lab = $_POST["new_lab"];

  echo $courses;

  echo $lab;


  // $lab = mysqli_real_escape_string($db, $_POST["new_lab"]);

  //var_dump($_POST["new_course"]);
  $sqlAddCourse = "INSERT INTO HasCourse (username, course, lab)
    VALUES ($login_session, $course, $lab);";

mysqli_query($db, $sqlAddCourse);
}
else
{
  echo "NOT SENDING!";
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
