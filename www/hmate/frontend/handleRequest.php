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


$forUser = $_SESSION['uid'] ;
$fromUser = $_REQUEST["fid"];
$action = $_REQUEST["action"];

// add as friend
if($action=='Accept')
{
	$insertQuery = "INSERT INTO  `userfriend` (  `uid` ,  `fid` ,  `status` ) VALUES ($forUser, $fromUser, 1);";
	$result=mysql_query($insertQuery);
	echo $insertQuery;
	if($result) 
	{
		
		echo "successs query is $insertQuery";
	}
}

// delete the request
if($action=='Ignore')
{
	$deleteQuery = "DELETE FROM  `frequest` WHERE  `uid` = " .$forUser." AND `fid` = ".$fromUser ;
	$result=mysql_query($deleteQuery);
	echo $deleteQuery;
	if($result) {
	
		echo "successs query is $deleteQuery";
	}
}

// delete the Message
if($action=='IgnoreMessage')
{
	$deleteQuery = "DELETE FROM  `usermessage` WHERE  `uid` = " .$forUser." AND `fid` = ".$fromUser ;
	$result=mysql_query($deleteQuery);
	echo $deleteQuery;
	if($result) {
	
		echo "successs query is $deleteQuery";
	}
}

mysql_close($link);
?>




