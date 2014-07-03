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


$fromUser = $_SESSION['uid'] ;
$toUser = $_REQUEST["q"];

$insertQuery = "INSERT INTO  `frequest` (  `uid` ,  `fid` ,  `status` ) VALUES ($toUser, $fromUser, 0);";
$result=mysql_query($insertQuery);
echo $insertQuery;
if($result) {
	
	echo "successs query is $insertQuery";
}


mysql_close($link);
?>




