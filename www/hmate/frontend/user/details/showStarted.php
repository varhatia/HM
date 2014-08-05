<?php
//Sanitize input data using PHP filter_var().
$uid = $_GET['id'];

$startingQuery = "SELECT * from `events` where uid = $uid LIMIT 5";
//'<pre>';print_r($attendingQuery);echo '</pre>';
$resultStarted = mysql_query($startingQuery);
	
//'<pre>';print_r($connectionCount);echo '</pre>';
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";

while($row = mysql_fetch_array($resultStarted))
{
	$event = $row['id'];
	$eventName = $row['eventName'];

	echo "<tr> <td><a href=" . $_SESSION['docRoot'] . "/frontend/events/events.php?id=$event>$eventName</td></tr>";
}
echo "</table>";	


?>




