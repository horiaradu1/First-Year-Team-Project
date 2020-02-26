

<?php
include("session.php");
//$sqlGetID = "SELECT EventID FROM HasEvent WHERE Username = $login_session";
//$resultID = mysqli_query($db,$sqlGetID);
$sqlGetEvents = "SELECT * FROM Events WHERE EventID in (SELECT EventID FROM HasEvent WHERE Username = $login_session)";
$resultEvents = mysqli_query($db, $sqlGetEvents);

$data_array = array();

while($row = mysqli_fetch_array($resultEvents, MYSQLI_ASSOC)){
  array_push($data_array, $row);
}

?>
<html>

   <head>
      <title>Welcome </title>
   </head>

   <body>
      <h1>Welcome <?php echo $login_session; ?></h1>
      <p id = "Events">I will display your events below.</p>
      <script type = "text/javascript">
      var htmlString = "<?php print_r($data_array); ?>"
      </script>
      <button type = "button"
      onclick = htmlString>
      Click to display events!
      </button>
      <table>
          <thead>
              <tr>
                  <th>Event ID</th>
              </tr>
          </thead>
      </table>
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>

</html>
