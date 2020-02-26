

<?php
include("session.php");
$sql = "SELECT EventID FROM HasEvent WHERE Username = $login_session";
$result = mysqli_query($db,$sql);
$data_array = array();

while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
  array_push($data_array, $row);
}

$len=count($data_array);
for ($i=0;$i<$len;$i++)
   echo $data_array[$i];
?>
<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <p id = "Events">I will display your events here.</p>
      <button type = "button"
      onclick='document.getElementById("Events").innerHTML =
      "Your events are: "'>Click to display events!
      </button>
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
