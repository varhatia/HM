<?php
session_start();
$docRoot = glob($_SERVER["DOCUMENT_ROOT"]);
$root = $docRoot[0];
//print_r($de[0]);
$root .= "/config/config.ini";
//print_r($root);
$config_array = parse_ini_file($root);
$host=$config_array['host'];
$dbusername=$config_array['username'];
$dbpassword=$config_array['password'];
$db_name=$config_array['db'];

if(!isset($_SESSION['docRoot']))
{
$_SESSION['root'] = $docRoot;
}
// echo '<pre>';print_r($host);echo '</pre>';
// echo '<pre>';print_r($host);echo '</pre>';
// echo '<pre>';print_r($dbusername);echo '</pre>';
// echo '<pre>';print_r($dbpassword);echo '</pre>';
// echo '<pre>';print_r($db_name);echo '</pre>';

$link = mysql_connect("$host", "$dbusername", "$dbpassword");
if (!$link)
{
	die('Could not connect: ' . mysqli_error($link));
}

mysql_select_db("$db_name")or die("cannot select DB ".mysql_error($link));

?>