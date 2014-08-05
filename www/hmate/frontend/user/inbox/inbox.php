<script>
// Keeping it in case I need popover
// http://www.bootply.com/C0KFLL6T59
//$("[data-toggle=popover]").popover({
  //  html: true, 
	//content: function() {
      //    return $('#popover-content').html();
        //}
//});

</script>

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
<!-- <script> -->
<!--  $('#modalCompose').modal('hide') -->
<!-- </script> -->

<?php
include_once '../../common/header.php';
include_once '../../../backend/common/dbConnect.php';
include_once '../../../backend/common/shared.php';

$user = $_SESSION['uid'] ;

$selectQuery = "SELECT t2.invitation,t2.fid FROM `frequest` t2
WHERE t2.uid = $user";
//echo '<pre>';print_r($selectQuery);echo '</pre>';

$result = mysql_query($selectQuery);

$icount=mysql_num_rows($result);
//echo '<pre>';print_r($icount);echo '</pre>';

$selectMessageQuery = "SELECT message,fid FROM `userMessage` 
WHERE uid = $user";

$resultMessage = mysql_query($selectMessageQuery);

$mcount=mysql_num_rows($resultMessage);

?>
<div id="wrapper">
	<div  id="main" class="container">
	<div class="row">
		<div class="col-sm-3 col-md-2">
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
						</div>
						<!-- /.modal-content -->
					</div>
					<!-- /.modal-dialog -->
				</div>
				<!-- /.modal compose message -->
			
			<hr />
			<ul class="nav nav-pills nav-stacked">
				<?php 
				echo "<li class=\"active\"><a href=\"#\"><span class=\"badge pull-right\">$icount</span>
				Invitation </a>
				</li>";
				echo "<li><a href=\"inboxMessage.php\"><span class=\"badge pull-right\">$mcount</span>
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
						while($row = mysql_fetch_array($result))
						{
							$invitationMessage = $row['invitation'];
							$fid = $row['fid'];
							//echo '<pre>';print_r($fid);echo '</pre>';
								
							$selectFriendQuery = "SELECT username FROM `fb_login` WHERE uid = $fid;";
							$resultFriend = mysql_query($selectFriendQuery);
							//echo '<pre>';print_r($selectFriendQuery);echo '</pre>';
								
							while($rowInner = mysql_fetch_array($resultFriend))
							{

								$fromName = $rowInner['username'];
	//							echo '<pre>';print_r($fromName);echo '</pre>';
								echo "
								<a href=\"#\" class=\"list-group-item\" id=$index> <span class=\"name\"
								style=\"min-width: 120px; display: inline-block;\">$fromName</span>
								<span class=\"\">Invitation to connect</span> <span class=\"text-muted\"
								style=\"font-size: 11px;\">- $invitationMessage</span>

								<span
								class=\"pull-right\">
								<button class=\"btn-primary\" type=\"button\"
								onClick=\"UpdateRecord($fid,'Accept', $index)\"><span>Accept</span></button>
								</span>
								<span
								class=\"pull-right\" style=\"padding-right:5px;\">
								<button class=\"btn-primary\" type=\"button\"
								onClick=\"UpdateRecord($fid, 'Ignore', $index)\"><span>Ignore</span></button>
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
