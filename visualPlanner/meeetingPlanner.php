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


$title = "";
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
        <!-- <form method="post">
        <label for="title">Event Title: </label>
        <input type="text" id="title" name="title"><br><br>
        <input type="submit" name='sumbit' value="Set title<?php //error_reporting(E_ERROR);  
                                                //try {$title = $_POST['title'];} 
                                                //catch (Exception $e) {}?>">
                                                <?php// echo "  Title: " . $title?></input>
        </form>  -->
        <form method="post">
            <label for="title">Event Title: </label>
            <input type="text" id="title" name="title" required value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>"><br><br>
            <input type="text" name="item" required/>
            <input type="submit" value="<?php error_reporting(E_ERROR);  
                                                try {$title = $_POST['title'];} 
                                                catch (Exception $e) {} ?>Add user" />
            <?php if($items): ?>
                <?php foreach($items as $item): ?>
                    <input type="hidden" name="items[]" value="<?php echo $item;?>" />
                <?php endforeach; ?>
            <?php endif; ?>
        </form>

        <form action="/g63968ef/deploymenttest/visualPlanner/timetablePHP.php?title=<?php echo $title?>" method=post>
            <label for="sumbit">PLAN MEETING --> </label>
            <input type='hidden' name='items' value="<?php echo htmlentities(serialize($items));?>" />
            <input type="submit">
        </form>
    </body>
</html>