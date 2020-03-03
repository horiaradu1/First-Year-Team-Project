

<?php
include("session.php");
//$sqlGetID = "SELECT EventID FROM HasEvent WHERE Username = $login_session";
//$resultID = mysqli_query($db,$sqlGetID);
$sqlGetEvents = "SELECT * FROM Events WHERE EventID in (SELECT EventID FROM HasEvent WHERE Username = $login_session)";
$resultEvents = mysqli_query($db, $sqlGetEvents);

$data_array = array();

while($row = mysqli_fetch_array($resultEvents, MYSQLI_ASSOC)){
  array_push($data_array, $row);
}

echo '<pre>';
print_r($data_array);
echo '</pre>';

?>
<html>

   <head>
      <title>Welcome </title>
      <style>
        .hidden {
          display: none;
        }
      </style>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <p id = "demo">Heyo, welcome to our page.</p>
      <table id="timetable" class="hidden">

        <!-- For loop to select description from event/. -->
        <?php foreach ($data_array as $val) { ?>
          <tr>
            <td><?php echo $val["Description"]; ?></td>

          </tr>
        <?php } ?>
      </table>
      <button onclick="myFunction()">Click to display events</button>

      <script>
      // turn it to json and encode from json
      var b = JSON.parse('<?php echo json_encode($data_array); ?>');
      console.log(b);
      function myFunction() {
        document.getElementById("timetable").classList.remove("hidden");
        //document.getElementById("demo").innerHTML = b;
      }
      </script>
      <table>
          <thead>
              <tr>
                  <th>Event ID</th>
              </tr>
          </thead>
      </table>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
