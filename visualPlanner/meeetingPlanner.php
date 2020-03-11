<?php

$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";



$items = array();
$result = "";
if('POST' === $_SERVER['REQUEST_METHOD']) {
    if( ! empty($_POST['item'])) {

        //echo $_POST['pickedDate']; /////////////

        $input = $_POST['item'];  
        // $attempts = array();
        $result = $conn->query("SELECT * FROM Users WHERE Username = '$input'"); // not injection proof
        if (!$result) echo $conn->error;

        if($result->num_rows == 0) {
            
        } 
        // else if (in_array($input, $attempts)) {
        //     echo "Yo";
        // }

        else {
            // array_push($attempts, $input);
            $items[] = $_POST['item'];
        }

    }
    if(isset($_POST['items']) && is_array($_POST['items'])) {
        foreach($_POST['items'] as $item) {
            $items[] = $item;
        }
    }
}
?>
<html>
    <head>
        <title>Meeting Planner</title>
    </head>
    <body>
        <h3>Meeting Planner</h3>
        <?php if($items): ?>
            <ul>
                <?php foreach($items as $item): ?>
                    <li><?php echo $item; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form method="post">
            <input type="text" name="item" />
            <input type="submit" value="Add user" />
            <?php if($items): ?>
                <?php foreach($items as $item): ?>
                    <input type="hidden" name="items[]" value="<?php echo $item; ?>" />
                <?php endforeach; ?>
            <?php endif; ?>
        </form>

        <form action="/g63968ef/deploymenttest/visualPlanner/timetablePHP.php" method=POST>
            <label for="sumbit">PLAN MEETING --> </label>
            <input type='hidden' name='items' value="<?php echo htmlentities(serialize($items)); ?>" />
            <input type="submit">
        </form>
    </body>
</html>