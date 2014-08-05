<?php
include_once 'common/header.php';
session_start();
?>
<!DOCTYPE html>

<!-- Start: MAIN CONTENT -->
<div
	class="content">
	<div class="item">
		<div class="hero-unit">
			<div class="row-fluid">
				<div class="span6 marketting-info">
					<h1>Welcome</h1>
					<h3>At Hobbymate,we aim to help people in learning & utilizing their activity of interest by connecting them with like minded people who share the same interest or finding the right institute for their learning.</h3>
					<a href="JoinNow.php" class="btn btn-primary">Join US</a>
				</div>
				<div class="span6">
					<?php include_once 'slideshow.php';?>				
				</div>
			</div>
		</div>
	</div>
	<!-- Start: Our Solutions -->
	<div class="container">
		<div class="page-header">
			<h2>Explore Now</h2>
		</div>
		<div class="row-fluid">
			<ul class="thumbnails">
				<li class="span4">
					<div class="thumbnail">
						<img src="img/joinUs.jpg" alt="product name">
						<br/>
						<div class="caption">
							<h3>For Learners & Teachers</h3>
							<p>
								Whether you want to learn, share or teach we have solution for
								you. Come join the India's biggest network of multi-skill
								people!!! <br /> <br />
							</p>
						</div>
						<div class="widget-footer">
							<p>
								<a href="JoinNow.php" class="btn btn-primary">JOIN NOW</a>&nbsp;
							</p>
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
						<img src="img/partner.jpg" alt="product name">
						<div class="caption">
							<h3>For Institutes</h3>
							<p>If you are a institute specialized in teaching any kind of
								skill, then HobbyMate is the right place for you. Partner us and get the
								best students. What more! We offer range of services. Get in
								touch now!!!</p>
						</div>
						<div class="widget-footer">
							<p>
								<a href="#" class="btn btn-primary">PARTNER US</a>&nbsp;
							</p>
						</div>
					</div>
				</li>
				<li class="span4">
					<div class="thumbnail">
						<img src="img/forum.jpg" alt="product name">
						<div class="caption">
							<h3>Discussion Forum</h3>
							<p>At HobbyMate, we beleive in healthy discussion.
							   Login to forum & discuss the activity of your interest with others.
							   Start Now!!!
							   </p>
						</div>
						<br/>
						<div class="widget-footer">
							<p>
								<a href="#" class="btn btn-primary">GO TO MARKETPLACE</a>&nbsp;
							</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<!-- End: PRODUCT LIST -->
</div>
<!-- End: MAIN CONTENT -->
<?php
include 'common/footer.php';
?>
