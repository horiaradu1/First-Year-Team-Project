<?php

$sMonth = date('F',time()+( 1 - date('w'))*24*3600);
$eMonth = date('F',time()+( 7 - date('w'))*24*3600);
$sDay = date('d',time()+( 1 - date('w'))*24*3600); 
$eDay = date('d',time()+( 7 - date('w'))*24*3600);

echo ($sDay . " " . $sMonth . " - " . $eDay . " " . $eMonth);

$day =  $_GET['day']; 

$hour = $_GET['hour']; 

$title =  $_GET['title']; 

?>
<br></br>
<?php

$timediff = date('H')-$hour;
$hoursPassed = date('H'); // hours passed today (subtract later)
$clickedTime = date('H-d-F', strtotime("+$hour hours, +$day days, -$hoursPassed hours"));

echo "Hour, day, month: " . $clickedTime; //echo "day: " . $day . " hours: " . $hour;



$people = $_GET['people'];
echo $people;
$arrayPeople = explode(",", $people);
print_r($arrayPeople);
?>