<?php
   include("config.php");
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form
      $error = "";

      $myusername = mysqli_real_escape_string($db,$_POST['username']);

      $sql = "SELECT * FROM Users WHERE Username = '$myusername'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

      if (!password_verify($_POST['password'], $row['Hash'])) {
        die('Incorrect password!!!');
      }

      // If result matched $myusername and $mypassword, table row must be 1 row

         echo "loged in";
         $_SESSION['login_user'] = $myusername;

         header("location: welcome.php");
   }
?>
<html>

   <head>
      <title>Login Page</title>

      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>

   </head>

   <body bgcolor = "#FFFFFF">

      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

            <div style = "margin:30px">

               <form action = "" method = "post">
                  <label>Username:</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password:</label><input type = "password" name = "password" class = "box"/><br /><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>

            </div>

         </div>

      </div>

   </body>
</html>
