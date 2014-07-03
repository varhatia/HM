<?php
include_once 'common/header.php';
session_start();
?>
<!-- Start: MAIN CONTENT -->

<script type="text/javascript">
function verifySubmit() {
	$('input:checkbox').each(function(index, element) {
		if(element.checked) {
			element.value = "1" ;
			
		}else {
			element.value = "0" ;
			element.checked = true;
		}
	}) ;

	return true ;
	
}
</script>

<script src='https://connect.facebook.net/en_US/all.js'></script>
<div id="fb-root"></div>
<script type='text/javascript'>
		if (top.location!= self.location) {
			top.location = self.location
		}

FB.init({
appId: '221623531349006',
cookie:true,
status:true,
xfbml:true
});

function FacebookInviteFriends()
{
FB.ui({
method: 'apprequests',
message: 'HobbyMate!!! Your hobbyworld'
});
}
</script>

<div
	class="content">
	<div class="item">
		<div class="hero-unit">
			<div class="row-fluid">
				<div class="span7">
					<?php 
					if(!isset($_SESSION["uid"])) {
					?>
					<h3 style="color: blue;">
						Please <a href="signin.php">Sign in</a> to submit your hobbies.
					</h3>
					<?php 		
						}
						?>
					<h3>Tell us know your need!!!</h3>
					<br /> <br />
					<?php
					if (isset($_SESSION['errormsg'])) {
	       			?>
					<span style="color: red;"><?php 	echo $_SESSION['errormsg'] ;?> </span>
					<?php
					unset($_SESSION['errormsg']) ;
              		}
              		?>

					<button type="submit" class=”btnbtn-primary”
						onclick="FacebookInviteFriends()">Invite
						
					</button>

					<form class="form-inline" id="needSubmit" method="POST"
						action="../backend/needSubmit.php">
						<fieldset id="hobbies">
							<div class="formrow">
								<select name="hobby[]" class="dropdown">
									<option value="">Select hobby</option>
									<option value="GUITAR">Guitar</option>
									<option value="PAINTING">Painting</option>
									<option value="YOGA">Yoga</option>
									<option value="AEROBICS">Aerobics</option>
								</select> <label class="checkbox" data-toggle="tooltip"
									title="If you want to learn this hobby! HobbyMate assures you of best learning experience!!!">
									<input type="checkbox" name="learn[]" /> Learn
								</label> <label class="checkbox" data-toggle="tooltip"
									title="If you consider yourself at intermediate level & would like to improve through sharing with others like you!">
									<input type="checkbox" name="share[]" /> Share
								</label> <label class="checkbox" data-toggle="tooltip"
									title="If you consider yourself at expert level & would like to teach others! Through HobbyMate support you can earn hell lot of money for doing this!!!">
									<input type="checkbox" name="teach[]" /> Teach
								</label>
							</div>
						</fieldset>
						<div class="form-actions">
							<!--input type=”hidden” name=”save” value=”contact”-->
							<button type="submit" class=”btnbtn-primary”
								onclick="verifySubmit()">Submit</button>
						</div>
					</form>

					<div id="addrow">
						<input type="button" name="addbtn" id="addbtn" value="Add More!">
					</div>
				</div>
				<div class="span5">
					<?php include_once 'slideshow.php';?>
				</div>
			</div>
		</div>
	</div>
	<!-- Start: Our Solutions -->
	<div class="container">
		<div class="page-header">
			<h2>Upcoming Sessions</h2>
		</div>
		<?php include_once 'eventSubSet.php';?>
	</div>
	<!-- End: PRODUCT LIST -->
</div>
<!-- End: MAIN CONTENT -->

<?php
include_once 'common/footer.php';

?>