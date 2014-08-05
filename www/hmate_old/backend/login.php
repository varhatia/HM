<?php
include_once 'common/shared.php';

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
//session_start();

// Connect to server and select databse.
$link = mysql_connect("$host", "$dbusername", "$dbpassword")or die("cannot connect".$host."  username is ".$dbusername."  password is ".$dbpassword);
mysql_select_db("$db_name")or die("cannot select DB ".mysql_error($link));

$action=$_POST['action'];
$username=$_POST['username'];
$password=$_POST['password'];
$password=md5($password);
 	
if($action == 'verify') {
        $sql="SELECT id FROM login WHERE username='$username' and password='$password'";
        $result=mysql_query($sql);
        $count=mysql_num_rows($result);
        if($count==1){
                $_SESSION['username'] = $username ;
                $_SESSION['uid'] = mysql_result($result, 0) ;
				                
                header("location:../frontend/JoinNow.php"); // redirect the page...
        } else {
        		
                $_SESSION['errormsg'] = 'Wrong username or password' ;
                header("location:../frontend/signin.php"); // redirect the page...
        }
        
} else if($action == 'create') {
	
        $sql="insert into login (username,password,verified) values ('$username','$password', 0)";
        
        $result=mysql_query($sql);
        if($result) {
        		$uid = mysql_insert_id($link) ;
                $_SESSION['username'] = $username ;
                $_SESSION['uid'] = $uid ;
                
                header("location:../frontend/JoinNow.php");
        }else {
        		$checkLogin = "select count(*) from login where username='$username'" ;
        		$result=mysql_query($checkLogin);
        		$count=mysql_num_rows($result);
        		if($count>0) {
        			$_SESSION['errormsg'] = "Userid $username already exists. If you forgot the password, click on forgot password to retrieve it." ;
        			
                	header("location:../frontend/signin.php");
        		} else {
        			$_SESSION['errormsg'] = 'There is some problem with signup. Please try after sometime.' ;
        			
                	header("location:../frontend/signup.php");
        		}
        }
}
mysql_close($link);    
?>