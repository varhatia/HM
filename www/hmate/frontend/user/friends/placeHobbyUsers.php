<?php
include_once '../backend/common/dbConnect.php';
include_once '../backend/common/shared.php';

//Sanitize input data using PHP filter_var().
$uid = $_SESSION['uid'];

$selectTypeEvents = "select `resArea` from `userdetail` where `uid` = $uid";
//echo '<pre>';print_r($selectTypeEvents);echo '</pre>';

$resultsEvents = mysql_query($selectTypeEvents);
//echo '<pre>';print_r(mysql_num_rows($resultsEventsTMP));echo '</pre>';

$org;
while($row = mysql_fetch_array($resultsEvents))
{
	$org = $row['resArea'];
}

//select others from this organization
$selectothers = "select uid from `userdetail` where `resArea` = '$org'";
//echo '<pre>';print_r($selectothers);echo '</pre>';

$resultsEvents = mysql_query($selectothers);
//echo '<pre>';print_r(mysql_num_rows($resultsEventsTMP));echo '</pre>';

$usersid;
while($row = mysql_fetch_array($resultsEvents))
{
	$usersid = $row['uid'];
	$usersid .= ",";
}

$usersid = substr($usersid, 0, -1);
//echo '<pre>';print_r($usersid);echo '</pre>';
//For each friend show the events scheduled
echo "<div class=\"row\">";

$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

$position = 0;
if(isset($page_number))
{
	$position = $page_number * 4;
}

$selectHobbies = "select * from `fb_login` where `uid` in ($usersid) ORDER BY uid DESC LIMIT $position, 4 ";
//echo '<pre>';print_r($selectHobbies);echo '</pre>';
$hobbyEvents = mysql_query($selectHobbies);
if(mysql_num_rows($hobbyEvents) == 0)
{
	echo "<p>No one from your organization on HobbyMate yet!!! Invite now.</p>";
}

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
		<button type=\"submit\" class=\"btn btn-default\">$org</button>
		</div>
		</div>";
	
}
 
echo "</div>";


?>