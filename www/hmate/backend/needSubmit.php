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





if(!isset($_SESSION['uid']))
{
	$_SESSION['errormsg'] = "Please login to submit your hobbies." ;
	header("location:../frontend/signin.php");
}
else
{
	$cnt = count($_POST['hobby']);
	if ($cnt > 0) {
		$uid = $_SESSION['uid'] ;
		$username = $_SESSION['username'];
		for($i=0;$i<$cnt;$i++) {
			$hbname = $_POST['hobby'][$i];
			$learn = 0 ;
			$share = 0 ;
			$teach = 0 ;
			if(isset($_POST['learn'][$i])) {
				$learn = $_POST['learn'][$i];
			}
			if(isset($_POST['share'][$i])) {
				$share = $_POST['share'][$i];
			}
			if(isset($_POST['teach'][$i])) {
				$teach = $_POST['teach'][$i];
			}


			$selectQuery = "select id from hobbydetails where uid=$uid and hobbyname='$hbname' " ;
			$result=mysql_query($selectQuery);
			$count=mysql_num_rows($result);
			$id = mysql_result($result, 0);
			if($count==1){
				$updateQuery = "update hobbydetails set learn=$learn, share=$share, teach=$teach where id = $id" ;
				mysql_query($updateQuery) or trigger_error("Update failed: " . mysql_error());
			}else {
				$query="INSERT INTO hobbydetails ( uid, hobbyname, learn, share, teach) VALUES ($uid,'$hbname',$learn,$share,$teach)";
				mysql_query($query) or trigger_error("Insert failed: " . mysql_error());

			}


			header("location:../frontend/thankYou.php");
		}

	}else {
		header("location:../frontend/JoinNow.php");
		$_SESSION['errormsg'] = 'Please select atleast one hobby.' ;

	}

}
mysql_close($link);
?>