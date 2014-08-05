<?php
include_once 'common/header.php';
session_start();
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

$id = $_GET['id'];
$selectQuery = "Select * from `events` where `id`= $id";
$result = mysql_query($selectQuery);



while($rowInnerEvent = mysql_fetch_array($result))
{
	$uid = $rowInnerEvent['uid'];
	$eventName = $rowInnerEvent['eventName'];
	$desc = $rowInnerEvent['sdesc'];
	$invited = $rowInnerEvent['invited'];
	$dateTime = $rowInnerEvent['datetime'];
	$address = "";
	if($rowInnerEvent['organization'] != "")
	{
		$address .= $rowInnerEvent['organization'];
		if($rowInnerEvent['orgLocation'] != "")
		{
			$address .= "<br> ".$rowInnerEvent['orgLocation'];
		}
	}

	else if($rowInnerEvent['aptName'] != "")
	{
		$address .= $rowInnerEvent['aptName'];
		if($rowInnerEvent['resArea'] != "")
		{
			$address .= "<br> ".$rowInnerEvent['resArea'];
		}
	}

	$landmark =  $rowInnerEvent['landmark'];

	?>

<script type="text/javascript" src="js/user.js">
</script>
<!-- <script type="text/javascript"> -->
<!--  $('#pactivity a').click(function (e) { -->
<!--  	  e.preventDefault();  -->
<!-- 	  $(this).tab('show'); -->
<!-- }); -->
<!-- </script> -->

<!-- Start: MAIN CONTENT -->
<div class="container">
	<div class="page-header">
		<h1>Famous Cycling Quote</h1>
	</div>

	<div class="row">
		<div class="tabbable tabs-left">

			<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
				<li><a href="cycling.php#egang"><strong>Expand Your Gang</strong> </a>
				</li>
				<li><a href="cycling.php#pactivity" id="customP"><strong>Schedule
							an activity</strong> </a></li>
				<li><a href="cycling.php#sactivity"><strong>Search
							for upcoming activity</strong> </a></li>
			</ul>

		</div>
		<div class="col-md-9 column">
			<div class="jumbotron">
				<table style="width: 100%">
					<tr>
						<td>
							<h1>
								<?php echo $eventName?>
							</h1>

						</td>
					</tr>
					<tr>
						<td>
							<p>
								<?php echo $desc?>
							</p>
						</td>
					</tr>

					<tr>
					
					
					<tr>
						<td width="50%"><span class="label label-info pull-left"><?php if($join == 1){ 
							echo "Only Invited";
						}
						else{
																							echo "Open to Public";
																						}
																						?> </span>
						</td>
						<td width="50%"><a href="user.php?uid=<?php echo $uid?>"><span
								class="label label-info pull-right"><?php 
								$userQuery = "select username from `fb_login` where uid = $uid";
								$result1=mysql_query($userQuery);
								$rowUser = mysql_fetch_array($result1);
								$username = $rowUser['username'];

								echo "<p><strong>Invited By : <strong></p>$username";?> </span>
						</a></td>
					</tr>


				</table>
			</div>
			<div class="col-md-8 column">
				<div class="jumbotron well">
					<table style="width: 100%" border="2">
						<tr>
							<td width="50%"><p>
									<strong>Date and Time</strong>
								</p>
							</td>
							<td width="50%"><p>
									<strong>Address</strong>
								</p>
							</td>
						</tr>
						<tr>
							<td width="50%"><p>
									<?php echo "$dateTime";?>
								</p>
							</td>
							<td width="50%"><p>
									<?php echo "$address";?>
								</p>
							</td>
						</tr>
						<tr>
							<td width="50%"><p>
									<strong>Contact</strong>
								</p>
							</td>
							<td width="50%"><p>
									<strong>Landmark</strong>
								</p>
							</td>

						</tr>
						<tr>
							<td width="50%"><p>
									<?php echo "$contact";?>
								</p>
							</td>
							<td width="50%"><p>
									<?php echo "$landmark";?>
								</p>
							</td>

						</tr>
					</table>
				</div>

				<div class="jumbotron well">
					<table style="width: 100%">
						<tr>
							<td width="50%" align="center">
								<button id="join" class="btn-large btn-primary">Join</button>
							</td>
							<td width="50%" align="center">
								<button id="maybe" class="btn-large btn-primary">May Be</button>

							</td>
						</tr>
					</table>
				</div>
			</div>

			<div id="usercount" class="col-md-4 column">
				<div class="jumbotron well">
					<div id="initial">
						<?php include 'showCount.php';?>
					</div>
					<div id="resultPHP"></div>
				</div>
			</div>

			<div id="displayJoinUserModal" class="modal fade" tabindex="-1"
				role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h3>Attendees</h3>
						</div>
						<div class="modal-body">
							<?php
							include 'displayUser.php';
							?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<div id="displayMayBeUserModal" class="modal fade" tabindex="-1"
				role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h3>Still thinking attendees</h3>
						</div>
						<div class="modal-body">
							<?php
							include 'displayMayBeUser.php';
							?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		<div class="col-md-12 column">
			<div class="jumbotron well">
				<table align="center">
					<tbody>
						<tr>
							<td valign="top">
								<form action="" method="post">
									<table width="100%" bgcolor="#FFFFFF">
										<tr>
											<td><span>Comments!!!</span>
											</td>
										</tr>
										<tr>
											<td><textarea rows="1" cols="45" maxlength="145"
													name="content" id="content"></textarea>
											</td>
											<td align="right"><input type="submit" value=" Post "
												id="commentButton" class="btn btn-primary" />&nbsp;
											</td>
										</tr>
										<tr>
										</tr>

									</table>
								</form>
							</td>
						</tr>
						<tr>
						<td>  </td>
						</tr>
						<tr>
						<td>  </td>
						</tr>
						<tr>
						<td>  </td>
						</tr>
						<tr>
							<td>
								 <div id="onPageLoad">
									
									<?php
										include 'displayComments.php';
									?> 
									</div>
									<div id="resultComment"></div>
<!-- 									<div id="addComment"> -->
<!-- 									</div> -->
								
								</td>
							</tr>
							</tbody>
							</table>
							
			</div>
		</div>

			
		</div>

	</div>
</div>

<?php
} 
mysql_close($link);

?>

<?php
include_once 'common/footer.php';
?>