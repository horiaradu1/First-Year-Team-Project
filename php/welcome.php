

<?php
include("session.php");
$sql = "SELECT EventID FROM HasEvent WHERE Username = $login_session";
$result = mysqli_query($db,$sql);
// soz for language
$myFuckingAwesomeArray = array();
$index = 0;

while($row = mysqli_fetch_assoc($result)){
  $myFuckingAwesomeArray[$index] = $row;
  $index++
}

echo $row[0]["EventsID"]

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
          <tbody>
              <!--Use a while loop to make a table row for every DB row-->
              <?php while( $row = $sql->fetch()) : ?>
              <tr>
                  <!--Each table column is echoed in to a td cell-->
                  <td><?php echo $row['EventID']; ?></td>
              </tr>
              <?php endwhile ?>
          </tbody>
      </table>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
