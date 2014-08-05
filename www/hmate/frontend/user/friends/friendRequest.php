<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

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




