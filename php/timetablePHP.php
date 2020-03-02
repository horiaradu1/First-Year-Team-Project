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
echo "Connected successfully" . "<br>";

// initilizing variables and lists
$listOfEvents = array();
//$timeToday = date('Y-m-d H:i:s');
$timeToday = date('2020-02-20 11:00:00');
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
            echo $row["Username"] . "<br>";
            array_push($listOfEvents, $row["EventID"]);
        }
    }

    foreach($listOfEvents as $event) {
        $sqlQuery = "SELECT StartTime, EndTime FROM Events WHERE EventID = " . $event;
        $fetchedEvent = $conn->query($sqlQuery);
        foreach($fetchedEvent->fetch_all(MYSQLI_ASSOC) as $row) {
            echo ("Start time: " . $row["StartTime"] . "<br>" . 
                  "End time: " . $row["EndTime"] . "<br>");
            echo "Hours between: " . hours_between($row["StartTime"], $row["EndTime"]) . "<br><br>";

            $timeTillEvent = hours_between($timeToday, $row["StartTime"]);
            $timeTillEventDays = $timeTillEvent/24;
            $lengthEvent = hours_between($row["StartTime"], $row["EndTime"]);
            

            if ((0 <= $timeTillEventDays) && ($timeTillEventDays <= 7)) {
                $day = intdiv($timeTillEvent, 24);
                $hours = $timeTillEvent % 24;
                for ($i = 0; $i < $lengthEvent; $i++) {
                    if ($day == 7) {
                        break;
                    }
                    $planList[$day][$hours] += 1;
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
    foreach($planList[1] as $number) {
        echo $number;
    }
    print_r($planList);
}

createMeetingList(array('laura', 'eirik', 'horia'));



?>