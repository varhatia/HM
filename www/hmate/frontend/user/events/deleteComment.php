<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

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