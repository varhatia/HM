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
//'<pre>';print_r($id);echo '</pre>';
$selectQuery = "Select * from `fb_login` where `uid`= $id";
//'<pre>';print_r($selectQuery);echo '</pre>';
$result = mysql_query($selectQuery);

while($row = mysql_fetch_array($result))
{
	$uid = $row['uid'];
	$username = $row['username'];
	$userimage = $row['userimage'];
	$userintro = $row['userintro'];

	$hobbyQuery = "SELECT hobbyname from userhobbydetail where uid = '$uid'";
	//echo '<pre>';print_r($selectQuery);echo '</pre>';
	$resultHobby = mysql_query($hobbyQuery);
	$hobbies = '';
	while($rowHobby = mysql_fetch_array($resultHobby))
	{
		$hobbies .= "\"".$rowHobby['hobbyname']."\" ";
	}

	$otherQuery = "SELECT * from userdetail where uid = '$uid'";
	$resultOther = mysql_query($otherQuery);
	while($rowOther = mysql_fetch_array($resultOther))
	{
		$workPlace = $rowOther['organization'];
		$livingPlace = $rowOther['resArea'];
	}
	
	$currentUid = $_SESSION['uid'];
	$connectionsQuery = "SELECT * from userfriend where uid = '$uid' and fid='$currentUid'";
	$resultConn = mysql_query($connectionsQuery);
//	echo '<pre>';print_r($connectionsQuery);echo '</pre>';
	$count=mysql_num_rows($resultConn);
}
?>
<script type="text/javascript" src="js/user.js">
</script>

<div class="container">
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

		<div class="col-md-6">
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="row">
						<div class="col-xs-12 col-sm-8">

							<h2><?php echo $username?></h2>

							<p>
								<strong>About: </strong> <?php echo $userintro?>
							</p>
							<p>
								<strong>Hobbies: </strong> <?php echo $hobbies?>
							</p>
							<p>
								<strong>Stays near: </strong> <span
									class="label label-info tags"><?php echo $livingPlace?></span>
							<p>
								<strong>Works at: </strong> <span class="label label-info tags"><?php echo $workPlace?></span>
							</p>
						</div>
						<!--/col-->
						<div class="col-xs-12 col-sm-4 text-center">
							<img class="img-circle"
								src="https://localhost/frontend/<?php echo $userimage ?>?sz=50" alt=""
								class="center-block img-circle img-responsive">
							<ul class="list-inline ratings text-center" title="Ratings">
								<li><a href="#"><span class="fa fa-star fa-lg"></span> </a>
								</li>
								<li><a href="#"><span class="fa fa-star fa-lg"></span> </a>
								</li>
								<li><a href="#"><span class="fa fa-star fa-lg"></span> </a>
								</li>
								<li><a href="#"><span class="fa fa-star fa-lg"></span> </a>
								</li>
								<li><a href="#"><span class="fa fa-star fa-lg"></span> </a>
								</li>
							</ul>
						</div>
						<!--/col-->
						<div class="col-xs-12 col-sm-4">
							<h2>
								<strong> <?php include 'showConnections.php'; ?> </strong>
							</h2>
							<p>
								<small>Connections</small>
							</p>
							
							<?php 
							if($count == 0){
								echo "<button class=\"btn btn-success btn-block\">
								<span class=\"fa fa-plus-circle\"></span>  Connect
							</button> ";
								}	
							?>
							
						</div>
						
				<div id="displayConnectionsModal" class="modal fade" tabindex="-1"
				role="dialog">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">&times;</button>
							<h3>Connections</h3>
						</div>
						<div class="modal-body">
							<?php
							include 'displayFriends.php';
							?>
						</div>
						<div class="modal-footer">
							<button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
						
						<!--/col-->
					</div>
					<!--/row-->
				</div>
				<!--/panel-body-->
			</div>
			<!--/panel-->
			<div class="column">
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
												<td><textarea rows="1" cols="30" maxlength="145"
														name="content" id="content"></textarea>
												</td>
												<td align="right"><input type="submit" value=" Post "
													id="greetingButton" class="btn btn-primary" />&nbsp;
												</td>
											</tr>
											<tr>
											</tr>

										</table>
									</form>
								</td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td></td>
							</tr>
							<tr>
								<td>
									<div id="onPageLoad">

										<?php
										include 'displayGreetings.php';
										?>
									</div>
									<div id="resultComment"></div> <!-- 									<div id="addComment"> -->
									<!-- 									</div> -->

								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div>
			<div id="eventsParticipated" class="col-md-3 column">
				<div class="jumbotron well">
					<h4>Activity Participated</h4>
					<div>
						<?php include 'showActivitiesParticipated.php';?>
					</div>
				</div>
			</div>

		</div>
		<div>
			<div id="eventStarted" class="col-md-3 column">
				<div class="jumbotron well">
					<h4>Activity Started</h4>
					<div>
						<?php include 'showStarted.php';?>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<?php
include_once 'common/footer.php';

?>