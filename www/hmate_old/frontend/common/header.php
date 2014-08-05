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
<link href="css/userProfile.css" rel="stylesheet">
<link href="css/inbox.css" rel="stylesheet">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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
				<a class="navbar-brand logo" href="index.php">HobbyMate</a>
			</div>
			<div class="navbar-collapse collapse ">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php#top">home</a></li>
					<li><a href="index.php#interests ">hobbies</a></li>
					<li><a href="index.php#events">events</a></li>
					<li><a href="index.php#blogs">blogs</a></li>
					<li><a href="index.php#about">about</a></li>
					<li><a href="index.php#contact">contact</a></li>
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
								<li><a href="../backend/logout.php">logout</a></li>
								<li><a href="inbox.php">inbox</a></li>
								<li><a href="userProfile.php?id=<?php 
									echo $_SESSION['uid'] ; 
								?>">My Account</a></li>
							</ul>
					</li>
					<?php 	
						} else {
                	?>
					<li><a href="index.php#signIn">signIn</a></li>
                	<?php 		
                		}
                	?>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
		
		
	</div>
	<!-- End Fixed navbar -->
	<!--  End Header -->
