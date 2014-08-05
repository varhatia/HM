<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

//Sanitize input data using PHP filter_var().
$uid = $_SESSION['uid'];

//Find the friends
$selectFriends="select fid from `userfriend` where `uid`=$uid";
$resultAdd =  mysql_query($selectFriends);
$friendString;
while($row = mysql_fetch_array($resultAdd))
{
	$fid = $row['fid'];
	$friendString .= $fid;
	$friendString .= ",";
}


$friendString = substr($friendString, 0, -1);
//For each friend show the events scheduled
echo "<div class=\"row\">";

$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

$position = 0;
if(isset($page_number))
{
	$position = $page_number * 4;
}

//Find the events scheduled by fid
$selectEvents = "select * from `events` where `uid` in ($friendString) ORDER BY id DESC LIMIT $position, 4 ";
$resultFriendEvents = mysql_query($selectEvents);
while($rowEvent = mysql_fetch_array($resultFriendEvents))
{
		$eventId = $rowEvent['id'];
		$eventName = $rowEvent['eventName'];

		$date = date_create($rowEvent['datetime']);
		$tempDate = date_format($date, 'jS M');
		
		$desc = $row['sdesc'];
		
		$eventType = $row['type'];
		
		echo "<div class=\"col-md-2\">
				<div class=\"about_wrap_one\">
					<a href=\"events/events.php?id=$eventId\"> <span class=\"mask\"></span> <img src=\"img/1.jpg\"
						alt=\"filter\" />
					</a>
				<div class=\"portfolio-title\">
					<h4>$eventType
					</h4>
				</div>
				<p>$eventName</p>
				<button type=\"submit\" class=\"btn btn-default\">Check Out</button>
				</div>
			</div>";
		
}	

echo "</div>";

?>