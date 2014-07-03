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
$eventId        = filter_var($_POST["eventId"], FILTER_SANITIZE_STRING);
$status         = filter_var($_POST["status"], FILTER_SANITIZE_STRING);
$uid = $_SESSION['uid'];

//verify if user already in table
$selectUser = "select * from `eventuser` where eventId = $eventId and uid = $uid";
$resultSelect =  mysql_query($selectUser);
$count=mysql_num_rows($resultSelect);

if($count != 0)
{
	$row = mysql_fetch_array($resultSelect);
	$updateTable = "";
	if($row['join'] != 0)
	{
		$updateTable = "UPDATE  `eventuser` SET  `join` = 0 WHERE  `uid` = $uid and eventId = $eventId";
	}
	if($row['maybe'] != 0)
	{
		$updateTable = "UPDATE  `eventuser` SET  `maybe` = 0 WHERE  `uid` = $uid and eventId = $eventId";
	}
	if($row['decline'] != 0)
	{
		$updateTable = "UPDATE  `eventuser` SET  `decline` = 0 WHERE  `uid` = $uid and eventId = $eventId";
	}

	if($updateTable != "")
	{
		$resultUpdate = mysql_query($updateTable);
	}
}


if($status == 1)
{
	$updateQuery = "INSERT INTO `eventuser` (`eventId`, `uid`,`join`) VALUES ($eventId,$uid,1)";
}
else if($status == 2)
{
	$updateQuery = "INSERT INTO `eventuser` (`eventId`, `uid`,`maybe`) VALUES ($eventId,$uid,1)";
}
else if($status == 3)
{
	$updateQuery = "INSERT INTO `eventuser` (`eventId`, `uid`,`decline`) VALUES ($eventId,$uid,1)";
}

$result=mysql_query($updateQuery);

$mayBeQuery = "SELECT COUNT('maybe') as m FROM  `eventuser` WHERE  `eventId` = $eventId AND  `maybe` = 1";
$joinQuery = "SELECT COUNT('join') as j FROM  `eventuser` WHERE  `eventId` = $eventId AND  `join` = 1";

$resultMayBe=mysql_query($mayBeQuery);
$resultJoin=mysql_query($joinQuery);
// uncomment below to display result
//echo '<pre>';print_r($insertQuery);echo '</pre>';
$joinArray = mysql_fetch_array($resultJoin);
$joining = $joinArray["j"];

$maybeArray = mysql_fetch_array($resultMayBe);
$maybe = $maybeArray["m"];


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