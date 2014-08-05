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
//$username = $_SESSION['username'];
$organization = $_POST['organization'];
$orgLocation = $_POST['orgLocation'];
$aptName = $_POST['aptName'];
$resArea = $_POST['resArea'];

// echo '<pre>';print_r($uid);echo '</pre>';
// echo '<pre>';print_r($username);echo '</pre>';
// echo '<pre>';print_r($organization);echo '</pre>';
// echo '<pre>';print_r($orgLocation);echo '</pre>';
// echo '<pre>';print_r($aptName);echo '</pre>';
// echo '<pre>';print_r($resArea);echo '</pre>';


// $selectQuery = "select uid from fb_login where id=$uid" ;
// $result=mysql_query($selectQuery);
// $id = mysql_result($result, 0);

$selectQuery = "select uid from userDetail where uid=$uid" ;
$result=mysql_query($selectQuery);
$count=mysql_num_rows($result);
echo '<pre>';print_r($count);echo '</pre>';
if($count==1){
	$updateQuery = "update userDetail set organization='$organization', orgLocation='$orgLocation', aptName='$aptName', resArea='$resArea' where uid = $uid" ;
	echo '<pre>';print_r($updateQuery);echo '</pre>';
	mysql_query($updateQuery) or trigger_error("Update failed: " . mysql_error());
}
else
{
	//update info in userdetail table
	$query="INSERT INTO userDetail ( uid, organization, orgLocation, aptName, resArea) VALUES ($uid,'$organization','$orgLocation','$aptName','$resArea')";
	echo '<pre>';print_r($query);echo '</pre>';
	mysql_query($query) or trigger_error("Insert failed: " . mysql_error());
}

echo '<pre>';print_r("done");echo '</pre>';

$cnt = count($_POST['hobby']);
if ($cnt > 0) {
	for($i=0;$i<$cnt;$i++) {
		$hbname = $_POST['hobby'][$i];
		$selectQuery = "select uid from userHobbyDetail where uid=$uid and hobbyname='$hbname'" ;
		$result=mysql_query($selectQuery);
		$count=mysql_num_rows($result);


		if($count==1){
			// do nothing
		}
		else
		{
			//update info in userdetail table
			$query="INSERT INTO userHobbyDetail ( uid, hobbyname) VALUES ($uid,'$hbname')";
			echo '<pre>';print_r($query);echo '</pre>';
			mysql_query($query) or trigger_error("Insert failed: " . mysql_error());
		}
	}
}
//header("location:../frontend/index.php");


mysql_close($link);
?>




