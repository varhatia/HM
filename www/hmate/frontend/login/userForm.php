<?php
include_once '../common/header.php';
session_start();
?>

<!-- Start: MAIN CONTENT -->
<div class="container">
	<div class="page-header">
		<h1>Please let us know few details to serve you better</h1>
	</div>
	<div class="row">
		<form class="form-horizontal" id="additionalUserDetails" method="POST"
					action="userDetail.php">
			<br />
			<fieldset id="userDetail" >

				<!-- legend>Expand your hobby gang</legend-->

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
							placeholder="E.g. Electronic City" class="form-control input-md">
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-4 control-label" for="aptName">Apartment Name</label>
					<div class="col-md-4">
						<input id="aptName" name="aptName" type="text"
							placeholder="E.g. Sobha Daffodail" class="form-control input-md">
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


				<div class="form-group formrow">
					<label class="col-md-4 control-label" for="resArea">Hobbies</label>
					<div class="col-md-4 ">
						<select id="hobby[]" name="hobby[]" class="form-control">
							<option value="">Select hobby</option>
							<option value="GUITAR">Guitar</option>
							<option value="PAINTING">Painting</option>
							<option value="YOGA">Yoga</option>
							<option value="AEROBICS">Aerobics</option>
						</select>
					</div>
				</div>



			</fieldset>
			<div class="form-group">
			
					<label class="col-md-4 control-label" for="submit"></label>
					<div class="col-md-4">
						<button id="submit" name="submit" class="btn btn-default">Continue</button>
					</div>
			</div>
		</form>
	
		<label
			class="col-md-4 control-label" for="addMore"></label>
		<div id="addrow col-md-4">
			<input type="button" class="btn" name="addbtn" id="addbtn"
				value="Add More Hobbies!">
		</div>


	</div>
</div>

<!-- End: MAIN CONTENT -->

<?php
include_once '../common/footer.php';
?>
