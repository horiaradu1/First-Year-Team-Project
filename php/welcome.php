<?php
   include('session.php');
?>
<html">

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <?php
print_r($_SESSION);
?>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
