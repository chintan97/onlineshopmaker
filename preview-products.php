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

		<script>
		function showResult(str) {
		  if (str.length==0) { 
		    document.getElementById("show_product").innerHTML="";
		    document.getElementById("show_product").style.border="0px";
		    return;
		  }
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else {  // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("show_product").innerHTML=this.responseText;
		      document.getElementById("show_product").style.border="1px solid #A5ACB2";
		    }
		  }
		  xmlhttp.open("GET","search_product.php?q="+str,true);
		  xmlhttp.send();
		}
		</script>

	</head>
	<body>
	<!-- Header -->
			<header id="header">
				<h1>Product preview page</h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="ourgoal.php">Our Goal</a></li>
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

			<!--Main section-->
			<section id="main" class="wrapper">
				<div class="container">
					<h2 style="color:blue">Product entry summary</h2>
					<br>

					<?php
						$file = fopen("user_folders/".$_SESSION['username']."/product_data.json", 'r');
						if (filesize("user_folders/".$_SESSION['username']."/product_data.json") == 0){
							echo "<h3>You have not entered any products till now!!!</h3>";
						}
						else{
							$file_read = fread($file, filesize("user_folders/".$_SESSION['username']."/product_data.json"));
							$json_array = json_decode($file_read, true);
							foreach ($json_array as $key => $value) {
								$_SESSION['shop_name'] = $key;
							}
							if (count($json_array[$_SESSION['shop_name']]) == 0){
								echo "<h3>You have not entered any products till now!!!</h3>";
							}
							else{
								echo "<h3>Total product entered: ".count($json_array[$_SESSION['shop_name']])."</h3>";
								$product_names = [];
								foreach ($json_array[$_SESSION['shop_name']] as $key=>$value) {
									array_push($product_names, $key);
								}
								$_SESSION["names"] = $product_names;
								?>
								<div align="left">
									<div class="3u 6u$(4)">
										Search by produt name: 
										<div align="left">
										 <input type="text" id="search_product" name="search_product" onkeyup="showResult(this.value);">
										 	<div id="show_product"></div>
										 </div>
									</div>
								</div>
								<?php

								if (isset($_GET["pro"])){
									$got_name = $_GET["pro"];
									if ($got_name != ""){
										echo "<br><br><h4>Showing data for product name: ".$got_name."</h4>";
										$data_to_show = $json_array[$_SESSION['shop_name']][$got_name];
										foreach ($data_to_show as $key => $value) {
											if ($key != "product_image")
												if ($value != "")
													echo "<br>".$key.": ".$value;
												else
													echo "<br>".$key.": Not specified";
											else{
												echo "<br>product_image";
												for ($j=0; $j<count($value); $j++){
												?>
													<br><img alt="Image could not be loaded" width="400" src="<?php echo 'user_folders/'.$_SESSION['username'].'/images/'.$value[$j]; ?>" border="5"/>
												<?php
												}
											}
										}
									}
								?>
								<script>    
    								if(typeof window.history.pushState == 'function') {
        							window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    								}
									</script>
								<?php
								}
							}
						}
					?>

				</div>
			</section>

			<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<section class="links">
						<div class="row">
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