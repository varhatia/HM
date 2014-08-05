<?php 
session_start();

/**
 *
 * Login class to store login information
 * @author Vishal
 *
*/


$config_array = parse_ini_file("../config/config.ini");
$host=$config_array['host'];
$dbusername=$config_array['username'];
$dbpassword=$config_array['password'];
$db_name=$config_array['db'];

$link = mysql_connect("$host", "$dbusername", "$dbpassword")or die("cannot connect".$host."  username is ".$dbusername."  password is ".$dbpassword);
mysql_select_db("$db_name")or die("cannot select DB ".mysql_error($link));

/**
 * Source code for fbconnect.php
*/



$app_id = "221623531349006";            // Found at the Top of your App information page
$app_secret = "03081ac0898c2d83b83b47111cc2ee2b";    // Found at the Top of your App information page
$my_url = "https://localhost/frontend/fbconnect.php";           // Same Site URL as in point 7, also same as the path of this file where it resides in the server.

if(!isset($_REQUEST["code"])) {
	$_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
	$dialog_url = "https://www.facebook.com/dialog/oauth?client_id="
			. $app_id . "&redirect_uri=" . urlencode($my_url) . "&state="
					. $_SESSION['state'] . "&scope=email";

	echo("<script> top.location.href='" . $dialog_url . "'</script>");
}

$code = $_REQUEST['code'];

if($_SESSION['state'] && ($_SESSION['state'] === $_REQUEST['state'])) {
	$token_url = "https://graph.facebook.com/oauth/access_token?"
			. "client_id=" . $app_id . "&redirect_uri=" . urlencode($my_url)
			. "&client_secret=" . $app_secret . "&code=" . $code;

	$response = file_get_contents($token_url);
	$params = null;
	parse_str($response, $params);

	$_SESSION['access_token'] = $params['access_token'];

	$graph_url = "https://graph.facebook.com/me?access_token="
			. $params['access_token'];

	$user = json_decode(file_get_contents($graph_url));

//echo '<pre>';print_r($user);echo '</pre>';
//echo '<pre>';print_r($user->id);echo '</pre>';
$profile_pic  = "https://graph.facebook.com/" . $user->id . "/picture";
echo "<img src=\"" . $profile_pic . "\" />";

// 	$graph_url = "https://graph.facebook.com/me/friends?access_token="
// 			. $params['access_token'];

// 	$userFriends = json_decode(file_get_contents($graph_url));
	
// 	echo '<pre>';print_r($userFriends);echo '</pre>';
	
	// working code below commmented out
	$sql="SELECT uid FROM fb_login WHERE username='$user->name' and useremail='$user->email'";
	echo '<pre>';print_r($sql);echo '</pre>';
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	
	if($count==1){
		$_SESSION['useremail'] = $user->email ;
		$_SESSION['username'] = $user->name ;
		$_SESSION['uid'] = mysql_result($result, 0) ;
		$saveImageDir = "img/users//" . $_SESSION['uid'] . ".jpg";
		$_SESSION['userImage'] = $saveImageDir;
		echo '<pre>';print_r($_SESSION['username']);echo '</pre>';
		header("location:../frontend/index.php"); // redirect the page...
	}
	else {
		
		$sql="insert into fb_login (username, useremail) values ('$user->name', '$user->email')";
		//echo '<pre>';print_r($sql);echo '</pre>';
		$result=mysql_query($sql);
		if($result) {
			$sql="SELECT uid FROM fb_login WHERE username='$user->name' and useremail='$user->email'";
			echo '<pre>';print_r($sql);echo '</pre>';
			$result=mysql_query($sql);
			$_SESSION['uid'] = mysql_result($result, 0);
			$_SESSION['useremail'] = $user->email ;
			$_SESSION['username'] = $user->name ;
			echo '<pre>';print_r($_SESSION['uid']);echo '</pre>';
			$saveImageDir = "img/users//" . $_SESSION['uid'] . ".jpg";
			$sql="insert into fb_login (userimage) values ('$saveImageDir')";
			copy($profile_pic, $saveImageDir);
			$_SESSION['userImage'] = $saveImageDir;
			echo '<pre>';print_r($_SESSION['userImage']);echo '</pre>';
			header("location:../frontend/userForm.php");
		}
	}
	
	
	
}
else {
	echo("The state does not match. You may be a victim of CSRF.");
}
mysql_close($link);

?>