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

$sql = "SELECT Hash FROM Users";
$result = mysqli_query($connection, $sql);

//
// if ($result = mysqli_query($connection, $sql)){
//   while ($row = mysqli_fetch_row($result)){
//     printf("%s(%s)\n", $row[0], $row[1]);
//   }
//   mysqli_free_result($result);
// }
// mysqli_close($con);

?>
