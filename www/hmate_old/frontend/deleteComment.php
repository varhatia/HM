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
$id         = filter_var($_POST["id"], FILTER_SANITIZE_STRING);

$deleteComment = "DELETE FROM  `eventcomments` WHERE  `id` = $id AND  `eventId` =$eventId";
$resultDelete =  mysql_query($deleteComment);
echo '<pre>'; print_r($deleteComment);echo'</pre>';
if($resultDelete)
{
	echo "Delete successful";
}
mysql_close($link);
?>