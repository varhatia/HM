<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';
	
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	
		//exit script outputting json data
		$output = json_encode(
				array(
						'type'=>'error',
						'text' => 'Request must come from Ajax'
				));
	
		die($output);
	}
	
	//Sanitize input data using PHP filter_var().
	$eventName        = filter_var($_POST["eventName"], FILTER_SANITIZE_STRING);
	$desc        = filter_var($_POST["desc"], FILTER_SANITIZE_STRING);
	$join       = filter_var($_POST["join"], FILTER_SANITIZE_EMAIL);
	$dateTime       = filter_var($_POST["dateTime"], FILTER_SANITIZE_STRING);
	$place     = filter_var($_POST["place"], FILTER_SANITIZE_STRING);
	$organization     = filter_var($_POST["organization"], FILTER_SANITIZE_STRING);
	$orgLocation     = filter_var($_POST["orgLocation"], FILTER_SANITIZE_STRING);
	$aptName     = filter_var($_POST["aptName"], FILTER_SANITIZE_STRING);
	$resArea     = filter_var($_POST["resArea"], FILTER_SANITIZE_STRING);
	$landmark     = filter_var($_POST["landmark"], FILTER_SANITIZE_STRING);
	
	$uid = $_SESSION['uid'];
	$insertQuery = "INSERT INTO `events`(`uid`, `eventName`, `sdesc`, `invited`, `datetime`, `place`, `organization`, `orgLocation`, `aptName`, `resArea`, `landmark`)
			VALUES ('$uid', '$eventName', '$desc', '$join', STR_TO_DATE(  '$dateTime',  '%m/%d/%Y %h:%i %p' ), '$place', '$organization', '$orgLocation', '$aptName', '$resArea', '$landmark')";
 	$result=mysql_query($insertQuery);

// uncomment below to display result
 	//echo '<pre>';print_r($insertQuery);echo '</pre>';
	

mysql_close($link);
?>




