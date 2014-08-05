<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

//Sanitize input data using PHP filter_var().
$eventId        = filter_var($_POST["eventId"], FILTER_SANITIZE_STRING);
$comment        = filter_var($_POST["comment"], FILTER_SANITIZE_STRING);
$uid = $_SESSION['uid'];

$addComment = "INSERT INTO  `eventcomments` (  `uid` ,  `eventId` ,  `comment` ) 
VALUES ( $uid, $eventId,  \"$comment\" )";
$resultAdd =  mysql_query($addComment);

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
	
$commentTable=stripslashes($rowComment['comment']);
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
 $commentTable </td>"; 
 
 echo "<td width=\"12\" bgcolor=\"#FFFFFF\"><a href=\"#\" id=\"$cid\" class=\"delbutton\"><img src=\"img/del.png\" alt=\"delete\" style=\"color:#FFFFFF\" /> </a>";
 echo "</tr>";

}
echo "</table>";


mysql_close($link);
?>