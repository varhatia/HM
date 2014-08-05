<?php
include_once '../backend/common/dbConnect.php';
include_once '../backend/common/shared.php';

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

$selectHobbies = "SELECT userimage,  username, hobbyname, t2.uid
FROM  `fb_login` t2
INNER JOIN `userhobbydetail` t3 ON t2.uid = t3.uid where `hobbyname` in ($hobbyString) ORDER BY id DESC LIMIT $position, 4 ";

$hobbyEvents = mysql_query($selectHobbies);
//echo '<pre>';print_r($selectHobbies);echo '</pre>';
while($rowUser	 = mysql_fetch_array($hobbyEvents))
{
	
		$userid = $rowUser['uid'];
		$userimage = $rowUser['userimage'];
		$username = $rowUser['username'];
		$hobbyname = $rowUser['hobbyname'];
		if($userid == $uid)
		{
			continue;
		}
		echo "<div class=\"col-md-2\">
		<div class=\"about_wrap_one\">
		<a href=\"user/userProfile.php?id=$userid\"> <span class=\"mask\"></span> <img src=\"$userimage\"
		alt=\"filter\" />
		</a>
		<p>$username</p>
		<button type=\"submit\" class=\"btn btn-default\">$hobbyname</button>
		</div>
		</div>";
	
}
 
echo "</div>";


?>