<!DOCTYPE html>
<html lang="en">
<head>
  <title>TIMEonTABLE - About Us</title>
  <meta charset = "UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "AboutUs.css">
	<link rel = "icon" type = "image/x-icon" href = "https://images.gr-assets.com/users/1582104594p8/110300593.jpg">
</head>
<?php
include("session.php"); ?>
<body>
    <div class="navbar">
      <div class = "picture">
      <a href="moreTable.php">Home</a>
       <!-- connect to the login -->
    </div>
    <div class = "picture">
      <a href="meet.php">Meeting</a>
       <!-- connect to the login -->
    </div>
  <div class="text100">
      <a href="logout.php">Sign out</a>
       <!-- connect to the login -->
    </div>
    <div class="text100">
        <a><?php echo($login_session) ?></a>
    </div>
    <div class="text100">
      <a href="ContactForm.php">Contact Us</a>
    </div>
    <div class="text100">
      <a href="AboutUs.php">About Us</a>
    </div>
    <div class="text100">
      <a href="invites.php">Inbox</a>
    </div>
    </div>
      <div class="container">
    <span class="title">
      WHO ARE WE?
    </span>
    <div class = "wrap-text">
      <span class="text">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
      </span>
    </div>

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
  </div>

  <div class="photo_container2">
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
</div>

    </div>
  </div>
</html>
