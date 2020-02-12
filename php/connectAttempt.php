<?php

//include 'config.inc.php';

// Create connection
$conn = new mysql($servername, $username, $password);

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
