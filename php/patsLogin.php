
<?php  //Start the Session
session_start();
 require('connect.php');
 $servername = "dbhost.cs.man.ac.uk";
 $getname = "g63968ef";
 $password = "database";
 $dbname = "2019_comp10120_y4";

 $conn =
  mysqli_connect($servername, $getname, $password, $dbname);
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = $conn->prepare("SELECT * FROM author WHERE username LIKE ?");
    if (!$query) {
        login_error("Failed to prepare query");
        return;
    }

    if (!$query->bind_param("s", $username)) {
        login_error("Failed binding query parameter");
        return;
    }

    if (!$query->execute()) {
        login_error("Failed to execute query");
        return;
    }

    $result = $query->get_result();
    if (!$result) {
        login_error("Failed to get result");
        return;
    }
    $query->close();

    $row = $result->fetch_array(MYSQLI_ASSOC);
    if (!password_verify($password, $row["password_hash"])) {
        login_error("Incorrect password");
        return;

//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hai " . $username . "
";
echo "This is the Members Area
";
echo "<a href='logout.php'>Logout</a>";

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<html>
<head>
	<title>User Login Using PHP & MySQL</title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<link rel="stylesheet" href="styles.css" >

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
      <form class="form-signin" method="POST">
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
        <h2 class="form-signin-heading">Please Login</h2>
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">@</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a class="btn btn-lg btn-primary btn-block" href="register.php">Register</a>
      </form>
</div>

</body>

</html>
<?php } ?>
