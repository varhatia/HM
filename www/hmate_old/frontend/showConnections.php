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

$connectionsQuery = "SELECT * from `userfriend` where uid = 4";
//'<pre>';print_r($connectionsQuery);echo '</pre>';
$resultConn = mysql_query($connectionsQuery);
	
$connectionCount = mysql_num_rows($resultConn);

//'<pre>';print_r($connectionCount);echo '</pre>';
echo "
	<a href=\"#\" id=\"displayUser\" data-toggle=\"modal\"
   data-target=\"#displayConnectionsModal\"><p>".$connectionCount."</p></a>
";

mysql_close($link);
?>




