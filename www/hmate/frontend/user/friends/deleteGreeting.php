<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

//Sanitize input data using PHP filter_var().
$uid        = filter_var($_POST["uid"], FILTER_SANITIZE_STRING);
$id         = filter_var($_POST["id"], FILTER_SANITIZE_STRING);

$deleteComment = "DELETE FROM  `usergreetings` WHERE  `id` = $id AND  `uid` = $uid";
$resultDelete =  mysql_query($deleteComment);
echo '<pre>'; print_r($deleteComment);echo'</pre>';
if($resultDelete)
{
	echo "Delete successful";
}
mysql_close($link);
?>