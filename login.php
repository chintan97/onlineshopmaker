<?php session_start();
if(isset($_SESSION["username"])){
	echo '<script language="javascript">
	alert("You are already Signed In!!!")
	window.location.href="index.php"
	</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Online Shop Maker</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script type="text/javascript" src="js/myjs.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
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
						<li><a href="#" class="button special">Sign Up/In</a></li>
					</ul>
				</nav>
			</header>
			<br><br>
			<h2 style='color:#858585;' align='center'>Log In</h2>
			<section>
				
				<form method="post" name='loginform' action="loginuserdb.php">
					
					<div align='center'>
					
						<div class="9u 12u$(4)">
							<table>
							<tr><td>User Name</td><td><input type="text" name="uname" id="uname"  placeholder="User Name" required /></td></tr>
							<tr><td>Password</td><td><input type="password" name="pwd" id="pwd"  placeholder="Password" required /></td></tr>
							<tr><td colspan=2>Not Have An Account <a href='signup.php'>SignUp Here</a></td></tr>
							</table>
						</div>
						<div class="12u$">
							<ul class="actions">
								<li><input type="button" value="LogIN" class="special" onClick="try_login();" /></li>
							</ul>
						</div>
					</div>
		
				</form>
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
									<li><a href="#">Register/Log In</a></li>
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