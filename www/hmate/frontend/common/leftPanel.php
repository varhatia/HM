<?php
if (!isset($_SESSION)) {
	session_start();
}
error_reporting(E_ERROR | E_PARSE);


?>

<!-- to invite friends -->
<div id="fb-root"></div>
<script type='text/javascript'>
		if (top.location!= self.location) {
			top.location = self.location;
		}

FB.init({
appId: '221623531349006',
cookie:true,
status:true,
xfbml:true
});
</script>


<div id="wrapper">
	<div id="main" class="container">
		<!-- 		<div class="row"> -->
		<div style="background: red;">
			<div class="col-md-3">
				<div class="tabbable tabs-left">

					<ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
						<li class="active"><a href="#egang" data-toggle="tab"><strong>Expand
									Your Gang</strong> </a></li>
						<li><a href="#pactivity" data-toggle="tab"><strong>Schedule an
									activity</strong> </a></li>
						<li><a href="#sactivity" data-toggle="tab"><strong>Search for
									upcoming activity</strong> </a></li>
					</ul>
					<!-- </div> -->
				</div>
			</div>
		</div>
		<div class="col-md-9">
			<div id="my-tab-content" class="tab-content tab">
			<?php include 'egang.php';?>
<!-- 				<div class="tab-pane active" id="egang"> -->
<!-- 					<div> -->
<!-- 						<h4>HobbyMate's sharing your interests</h4> -->
<!-- 						<div align="right"> -->
<!-- 							<button class="load_users btn-primary" id="load_users_button">Load -->
<!-- 								More</button> -->
<!-- 						</div> -->
<!-- 					</div> -->
					<!--  include 'user/friends/hobbyUsers.php';-->
<!-- 					<div id="hobbyUser"></div> -->

<!-- 					<div> -->
<!-- 						<h4>HobbyMate's near your workplace</h4> -->
<!-- 						<div align="right"> -->
<!-- 							<button class="load_users_w btn-primary" id="load_users_button">Load -->
<!-- 								More</button> -->
<!-- 						</div> -->
<!-- 					</div> -->
					 <!-- include 'user/friends/workHobbyUsers.php'; -->
<!-- 					<div id="whobbyUser"></div> -->

<!-- 					<div> -->
<!-- 						<h4>HobbyMate's near your residential area</h4> -->
<!-- 						<div align="right"> -->
<!-- 							<button class="load_users_r btn-primary" id="load_users_r_button">Load -->
<!-- 								More</button> -->
<!-- 						</div> -->
<!-- 					</div> -->
<!-- 					 include 'user/friends/placeHobbyUsers.php'; -->
<!-- 					<div id="rhobbyUser"></div> -->
<!-- 					<form class="form-horizontal" id="searchMembers" method="POST" -->
<!-- 						action="searchCycMembers.php"> -->
<!-- 						<br /> -->
<!-- 						<fieldset> -->

<!-- 							<legend>Search for your HobbyMate!!!</legend> -->

<!-- 							<div class="form-group"> -->
<!-- 								<label class="col-md-4 control-label" for="organization">Organization</label> -->
<!-- 								<div class="col-md-4"> -->
<!-- 									<input id="organization" name="organization" type="text" -->
<!-- 										placeholder="E.g. Infosys" class="form-control input-md"> -->
<!-- 								</div> -->
<!-- 							</div> -->

<!-- 							<div class="form-group"> -->
<!-- 								<label class="col-md-4 control-label" for="orgLocation">Location</label> -->
<!-- 								<div class="col-md-4"> -->
<!-- 									<input id="orgLocation" name="orgLocation" type="text" -->
<!-- 										placeholder="E.g. Electronic City" -->
<!-- 										class="form-control input-md"> -->
<!-- 								</div> -->
<!-- 							</div> -->

<!-- 							<div class="form-group"> -->
<!-- 								<label class="col-md-4 control-label" for="aptName">Apartment -->
<!-- 									Name</label> -->
<!-- 								<div class="col-md-4"> -->
<!-- 									<input id="aptName" name="aptName" type="text" -->
<!-- 										placeholder="E.g. Sobha Daffodail" -->
<!-- 										class="form-control input-md"> -->
<!-- 								</div> -->
<!-- 							</div> -->

<!-- 							<div class="form-group"> -->
<!-- 								<label class="col-md-4 control-label" for="resArea">Residential -->
<!-- 									Area</label> -->
<!-- 								<div class="col-md-4"> -->
<!-- 									<input id="resArea" name="resArea" type="text" -->
<!-- 										placeholder="E.g. HSR Layout" class="form-control input-md"> -->
<!-- 								</div> -->
<!-- 							</div> -->

