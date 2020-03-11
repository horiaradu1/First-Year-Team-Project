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

$timediff = date('h')-$hour;
$clickedTime = date('h-d-F', strtotime("+$day days, -$timediff hours"));

echo "Hour, day, month: " . $clickedTime;
?>