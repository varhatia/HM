<?php
require 'class.phpmailer.php';
//include_once 'common/header.php';
session_start();

error_log("script was called, processing request...");

$config_array = parse_ini_file("../config/config.ini");
$host=$config_array['host'];
$dbusername=$config_array['username'];
$dbpassword=$config_array['password'];
$db_name=$config_array['db'];

$link = mysql_connect("$host", "$dbusername", "$dbpassword");
if (!$link)
{
	die('Could not connect: ' . mysqli_error($link));
}

mysql_select_db("$db_name")or die("cannot select DB ".mysql_error($link));



$fromUser = $_SESSION['uid'] ;
$fromUserName = $_SESSION['username'] ;
$toUser = $_REQUEST["fid"];
$toUserName = $_REQUEST["name"];
$eventId = $_REQUEST["event"];


// record in db
$insertQuery = "INSERT INTO  `userinvite` (  `uid` ,  `fid` ,  `eventId` ,  `status` ) VALUES ($toUser, $fromUser, $eventId, 0);";
$result=mysql_query($insertQuery);
echo $insertQuery;
echo '<pre>';print_r($insertQuery);echo '</pre>';
if($result)
{

	echo "successs query is $insertQuery";
}


// Form message body
$selectQuery = "SELECT * FROM  `events` WHERE id = $eventId";
$resultEvent=mysql_query($selectQuery);
$msg = "";

// echo $selectQuery;
// echo '<pre>';print_r($selectQuery);echo '</pre>';
if($resultEvent)
{

	echo "successs query is $selectQuery";
}

while($rowInnerEvent = mysql_fetch_array($resultEvent))
{
	$eventName = $rowInnerEvent['eventName'];
	'<pre>';print_r($eventName);echo '</pre>';
	$msg = "<HTML><HEAD><TITLE>Event Invitation Message</TITLE></HEAD>
	<BODY>
	Hi,

	You have been invited to an event by $fromUserName

	Please click below link to know the details

	<a href='https://localhost/frontend/events.php?=$eventId'>**Click here to checkout the details**<br/></a><br/><br/><br/>

	Thank You
	</BODY>
	</HTML>";

	'<pre>';print_r($msg);echo '</pre>';
}


mysql_close($link);


$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = 'smtp';
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com'; // "ssl://smtp.gmail.com" didn't worked
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
// or try these settings (worked on XAMPP and WAMP):
// $mail->Port = 587;
// $mail->SMTPSecure = 'tls';


$mail->Username = "axc@gmail.com";
$mail->Password = "YourPassword";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "varhatia@gmail.com";
$mail->FromName = "Vishal Arhatia";

// $mail->addAddress("user.1@yahoo.com","User 1");
$mail->addAddress("varhatia@yahoo.co.in","Vishal Arhatia");

// $mail->addCC("user.3@ymail.com","User 3");
// $mail->addBCC("user.4@in.com","User 4");

$mail->Subject = "Testing PHPMailer with localhost";
//$mail->Body = "Hi,<br /><br />This system is working perfectly.";
$mail->Body = $msg;
if(!$mail->Send())
	echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
	echo "Message has been sent";

//include_once 'common/footer.php';
?>