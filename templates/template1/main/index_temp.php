<?php 
session_start();
$str = file_get_contents('product_data.json');
$json = json_decode($str, true);
//print_r($json);
$shopname = array_keys($json)[0];
$category = array_keys($json[$shopname]);
//print_r($category);

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="onlineshopmaker template">
    <meta name="author" content="onlineshopmaker onlineshopmaker.dx.am">
    <meta name="keywords" content="">

    <title>
        <?php echo $shopname;?>
    </title>

    <meta name="keywords" content="">

    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100' rel='stylesheet' type='text/css'>

    <!-- styles -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">

    <!-- theme stylesheet -->
    <link href="css/style.default.css" rel="stylesheet" id="theme-stylesheet">

    <!-- your stylesheet with modifications -->
    <link href="css/custom.css" rel="stylesheet">

    <script src="js/respond.min.js"></script>

    <link rel="shortcut icon" href="favicon.png">



</head>

<body>

    <!-- *** TOPBAR ***
 _________________________________________________________ -->
    <div id="top">
        <div class="container">
			<div class="col-md-6 offer" data-animate="fadeInDown">
                <a id="offer_button" href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>
				<a id="offer_text" href="#"> 
            <?php 
				if (isset($_SESSION['offer'])){
					echo $_SESSION['offer'];
				}
				else {
					echo 'No Offers For Now';
				}
			?>
			</a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li><a href="register.html">Register</a>
                    </li>
                    <li><a href="contact.html">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Customer Login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="customer-orders.html" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="email-modal" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="password-modal" placeholder="Password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.html"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->

    <div class="navbar navbar-default yamm" role="navigation" id="navbar">
        <div class="container">
            <div class="navbar-header">

                <a class="navbar-brand home" href="#" data-animate-hover="bounce">
                    <h2 style="margin-top:6.5px;color:#3FA449;"><?php echo $shopname;?></h2><span class="sr-only"><?php echo $shopname.' - Homepage';?></span>
                </a>
                <div class="navbar-buttons">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                    <a class="btn btn-default navbar-toggle" href="basket.html">
                        <i class="fa fa-shopping-cart"></i>  <span class="hidden-xs">cart</span>
                    </a>
                </div>
            </div>
            <!--/.navbar-header -->

            <div class="navbar-collapse collapse" id="navigation">

                <ul class="nav navbar-nav navbar-left">
                    <li class="active"><a href="#">Home</a>
                    </li>
					<?php
					for($i=0;$i<count($category);$i++){
						if($i>3){
							echo 
							'<li class="dropdown yamm-fw">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Other<b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li>
									<div class="yamm-content">
										<div class="row"><div class="col-sm-3">
									<h5>Other</h5>
									<ul>';
							for($j=4;$j<count($category);$j++){
								echo '<li><a href="category.html">'.$category[$j].'</a></li>';
							}
							echo '</ul>
									</div>
										</div>
									</div>
									<!-- /.yamm-content -->
								</li>
								</ul>
							</li>';		
							break;

						}
						else{
							$cat = $category[$i];
							echo 
							'<li class="dropdown yamm-fw">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">'.$cat.'<b class="caret"></b></a>
								<ul class="dropdown-menu">
								<li>
									<div class="yamm-content">
										<div class="row">';
							for($j=0;$j<count($json[$shopname][$cat]);$j++){
								$subcat = array_keys($json[$shopname][$cat])[$j];
								echo 
								'<div class="col-sm-3">
									<h5>'.$subcat.'</h5>
									<ul>';
										for($k=0;$k<count($json[$shopname][$cat][$subcat]);$k++){
											if($k>3){
												echo '<li><a href="category.html">More</a></li>';
												break;
											}
											else{
												$subsubcat = array_keys($json[$shopname][$cat][$subcat])[$k];
												echo '<li><a href="category.html">'.$subsubcat.'</a></li>';
											}
										}
									echo '</ul>
								</div>';
							}
							
							echo '
										</div>
									</div>
									<!-- /.yamm-content -->
								</li>
							</ul>
						</li>';
						
						}
					}
                                        
                     
					?>
                </ul>

            </div>
            <!--/.nav-collapse -->

            <div class="navbar-buttons">

                <div class="navbar-collapse collapse right" id="basket-overview">
                    <a href="basket.html" class="btn btn-primary navbar-btn"><i class="fa fa-shopping-cart"></i><span class="hidden-sm">cart</span></a>
                </div>
                <!--/.nav-collapse -->

                <div class="navbar-collapse collapse right" id="search-not-mobile">
                    <button type="button" class="btn navbar-btn btn-primary" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>

            </div>

            <div class="collapse clearfix" id="search">

                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <span class="input-group-btn">

			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>

		    </span>
                    </div>
                </form>

            </div>
            <!--/.nav-collapse -->

        </div>
        <!-- /.container -->
    </div>
    <!-- /#navbar -->

    <!-- *** NAVBAR END *** -->
	
	


    <div id="all">

        <div id="content">

            <div class="container">
                <div class="col-md-12">
                    <div id="main-slider">
							
						<?php
						
							$files = array_diff(scandir('./images',1),array('..','.'));
							for($i=0;$i<count($files);$i++){
								if($i==4){break;}
								else{
									echo '<div class="item"><img class="img-responsive" src="./images/'.$files[$i].'"></div>';
								}
							}
						?>
                        
                    </div>
                    <!-- /#main-slider -->
                </div>
            </div>

            <!-- *** ADVANTAGES HOMEPAGE ***
 _________________________________________________________ -->
            <div id="advantages">

                <div class="container">
                    <div class="same-height-row">
                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-heart"></i>
                                </div>

                                <h3><a href="#">We love our customers</a></h3>
                                <p>We are known to provide best possible service ever</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-tags"></i>
                                </div>

                                <h3><a href="#">Best prices</a></h3>
                                <p>You can check that the height of the boxes adjust when longer text like this one is used in one of them.</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="box same-height clickable">
                                <div class="icon"><i class="fa fa-thumbs-up"></i>
                                </div>

                                <h3><a href="#">100% satisfaction guaranteed</a></h3>
                                <p>Free returns on everything for 3 months.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container -->

            </div>
            <!-- /#advantages -->

            <!-- *** ADVANTAGES END *** -->

            <!-- *** HOT PRODUCT SLIDESHOW ***
 _________________________________________________________ -->
            <div id="hot">

                <div class="box">
                    <div class="container">
                        <div class="col-md-12">
                            <h2>Hot this week</h2>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="product-slider">
						<?php
								$count=0;
								for($i=0;$i<count($category);$i++){	
									$cat = $category[$i];
									for($j=0;$j<count($json[$shopname][$cat]);$j++){
										$subcat = array_keys($json[$shopname][$cat])[$j];
										for($k=0;$k<count($json[$shopname][$cat][$subcat]);$k++){
											$product = array_keys($json[$shopname][$cat][$subcat])[$k];
											$count++;
											$product_array = $json[$shopname][$cat][$subcat][$product];
											if ($count == 10){goto a;}
											else{
												echo 
													'<div class="item">
														<div class="product">
															<div class="flip-container">
																<div class="flipper">
																	<div class="front">
																		<a href="detail.html">
																		<img class="img-responsive" src="./images/'.$product_array['product_image'][0].'" alt="" >
																		</a>
																	</div>';
													if (count($product_array['product_image']) > 1){
														$n=1;
													}
													else{
														$n=0;
													}
													echo 
																	'<div class="back">
																		<a href="detail.html">
																		<img class="img-responsive" src="./images/'.$product_array['product_image'][$n].'" alt="" >
																		</a>
																	</div>
																</div>
															</div>
															<a href="detail.html" class="invisible">
															<img src="./images/'.$product_array['product_image'][0].'" alt="" class="img-responsive">
															</a>
															<div class="text">
																<h3><a href="detail.html">'.$product.'</a></h3>';
													
													if($product_array['product_offer_price'] != ""){ 
														echo '<p class="price"><del>'.$product_array['product_price'].'</del>'.$product_array['product_offer_price'].'</p>';
													}
													else{
														echo '<p class="price">'.$product_array['product_price'].'</p>';
													}
													echo '</div>';
													if ($product_array['product_offer_price'] != ""){ 
														echo
																'<div class="ribbon sale">
																	<div class="theribbon">SALE</div>
																	<div class="ribbon-background"></div>
																</div>';
																
													}
													echo '
														</div>
													</div>';
											}
										
											
										}
										
										
									}
								
							
							}
							a:;
						?>
						</div>
						</div>
                </div>
                

            </div>
            <!-- /#hot -->

            <!-- *** HOT END *** -->

            <!-- *** GET INSPIRED ***
 _________________________________________________________ -->
            <div class="container" data-animate="fadeInUpBig">
                <div class="col-md-12">
                    <div class="box slideshow">
                        <h3>Other Products</h3>
                        <p class="lead">Get the best products from our shop</p>
                        <div id="get-inspired" class="owl-carousel owl-theme">
							<?php
								$files = array_reverse($files);
								for($i=0;$i<count($files);$i++){
								if($i==4){break;}
								else{
									echo 
									'<div class="item">
										<a href="#">
										<img src="./images/'.$files[$i].'" alt="Best Products" class="img-responsive">
										</a>
									</div>';
								}
							}
							?>
                        </div>
                    </div>
                </div>
            </div>
            


        </div>
        <!-- /#content -->

        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <div id="footer" data-animate="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4>Pages</h4>

                        <ul>
							<li><a href="#">Homepage</a>
                            </li>
                            <li><a href="text.html">About us</a>
                            </li>
                            <li><a href="text.html">Terms and conditions</a>
                            </li>
                            <li><a href="faq.html">FAQ</a>
                            </li>
                            <li><a href="contact.html">Contact us</a>
                            </li>
                        </ul>

                        </div>
						
						<div class="col-md-3 col-sm-6">

                        <h4>User section</h4>

                        <ul>
                            <li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                            </li>
                            <li><a href="register.html">Regiter</a>
                            </li>
                        </ul>
						<hr class="hidden-md hidden-lg">
					</div>

                    <div class="col-md-3 col-sm-6">

                        <h4>Where to find us</h4>

                        <p><strong>Address line 1</strong>
                            <br>Address line 2
                            <br>Address line 3
                            <br>City - Pincode 
                            <br>State
                            <br>
                            <strong>Country</strong>
                        </p>

                        <a href="contact.html">Go to contact page</a>

                        <hr class="hidden-md hidden-lg">

                    </div>
                    <!-- /.col-md-3 -->



                    <div class="col-md-3 col-sm-6">

                    <h4>Stay in touch</h4>

                        <p class="social">
                            <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                            <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                            <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                            <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                            <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                        </p>


                    </div>
                    <!-- /.col-md-3 -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#footer -->

        <!-- *** FOOTER END *** -->




        <!-- *** COPYRIGHT ***
 _________________________________________________________ -->
        <div id="copyright">
            <div class="container">
                <div class="col-md-6">
                    <p class="pull-left">©onlineshopmaker</p>

                </div>
                <div class="col-md-6">
                    <p class="pull-right">Template by <a href="http://onlineshopmaker.dx.am">Onlineshopmaker</a>
                         
                    </p>
                </div>
            </div>
        </div>
        <!-- *** COPYRIGHT END *** -->



    </div>
    <!-- /#all -->


    

    <!-- *** SCRIPTS TO INCLUDE ***
 _________________________________________________________ -->
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/modernizr.js"></script>
    <script src="js/bootstrap-hover-dropdown.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/front.js"></script>


</body>

</html>