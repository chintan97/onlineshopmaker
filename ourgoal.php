<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>our goal</title>
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
						<li><a href="#">Our Goal</a></li>
						<li><a href="websitebuilder.php">Website Builder</a></li>
						<?php 
						if(isset($_SESSION["username"])){
							echo '<li><a href="logout.php" class="button special" rel="nofollow" onClick="return confirm(\'Do You Really Want To LogOut??\');">LogOUT</a></li>';
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
				<div class="container">

					<header class="major">
						<h2>Our Goal</h2>
						<p>What We Do Here At Online Shop Maker</p>
					</header>

					<a class="image fit"><img src="images/7.jpg" alt="WhatWeDO" /></a>
					<p>Online Shop Maker is here to make your shop and business online so that it can be worldwide. Online Shop Maker is here to offer you a website and a inventory management for your online shop. Online Shop Maker is also will be there to Provide best website and faster database transactions.</p>
					<p>Online Shop Maker allows you to choose products as many as you want for your online shop, then on the basis of that Online Shop Maker will create tables(as many as products) in a Database for your website. Then you can aslo choose how many fields you want for a paritcular product like price, name, id, and many more. Then when all will be done by online shop maker, it will give us an operatable Database for your online shop. And at last your inventory management would be there based on the details you will provide.</p>
					<p>Now when Database is created, the next step will be of creating website itself. For creating website Online Shop Maker will give you number of themes from which you can choose, after you choose a theme, we will get you a bundle of a website for a demo where you can check User Interface and other things. After you will approve the demo we will generate admin panel for your website from where you can add products to your database, give discounts, change colors of elements in a website, in short from where you can make changes to your website and database. And it will be so simple that anybody would be able to do that.</p>
					<p>After Everything is set up. Your Online Shop is Ready to go online. You can host it anywhere you want.</p>
					<ul class="actions">
							<li>
								<a href="websitebuilder.php" class="button big">Take Your Shop Online Now!</a>
							</li>
						</ul>
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
									<li><a href="#">Our Goal</a></li>
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

	</body>
</html>