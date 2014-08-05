<?php
$eventId = $_GET['id'];
$maybeQueryDisplay = "SELECT uid FROM `eventuser` WHERE `eventId` = $eventId AND `maybe` = 1 LIMIT 5";
// 							echo '<pre>'; print_r($maybeQueryDisplay);echo'</pre>';
$resultMayBeDisplay = mysql_query($maybeQueryDisplay);

if($resultMayBeDisplay)
{
	//echo '<pre>'; print_r($maybeQueryDisplay);echo'</pre>';
}

while($row = mysql_fetch_array($resultMayBeDisplay))
{
	$userId = $row['uid'];
	$selectUser = "select * from `fb_login` where uid = $userId";
	//echo '<pre>'; print_r($selectUser);echo'</pre>';
	$resultUser = mysql_query($selectUser);

	$rowUser = mysql_fetch_array($resultUser);

	$image = $rowUser['userimage'];
	$userName = $rowUser['username'];

	echo "<a href=\"../user/userProfile.php?id=$userId\" id=$index>
	<div class=\"row user-row\">
	<div class=\"col-xs-3 col-sm-2 col-md-1 col-lg-2\">
	<img class=\"img-circle\" src=\"https://localhost/frontend/". $image ."?sz=50\"
	alt=\"User Pic\">
	</div>
	<div class=\"col-xs-3 col-sm-3 col-md-4 col-lg-5 display: inline-block;\">
	<h4>$userName</h4>
	</div>
	</div>
	</a>";
}

?>