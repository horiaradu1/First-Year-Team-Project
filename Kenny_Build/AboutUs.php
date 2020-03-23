<?php
  include("session.php"); 
  $servername = "dbhost.cs.man.ac.uk";
  $username = "g63968ef";
  $password = "database";
  $dbname = "2019_comp10120_y4";

  $conn = new mysqli($servername, $username, $password, $dbname);
  $sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
  $fetchedInvite = $conn->query($sqlQuery);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>TIMEonTABLE - About Us</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset = "utf-8" />
    <!-- add icon link -->
    <link rel="icon" href ="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">]
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="stylesheet" type = "text/css" href = "AboutUs.css">
    <link rel="icon" href="https://images.gr-assets.com/users/1582104594p8/110300593.jpg" type = "image/x-icon">
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="Mainpage.html"><i class="far fa-clock"></i> TimeOnTable   </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <?php 
          $conn = new mysqli($servername, $username, $password, $dbname);
          $sqlQuery = "SELECT eventID FROM Inbox WHERE username = " . "'" . ($login_session) . "'";
          $fetchedInvite = $conn->query($sqlQuery);
        ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="moreTable.php">Home<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="meet.php">Meeting Planner<span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Welcome, <?php echo($login_session) ?>!</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="invites.php">Inbox(<?php if ($fetchedInvite->num_rows < 10) {echo $fetchedInvite->num_rows;} else {echo "+9";} ?>)</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="AboutUs.php">About Us</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="ContactForm.php">Contact</i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="logout.php">Sign Out</i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <div class="container">
    <div class="jumbotron">
      <h1 class="display-4"></span> TimeOnTable</h1>
      <p>Group Project</p>
    </div>
  </div>



<!-- 
    <div class="photo_container1">
    <div>
      <img src = "kenny2.jpg" class="photo">
    </div>
    <div class = "personal-txt">
      <div class = "name-wrap">
      <span class = "name">
        Kenny
      </span>
    </div>
      <div class = "text-wrapper">
      <span class = "txt">
        TRALALALALALA
      </span>
    </div>
    </div>
  </div> -->

  <!-- <div class="photo_container2">
  <div>
    <img src = "yoana4.jpg" class="photo">
  </div>
  <div class = "personal-txt">
    <div class = "name-wrap">
    <span class = "name">
      Yoana
    </span>
  </div>
    <div class = "text-wrapper">
    <span class = "txt">
      TRALALALALALA
    </span>
  </div>
  </div>
</div>

<div class="photo_container3">
<div>
  <img src = "sorana5.jpg" class="photo">
</div>
<div class = "personal-txt">
  <div class = "name-wrap">
  <span class = "name">
    Sorana
  </span>
</div>
  <div class = "text-wrapper">
  <span class = "txt">
    TRALALALALALA
  </span>
</div>
</div>
</div>

<div class="photo_container4">
<div>
  <img src = "horia6.jpg" class="photo">
</div>
<div class = "personal-txt">
  <div class = "name-wrap">
  <span class = "name">
    Horia
  </span>
</div>
  <div class = "text-wrapper">
  <span class = "txt">
    TRALALALALALA
  </span>
</div>
</div>
</div>

<div class="photo_container5">
<div>
  <img src = "eirik1.jpg" class="photo">
</div>
<div class = "personal-txt">
  <div class = "name-wrap">
  <span class = "name">
    Eirik
  </span>
</div>
  <div class = "text-wrapper">
  <span class = "txt">
    TRALALALALALA
  </span>
</div>
</div>
</div>

<div class="photo_container6">
<div>
  <img src = "laura3.jpg" class="photo">
</div>
<div class = "personal-txt">
  <div class = "name-wrap">
  <span class = "name">
    Laura
  </span>
</div>
  <div class = "text-wrapper">
  <span class = "txt">
    TRALALALALALA
  </span>
</div>
</div>
</div>

<div class="photo_container7">

<div>
  <img src = "patryk7.jpg" class="photo">
</div>
<div class = "personal-txt">
  <div class = "name-wrap">
  <span class = "name">
    Patryk
  </span>
</div>
  <div class = "text-wrapper">
  <span class = "txt">
    TRALALALALALA
  </span>
</div>
</div>
</div> -->

    </div>
  </div>
</html>
