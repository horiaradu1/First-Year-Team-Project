<?php
   session_start();

   if(session_destroy()) {
      header("Location:https://web.cs.manchester.ac.uk/g34904ps/team/Kenny_Build/login.php");
   }
?>
