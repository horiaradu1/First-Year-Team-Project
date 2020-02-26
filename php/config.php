<?php

define('DB_SERVER', 'dbhost.cs.man.ac.uk');
define('DB_USERNAME', 'g34904ps');
define('DB_PASSWORD', 'password');
define('DB_DATABASE', '2019_comp10120_y4');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$msg = "";
if(mysqli_connect_errno()) {
  $msg = "Failed to connect : " . mysqli_connect_error();
  exit();
}
else{
  $msg = "Connected !!";
}

?>
