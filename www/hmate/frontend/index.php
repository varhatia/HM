<?php
if (!isset($_SESSION)) {
	session_start();
}
error_reporting(E_ERROR | E_PARSE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<meta name="keywords"
	content="business, corporate, corporate website, creative, html5, marketing, multipurpose, responsive, site templates">
<link rel="shortcut icon" href="img/favicon.png">
<title>Passion</title>

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">

<!-- Add custom CSS here -->
<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target="#ha-header">

	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" id="ha-header">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="index.html">HobbyMate</a>
			</div>
			<div class="navbar-collapse collapse ">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#top">home</a></li>
					<li><a href="#interests ">hobbies</a></li>
					<li><a href="#events">events</a></li>
					<li><a href="#blogs">blogs</a></li>
					<li><a href="#about">about</a></li>
					<li><a href="#contact">contact</a></li>
					<?php
						if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
					?>
					<li>
						<li class="dropdown"> 
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
								<?php 
									echo "Welcome ". $_SESSION['username'] ; 
								?>
								<b class="caret"></b>
							</a> 
							<ul class="dropdown-menu">
								<li><a href="user/inbox/inbox.php">inbox</a></li>
								<li><a href="login/logout.php">logout</a></li>
								<li><a href="user/userProfile.php?id=<?php 
									echo $_SESSION['uid'] ; 
								?>">My Account</a></li>
								
							</ul>
					</li>
					<?php 	
						} else {
                	?>
					<li><a href="#signIn">signIn</a></li>
                	<?php 		
                		}
                	?>
									</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
	<!-- End Fixed navbar -->

	<!-- Full Page Image Header Area -->
	<div id="top" class="header">
		<div class="flexslider">
			<ul class="slides">
				<li><img src="img/slider/1.jpg" alt="slider" />
					<p class="flex-caption">Interesting Captions Coming Here</p></li>
				<li><img src="img/slider/2.jpg" alt="slider" />
					<p class="flex-caption">Interesting Captions Coming Here.</p></li>
				<li><img src="img/slider/3.jpg" alt="slider" />
					<p class="flex-caption">Interesting Captions Coming Here.</p></li>
				<li><img src="img/slider/4.jpg" alt="slider" />
					<p class="flex-caption">Interesting Captions Coming Here.</p></li>
				<li><img src="img/slider/5.jpg" alt="slider" />
					<p class="flex-caption">Interesting Captions Coming Here.</p></li>
				<li><img src="img/slider/6.jpg" alt="slider" />
					<p class="flex-caption">Interesting Captions Coming Here.</p></li>
			</ul>
		</div>
	</div>
	<!-- /Full Page Image Header Area -->

	<!-- Hobbies -->
	<div id="interests" class="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class=" container TitleSection">
						<header class="page-head">
							<h1>Hobbies</h1>
						</header>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<section id="filter_header" class="clearfix portfolioFilter">
						<ul id="filters" class="option-set clearfix"
							data-option-key="filter">
							<li><a href="#filter" data-option-value="*" class="selected">all</a>
							</li>
							<li><a href="#filter" data-option-value=".sports">Sports</a></li>
							<li><a href="#filter" data-option-value=".mdance">Music And Dance</a>
							</li>
							<li><a href="#filter" data-option-value=".carts">Creative Arts</a>
							</li>
							<li><a href="#filter" data-option-value=".fitness">Fitness</a></li>
						</ul>
					</section>
					<div id="filter_container" class="clearfix portfolioContainer">
						<div class="element sports fitness" data-category="sports">
							<div class="hexagon">
								<a href="cycling.php"> <span class="mask"></span> <img
									src="img/Cycling.jpg" alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Cycling<span>cycling</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element sports fitness" data-category="sports">
							<div class="hexagon">
								<a href="sendsms.php"> <span class="mask"></span> <img src="img/2Cricket.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Cricket<span>cricket</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element sports fitness" data-category="sports">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Badminton.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Badminton<span>badminton</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element sports" data-category="sports">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Volleyball.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Volleyball<span>Volleyball</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element fitness" data-category="fitness">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Running.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Running
									</h4>
								</div>
							</div>
						</div>
						<div class="element fitness"
							data-category="fitness">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Yoga.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Yoga
									</h4>
								</div>
							</div>
						</div>
						<div class="element fitness" data-category="fitness">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Aerobics.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Aerobics
									</h4>
								</div>
							</div>
						</div>
						<div class="element mdance" data-category="mdance">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Dance.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Dance
									</h4>
								</div>
							</div>
						</div>
						<div class="element carts" data-category="carts">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Cooking.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Cooking
									</h4>
								</div>
							</div>
						</div>
						<div class="element mdance"
							data-category="mdance">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Guitar.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Guitar
									</h4>
								</div>
							</div>
						</div>
						<div class="element carts" data-category="carts">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/Photography.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										Photography
									</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Hobbies -->

	<!-- Event -->
	<div id="events" class="about">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class=" container TitleSection">
						<header class="page-head">
							<h1>
								<small>Events</small>
							</h1>
						</header>
					</div>
					<h2>Upcoming HobbyMate Events</h2>
					<div class="row">
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/Cycling.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Cycling @ HSR
										</h4>
									</div>
								</div>
								<p>Cycling enthusiats meeting @ HSR, Bangalore</p>
								<button class="btn btn-default">30th Nov</button>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/Running.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Run for Fun
										</h4>
									</div>
								</div>
								<p>Runners meeting @ Sarjapur, Bangalore</p>
								<button class="btn btn-default">1st Jan</button>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/Cooking.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Let's HOG @ Whitefield
										</h4>
									</div>
								</div>
								<p>Whitefield's Chef meet to serve awesome food</p>
								<button class="btn btn-default">2nd Feb</button>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/Guitar.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											JAM @ Indiranagar
										</h4>
									</div>
								</div>
								<p>Musicians meet to celebrate awesomeness!!!</p>
								<button class="btn btn-default">3rd March</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Event -->

	<!-- Projects-->
	<div id="blogs" class="projects">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class=" container TitleSection">
						<header class="page-head">
							<h1>Blogs</h1>
						</header>
					</div>
					<p>Blogs & News to go here</p>
					<div class="row">
						<div class="col-xs-12 col-md-12 col-sm-12">
							<div class="project_wrap">
								<ul class="cbp-ig-grid">
									<li><a href="#"> <span class="cbp-ig-icon cole-townsend-chat"></span>
											<h3 class="cbp-ig-title">Blog one</h3> <span
											class="cbp-ig-category">Hobby 1</span>
									</a></li>
									<li><a href="#"> <span class="cbp-ig-icon designmodo-location"></span>
											<h3 class="cbp-ig-title">Blog two</h3> <span
											class="cbp-ig-category">Hobby 2</span>
									</a></li>
									<li><a href="#"> <span class="cbp-ig-icon designmodo-settings"></span>
											<h3 class="cbp-ig-title">project three</h3> <span
											class="cbp-ig-category">Lifestyle</span>
									</a></li>
									<li><a href="#"> <span class="cbp-ig-icon cesgra-globe"></span>
											<h3 class="cbp-ig-title">project four</h3> <span
											class="cbp-ig-category">fitness</span>
									</a></li>
									<li><a href="#"> <span class="cbp-ig-icon dom-waters-speedo"></span>
											<h3 class="cbp-ig-title">project five</h3> <span
											class="cbp-ig-category">Gadgets</span>
									</a></li>
									<li><a href="#"> <span
											class="cbp-ig-icon joshua-barker-landscape"></span>
											<h3 class="cbp-ig-title">project six</h3> <span
											class="cbp-ig-category">Music</span>
									</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- projects -->


	<!-- About -->
	<div id="about" class="about">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-md-12 col-sm-12">
					<div class=" container TitleSection">
						<header class="page-head">
							<h1>
								About Us
							</h1>
						</header>
					</div>
					<p>HobbyMate is platform to connect people sharing similar intersts. Create your gang, indulge in your favourite by inviting your gang or participating in one of the HobbyMate
					   events. HobbyMate is new kid on the block and looks forward to the support & suggestions from you.</p>
					<div class="row">
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/Vishal.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Vishal Arhatia<span>Jack of all</span>
										</h4>
									</div>
								</div>
								<p>The brain behind HobbyMate. Crazy about superhero and animation movies. All time favourite being Spider-Man and Poo the Panda of Kung-Fu Panda. He has worked in major IT companies for 8 years. Curretly trying to put his management
									learning in practice at HobbyMate. </p>
								<ul class="about_social">
									<li><a href="#"><i class="fa fa-facebook"></i> </a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
									<li><a href="#"><i class="fa fa-twitter"></i> </a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i> </a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- About -->

			<!--Contact -->
		<div id="contact" class="contact">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class=" container TitleSection">
							<header class="page-head">
								<h1>
									Contact 
								</h1>
							</header>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-7 col-sm-12">
								<h3>Contact Form</h3>
								<p>Vishal is a fitness freak person and likes to indulge in various sports.
								But, when he moved out to bangalore for his job, he struggled to find people 
								who share the similar passion and interests. So, he wondered if there is a 
								platform where he can find people who share similar interests like him and 
								would like to indulge in sporting activities with him. He visited HobbyMate 
								and from then on HobbyMate has been his solution for all his hobby needs.
								</p>
								<div class="contact_wrap">
									<h3>Contact Form</h3>
									<form method="post" action="submit_now.php" id="passion_form">
										<div class="form-group">
											<input type="text" size="50" name="contactname"
												id="InputName" value="" class="form-control required"
												placeholder="Your Name*" />
										</div>
										<div class="form-group">
											<input type="text" size="50" name="email" id="email" value=""
												class="form-control required email"
												placeholder="Enter Email*" />
										</div>
										<div class="form-group">
											<textarea class="form-control required" rows="6" id="message"
												placeholder="Your Message*"></textarea>
										</div>
										<button type="submit" class="btn btn-default">Submit</button>
									</form>
								</div>
							</div>
							<div class="col-xs-12 col-md-5 col-sm-12">
								<div class="jumbotron">
									<h3>Address Info</h3>
									<address>
										<strong>HobbyMate Inc.</strong><br> IIM Bangalore<br> <abbr title="Phone">Tel:</abbr>
										9591636555<br>
									</address>
									<address>
										<strong>Email</strong> <a href="mailto:#">varhatia@gmail.com</a><br>
										<strong>website</strong> <a href="#">www.hobbymate.in</a>
									</address>
								</div>
