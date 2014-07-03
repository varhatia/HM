<?php
error_log("script was called, processing request...");

$config_array = parse_ini_file("../config/config.ini");
$host=$config_array['host'];
$dbusername=$config_array['username'];
$dbpassword=$config_array['password'];
$db_name=$config_array['db'];
session_start();

$link = mysql_connect("$host", "$dbusername", "$dbpassword");
if (!$link)
{
	die('Could not connect: ' . mysqli_error($link));
}

mysql_select_db("$db_name")or die("cannot select DB ".mysql_error($link));

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
	echo "<tr> <td><a href=\"events.php?id=$event\">$eventName</td></tr>";
}
echo "</table>";	


mysql_close($link);
?>




