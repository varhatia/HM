<?php
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

//Sanitize input data using PHP filter_var().
$uid = $_SESSION['uid'];

$selectTypeEvents = "select `hobbyname` from `userhobbyDetail` where `uid` = $uid";
//echo '<pre>';print_r($selectTypeEvents);echo '</pre>';

$resultsEvents = mysql_query($selectTypeEvents);
//echo '<pre>';print_r(mysql_num_rows($resultsEventsTMP));echo '</pre>';

$hobbyString;
while($row = mysql_fetch_array($resultsEvents))
{
	$hid = $row['hobbyname'];
	$hobbyString = '\'' . $hid . '\'';
	$hobbyString .= ",";
}

$hobbyString = substr($hobbyString, 0, -1);
//echo '<pre>';print_r($hobbyString);echo '</pre>';
//For each friend show the events scheduled
echo "<div class=\"row\">";

$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

$position = 0;
if(isset($page_number))
{
	$position = $page_number * 4;
}

$selectHobbies = "select * from `events` where `type` in ($hobbyString) ORDER BY id DESC LIMIT $position, 4 ";
$hobbyEvents = mysql_query($selectHobbies);
//echo '<pre>';print_r($selectHobbies);echo '</pre>';
while($rowEvent	 = mysql_fetch_array($hobbyEvents))
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
		<button type=\"submit\" class=\"btn btn-default\">$tempDate</button>
		</div>
		</div>";
	
		$index++;
	
	
}
 
echo "</div>";

mysql_close($link);
?>