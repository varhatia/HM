<?php
require 'class.phpmailer.php';

include_once 'common/header.php';
session_start();

error_log("script was called, processing request...");

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


$mail->Username = "varhatia@gmail.com";
$mail->Password = "Bazooka@0309";

$mail->IsHTML(true); // if you are going to send HTML formatted emails
$mail->SingleTo = true; // if you want to send a same email to multiple users. multiple emails will be sent one-by-one.

$mail->From = "varhatia@gmail.com";
$mail->FromName = "Vishal Arhatia";

// $mail->addAddress("user.1@yahoo.com","User 1");
$mail->addAddress("9591636555@airtelkk.com","Vishal Arhatia");

// $mail->addCC("user.3@ymail.com","User 3");
// $mail->addBCC("user.4@in.com","User 4");

$mail->Subject = "Testing PHPMailer with localhost";
$mail->Body = "Hi,<br /><br />This system is working perfectly.";
// $mail->Body = $msg;
if(!$mail->Send())
	echo "Message was not sent <br />PHPMailer Error: " . $mail->ErrorInfo;
else
	echo "Message has been sent";

include_once 'common/footer.php';
?>