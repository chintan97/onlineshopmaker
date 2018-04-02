<?php require("top-bar.php"); 
	if (!isset($_SESSION['reg_email'])){
		$_SESSION['redirect'] = 'customer-wishlist';
		echo "<script>alert('You need to sign in first!');
		window.location.href='register.php';</script>";
	}
	else{
		$product_file = file_get_contents('product_data.json');
		$product_data = json_decode($product_file, true);
		$show_data = [];  // [0=cat, 1=subcat, 2=name, 3=id, 4=image, 5=price, 6=offer_price, 7=offer_percentage, 8=stock]
		if (isset($_SESSION['wishlist'])){
            foreach ($_SESSION['wishlist'] as $wishlist_key => $wishlist_value) {
                $temp_data = $product_data[$shopname][$wishlist_value[0]][$wishlist_value[1]][$wishlist_value[2]];
                array_push($show_data, [$wishlist_value[0], $wishlist_value[1], $wishlist_value[2], $wishlist_value[3], $temp_data['product_image'], $temp_data['product_price'], $temp_data['product_offer_price'], $temp_data['product_offer_percentage'], $temp_data['product_stock']]);
            }
        }
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Obaju e-commerce template">
    <meta name="author" content="Ondrej Svestka | ondrejsvestka.cz">
    <meta name="keywords" content="">

    <title>
        <?php echo $shopname; ?>
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

    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->
    <?php require("nav-bar.php"); ?>
    
    <!-- *** NAVBAR END *** -->

    <div id="all">

        <div id="content">
            <div class="container">

                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a>
                        </li>
                        <li>My wishlist</li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** CUSTOMER MENU ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Customer section</h3>
                        </div>

                        <div class="panel-body">

                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li class="active">
                                    <a href="customer-wishlist.php"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li>
                                    <a href="customer-account.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="index.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9" id="wishlist">

                    <div class="box">
                        <h1>My wishlist</h1>
                        <p class="lead">Items you have added in wishlist are shown here.</p>
                    </div>

                    <div class="row products">

                    	<?php
                            if (count($show_data) == 0){
                                echo "<div class='col-md-12 col-sm-4'><div class='product'><br>&nbsp;&nbsp;&nbsp;&nbsp;<strong>You have no items in wishlist.<br></strong></div></div>";
                            }
                    		foreach ($show_data as $key => $value) {
                    			echo '<div class="col-md-3 col-sm-4">
			                            <div class="product">
			                                <div class="flip-container">
			                                    <div class="flipper">';
			                                    	if ($value[6] != ""){
					                                    echo "<div class='ribbon sale'>
					                                        <div class='theribbon'>SALE</div>
					                                        <div class='ribbon-background'></div>
					                                        </div>";
					                                }
			                                        echo '<div class="front">
			                                            <a href="detail.php?pro='.$value[2].'&id='.$value[3].'">
			                                                <img style="width:200px; height:250px;" src="images/'.$value[4][0].'" alt="Image not available" class="img-responsive">
			                                            </a>
			                                        </div>
			                                        <div class="back">
			                                            <a href="detail.php?pro='.$value[2].'&id='.$value[3].'">';
			                                            	if (isset($value[4][1])){
			                                            		echo '<img style="width:200px; height:250px;" src="images/'.$value[4][1].'" alt="Image not available" class="img-responsive">';
			                                            	}
			                                            	else{
			                                            		echo '<img style="width:200px; height:250px;" src="images/'.$value[4][0].'" alt="Image not available" class="img-responsive">';
			                                            	}
			                                            echo '</a>
			                                        </div>
			                                    </div>
			                                </div>
			                                </a>
			                                <div class="text">
			                                    <h3><a href="detail.php?pro='.$value[2].'&id='.$value[3].'">'.$value[2].'</a></h3>';
			                                    if ($value[6] != ""){
			                                    	echo '<p class="price">'.$currency.$value[6].' <del style="font-size:15px;">'.$currency.$value[5].'</del><br><span style="font-size:15px; color:blue">'.$value[7].'% off</span></p>';
			                                    }
			                                    else {
			                                    	echo '<p class="price">'.$currency.$value[5].'</p>';
			                                    }
			                                    if ($value[8] == 0){
			                                    	echo "<p class='price' style='color:#ff0000; font-size:15px;'>Out of stock</p>";	
			                                    }
			                                    else if ($value[8] < 5){
                                     			    echo "<p class='price' style='color:#ff0000; font-size:15px;'>Hurry, only ".$value[8]." left in stock</p>";
                                    			}
                                    			else{
                                        			echo "<p class='price' style='color:#009900; font-size:15px;'>In stock</p>";
                                    			}
			                                    echo '<p class="buttons">
			                                        <a href="detail.php?pro='.$value[2].'&id='.$value[3].'" class="btn btn-default">View detail</a>';
													if (!isset($_SESSION['cart'])){
			                                            echo ' <a href="add_to_cart.php?pro='.$value[2].'&id='.$value[3].'&cat='.$value[0].'&subcat='.$value[1].'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
			                                            }
			                                            else{
			                                                $flag = 0;
			                                                foreach ($_SESSION['cart'] as $cart_key => $cart_value) {
			                                                    if ($value[3] == $cart_value[3]){
			                                                        echo ' <a href="basket.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Checkout</a>';
			                                                        $flag = 1;
			                                                        break;
			                                                    }
			                                                }
			                                                if ($flag == 0){
			                                                    echo ' <a href="add_to_cart.php?pro='.$value[2].'&id='.$value[3].'&cat='.$value[0].'&subcat='.$value[1].'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
			                                                }
			                                            }
			                                    echo '
			                                    <a href="remove_from_wishlist.php?ind='.$key.'" class="btn btn-primary"><i class="fa fa-heart"></i> Remove</a>
			                                    </p>
			                                </div>
			                            </div>
			                        </div>';
                    		}
                    	?>

                    </div>
                    <!-- /.products -->

                </div>
            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->


        <!-- *** FOOTER ***
 _________________________________________________________ -->
        <?php require("footer.php"); ?>

        <!-- *** FOOTER END *** -->

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
