<?php 
?>
				<div class="tab-pane active" id="egang">
					<div>
						<h4>HobbyMate's sharing your interests</h4>
						<div align="right">
							<button class="load_users btn-primary" id="load_users_button">Load
								More</button>
						</div>
					</div>
					<?php include 'user/friends/hobbyUsers.php';?>
					<div id="hobbyUser"></div>

					<div>
						<h4>HobbyMate's near your workplace</h4>
						<div align="right">
							<button class="load_users_w btn-primary" id="load_users_button">Load
								More</button>
						</div>
					</div>
					<?php include 'user/friends/workHobbyUsers.php';?>
					<div id="whobbyUser"></div>

					<div>
						<h4>HobbyMate's near your residential area</h4>
						<div align="right">
							<button class="load_users_r btn-primary" id="load_users_r_button">Load
								More</button>
						</div>
					</div>
					<?php include 'user/friends/placeHobbyUsers.php';?>
					<div id="rhobbyUser"></div>
					<form class="form-horizontal" id="searchMembers" method="POST"
						action="searchCycMembers.php">
						<br />
						<fieldset>

							<legend>Search for your HobbyMate!!!</legend>

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
<?php ?>