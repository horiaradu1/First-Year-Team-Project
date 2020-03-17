<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration page</title>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "RegistrationPage_1.css">
	<meta charset = "utf-8" />
        <!-- add icon link -->
        <link rel = "icon" href =
"https://images.gr-assets.com/users/1582104594p8/110300593.jpg"
        type = "image/x-icon">
	<!-- <link rel = "icon" type = "image/png" href = "Logo.png"> -->
	<style>
	.error{
	 color: #e3503b;
	 font-family: Ariel, Helvetica, sans-serif;
	 font-size: 15px;
	 /*position: absolute;*/
	 display: block;
	 width: 100%;
	 height: 15px;
	 /*top: 0;
	 left: 0;*/
	}
	.message{
	 color: #e3503b;
	}
	.logo{
		align: center;
		position: relative;
		top: -350px;
		right: 550px;
	}
	</style>
</head>
<body>

	<!-- <?php

	$servername = "dbhost.cs.man.ac.uk";
	$getname = "g63968ef";
	$password = "database";
	$dbname = "2019_comp10120_y4";

	// Create connection
	$conn = new mysqli($servername, $getname, $password, $dbname);


	// define variables and set to empty values
	$fnameErr = $lnameErr = $emailErr = $usernameErr = $passwordErr = $cpasswordErr = $final = "";
	$username = $email = $lname = $fname = $password = $cpassword = '';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["username"])) {
	    $usernameErr = "* Username is required";
	  } else {
	    $username = test_input($_POST["username"]);
	    // check if name only contains letters and numbers
	    if (!preg_match("/^[a-zA-Z\d]+$/",$username)) {
	      $usernameErr = "* Only letters and numbers are accepted.";
	    }
	    else {
	      $usernameErr = '✓';
	    }
	  }

	  if (empty($_POST["email"])) {
	    $emailErr = "* Email is required";
	  } else {
	    $email = test_input($_POST["email"]);
	    // check if e-mail address is well-formed
	    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	      $emailErr = "* Invalid email format";
	    }
	    else {
	      $emailErr = '✓';
	    }
	  }

	  if (empty($_POST["fname"])) {
	    $fnameErr = "* First name is required";
	  } else {
	    $fname = test_input($_POST["fname"]);
	    // check if name only contains letters and whitespace
	    if (!preg_match("/^[a-zA-Z\s]+$/",$fname)) {
	      $fnameErr = "* Only letters and white space allowed";
	    }
	    else {
	      $fnameErr = '✓';
	    }
	  }
	  if (empty($_POST["lname"])) {
	    $lnameErr = "* Last name is required";
	  } else {
	    $lname = test_input($_POST["lname"]);
	    // check if name only contains letters and whitespace
	    if (!preg_match("/^[a-zA-Z\s]+$/",$lname)) {
	      $lnameErr = "* Only letters and white space allowed";
	    }
	    else {
	      $lnameErr = '✓';
	    }
	  }
	  if (empty($_POST["password"])) {
	    $passwordErr = "* Password is required";
	  } else {
	    $password = test_input($_POST["password"]);
	    // check if name only contains letters and numbers
	    if (!preg_match("/^[a-zA-Z\d]+$/",$password)) {
	      $passwordErr = "* Only letters and numbers allowed";
	    }
	    else {
	      $passwordErr = '✓';
	    }
	  }
	  if (empty($_POST["cpassword"])) {
	    $cpasswordErr = "Password is required";
	  } else {
	    $cpassword = test_input($_POST["cpassword"]);
	    // check if name only contains letters and numbers
	    if (!preg_match("/^[a-zA-Z\d]+$/",$cpassword)) {
	      $cpasswordErr = "* Only letters and numbers allowed";
	    }
	    else {
	      $cpasswordErr = '✓';
	    }
	  }
	  if ($cpassword != $password) {
	    $cpasswordErr = "Password does not match";
	    $passwordErr = "Password does not match";
		}
	  else if (strlen($password) < 6) {
	    $passwordErr = "* Password must be at least 6 characters";
	    $cpasswordErr = "* Password must be at least 6 characters";
	  }
	  if ($fnameErr == '✓' and $lnameErr == '✓'
	  and $emailErr == '✓' and $usernameErr == '✓'
	  and $passwordErr == '✓' and $cpasswordErr == '✓') {
	    //added by Pat
	        $hash = password_hash($password, PASSWORD_DEFAULT);
	        $sql = "INSERT INTO Users (
	          Username, Hash, FirstName, Lastname, Email)
	    VALUES ('{$username}', '{$hash}', '{$fname}', '{$lname}', '{$email}')";

	    if ($conn->query($sql) === TRUE) {
	        $final = "Successfully registered!";  // this script does not check for duplicate emails.
	    } else {
	        $final = "Username already taken";
	        //echo "Error: " . $sql . "<br>" . $conn->error;
	    }
	  }
	  else {
	    $final = "Something is not correct.";
	  }
	}

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
	?> -->

	<!-- <div class="limiter">
		<div class="navbar">
			<div class = "picture">
			<a href="moreTable.php">Home</a> -->
			 <!-- connect to the login -->
		<!-- </div>
		<div class = "picture">
			<a href="meet.php">Meeting</a> -->
			 <!-- connect to the login -->
		<!-- </div>
	<div class="text100">
			<a href="#news">Login</a> -->
			 <!-- connect to the login -->
		<!-- </div>
		<div class="text100">
			<a href="ContactForm.php">Contact Us</a>
		</div>
		<div class="text100">
			<a href="AboutUs.php">About Us</a>
		</div>
		</div> -->
		<div class="container-register">
			<div class="logo" >
				<img src = "Logo.png">
			</div>
			<div class="wrap-register">
				<!-- <form class="register-form validate-form"> -->
					<div class="put-it-here-to-include-padding">
					<span class="register-form-title p-b-26">
						Register
					</span>
				  </div>
					<!-- <p><span class="error">* required fields</span></p> -->
					<form method ="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="fname" placeholder="First Name" value="<?php echo $fname;?>">
						<!-- <span class="focus-input100" data-placeholder="First Name"></span> -->
						<span class="error"><?php echo $fnameErr;?></span>
					</div>

          <div class="wrap-input100 validate-input">
            <input class="input100" type="text" name="lname" placeholder="Last Name" value="<?php echo $lname;?>">
            <!-- <span class="focus-input100" data-placeholder="Last Name"></span> -->
						<span class="error"><?php echo $lnameErr;?></span>
          </div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="username" placeholder="Username" value="<?php echo $username;?>">
						<!-- <span class="focus-input100" data-placeholder="Username"></span> -->
						<span class="error"><?php echo $usernameErr;?></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Email" value="<?php echo $email;?>">
						<!-- <span class="focus-input100" data-placeholder="Email"></span> -->
						<span class="error"><?php echo $emailErr;?></span>
					</div>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="password" placeholder="Password" value="<?php echo $password;?>">
						<!-- <span class="focus-input100" data-placeholder="Password"></span> -->
						<span class="error"><?php echo $passwordErr;?></span>
					</div>

          <div class="wrap-input100 validate-input">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm Password">
						<!-- <value="<?php echo $cpassword;?>"> -->
						<!-- <span class="focus-input100" data-placeholder="Confirm Password"></span> -->
						<span class="error"><?php echo $cpasswordErr;?></span>
					</div>

					<div class="container-register-form-btn">
						<div class="wrap-register-form-btn">
							<div class="register-form-bgbtn"></div>
							<button class="register-form-btn">
								Register
							</button>
						</div>
					</div>
					<span class="message"><?php echo $final;?></span>
					<div class="text-center p-t-115">
						<span class="txt1">
							Already have an account?
						</span>

						<a class="txt2" href="https://web.cs.manchester.ac.uk/g34904ps/team/php/login.php">
							Login
						</a>
					</form>
					</div>
				<!-- </form> -->
			</div>
		</div>
	</div>


	<!-- <div id="dropDownSelect1"></div> -->
	<!-- <?php
	echo "<h2>Error Overview:</h2>";
	echo $usernameErr;
	echo "<br>";
	echo $emailErr;
	echo "<br>";
	echo $fnameErr;
	echo "<br>";
	echo $lnameErr;
	echo "<br>";
	echo $passwordErr;
	echo "<br>";
	echo $cpasswordErr;
	?> -->

</body>
</html>
