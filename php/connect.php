<?php

$servername = "dbhost.cs.man.ac.uk";
$getname = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$connection =
 mysqli_connect($servername, $getname, $password, $dbname);

if(mysqli_connect_errno()) {
  echo "Failed to connect : " . mysqli_connect_error();
  exit();
}
else{
  echo "Connected !!";
}

?>
