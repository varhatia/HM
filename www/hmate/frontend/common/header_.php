<?php
if (!isset($_SESSION)) {
	session_start();
}
error_reporting(E_ERROR | E_PARSE);

?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description"
	content="HobbyMate | One stop shop for your Hobby needs">
<meta name="author" content="Vishal Arhatia">
<title>HobbyMate!!! | Learn, Share & Teach Hobbies!!!</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/boot-business.css" rel="stylesheet">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet"
	media="screen">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/font-awesome-ie7.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/inbox.css" rel="stylesheet">
<script src="js/jquery-1.11.1.js"></script>
<script src="js/jquery-migrate-1.2.1.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>


</head>
<body>
	<!-- Start: HEADER -->
<header>
		<!-- Start: Navigation wrapper -->
		<div class="navbar navbar-fixed-top">
		<div class="navbar-default">
			<div class="container">
				<div class="container"><div class="navbar-header"><a href="index.php" class="navbar-brand-bootbus navbar-brand">HobbyMate</a></div>
					
					<div class="collapse navbar-collapse">
						<ul class="nav pull-right navbar-nav">
							<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Knowledge Zone
									<b class="caret"></b>
							</a>
								<ul class="dropdown-menu">
									<li class="nav-header">Fitness</li>
									<li><a href="product.php">Yoga</a></li>
									<li><a href="product.php">Aerobics</a></li>
									<li><a href="product.php">Body Building</a></li>
									<li><a href="all_services.php">More Fitness Activities</a></li>
									<li class="divider"></li>
									<li class="nav-header">Outdoor</li>
									<li><a href="product.php">Cycling</a></li>
									<li><a href="product.php">Running</a></li>
									<li><a href="product.php">Trekking</a></li>
									<li><a href="all_services.php">More Outdoor Activities</a></li>
									<li class="divider"></li>
									<li class="nav-header">Music &amp; Dance</li>
									<li><a href="product.php">Guitar</a></li>
									<li><a href="product.php">Flute</a></li>
									<li><a href="product.php">Keyboard</a></li>
									<li><a href="product.php">Salsa</a></li>
									<li><a href="all_services.php">More Music &amp; Dance</a></li>
									<li class="divider"></li>
									<li class="nav-header">Creative</li>
									<li><a href="product.php">Painting</a></li>
									<li><a href="product.php">Cooking</a></li>
									<li><a href="product.php">Cartooning</a></li>
									<li><a href="product.php">Mehandi</a></li>
									<li><a href="all_services.php">More Creative Arts</a></li>
									<li class="divider"></li>
									<li class="nav-header">Sports</li>
									<li><a href="service.php">Cricket</a></li>
									<li><a href="service.php">Football</a></li>
									<li><a href="service.php">Basketball</a></li>
									<li><a href="all_services.php">More Sports</a></li>
								</ul>
							</li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">About<b class="caret"></b>
							</a>
								<ul class="dropdown-menu">
									<li><a href="our_works.php">Our works</a></li>
									<li><a href="patnerships.php">Partners</a></li>
									<li><a href="leadership.php">Leadership</a></li>
									<li><a href="news.php">News</a></li>
									<li><a href="events.php">Events</a></li>
									<li><a href="blog.php">Blog</a></li>
								</ul>
							</li>
							<li><a href="faq.php">FAQ</a></li>
							<li><a href="contact_us.php">Contact us</a></li>



							<?php if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {?>
							<li>
							<!--  li class="dropdown"--><!--  a href="#" class="dropdown-toggle"
								data-toggle="dropdown"--><?php echo "Welcome ". $_SESSION['username'] ; ?>
									<!-- b class="caret"></b> </a-->
								<!-- ul class="dropdown-menu">
								
									<li><a href="../backend/logout.php">logout</a></li>
								</ul-->
							</li>
							
								<li><a href="../backend/logout.php">Logout</a></li>
							<?php 	
}else {
                ?>

							<li><a href="signup.php">Sign up</a></li>
							<li><a href="signin.php">Sign in</a></li>
							<li><a href="index.php">Welcome Guest</a></li>
							<?php 		
                	}

                	?>



						</ul>


					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- End: Navigation wrapper -->
	</header>
	<!-- End: HEADER -->