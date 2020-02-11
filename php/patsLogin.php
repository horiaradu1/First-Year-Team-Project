
<!DOCTYPE HTML>
<html>
<title>Login</title>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>

<?php

$servername = "dbhost.cs.man.ac.uk";
$getname = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

// Create connection
$conn = new mysqli($servername, $getname, $password, $dbname);

if(isset($_POST["name"], $_POST["password"]))
    {

        $name = $_POST["name"];
        $password = $_POST["password"];

        $result1 = mysql_query("SELECT password
          FROM Users WHERE username = '".$name."'");

          echo $result1;
        }
//
//         if(mysql_num_rows($result1) > 0 )
//         {
//             $_SESSION["logged_in"] = true;
//             $_SESSION["naam"] = $name;
//         }
//         else
//         {
//             echo 'The username or password are incorrect!';
//         }
// }
//
//         //////////////////////
//         ///// ADDED BY PAT
//         $password = md5(mysql_real_escape_string($_POST['password']));
//
//             $checklogin = mysql_query("SELECT * FROM users WHERE Username = '".$username."' AND Password = '".$password."'");
//
//             if(mysql_num_rows($checklogin) == 1)
//             {
//                 $row = mysql_fetch_array($checklogin);
//                 $email = $row['EmailAddress'];
//
//                 $_SESSION['Username'] = $username;
//                 $_SESSION['EmailAddress'] = $email;
//                 $_SESSION['LoggedIn'] = 1;
//
//                 echo "<h1>Success</h1>";
//                 echo "<p>We are now redirecting you to the member area.</p>";
//         ///////////////
//         echo "<br>";
//         echo $sql;
//         echo "<br>";
//         $search = $conn->query($sql);
//     if ($search === TRUE) {
//         echo "Successfully registered!";  // this script does not check for duplicate emails.
//     } else {
//         echo "Username already taken";
//         //echo "Error: " . $sql . "<br>" . $conn->error;
//     }
//   }
//   else {
//     echo "Something is not correct.";
//   }
// }

?>

<h2>Login Page</h2>
<p><span class="error">* required fields</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error"></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error"></span>
  <br><br>
  <input type="submit" name="login" value="Login">
</form>

<!-- <?php
echo "<h2>Error Overview:</h2>";
echo $username;
echo "<br>";
echo $password;
?> -->



</body>
</html>
