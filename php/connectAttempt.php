<!DOCTYPE html>
<html>
 <head>
 <title>Temperature Conversion Page</title>
 </head>
 <body>
 <h1>Temperature Conversion Page</h1>
 
<?php

include 'config.inc.php';

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Take input: username, password, Firstname, Lastname, email // validate username, email
// validate password > 6 characters - symbols, characters and numbers
// firstname, lastname - validate, only letters.

// database - password
 ?>
  </body>
</html>

