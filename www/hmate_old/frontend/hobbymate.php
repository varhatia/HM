<?php
include_once 'common/header.php';
session_start();
?>

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
					<p>Description of hobbies</p>
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
									src="img/2.jpg" alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element sports fitness" data-category="sports">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element sports fitness" data-category="sports">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/3.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element sports" data-category="sports">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/2.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element mdance fitness" data-category="branding">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element Logo_design fitness"
							data-category="Logo_design">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/3.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element other print" data-category="other">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/2.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element fitness" data-category="fitness">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/3.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element fitness" data-category="fitness">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element Logo_design fitness"
							data-category="Logo_design">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/3.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
									</h4>
								</div>
							</div>
						</div>
						<div class="element carts" data-category="carts">
							<div class="hexagon">
								<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
									alt="filter" />
								</a>
								<div class="portfolio-title">
									<h4>
										John Doe<span>Art-Director</span>
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
								<small> Events</small>
							</h1>
						</header>
					</div>
					<p>List of Events to go here</p>
					<div class="row">
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Event<span>Name</span>
										</h4>
									</div>
								</div>
								<p>Short Description</p>
								<button type="submit" class="btn btn-default">Check Out</button>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/2.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Event<span>Name</span>
										</h4>
									</div>
								</div>
								<p>Short Description</p>
								<button type="submit" class="btn btn-default">Check Out</button>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/3.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Event<span>Name</span>
										</h4>
									</div>
								</div>
								<p>Short Description</p>
								<button type="submit" class="btn btn-default">Check Out</button>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											Event Name<span>Date</span>
										</h4>
									</div>
								</div>
								<p>Short Description</p>
								<button type="submit" class="btn btn-default">Check Out</button>
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
								About Us<small> // One</small>
							</h1>
						</header>
					</div>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean
						nibh erat, sagittis sit amet congue at, aliquam eu libero. Integer
						molestie, turpis vel ultrices facilisis, nisi mauris sollicitudin
						mauris. aliquam eu libero. Integer molestie, turpis vel ultrices
						facilisis, nisi mauris sollicitudin mauris.</p>
					<div class="row">
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											John Doe<span>Art-Director</span>
										</h4>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Aenean nibh erat, sagittis sit amet congue at, aliquam eu
									libero.</p>
								<ul class="about_social">
									<li><a href="#"><i class="fa fa-facebook"></i> </a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
									<li><a href="#"><i class="fa fa-twitter"></i> </a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i> </a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/2.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											John Doe<span>Art-Director</span>
										</h4>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Aenean nibh erat, sagittis sit amet congue at, aliquam eu
									libero.</p>
								<ul class="about_social">
									<li><a href="#"><i class="fa fa-facebook"></i> </a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
									<li><a href="#"><i class="fa fa-twitter"></i> </a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i> </a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/3.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											John Doe<span>Art-Director</span>
										</h4>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Aenean nibh erat, sagittis sit amet congue at, aliquam eu
									libero.</p>
								<ul class="about_social">
									<li><a href="#"><i class="fa fa-facebook"></i> </a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i> </a></li>
									<li><a href="#"><i class="fa fa-twitter"></i> </a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i> </a></li>
									<li><a href="#"><i class="fa fa-pinterest"></i> </a></li>
								</ul>
							</div>
						</div>
						<div class="col-xs-12 col-md-3 col-sm-6">
							<div class="about_wrap_one">
								<div class="hexagon">
									<a href="#"> <span class="mask"></span> <img src="img/1.jpg"
										alt="filter" />
									</a>
									<div class="portfolio-title">
										<h4>
											John Doe<span>Art-Director</span>
										</h4>
									</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
									Aenean nibh erat, sagittis sit amet congue at, aliquam eu
									libero.</p>
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

	<!--SignIn -->
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
							<a href="https://localhost/frontend/fbconnect.php" class="btn btn-lg btn-primary btn-block">Facebook</a>
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

		<!--Contact -->
		<div id="contact" class="contact">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-12 col-sm-12">
						<div class=" container TitleSection">
							<header class="page-head">
								<h1>
									Contact <small> // Us</small>
								</h1>
							</header>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-7 col-sm-12">
								<p>One morning, when Gregor Samsa woke from troubled dreams, he
									found himself transformed in his bed into a horrible vermin. He
									lay on his armour-like back, and if he lifted his head a little
									he could see his brown belly, slightly domed and divided by
									arches into stiff sections</p>
								<p>
									Please be patient while waiting for response. (24/7 Support!) <br>
									<strong> Phone General Inquiries: 1-234-567-8910-1234</strong>
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
											<input type="text" size="50" name="website" id="website"
												value="" class="form-control" placeholder="Website" />
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
										<strong>Company, Inc.</strong><br> 795 Folsom Ave, Suite 600
										San Francisco, CA 94107<br> <abbr title="Phone">Tel:</abbr>
										(123) 456-7890<br> <abbr title="Fax">Fax:</abbr> (123)
										456-7890
									</address>
									<address>
										<strong>Email</strong> <a href="mailto:#">first.last@example.com</a><br>
										<strong>website</strong> <a href="#page13">www.company.com</a>
									</address>
								</div>
								<div class="google">
									<h3>Find the Address</h3>
									<div id="map"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /contact -->

<?php
include_once 'common/footer.php';
?>
		