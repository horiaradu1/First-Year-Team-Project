<?php

error_reporting(E_ERROR);

$servername = "dbhost.cs.man.ac.uk";
$username = "g63968ef";
$password = "database";
$dbname = "2019_comp10120_y4";

$items = array();
if (isset($_POST["items"]))
    $items = unserialize($_POST['items']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully" . "<br>";

// initilizing variables and lists
$listOfEvents = array();
$dateToday = (date('Y-m-d'));
$dateToday = new DateTime('today');
// $dateToday = date('Y-m-d H:i:s');
$timeToday = date('2020-02-20');
$planList = array();
for ($week = 0; $week < 7; $week++) {
    array_push($planList, array());
    for ($hour = 0; $hour < 24; $hour++) {
        array_push($planList[$week], 0);
    }
}

//echo implode( ", ", $planList[0]);
//echo $timeToday, "\n";

function hours_between($date1, $date2) {
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    $diff = abs($date2 - $date1);
    $years = floor($diff / (365*60*60*24));  // get year diff
    $months = floor(($diff - $years * 365*60*60*24)  // get month diff
                               / (30*60*60*24));
    $days = floor(($diff - $years * 365*60*60*24 -  // get day diff
             $months*30*60*60*24)/ (60*60*24)); 

    $hours = floor(($diff - $years * 365*60*60*24  // get hour diff
       - $months*30*60*60*24 - $days*60*60*24) 
                                   / (60*60));

    $hoursBetween = $days * 24 + $hours;
    return $hoursBetween;
}



function createMeetingList($listUsernames) {
    global $conn, $listOfPeople, $listOfEvents, $timeToday, $planList;

    $result = $conn->query("SELECT * FROM HasEvent");
    foreach($result->fetch_all(MYSQLI_ASSOC) as $row) {
        if (in_array($row["Username"], $listUsernames)) {
            // echo $row["Username"] . "<br>";
            array_push($listOfEvents, $row["EventID"]);
        }
    }

    foreach($listOfEvents as $event) {
        $sqlQuery = "SELECT StartTime, EndTime FROM Events WHERE EventID = " . $event;
        $fetchedEvent = $conn->query($sqlQuery);
        foreach($fetchedEvent->fetch_all(MYSQLI_ASSOC) as $row) {
            // echo ("Start time: " . $row["StartTime"] . "<br>" . 
            //       "End time: " . $row["EndTime"] . "<br>");
            // echo "Hours between: " . hours_between($row["StartTime"], $row["EndTime"]) . "<br><br>";

            $timeTillEvent = hours_between($timeToday, $row["StartTime"]);
            $timeTillEventDays = $timeTillEvent/24;
            $lengthEvent = hours_between($row["StartTime"], $row["EndTime"]);
            

            if ((0 <= $timeTillEventDays) && ($timeTillEventDays <= 7)) {
                $day = intdiv($timeTillEvent, 24);
                $hours = $timeTillEvent % 24;
                //$hours = $hours - 6; // starting schedule from 6 am
                for ($i = 0; $i < $lengthEvent; $i++) {
                    if ($day == 7) {
                        break;
                    }
                    try {
                        $planList[$day][$hours] += 1;
                    } catch (Exception $e) {
                        
                    }
                    if ($hours == 23) {
                        $day += 1;
                        $hours = 0;
                    }
                    else {
                        $hours += 1;
                    }
                }
            }
            
        }
    }
    // echo "Tomorrow: ";
    // foreach($planList[1] as $number) {
    //     echo $number;
    // }

    //print_r($planList);
}
//print_r($items);
createMeetingList($items);

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<?php
$title = $_GET['title']; // output title
?>

<h1><?php echo $title ?></h1>
<p>*Percent = percent of people available


</p>
<p>Date today: <?php print_r($dateToday->format('Y-m-d')) ?></p>



<div class="timetable">
  <div class="week-names"> 
      <!-- object gets modified directly by +1 day below -->
    <div><?php print_r($dateToday->format('Y-m-d')) ?></div>
    <div><?php print_r($dateToday->modify("+1 day")->format('Y-m-d')) ?></div>
    <div><?php print_r($dateToday->modify("+1 day")->format('Y-m-d')) ?></div>    
    <div><?php print_r($dateToday->modify("+1 day")->format('Y-m-d')) ?></div>
    <div><?php print_r($dateToday->modify("+1 day")->format('Y-m-d')) ?></div>    
    <div><?php print_r($dateToday->modify("+1 day")->format('Y-m-d')) ?></div>
    <div><?php print_r($dateToday->modify("+1 day")->format('Y-m-d')) ?></div>   
  </div>
  
  <div class="time-interval">
  <div>0:00 - 1:00</div>
    <div>1:00 - 2:00</div>
    <div>2:00 - 3:00</div>
    <div>3:00 - 4:00</div>
    <div>4:00 - 5:00</div>
    <div>5:00 - 6:00</div>
    <div>6:00 - 7:00</div>
    <div>7:00 - 8:00</div>
    <div>8:00 - 9:00</div>
    <div>9:00 - 10:00</div>
    <div>10:00 - 11:00</div>
    <div>11:00 - 12:00</div>
    <div>12:00 - 13:00</div>
    <div>13:00 - 14:00</div>
    <div>14:00 - 15:00</div>
    <div>15:00 - 16:00</div>
    <div>16:00 - 17:00</div>
    <div>17:00 - 18:00</div>
    <div>18:00 - 19:00</div>
    <div>19:00 - 20:00</div>
    <div>20:00 - 21:00</div>
    <div>21:00 - 22:00</div>
    <div>22:00 - 23:00</div>
    <div>23:00 - 24:00</div>
  </div>

  <div class="content">
  <?php
      for ($i = 0; $i < 24; $i++) {
         for ($j = 0; $j < 7; $j++) {
            $percentOccupied = ($planList[$j][$i]/sizeof($items)) * 100;
            if ($percentOccupied == 0) {
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-free"> <font color="black"><h5>All available</h5></font></div>
                 </div>
            </a>
                <?php }
            else if ((0 < $percentOccupied) &($percentOccupied <= 10)) {
            ?>
            <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
            <div>
               <div class="accent-0"><font color="black"><h5>Over 90%</h5></font></div>
             </div>
             </a>
            <?php }
            else if ((10 < $percentOccupied) & ($percentOccupied <= 20)) { 
            ?>
            <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
            <div>
               <div class="accent-1"><font color="black"><h5>80%-90%</h5></font></div>
             </div>
             </a>
            <?php }
            else if ((20 < $percentOccupied) & ($percentOccupied <= 30)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-2"><font color="black"><h5>70%-80%</h5></font></div>
                 </div>
                 </a>
                <?php }
            else if ((30 < $percentOccupied) & ($percentOccupied <= 40)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-3"><font color="black"><h5>60%-70%</h5></font></div>
                 </div>
                 </a>
                <?php }
            else if ((40 < $percentOccupied) & ($percentOccupied <= 50)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-4"><font color="black"><h5>50%-60%</h5></font></div>
                 </div>
                 </a>
                <?php }
            else if ((50 < $percentOccupied) & ($percentOccupied <= 60)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-5"><font color="black"><h5>40%-50%</h5></font></div>
                 </div>
                 </a>
                <?php }
            else if ((60 < $percentOccupied) & ($percentOccupied <= 70)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-6 "><font color="black"><h5>30%-40%</h5></font></div>
                 </div>
                <?php }
            else if ((70 < $percentOccupied) & ($percentOccupied <= 80)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-7"><font color="black"><h5>20%-30%</h5></font></div>
                 </div>
                 </a>
                <?php }
            else if ((80 < $percentOccupied) & ($percentOccupied <= 90)){ 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-8"><font color="black"><h5>10%-20%</h5></font></div>
                 </div>
                 </a>
                <?php }
            else { 
                ?>
                <a href="/g63968ef/deploymenttest/visualPlanner/blank.php?day=<?php echo $j;?>&hour=<?php echo $i;?>&title=<?php echo $title;?>">
                <div>
                   <div class="accent-9"><font color="black"><h5>Less than 10%</h5></font></div>
                 </div>
                 </a>
                <?php }
         }
      }
  ?>
</div>

</body>
</html>