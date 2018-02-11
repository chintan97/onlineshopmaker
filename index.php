<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Online Shop Maker</title>
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
	<body class="landing">

		<!-- Header -->
			<header id="header">
				<h1><a href="#">Shop Goes Online Here!</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="ourgoal.php">Our Goal</a></li>
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


			<section id="banner">
				<h2>Hi. This is Us.</h2>
				<p>Your Online Shop Maker.</p>
			</section>
			
			<section id="one" class="wrapper style1 special">
				<div class="container">
					<header class="major">
						<h2>Our Features</h2>
						<p>What We Have Here!</p>
					</header>
					<div class="row 150%">
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color1 fa-cloud"></i>
								<h3>Website Builder</h3>
								<p>We will make a website for your shop and will take your whole business online.</p>
							</section>
						</div>
						<div class="4u 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color9 fa-desktop"></i>
								<h3>Easy User Interface</h3>
								<p>We build a easy user Interface so that you can easily deal with website building.</p>
							</section>
						</div>
						<div class="4u$ 12u$(medium)">
							<section class="box">
								<i class="icon big rounded color6 fa-rocket"></i>
								<h3>Faster and Better</h3>
								<p>Taking your small business online will be much more Faster and Easier.</p>
							</section>
						</div>
					</div>
				</div>
			</section>

		<!-- Two -->
			<section id="two" class="wrapper style2 special">
				<div class="container">
					<header class="major">
						<h2>Let's Meet Our Team.</h2>
						<p>THE BEST WE HAVE</p>
					</header>
					<section class="profiles">
						<div class="row">
							<section class="3u 6u(medium) 12u$(xsmall) profile"></section>
							<section class="3u 6u(medium) 12u$(xsmall) profile">
								<img src="images/nandishpatel.gif" alt="" />
								<h4><a href="https://facebook.com/nandishpatel1996">Nandish Patel</a></h4>
								<p>Frontend and Backend</p>
							</section>
							<section class="3u 6u$(medium) 12u$(xsmall) profile">
								<img src="images/chintanpatel.gif" alt="" />
							<h4><a href="https://www.facebook.com/chintan97patel">Chintan Patel</a></h4>
								<p>Backend and Database</p>
							</section>
						</div>
					</section>
					<footer>
					<p>We are here to serve you in a best way possible. We have the Best Resources and Man Power do so.</p>
						<ul class="actions">
							<li>
								<a href="signup.php" class="button big">Let's Get Started!</a>
							</li>
						</ul>
					</footer>
				</div>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style3 special">
				<div class="container">
					<header class="major">
						<h2>Leave a Messege</h2>
						<p>Share your Feedback, We need an honest Review!</p>
					</header>
				</div>
				<div class="container 50%">
					<form action="feedback.php" method="post" name='feedback'>
						<div class="row uniform">
							<div class="6u 12u$(small)">
							<?php 
								if(isset($_SESSION["username"])){
									$arr=explode('#',$_SESSION["other"]);
								}
							?>
							<input name="name" id="name" <?php if(isset($_SESSION["username"])){echo 'readonly="readonly"';}?> value="<?php if(isset($_SESSION["username"])){echo $arr[0];} else{ echo '';} ?>" placeholder="Name" type="text" required>
							</div>
							<div class="6u$ 12u$(small)">
								<input name="email" id="email" <?php if(isset($_SESSION["username"])){echo 'readonly="readonly"';}?> value="<?php if(isset($_SESSION["username"])){echo $arr[1];} else{ echo '';} ?>" placeholder="Email" type="email" required>
							</div>
							<div class="12u$">
								<textarea name="message" id="message" placeholder="Message" rows="6"></textarea>
							</div>
							<div class="12u$">
								<ul class="actions">
									<li><input value="Send Message!" class="special big" type="button" onClick='submit_feedback();'></li>
								</ul>
							</div>
						</div>
					</form>
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
									<li><a href="#">Home</a></li>
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

	</body>
</html>