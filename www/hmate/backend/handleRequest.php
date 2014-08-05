<?php
include_once 'common/dbConnect.php';
include_once 'common/shared.php';

$forUser = $_SESSION['uid'] ;
$fromUser = $_REQUEST["fid"];
$action = $_REQUEST["action"];

// add as friend
if($action=='Accept')
{
	$insertQuery = "INSERT INTO  `userfriend` (  `uid` ,  `fid` ,  `status` ) VALUES ($forUser, $fromUser, 1);";
	$result=mysql_query($insertQuery);
	if($result)
	{

		echo "successs query is $insertQuery";
	}

	$insertQuery = "INSERT INTO  `userfriend` (  `uid` ,  `fid` ,  `status` ) VALUES ($fromUser, $forUser, 1);";
	$result=mysql_query($insertQuery);
	if($result)
	{
		echo "successs query is $insertQuery";
	}

	$deleteQuery = "DELETE FROM  `frequest` WHERE  `uid` = " .$forUser." AND `fid` = ".$fromUser ;
	$result=mysql_query($deleteQuery);
	if($result) {

		echo "successs query is $deleteQuery";
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




