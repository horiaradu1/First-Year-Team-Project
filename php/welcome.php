<?php
include("session.php");

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
            echo "Starts at: ";
            echo $val ["StartTime"];
            echo "\n";
            echo "Ends at: ";
            echo $val ["EndtTime"]; ?></td>
          </tr>
        <?php } ?>
      </table>

      <br>
      <br>
            <p><b>Course selector<b></p>

      <select id = "sel">

        <?php foreach ($courses_array as $val) { ?>
            <option><?php echo $val["course"]; ?></option>
        <?php } ?>

      </select><button onclick="myFunction()">Click to add to your timetable</button>

      <script>
      // turn it to json and encode from json
      var b = JSON.parse('<?php echo json_encode($data_array); ?>');
      console.log(b);
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

      // $("p").hide()
      // $(function() {
      //     var data = [
      //         {
      //         "id": "1",
      //         "name": "test1"},
      //     {
      //         "id": "2",
      //         "name": "test2"}
      //     ];
      //     $.each(data, function(i, option) {
      //         $('#sel').append($('<option/>').attr("value", option.id).text(option.name));
      //     });
      // })

      </script>

      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
