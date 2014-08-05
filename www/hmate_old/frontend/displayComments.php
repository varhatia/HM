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
$user = $_SESSION['uid'];
$commentSql="select * from `eventComments` where `eventId`=$eventId order by id desc";
//echo '<pre>';print_r($commentSql);echo '</pre>';
$commentResult = mysql_query($commentSql);
if($commentResult)
{
//echo '<pre>';print_r($commentSql);echo '</pre>';
}
echo "<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">";
while($rowComment=mysql_fetch_array($commentResult))
{
	
$uid = 	$rowComment['uid'];

$comment=stripslashes($rowComment['comment']);
$cid = $rowComment['id'];

//Find user who commented
$userQuery = "select userimage from `fb_login` where uid = $uid";
$result1=mysql_query($userQuery);
$rowUser = mysql_fetch_array($result1);
$userimage = $rowUser['userimage'];

echo "<tr> <td width=\"51\"><img src=\"https://localhost/frontend/". $userimage ."\" width=\"50\" height=\"50\"
	alt=\"User Pic\"></td>
<td width=\"7\" align=\"right\" ></td>
<td width=\"376\" class=\"commentContent\">
 $comment </td>"; 
 if($uid == $user)
 {
 echo "<td width=\"12\" bgcolor=\"#FFFFFF\"><a href=\"#\" id=\"$cid\" class=\"delbutton\"><img src=\"img/del.png\" alt=\"delete\" style=\"color:#FFFFFF\" /> </a>";

 }
 echo "</tr>";
}
echo "</table>";
mysql_close($link);
?>
