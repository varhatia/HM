<script>
// To update invite & message

function UpdateRecord(id,action,index)
{
	alert(id);
	alert(action);
	xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			//document.getElementById("responsecontainer").innerHTML=xmlhttp.responseText;
		}	
	};
	xmlhttp.open("GET","../../../backend/handleRequest.php?fid="+id+"&action="+action,true);
	xmlhttp.send();

	// removes the row
	$("a#"+index).remove();
	   
}
</script>

<?php
include_once '../../common/header.php';
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

$user = $_SESSION['uid'] ;

$selectQuery = "SELECT t2.invitation,t2.fid FROM `frequest` t2
WHERE t2.uid = $user";

$result = mysql_query($selectQuery);

$icount=mysql_num_rows($result);

$selectMessageQuery = "SELECT subject,message,fid FROM `userMessage` 
WHERE uid = $user";

$resultMessage = mysql_query($link,$selectMessageQuery);

$mcount=mysql_num_rows($resultMessage);

?>
<div id="wrapper">
	<div  id="main" class="container">
	<div class="row">
		<div class="col-sm-3 col-md-2">
			<!-- 			<a href="#" class="btn btn-danger btn-sm btn-block" type="button">COMPOSE</a> -->
<!-- 			<a data-placement="bottom" class="btn btn-danger btn-sm btn-block" data-toggle="popover" -->
<!-- 				data-container="body" type="button" data-html="true" href="#" -->
<!-- 				id="compose">Compose</a> -->
<!--  Ex : http://www.bootply.com/67046; http://getbootstrap.com/javascript/#modals; http://www.bootply.com/HjRwM57g5x -->
		<button class="btn btn-danger btn-sm btn-block" data-toggle="modal" data-target="#myModal">
  			Compose
		</button>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">Compose Message</h4>
							</div>
							<div class="modal-body">
								<form role="form" class="form-horizontal">
									<div class="form-group">
										<label class="col-sm-2" for="inputTo">To</label>
										<div class="col-sm-10">
											<input type="email" class="form-control" id="inputTo"
												placeholder="comma separated list of recipients">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2" for="inputSubject">Subject</label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="inputSubject"
												placeholder="subject">
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-12" for="inputBody">Message</label>
										<div class="col-sm-12">
											<textarea class="form-control" id="inputBody" rows="18"></textarea>
										</div>
									</div>
								</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default pull-left"
									data-dismiss="modal">Cancel</button>
								<button type="button" class="btn btn-warning pull-left">Save
									Draft</button>
								<button type="button" class="btn btn-primary ">
									Send <i class="fa fa-arrow-circle-right fa-lg"></i>
								</button>

							</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal compose message -->
			
			<hr />
			<ul class="nav nav-pills nav-stacked">
				<?php 
				echo "<li><a href=\"inbox.php\"><span class=\"badge pull-right\">$icount</span>
				Invitation </a>
				</li>";
				echo "<li class=\"active\"><a href=\"#\"><span class=\"badge pull-right\">$mcount</span>
				Messages </a>
				</li>";
				?>
				
			</ul>
		</div>
		<div class="col-sm-9 col-md-10">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane fade in active" id="home">
					<div class="list-group">


						<?php
						$index=1;
						while($row = mysql_fetch_array($resultMessage))
						{
							$invitationMessage = $row['message'];
							$invitationSubject = $row['subject'];
							$fid = $row['fid'];

							$selectFriendQuery = "SELECT username FROM `fb_login` WHERE uid = $fid;";
							$resultFriend = mysql_query($selectFriendQuery);

							while($rowInner = mysql_fetch_array($resultFriend))
							{

								$fromName = $rowInner['username'];
									
								echo "
								<a href=\"#\" class=\"list-group-item\" id=$index> <span class=\"name\"
								style=\"min-width: 120px; display: inline-block;\">$fromName</span>
								<span class=\"\">$invitationSubject</span> <span class=\"text-muted\"
								style=\"font-size: 11px;\">- $invitationMessage</span>

								<span
								class=\"pull-right\">
								<button class=\"btn-primary\" type=\"button\"
									data-toggle=\"modal\" data-target=\"#myMessageModal\"><span>Read</span></button>
										<div class=\"modal fade\" id=\"myMessageModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myMessageModalLabel\" aria-hidden=\"true\">
					<div class=\"modal-dialog\">
						<div class=\"modal-content\">
							<div class=\"modal-header\">
								<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button>
								<h4 class=\"modal-title\" id=\"myMessageModalLabel\">Compose Message</h4>
							</div>
							<div class=\"modal-body\">
								<form role=\"form\" class=\"form-horizontal\">
									<div class=\"form-group\">
										<label class=\"col-sm-2\" for=\"inputFrom\">From</label>
										<div class=\"col-sm-10\">
											<input type=\"email\" class=\"form-control\" id=\"inputFrom\"
												placeholder=$fromName>
										</div>
									</div>
									<div class=\"form-group\">
										<label class=\"col-sm-2\" for=\"inputSubject\">Subject</label>
										<div class=\"col-sm-10\">
											<input type=\"text\" class=\"form-control\" id=\"inputSubject\"
												placeholder=$invitationSubject>
										</div>
									</div>
									<div class=\"form-group\">
										<label class=\"col-sm-12\" for=\"inputBody\">Message</label>
										<div class=\"col-sm-12\">
											<textarea class=\"form-control\" id=\"inputBody\" rows=\"18\">$invitationMessage</textarea>
										</div>
									</div>
								</form>
							</div>
							<div class=\"modal-footer\">
								<button type=\"button\" class=\"btn btn-default pull-left\"
									data-dismiss=\"modal\">Cancel</button>
								<!--<button type=\"button\" class=\"btn btn-warning pull-left\">Reply</button>-->
								<button type=\"button\" class=\"btn btn-primary \">
									Reply <i class=\"fa fa-arrow-circle-right fa-lg\"></i>
								</button>

							</div>
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal compose message -->
									
								</span>
								<span
								class=\"pull-right\" style=\"padding-right:5px;\">
								<button class=\"btn-primary\" type=\"button\"
								onClick=\"UpdateRecord($fid, 'IgnoreMessage', $index)\"><span>Ignore</span></button>
								</span>
								</a>";

								$index++;
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<!-- End: MAIN CONTENT -->
<?php
include_once '../../common/footer.php';
?>
