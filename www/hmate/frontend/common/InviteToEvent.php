<?php
?>
<script>
//send mail to invited friends
function InviteFriend(id,name,index,eventId)
{
	alert(id);
	alert(eventId);
	
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//document.getElementById("responsecontainer").innerHTML=xmlhttp.responseText;
			alert(xmlhttp.responseText);
		}	
	};
	xmlhttp.open("GET","mail/sendMail.php?fid="+id+"&name="+name+"&event="+eventId,true);
	xmlhttp.send();

	// removes the row
    $("a#"+index).remove();
	   
};

</script>

<?php 
include_once '../backend/common/dbConnect.php';
include_once '../backend/common/shared.php';


$user = $_SESSION['uid'];
//query to get current event id
$selectEventQuery = "SELECT  `id` ,  `uid` ,  `eventName` FROM  `events` WHERE  `uid` = $user ORDER BY id DESC LIMIT 0,1";
$resultEvent = mysql_query($selectEventQuery);

$rowInnerEvent = mysql_fetch_array($resultEvent);
$createdEventId = $rowInnerEvent['id'];
// echo '<pre>';print_r($createdEventId);echo '</pre	>';
//select friends of current users
$friendQuery = "SELECT * FROM `userfriend` WHERE `uid` = $user";
$result = mysql_query($friendQuery);

$index=1;
while($row = mysql_fetch_array($result))
{
	$fid = $row['fid'];

	$selectFriendQuery = "SELECT username, userimage FROM `fb_login` WHERE uid = $fid;";
	$resultFriend = mysql_query($selectFriendQuery);

	while($rowInner = mysql_fetch_array($resultFriend))
	{

		$friend = $rowInner['username'];
		$image = $rowInner['userimage'];

		echo "
		<a href=\"#\" id=$index>
		<div class=\"row user-row\">

		<div class=\"col-xs-3 col-sm-2 col-md-1 col-lg-2\">
		<img class=\"img-circle\"
		src=\"https://localhost/frontend/". $image ."?sz=50\"
		alt=\"User Pic\">
		</div>
		<div class=\"col-xs-3 col-sm-3 col-md-4 col-lg-5 display: inline-block;\">
		<h4>$friend</h4>
		</div>

		<button class=\"btn btn-primary pull-right\" type=\"button\" onClick=\"InviteFriend($fid, '$friend', $index, $createdEventId)\">
		<span>Invite</span>
		</button>



		</div>

		</a>";
		$index++;
	}
}

?>




