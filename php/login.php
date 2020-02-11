
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


// define variables and set to empty values
$usernameErr = $passwordErr = "";
$username = $password = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "* Username is required";
    } 
    else {
        $username = test_input($_POST["username"]);
        $usernameErr = '✓';
    }
    
  
    if (empty($_POST["password"])) {
    $passwordErr = "* Password is required";
    } 
    else {
        $password = test_input($_POST["password"]);
        $passwordErr = '✓';
    }
  
  if ($usernameErr == '✓' and $passwordErr == '✓') {
        $sql = "SELECT * FROM Users WHERE Username = '{$username}' and  UserPassword = '{$password}';";
        echo "<br>";
        echo $sql;
        echo "<br>";
        $search = $conn->query($sql);
    if ($search === TRUE) {
        echo "Successfully registered!";  // this script does not check for duplicate emails.
    } else {
        echo "Username already taken";
        //echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
  else {
    echo "Something is not correct.";
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>Login Page</h2>
<p><span class="error">* required fields</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error"><?php echo $usernameErr;?></span>
  <br><br>
  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error"><?php echo $passwordErr;?></span>
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
