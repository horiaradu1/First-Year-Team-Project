<?php
   session_start();

   if(session_destroy()) {
      header("Location:https://web.cs.manchester.ac.uk/g34904ps/team/php/login.php");
   }
?>
