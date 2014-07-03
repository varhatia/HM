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

$eventId = $_GET['id'];
$joinQueryDisplay = "SELECT uid FROM `eventuser` WHERE `eventId` = $eventId AND `join` = 1";
// 							echo '<pre>'; print_r($joinQueryDisplay);echo'</pre>';
$resultJoinDisplay = mysql_query($joinQueryDisplay);

// if($resultJoinDisplay)
// {
// 	echo "query run successful";
// }

while($row = mysql_fetch_array($resultJoinDisplay))
{
	$userId = $row['uid'];
	$selectUser = "select * from `fb_login` where uid = $userId";
	//echo '<pre>'; print_r($selectUser);echo'</pre>';
	$resultUser = mysql_query($selectUser);

	$rowUser = mysql_fetch_array($resultUser);

	$image = $rowUser['userimage'];
	$userName = $rowUser['username'];

	echo "<a href=\"user.php?id=$userId\" id=$index>
	<div class=\"row user-row\">
	<div class=\"col-xs-3 col-sm-2 col-md-1 col-lg-2\">
	<img class=\"img-circle\" src=\"https://localhost/frontend/". $image ."?sz=50\"
	alt=\"User Pic\">
	</div>
	<div class=\"col-xs-3 col-sm-3 col-md-4 col-lg-5 display: inline-block;\">
	<h4>$userName</h4>
	</div>
	</div>
	</a>";
}

mysql_close($link);
?>