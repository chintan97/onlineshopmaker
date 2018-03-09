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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
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
		<script type="text/javascript">
			$(document).ready(function() {
				$(".iframe").fancybox({
					type: 'iframe'
					
				});
			});
		</script>
		<script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.css">
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.5/jquery.fancybox.js"></script>
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
						<li><a href="index.php"  onclick="return confirm('All procress will be lost. Do you want to continue??');">Home</a></li>
						<li><a href="ourgoal.php"  onclick="return confirm('All procress will be lost. Do you want to continue??');">Our Goal</a></li>
						<li><a href="websitebuilder.php" onclick="return confirm('All procress will be lost. Do you want to continue??');">Website Builder</a></li>
						<?php 
						if(isset($_SESSION["username"])){
							echo '<li><a href="logout.php" class="button special" rel="nofollow" onClick="return confirm(\'All procress will be lost. Do You Really Want To logout??\');">Logout</a></li>';
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
				<h2 align="center" ><?php $parts = parse_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);parse_str($parts['query'], $query);$x = $query['temp']; echo ucfirst($x);?></h2>
				<div class="container">
					<div class="box alt">
						<div class="12u"><span class="image fit"><img src="templates/<?php echo $x;?>/images/img_1.png" alt=""/></span></div>
						<p><span class="image left"><img src="templates/<?php echo $x;?>/images/img_2.png" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
						<p><span class="image right"><img src="templates/<?php echo $x;?>/images/img_3.png" alt="" /></span>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget. tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent tincidunt felis sagittis eget. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan eu faucibus. Integer ac pellentesque praesent.</p>
						<div class="row 50% uniform">
						<h3>Other Images</h3><br><br>
						<?php 
							$count = 1;
							$files = glob("templates/".$x."/images/*.{jpg,gif,png,jpeg}", GLOB_BRACE);
							foreach($files as $f){
								if($count <= count($files)){
									if($count>3){
										$img = ltrim($f,'.');
										echo '<div class="4u"><span class="image fit"><img src="./'.$img.'"/></span></div>';
										$count++;
									}
									else{
										$count++;
									}
								}
							}
						?>
					</div><br>
					<div align="center"><a href="templatechosen.php?temp=<?php echo $x;?>" class="button">Choose and Proceed</a>&nbsp;&nbsp;<a href="templates/<?php echo $x;?>/main/index.php" class="button iframe" id="live demo">Live Demo</a></div>
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
									<li><a href="index.php" onclick="return confirm('All procress will be lost. Do you want to continue??');">Home</a></li>
									<li><a href="login.php" onclick="return confirm('All procress will be lost. Do you want to continue??');">Register/Log In</a></li>
									<li><a href="ourgoal.php" onclick="return confirm('All procress will be lost. Do you want to continue??');">Our Goal</a></li>
									<li><a href="websitebuilder.php" onclick="return confirm('All procress will be lost. Do you want to continue??');">Website Builder</a></li>
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
if(!isset($_SESSION["username"])){
	echo '<script language="javascript">
	alert("You need to Sign In to use this feature!!!")
	window.location.href="login.php"
	</script>';
}
?>
