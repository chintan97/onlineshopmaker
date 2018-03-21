<?php require("top-bar.php"); ?>
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
    <!-- first line -->
    <!-- *** TOP BAR END *** -->

    <!-- *** NAVBAR ***
 _________________________________________________________ -->
    <?php require("nav-bar.php"); ?>

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
                                    echo '<div class="item"><img src="./images/'.$files[$i].'"></div>';
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
                                                    '<div class="item" >
                                                        <div class="product" >
                                                            <div class="flip-container" >
                                                                <div class="flipper">
                                                                    <div class="front">
                                                                        <a href="detail.php?pro='.$product.'&id='.$product_array['product_id'].'">
                                                                        <img style="width: 160px; height: 220px; margin-left:10px; margin-top:10px;" class="img-responsive" src="./images/'.$product_array['product_image'][0].'" alt="" >
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
                                                                        <a href="detail.php?pro='.$product.'&id='.$product_array['product_id'].'">
                                                                        <img style="width: 160px; height: 220px; margin-left:10px margin-top:10px;" class="img-responsive" src="./images/'.$product_array['product_image'][$n].'" alt="" >
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            
                                                            </a>
                                                            <div class="text">
                                                                <h3><a href="detail.php?pro='.$product.'&id='.$product_array['product_id'].'">'.$product.'</a></h3>';
                                                    
                                                    if($product_array['product_offer_price'] != ""){ 
                                                        echo '<p class="price"><del>'.$currency.$product_array['product_price'].'</del>'.$currency.$product_array['product_offer_price'].'</p>';
                                                    }
                                                    else{
                                                        echo '<p class="price">'.$currency.$product_array['product_price'].'</p>';
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
                                        <img style="margin-left: auto; margin-right:auto;" src="./images/'.$files[$i].'" alt="Best Products" class="img-responsive">
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
        <?php require("footer.php"); ?>

        <!-- *** FOOTER END *** -->

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