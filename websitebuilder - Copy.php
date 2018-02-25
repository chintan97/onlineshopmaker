<?php session_start(); 
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
		<title>Website Builder</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<script src="js/myjs.js"></script>
		<script src="js/list.js"></script>
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
						<li><a href="#">Website Builder</a></li>
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
				<div class="container">

					<header class="major">
						<h2>Builder</h2>
						<p>Here Shop Goes Online</p>
					</header>
					<form method="post" name='builder' action="">
				
					<div id='main_div' align='center'>
					<div id='first_div'>
						<header>
						<h3>Step 1</h3>
						</header>
						<div class="12u 12u$(4)">
							<table>
							<tr><td>Your Shop Name</td><td><input type="text" name="shopname" id="shopname"  placeholder="Shop Name"  required /></td></tr>
							<tr>
							<td>How Many Products You Want In Your Shop? </td>
							<td>
							<div name='type' id='type' class="10u$">
							<input type="text" name="product_type" id="product_type" required/>
							
							<!--<div class="select-wrapper">
								<select name="product_type" id="product_type" onchange='make_fields();' onfocus='check_data_shop();'>
								  <option value="">- Types -</option>
								  <option value="1">1</option>
								  <option value="2">2</option>
								  <option value="3">3</option>
								  <option value="4">4</option>
								  <option value="5">5</option>
								  </select>
							</div>
							-->
							</div>
							</td></tr>
							</table>
						</div>
						</div>
						<!-- <div id="next_button_div" style="display:none;">
							<input type="button" id="next_button" name="next_button" value="next entry" class="special">
						</div> -->
						<div id='hidden_second' style='display:none;'></div>
						<div class="12u$" id='before_submit'>
							<ul class="actions">
								<li><input type="button" id='submit_button' name='next_button' value="Submit" class="special" onclick="last_check();" /></li>
								<li><input type="button" id='reset_button' name='reset_button' value="Reset" onclick='form_reset();'/></li>
							</ul>
						</div>

						<div id='final_submit' style="display:none;">
							<ul class="actions">
								<li><input type="button" id='button_last_submit' name='button_last_submit' value="Submit" class="special" onclick="last_submit();" /></li>
								<li><input type="button" id='preview_product' name='preview_product' value="Preview products" class="special" onclick="window.open('preview-products.php','_blank');" /></li>
								<li><input type="button" id='download_data' name='download_data' value="download data in excel" class="special"onclick="window.open('download-product-data.php','_blank');" /></li>
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
									<li><a href="index.php">Home</a></li>
									<li><a href="login.php">Register/Log In</a></li>
									<li><a href="ourgoal.php">Our Goal</a></li>
									<li><a href="#">Website Builder</a></li>
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
