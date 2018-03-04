<?php 
session_start(); 
if(!isset($_SESSION["username"])){
	$_SESSION['go']=1;
	echo '<script language="javascript">
	alert("You need to Sign In to use this feature!!!")
	window.location.href="login.php"
	</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>templates</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/myjs.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
	</head>
	<body>

		<!-- Header -->
			<header id="header">
				<h1><a href="#">Shop Goes Online Here!</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="ourgoal.php">Our Goal</a></li>
						<li><a href="websitebuilder.php">Website Builder</a></li>
						<?php 
						if(isset($_SESSION["username"])){
							echo '<li><a href="logout.php" class="button special" rel="nofollow" onClick="return confirm(\'Do You Really Want To logout??\');">Logout</a></li>';
						}
						else{
							echo '<li><a href="login.php" class="button special">Sign Up/In</a></li>';
						}
						?>
					</ul>
				</nav>
			</header>

		<!-- Main -->
			<section id="main" class="wrapper">
				<h2 align="center" >Choose From Our Finest Themes</h2>
				<h3 align="center" >Made By Our Design Crew</h3>
				<h4 align="center">Click on Image to Choose</h4>
				<div class="container">
				<div class="box alt">
					<div class="row 50% uniform">
						<?php $files = glob("images/templates/*.{jpg,gif,png,jpeg}", GLOB_BRACE);
							$count = 0;
							foreach($files as $f){
								$img = ltrim($f,'.');
								if($count == 0 || $count == count($files)-1 ){
									echo '<div class="12u"><span class="image fit"><img id='.($count+1).' src='.$img.' onclick="img_click('.($count+1).');" alt="Template '.($count+1).'" /></span></div>';
								}
								else{
									echo '<div class="4u"><span class="image fit"><img id='.($count+1).' src='.$img.' onclick="img_click('.($count+1).');" alt="Template '.($count+1).'" /></span></div>';
								}
								$count++;
							}
						?>
					</div>
				</div>
					
				</div>
			</section>

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Online Shop Maker</h3>
								<ul class="unstyled">
									<li><a href="index.php">Home</a></li>
									<li><a href="login.php">Register/Log In</a></li>
									<li><a href="ourgoal.php">Our Goal</a></li>
									<li><a href="websitebuilder.php">Website Builder</a></li>
								</ul>
							</section>
							<section class="3u 6u(medium) 12u$(small)">
								<h3>Location</h3>
								<ul class="unstyled">
									<li><a>LDRP-ITR,</a></li>
									<li><a>Sector-15,Near Kh-5,</a></li>
									<li><a>Gandhinagar,</a></li>
									<li><a>Gujarat.</a></li>
								</ul>
							</section>
							<section class="3u$ 6u$(medium) 12u$(small)">
								<h3>Contact Us</h3>
								<ul class="unstyled">
									<li><a>mail@onlineshopmaker.dx.am</a></li>
									<li><a>(+91)9427606780</a></li>
									<li><a>(+91)9408640023</a></li>
								</ul>
							</section>
							</div>
					</section>
					<div class="row">
						<div class="8u 12u$(medium)">
							<ul class="copyright">
								<li>&copy; Online Shop Maker. All rights reserved.</li>
								<li>Design & Images: <a href="#">Online Shop Maker</a></li>
							</ul>
						</div>
						<div class="4u$ 12u$(medium)">
							<ul class="icons">
								<li>
									<a class="icon rounded fa-facebook"><span class="label">Facebook</span></a>
								</li>
								<li>
									<a class="icon rounded fa-twitter"><span class="label">Twitter</span></a>
								</li>
								<li>
									<a class="icon rounded fa-google-plus"><span class="label">Google+</span></a>
								</li>
								<li>
									<a class="icon rounded fa-linkedin"><span class="label">LinkedIn</span></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</footer>
					
					
							<?php  
/*if(!isset($_SESSION["username"])){
	echo '<script language="javascript">
	alert("You need to Sign In to use this feature!!!")
	window.location.href="login.php"
	</script>';
}*/
?>
