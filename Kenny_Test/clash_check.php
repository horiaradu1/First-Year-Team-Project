<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Clash_Checking</h1>
<p>Last updated: 26 Feb 2020</p>



<div class="timetable">
  <div class="week-names">
    <div>monday</div>
    <div>tuesday</div>
    <div>wednesday</div>
    <div>thursday</div>
    <div>friday</div>
    <div class="weekend">saturday</div>
    <div class="weekend">sunday</div>
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
            ?>
            <div>
               <div class="accent-orange-gradient"></div>
             </div>
            <?php

         }
      }
  ?>
</div>

</body>
</html>