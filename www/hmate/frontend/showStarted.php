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

$startingQuery = "SELECT * from `events` where uid = $uid LIMIT 5";
//'<pre>';print_r($attendingQuery);echo '</pre>';
$resultStarted = mysql_query($startingQuery);
	
//'<pre>';print_r($connectionCount);echo '</pre>';
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";

while($row = mysql_fetch_array($resultStarted))
{
	$event = $row['id'];
	$eventName = $row['eventName'];

	echo "<tr> <td><a href=\"events.php?id=$event\">$eventName</td></tr>";
}
echo "</table>";	


mysql_close($link);
?>