<!-- 							<div class="form-group"> -->
<!-- 								<label class="col-md-4 control-label" for="submit"></label> -->
<!-- 								<div class="col-md-4"> -->
<!-- 									<button id="submit" name="submit" class="btn btn-default">Search</button> -->
<!-- 								</div> -->
<!-- 							</div> -->
<!-- 						</fieldset> -->
<!-- 					</form> -->
<!-- 				</div> -->

				<div class="tab-pane" id="pactivity">
					<br />

					<div class="col-md-9">
						<ul class="nav nav-tabs" style="width: 1050px">
							<li class="active" id="a"><a href="#Event" data-toggle="tab">Create
									Event</a></li>
							<li class="disabled" id="b"><a href="#InviteFriends">Invite
									Friends</a></li>
						</ul>
						<div class="tab-content">
							<!-- Event -->
							<div class="tab-pane active" id="Event">
								<form class="form-horizontal" id="planEvent">
									<fieldset>
										<!-- 										Keep it to see what's being passed  -->
										<!-- 										<div id="resultPHP"></div> -->
										<legend>Plan for an activity with your gang @ your convinence</legend>
										<br />

										<legend>Activity Info</legend>
										<div class="form-group">
											<label class="col-md-4 control-label" for="activityName">Name</label>
											<div class="col-md-4">
												<input id="activityName" name="activityName" type="text"
													placeholder="E.G. Cycling" class="form-control input-md"
													required="">
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label" for="desc">Short
												description</label>
											<div class="col-md-4">
												<textarea id="desc" name="desc" type="text"
													class="form-control input-md" rows="5">
												</textarea>
											</div>
										</div>


										<div class="form-group">
											<label class="col-md-4 control-label" for="joinEvent">Who can
												join?</label>
											<div class="col-md-4">
												<select id="joinEvent" name="joinEvent" class="form-control">
													<option value="0">--Select--</option>
													<option value="1">Only Invited</option>
													<option value="2">Anyone Interested</option>
												</select>
											</div>
										</div>

										<div class="form-group">
											<label class="col-md-4 control-label" for="date">Date</label>
											<div class="col-md-4">
												<div class='input-group date' name="datetimepicker1">
													<input type='text' class="form-control"
														id="datetimepicker1" /> <span class="input-group-addon"><span
														class="glyphicon glyphicon-calendar"></span> </span>
												</div>
											</div>
										</div>

										<legend>Venue Details</legend>

										<div class="form-group">
											<label class="col-md-4 control-label" for="place">Where is
												this happening?</label>
											<div class="col-md-4">
												<select id="place" name="place" class="form-control">
													<option value="0">--Select--</option>
													<option value="1">Near my palce of stay</option>
													<option value="2">Near my working place</option>
												</select>
											</div>
										</div>

										<div class="modal fade" id="selectWork" tabindex="-1"
											role="dialog" aria-labelledby="selectWorkLabel"
											aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"
															aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="selectResidenceLabel">Please
															Enter Location Details</h4>
													</div>
													<div class="modal-body">
														<form class="form-horizontal">
															<div class="form-group">
																<label class="col-md-4 control-label"
																	for="organization_m">Organization</label>
																<div class="col-md-4">
																	<input id="organization_m" name="organization_m"
																		type="text" placeholder="E.g. Infosys"
																		class="form-control input-md">
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label"
																	for="orgLocation_m">Location</label>
																<div class="col-md-4">
																	<input id="orgLocation_m" name="orgLocation_m"
																		type="text" placeholder="E.g. Electronic City"
																		class="form-control input-md">
																</div>
															</div>

														</form>
													</div>
													<div class="modal-footer">
														<button type="button" id="cancel"
															class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<button type="button" id="save" class="btn btn-primary "
															data-dismiss="modal">
															Save <i class="fa fa-arrow-circle-right fa-lg"></i>
														</button>

													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
										</div>
										<!-- /.modal compose message -->


										<div class="modal fade" id="selectResidence" tabindex="-1"
											role="dialog" aria-labelledby="selectResidenceLabel"
											aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"
															aria-hidden="true">&times;</button>
														<h4 class="modal-title" id="selectWorkLabel">Please Enter
															Location Details</h4>
													</div>
													<div class="modal-body">
														<form role="form" class="form-horizontal">
															<div class="form-group">
																<label class="col-md-4 control-label" for="aptName_m">Apartment
																	Name</label>
																<div class="col-md-4">
																	<input id="aptName_m" name="aptName_m" type="text"
																		placeholder="E.g. Sobha Daffodail"
																		class="form-control input-md">
																</div>
															</div>

															<div class="form-group">
																<label class="col-md-4 control-label" for="resArea_m">Residential
																	Area</label>
																<div class="col-md-4">
																	<input id="resArea_m" name="resArea_m" type="text"
																		placeholder="E.g. HSR Layout"
																		class="form-control input-md">
																</div>
															</div>

														</form>
													</div>
													<div class="modal-footer">
														<button type="button" id="cancel"
															class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
														<button type="button" id="save" class="btn btn-primary "
															data-dismiss="modal">
															Save <i class="fa fa-arrow-circle-right fa-lg"></i>
														</button>

													</div>
												</div>
												<!-- /.modal-content -->
											</div>
											<!-- /.modal-dialog -->
										</div>
										<!-- /.modal compose message -->


										<div class="form-group">
											<label class="col-md-4 control-label" for="landmark">Landmark</label>
											<div class="col-md-4">
												<textarea class="form-control input-md" name="landmark"
													id="landmark" rows="5">
												</textarea>
											</div>
										</div>

										<!-- Example from github              
										<!-- http://eonasdan.github.io/bootstrap-datetimepicker/#options -->
										<script type="text/javascript">
								            $(function () { 
								                 $('#datetimepicker1').datetimepicker(); 
								             }); 
										</script>
									</fieldset>
								</form>

								<label class="col-md-4 control-label" for="submit"></label>
								<div class="col-md-4">
									<button id="createEvent" name="submit" class="btn btn-default">
										<strong>Submit</strong>
									</button>
								</div>
								<br></br>
							</div>
							<!-- InviteFriends -->
							<div class="tab-pane" id="InviteFriends">
								<form class="form-horizontal" id="iFriend">
									<fieldset>
										<legend>Invite Friends</legend>

										<div class="form-group">
											<label class="col-md-4 control-label" for="invite">Invite</label>
											<div class="col-md-4">
												<select id="invite" name="invite" class="form-control">
													<option value="0">--Select--</option>
													<option value="1">Facebook Friends</option>
													<option value="2">Hobbymate Friends</option>

												</select>
											</div>
										</div>

										<!-- HobbyMate Friends Modal -->
										<div id="myModal" class="modal fade" tabindex="-1"
											role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal"
															aria-hidden="true">&times;</button>
														<h3>Invite Friends</h3>
													</div>
													<div class="modal-body">


														<?php include_once 'InviteToEvent.php'; ?>

													</div>
													<div class="modal-footer">
														<button class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>

									</fieldset>
								</form>


								<div>
									<button id="backToEvent" name="submit" class="btn btn-default">Prev</button>

									<button id="done" name="submit"
										class="btn btn-default pull-right">Done</button>
								</div>
								<br></br>
							</div>
						</div>
					</div>
					<hr>
				</div>

				<div class="tab-pane" id="sactivity">
					<br />

					<div>
						<h4>Events from your network</h4>
						<div align="right">
							<button class="load_more btn-primary" id="load_more_button">Load
								More</button>
						</div>
					</div>
					<?php include 'user/events/networkEvents.php';?>
					<div id="results"></div>

					<div>
						<h4>Events of your interests</h4>
						<div align="right">
							<button class="load_more_events btn-primary"
								id="load_more_events_button">Load More</button>
						</div>
					</div>

					<?php include 'user/events/hobbyEvents.php';?>
					<div id="resultsEvents"></div>


					<form class="form-horizontal" id="searchEvents" method="POST"
						action="searchEvents.php">
						<fieldset>

							<legend>Search for upcoming activity</legend>

							<div class="form-group">
								<label class="col-md-4 control-label" for="organization">Organization</label>
								<div class="col-md-4">
									<input id="organization" name="organization" type="text"
										placeholder="E.g. Infosys" class="form-control input-md">

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="orgLocation">Location</label>
								<div class="col-md-4">
									<input id="orgLocation" name="orgLocation" type="text"
										placeholder="E.g. Electronic City"
										class="form-control input-md">

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="aptName">Apartment
									Name</label>
								<div class="col-md-4">
									<input id="aptName" name="aptName" type="text"
										placeholder="E.g. Sobha Daffodail"
										class="form-control input-md">

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="resArea">Residential
									Area</label>
								<div class="col-md-4">
									<input id="resArea" name="resArea" type="text"
										placeholder="E.g. HSR Layout" class="form-control input-md">

								</div>
							</div>

							<div class="form-group">
								<label class="col-md-4 control-label" for="submit"></label>
								<div class="col-md-4">
									<button id="submit" name="submit" class="btn btn-default">Search</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
		<!-- 	</div> -->
	</div>
</div>
