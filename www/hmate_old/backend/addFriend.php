<?php
// connect to the database
include_once 'common/shared.php';

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


$uid = $_SESSION['uid'] ;
$toUser = $_POST['uid'];

// echo '<pre>';print_r($uid);echo '</pre>';
// echo '<pre>';print_r($username);echo '</pre>';
// echo '<pre>';print_r($organization);echo '</pre>';
// echo '<pre>';print_r($orgLocation);echo '</pre>';
// echo '<pre>';print_r($aptName);echo '</pre>';
// echo '<pre>';print_r($resArea);echo '</pre>';


// $selectQuery = "select uid from fb_login where id=$uid" ;
// $result=mysql_query($selectQuery);
// $id = mysql_result($result, 0);

$selectQuery = "insert into userfriend (`uid`, `fid`) VALUES ('$uid', '$toUser')";
echo '<pre>';print_r($selectQuery);echo '</pre>';
$result=mysql_query($selectQuery);

$selectQuery = "insert into userfriend (`uid`, `fid`) VALUES ('$toUser', '$uid')";
echo '<pre>';print_r($selectQuery);echo '</pre>';
$result=mysql_query($selectQuery);

//header("location:../frontend/hobbyMate.php");


mysql_close($link);
?>




