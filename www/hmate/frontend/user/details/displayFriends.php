<?php

$uid = $_GET['id'];
$joinQueryDisplay = "SELECT * FROM `userfriend` WHERE `uid` = $uid";
//'<pre>';print_r($joinQueryDisplay);echo '</pre>';
$resultJoinDisplay = mysql_query($joinQueryDisplay);

// if($resultJoinDisplay)
// {
// 	echo "query run successful";
// }

while($row = mysql_fetch_array($resultJoinDisplay))
{
	$userId = $row['fid'];
	$selectUser = "select * from `fb_login` where uid = $userId";
	//echo '<pre>'; print_r($selectUser);echo'</pre>';
	$resultUser = mysql_query($selectUser);

	$rowUser = mysql_fetch_array($resultUser);

	$image = $rowUser['userimage'];
	$userName = $rowUser['username'];

	echo "<a href=\"userProfile.php?id=$userId\" id=$index>
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