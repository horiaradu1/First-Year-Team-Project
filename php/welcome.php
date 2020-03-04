<?php
include("session.php");

if (isset($_POST["submit"])) {
  $course = mysqli_real_escape_string($db, $_POST["new_course"]);
  $lab = mysqli_real_escape_string($db, $_POST["new_lab"]);
  //var_dump($_POST["new_course"]);
  $sqlAddCourse = "INSERT INTO HasCourse (username, course, lab)
VALUES ($login_session, '$course', '$lab');";
}

// This part of code requests all events the user has.
$sqlGetEvents = "SELECT * FROM Events WHERE EventID in
  (SELECT EventID FROM HasEvent WHERE Username = $login_session)";
$resultEvents = mysqli_query($db, $sqlGetEvents);

// create an array
$data_array = array();

while($row = mysqli_fetch_array($resultEvents, MYSQLI_ASSOC)){
  array_push($data_array, $row);
}

// This part of code is responsible for selecting all possible courses
$sqlGetCourses = "SELECT DISTINCT course  FROM CourseEvents";
$resultCourses = mysqli_query($db, $sqlGetCourses);
$courses_array = array();

while($c = mysqli_fetch_array($resultCourses, MYSQLI_ASSOC)){
  array_push($courses_array, $c);
}

 // echo '<pre>';
 // print_r($courses_array);
 // echo '</pre>';


 // This part of code is responsible for selecting all possible courses
 $sqlGetLab = "SELECT DISTINCT lab  FROM CourseEvents";
 $resulLab = mysqli_query($db, $sqlGetLab);
 $lab_array = array();

 while($c = mysqli_fetch_array($resultLab, MYSQLI_ASSOC)){
   array_push($lab_array, $c);
 }


?>
<html>
   <head>
     <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

      <title>Welcome </title>
      <style>
        .hidden {
          display: none;
        }
      </style>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <p id = "demo">Heyo! Welcome to our page.</p>
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
      <form method=POST>
      <select id = "sel" name="new_course">
        <option>Select course</option>
        <?php foreach ($courses_array as $val) { ?>
            <option id = "dropdown" value="<?php echo $val["course"]; ?>"><?php echo $val["course"]; ?></option>
        <?php } ?>

      </select>
      <select id = "sel2" name="new_lab">
        <option>Select course</option>
        <?php foreach ($lab_array as $val) { ?>
            <option id = "dropdown2" value="<?php echo $val["lab"]; ?>"><?php echo $val["lab"]; ?></option>
        <?php } ?>

      </select>
      <button name="submit">Click to add to your timetable</button>
    </form>

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
