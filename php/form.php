
<!DOCTYPE HTML>  
<html>
<title>Registration</title>
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
$fnameErr = $lnameErr = $emailErr = $usernameErr = $passwordErr = $cpasswordErr = "";
$username = $email = $lname = $fname = $password = $cpassword = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["username"])) {
    $usernameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    // check if name only contains letters and numbers
    if (!preg_match("/^[a-zA-Z\d]+$/",$username)) {
      $usernameErr = "Only letters and numbers are accepted.";
    }
    else {
      $usernameErr = '✓';
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
    else {
      $emailErr = '✓';
    }
  }

  if (empty($_POST["fname"])) {
    $fnameErr = "First name is required";
  } else {
    $fname = test_input($_POST["fname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z\s]+$/",$fname)) {
      $fnameErr = "Only letters and white space allowed";
    }
    else {
      $fnameErr = '✓';
    }
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "Last name is required";
  } else {
    $lname = test_input($_POST["lname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z\s]+$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
    }
    else {
      $lnameErr = '✓';
    }
  }
  if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and numbers
    if (!preg_match("/^[a-zA-Z0-9]+$/",$password)) {
      $passwordErr = "Only letters and numbers allowed";
    }
    else {
      $passwordErr = '✓';
    }
  }
  if (empty($_POST["cpassword"])) {
    $cpasswordErr = "Password is required";
  } else {
    $cpassword = test_input($_POST["cpassword"]);
    // check if name only contains letters and numbers
    if (!preg_match("/^[a-zA-Z0-9]+$/",$cpassword)) {
      $cpasswordErr = "Only letters and numbers allowed";
    }
    else {
      $cpasswordErr = '✓';
    }
  }
  if ($cpassword != $password) {
    $cpasswordErr = "Password does not match";
    $passwordErr = "Password does not match";
  }
  else if (strlen($password) < 6) {
    $passwordErr = "Password must be at least 6 characters";
    $cpasswordErr = "Password must be at least 6 characters";
  }
  if ($fnameErr == '✓' and $lnameErr == '✓' and $emailErr == '✓' and $usernameErr == '✓' and $passwordErr == '✓' and $cpasswordErr == '✓') {
        $sql = "INSERT INTO Users (Username, UserPassword, FirstName, Lastname, Email)
    VALUES ('{$username}', '{$password}', '{$fname}', '{$lname}', '{$email}')";

    if ($conn->query($sql) === TRUE) {
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

<h2>Registration form</h2>
<p><span class="error">* required fields</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  First name: <input type="text" name="fname" value="<?php echo $fname;?>">
  <span class="error">* <?php echo $fnameErr;?></span>
  <br><br>
  Last name: <input type="text" name="lname" value="<?php echo $lname;?>">
  <span class="error">* <?php echo $lnameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Username: <input type="text" name="username" value="<?php echo $username;?>">
  <span class="error">* <?php echo $usernameErr;?></span>
  <br><br>
  Passord: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>
  Confirm Password: <input type="password" name="cpassword" value="<?php echo $cpassword;?>">
  <span class="error">* <?php echo $cpasswordErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
echo "<h2>Error Overview:</h2>";
echo $usernameErr;
echo "<br>";
echo $emailErr;
echo "<br>";
echo $fnameErr;
echo "<br>";
echo $lnameErr;
echo "<br>";
echo $passwordErr;
echo "<br>";
echo $cpasswordErr;
?> 



</body>
</html>

