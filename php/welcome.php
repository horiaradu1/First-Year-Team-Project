<?php
   include('session.php');
   include("config.php");

      if($_SERVER["REQUEST_METHOD"] == "POST") {

         $myusername = mysqli_real_escape_string($db,$_POST['username']);

         $sql = "SELECT * FROM Users WHERE Username = '$myusername'";
         $result = mysqli_query($db,$sql);
         $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

         if (!password_verify($_POST['password'], $row['Hash'])) {
           header("location: login_wrong.php");
         }

         // If result matched $myusername and $mypassword, table row must be 1 row
         else{
            echo "loged in";
            $_SESSION['login_user'] = $myusername;

            header("location: welcome.php");
          }
    }
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
