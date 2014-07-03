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

//Sanitize input data using PHP filter_var().
$uid = $_SESSION['uid'];

$mayBeQuery = "SELECT COUNT('maybe') as m FROM  `eventuser` WHERE  `eventId` = $eventId AND  `maybe` = 1";
$joinQuery = "SELECT COUNT('join') as j FROM  `eventuser` WHERE  `eventId` = $eventId AND  `join` = 1";

$resultMayBe=mysql_query($mayBeQuery);
$resultJoin=mysql_query($joinQuery);

$joinArray = mysql_fetch_array($resultJoin);
$joining = $joinArray["j"];

$maybeArray = mysql_fetch_array($resultMayBe);
$maybe = $maybeArray["m"]; 
// uncomment below to display result
//echo '<pre>';print_r($insertQuery);echo '</pre>';
echo "
		<table style=\"width: 100%\">
		<tr>
			<td><a href=\"#\" id=\"displayUser\" data-toggle=\"modal\"
   data-target=\"#displayJoinUserModal\"><p>".$joining." Joining</p></a>
			</td>
		</tr>
		<tr>
			<td><a href=\"#\" id=\"displayUser\" data-toggle=\"modal\"
   data-target=\"#displayMayBeUserModal\"><p>".$maybe." Not Sure</p>
			</td>
		</tr>
		</table>
";

mysql_close($link);
?>




