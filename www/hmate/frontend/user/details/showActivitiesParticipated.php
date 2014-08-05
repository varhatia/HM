<?php
//Sanitize input data using PHP filter_var().
$uid = $_GET['id'];

$attendingQuery = "SELECT * from `eventuser` where uid = $uid and `join` = 1 LIMIT 5";
//'<pre>';print_r($attendingQuery);echo '</pre>';
$resultAtten = mysql_query($attendingQuery);
	
//'<pre>';print_r($connectionCount);echo '</pre>';
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";

while($row = mysql_fetch_array($resultAtten))
{
	$event = $row['eventId'];
	
	$eventQuery = "SELECT * from `events` where id = $event";
	//'<pre>';print_r($eventQuery);echo '</pre>';
	$resultEvent = mysql_query($eventQuery);
	
	$rowEvent = mysql_fetch_array($resultEvent);
	
	$eventName = $rowEvent['eventName'];
	$shortDesc = $rowEvent['sdesc'];
	echo "<tr> <td><a href=" . $_SESSION['docRoot'] . "/frontend/events/events.php?id=$event>$eventName</td></tr>";
}
echo "</table>";	


?>