<!-- 								<div class="google"> -->
<!-- 									<h3>Find the Address</h3> -->
<!-- 									<div id="map"></div> -->
<!-- 								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /contact -->

	
	<!--SignIn -->
		<?php
						if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
					?>
	<div id="signIn" class="projects">
		<div class="container">
			<div class="page-header">
				<h1>Signin to HobbyMate</h1>
			</div>
			<div class="row">
				<div class="main">

					<h3>
						Please Log In, or <a href="#">Sign Up</a>
					</h3>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<a href="https://localhost/frontend/login/fbconnect.php" class="btn btn-lg btn-primary btn-block">Facebook</a>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<a href="#" class="btn btn-lg btn-info btn-block">Google</a>
						</div>
					</div>
					<div class="login-or">
						<hr class="hr-or">
						<span class="span-or">or</span>
					</div>

					<form role="form">
						<div class="form-group">
							<label for="inputUsernameEmail">Username or email</label> <input
								type="text" class="form-control" id="inputUsernameEmail">
						</div>
						<div class="form-group">
							<a class="pull-right" href="#">Forgot password?</a> <label
								for="inputPassword">Password</label> <input type="password"
								class="form-control" id="inputPassword">
						</div>
						<div class="checkbox pull-right">
							<label> <input type="checkbox"> Remember me
							</label>
						</div>
						<button type="submit" class="btn btn btn-primary">Log In</button>
					</form>

				</div>
			</div>
		</div>
		</div>
		<!-- /signIn -->
	<?php
						}
					?>
		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-9 col-sm-12">
						<p>Copyright &copy; 2014 Coyier. All rights reserved.</p>
					</div>
					<div class="col-xs-12 col-md-3 col-sm-12">
						<ul class=" footer_social clearfix">
							<li><a href="#"><i class="fa fa-facebook"></i> </a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
							<li><a href="#"><i class="fa fa-twitter"></i> </a></li>
							<li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
							<li><a href="#"><i class="fa fa-pinterest"></i> </a></li>
							<li class="go_top"><a href="#top"><i
									class="fa fa-chevron-circle-up"></i> </a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<!-- /Footer -->

		<!-- JavaScript -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/nicescroll.min.js"></script>
		<!-- jquery nice scroll-->
		<script src="js/pace.min.js"></script>
		<!--page load progress bar-->
		<script src="js/jquery.validate.min.js"></script>
		<!--contact page-->
		<script src="https://maps.google.com/maps/api/js?sensor=true"></script>
		<!--google map contact page-->
		<script src="js/gmaps.min.js"></script>
		<!--google map contact page-->
		<script src="js/isotope.min.js"></script>
		<!--Portfolio Filter-->
		<script src="js/flexslider.min.js"></script>
		<!-- FlexSlider -->
		<script src="js/waypoints.min.js"></script>
		<!--Header Effect-->
		<script src="js/custom_min.js"></script>
		<!-- Custom JavaScript  -->

</body>
</html>
