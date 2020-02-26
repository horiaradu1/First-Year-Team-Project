

<?php
include("session.php");
$sql = "SELECT EventID FROM HasEvent WHERE Username = $login_session";
$result = mysqli_query($db,$sql);
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
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
