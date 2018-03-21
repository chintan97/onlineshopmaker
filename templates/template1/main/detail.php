<?php require("top-bar.php");
    if (isset($_GET['id'])){ 
        $product_id = $_GET['id'];
        $file_pro = file_get_contents('product_data.json');
        $data_pro = json_decode($file_pro, true);
        $categories = [];
        $brands = [];
        $colors = [];
        foreach ($data_pro as $shname => $shdata) {
            foreach ($shdata as $catname => $catdata) {
                $procount = 0;
                $subcategories = [];
                foreach ($catdata as $subcatname => $subcatdata) {
                    array_push($subcategories, $subcatname);
                    foreach ($subcatdata as $proname1 => $prodata) {
                        if ($prodata['product_id'] == $product_id){
                            $procat = $catname;
                            $prosubcat = $subcatname;
                            $proname = $proname1;
                            $proprice = $prodata['product_price'];
                            $prostock = $prodata['product_stock'];
                            $probrand = $prodata['product_brand'];
                            $prosize = $prodata['product_size'];
                            $prodescription = $prodata['product_description'];
                            $progender = $prodata['product_gender'];
                            $proofferprice = $prodata['product_offer_price'];
                            $proofferpercentage = $prodata['product_offer_percentage'];
                            $procolor = $prodata['product_color'];
                            $prowarranty = $prodata['warranty_time'];
                            $proreplacement = $prodata['replacement_time'];
                            $proimages = $prodata['product_image'];
                            foreach ($subcatdata as $key123 => $value123) {
                                if ($value123['product_brand'] != '' && !in_array(strtolower($value123['product_brand']), $brands)){
                                    array_push($brands, strtolower($value123['product_brand']));
                                }
                                if ($value123['product_color'] != '' && !in_array(strtolower($value123['product_color']), $colors)){
                                    array_push($colors, strtolower($value123['product_color']));
                                }
                            }
                        }
                        $procount++;
                    }
                }
                array_push($categories, [$catname, $procount, $subcategories]);
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
                        <li><a href="#">Home</a>
                        </li>
                        <li><a href="category.php?cat=<?php echo $procat ?>&subcat="><?php echo $procat; ?></a>
                        </li>
                        <li><a href="category.php?cat=<?php echo $procat ?>&subcat=<?php echo $prosubcat ?>"><?php echo $prosubcat; ?></a>
                        </li>
                        <li><?php echo $proname; ?></li>
                    </ul>

                </div>

                <div class="col-md-3">
                    <!-- *** MENUS AND FILTERS ***
 _________________________________________________________ -->
                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Categories</h3>
                        </div>

                        <div class="panel-body">
                            <ul class="nav nav-pills nav-stacked category-menu">
                                <?php 
                                    foreach ($categories as $cat => $val) {
                                        echo "<li>
                                            <a href='category.php?cat=".$val[0]."&subcat='>".$val[0]."<span class='badge pull-right'>".$val[1]."</span></a><ul>
                                        ";
                                        foreach ($val[2] as $subcat => $val1) {
                                            echo "<li><a href='category.php?cat=".$val[0]."&subcat=".$val1."'>".$val1."</a></li>";
                                        }
                                        echo "</ul></li>";
                                    }
                                ?>

                            </ul>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Brands</h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <?php 
                                        if (count($brands) > 0){
                                            foreach ($brands as $key => $value) {
                                                echo '<div class="checkbox">
                                                        <label>
                                                            <input type="checkbox">'.$value.'
                                                        </label>
                                                      </div>';
                                            }
                                        }
                                        else {
                                            echo "No brands mentioned under this category";
                                        }
                                    ?>

                                    
                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
                                <button type="reset" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</button>
                            </form>

                        </div>
                    </div>

                    <div class="panel panel-default sidebar-menu">

                        <div class="panel-heading">
                            <h3 class="panel-title">Colours </h3>
                        </div>

                        <div class="panel-body">

                            <form>
                                <div class="form-group">
                                    <?php 
                                        if (count($colors) > 0){
                                            foreach ($colors as $key => $value) {
                                                echo '<div class="checkbox">
                                                        <label>
                                                            <input type="checkbox"><span class="colour '.$value.'"></span> '.$value.'
                                                        </label>
                                                      </div>';
                                            }
                                        }
                                        else {
                                            echo "No colors mentioned under this category";
                                        }
                                    ?>

                                </div>

                                <button class="btn btn-default btn-sm btn-primary"><i class="fa fa-pencil"></i> Apply</button>
                                <button type="reset" class="btn btn-sm btn-danger pull-right"><i class="fa fa-times-circle"></i> Clear</button>
                            </form>

                        </div>
                    </div>

                    <!-- *** MENUS AND FILTERS END *** -->

                </div>

                <div class="col-md-9">

                    <div class="row" id="productMain">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <?php echo "<img style='margin-left:auto; margin-right:auto;' src='images/".$proimages[0]."' alt='Image not found' class='img-responsive'>"; ?>
                            </div>

                            <?php
                                if ($proofferprice != ""){
                                    echo "<div class='ribbon sale'>
                                        <div class='theribbon'>SALE</div>
                                        <div class='ribbon-background'></div>
                                        </div>";
                                }
                            ?>
                        </div>
                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $proname; ?></h1>
                                <p class="goToDescription"><a href="#details" class="scroll-to">Scroll to product details, material & care and sizing</a>
                                </p>
                                <?php 
                                    if ($proofferprice != ""){
                                        echo "<p class='price'>".$currency.$proofferprice." <del style='font-size:25px;'>".$currency.$proprice."</del><br><span style='font-size:20px; color:blue'>".$proofferpercentage."% off</span></p>";
                                        //echo "<p class='price'>".."</p>";
                                    }
                                    else {
                                        echo "<p class='price'>".$currency.$proprice."</p>";
                                    }
                                ?>

                                <?php
                                    if ($prostock == 0){
                                        echo "<p class='price' style='color:#ff0000; font-size:25px;'>Out of stock</p>";
                                    }
                                    else if ($prostock < 5){
                                        echo "<p class='price' style='color:#ff0000; font-size:25px;'>Hurry, only ".$prostock." left in stock</p>";
                                    }
                                    else{
                                        echo "<p class='price' style='color:#009900; font-size:25px;'>In stock</p>";
                                    }
                                ?>

                                <p class="text-center buttons">
                                    <?php   if (!isset($_SESSION['cart'])){
                                            echo ' <a href="add_to_cart.php?pro='.$proname.'&id='.$product_id.'&cat='.$procat.'&subcat='.$prosubcat.'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
                                            }
                                            else{
                                                $flag = 0;
                                                foreach ($_SESSION['cart'] as $cart_key => $cart_value) {
                                                    if ($product_id == $cart_value[3]){
                                                        echo ' <a href="basket.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Proceed to checkout</a>';
                                                        $flag = 1;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0){
                                                    echo ' <a href="add_to_cart.php?pro='.$proname.'&id='.$product_id.'&cat='.$procat.'&subcat='.$prosubcat.'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Add to cart</a>';
                                                }
                                            }
                                            if (!isset($_SESSION['wishlist'])){
                                            echo ' <a href="add_to_wishlist.php?pro='.$proname.'&id='.$product_id.'&cat='.$procat.'&subcat='.$prosubcat.'" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>';
                                            }
                                            else{
                                                $flag = 0;
                                                foreach ($_SESSION['wishlist'] as $wishlist_key => $wishlist_value) {
                                                    if ($product_id == $wishlist_value[3]){
                                                        echo ' <a href="#" class="btn btn-default"><i class="fa fa-heart"></i> Already in wishlist</a>';
                                                        $flag = 1;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0){
                                                    echo ' <a href="add_to_wishlist.php?pro='.$proname.'&id='.$product_id.'&cat='.$procat.'&subcat='.$prosubcat.'" class="btn btn-default"><i class="fa fa-heart"></i> Add to wishlist</a>';
                                                }
                                            }  
                                    ?>
                                    
                                </p>


                            </div>

                            <div class="row" id="thumbs">
                                <?php
                                    foreach ($proimages as $key => $value) {
                                        echo "
                                            <div class='col-xs-4'>
                                                <a href='images/".$value."' class='thumb'>
                                                 <img style='width: 250px; height: 200px;' src='images/".$value."' alt='image not available' class='img-responsive'>
                                                </a> 
                                            </div>
                                        ";
                                    }
                                ?>

                                
                            </div>
                        </div>

                    </div>


                    <div class="box" id="details">
                        <p>
                            <h4>Product details</h4>
                            <p><?php if ($prodescription != ""){
                                    echo $prodescription;
                                }
                                else{
                                    echo "No description for this product.";
                                } 
                            ?></p>
                            <?php 
                                if ($probrand != ""){
                                    echo "<h4>Brand</h4>";
                                    echo $probrand;
                                }
                                if ($prosize != ""){
                                    echo "<h4>Size</h4>";
                                    echo $prosize;
                                }
                                if ($procolor != ""){
                                    echo "<h4>Color</h4>";
                                    echo $procolor;
                                }

                                echo "<h4>Warranty</h4>";
                                if ($prowarranty != ""){
                                    echo $prowarranty." warranty";
                                }
                                else{
                                    echo "No warranty mentioned.";
                                }

                                echo "<h4>Replacement</h4>";
                                if ($proreplacement != ""){
                                    echo "Replacement within ".$proreplacement;
                                }
                                else{
                                    echo "No replacement for this product.";
                                }
                            ?>

                            <hr>
                            <div class="social">
                                <h4>Show it to your friends</h4>
                                <p>
                                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                                </p>
                            </div>
                    </div>

                    <div class="row same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height">
                                <h3>You may also like these products</h3>
                            </div>
                        </div>

                        <?php 
                            foreach ($data_pro as $shname1 => $value) {
                                foreach ($value as $catname1 => $value2) {
                                    foreach ($value2 as $subcatname1 => $value3) {
                                        if ($prosubcat == $subcatname1 && $procat == $catname1){
                                            $pro_data = [];
                                            foreach ($value3 as $proname2 => $value4) {
                                                array_push($pro_data, [$proname2, $value4]);
                                            }
                                            $count = 0;

                                            while ($count < 3){
                                                if (isset($pro_data[$count])){
                                                    echo '<div class="col-md-3 col-sm-6">
                                                        <div class="product same-height">
                                                            <div class="flip-container">
                                                                <div class="flipper">';
                                                                    if ($pro_data[$count][1]['product_offer_price'] != ""){
                                                                        echo "<div class='ribbon sale'>
                                                                        <div class='theribbon'>SALE</div>
                                                                        <div class='ribbon-background'></div>
                                                                        </div>";
                                                                    }
                                                                    echo '<div class="front">
                                                                        <a href="detail.php?pro='.$pro_data[$count][0].'&id='.$pro_data[$count][1]["product_id"].'">
                                                                            <img style="width:200px; height:250px" src="images/'.$pro_data[$count][1]["product_image"][0].'" alt="Image not available" class="img-responsive">
                                                                        </a>
                                                                    </div>
                                                                    <div class="back">
                                                                        <a href="detail.php?pro='.$pro_data[$count][0].'&id='.$pro_data[$count][1]["product_id"].'">';
                                                                            if (isset($pro_data[$count][1]['product_image'][1])){
                                                                                echo '<img style="width:200px; height:250px" src="images/'.$pro_data[$count][1]["product_image"][1].'" alt="Image not available" class="img-responsive">';
                                                                            }
                                                                            else {
                                                                                echo '<img style="width:200px; height:250px" src="images/'.$pro_data[$count][1]["product_image"][0].'" alt="Image not available" class="img-responsive">';
                                                                            }
                                                                        echo '</a>
                                                                    </div>
                                                            </div>
                                                        </div>
                                                            
                                                            </a>
                                                            <div class="text">
                                                                <h3>'.$pro_data[$count][0].'</h3>';
                                                                if ($prostock == 0){
                                                                   echo "<p class='price' style='color:#ff0000; font-size:20px;'>Out of stock</p>";
                                                                }
                                                                else if ($prostock < 5){
                                                                    echo "<p class='price' style='color:#ff0000; font-size:20px;'>Hurry, only ".$prostock." left in stock</p>";
                                                                }
                                                                else{
                                                                    echo "<p class='price' style='color:#009900; font-size:20px;'>In stock</p>";
                                                                }
                                                                if ($pro_data[$count][1]["product_offer_price"] != ""){
                                                                    echo '<p class="price">'.$currency.$pro_data[$count][1]["product_offer_price"].'<del style="font-size:15px;">'.$currency.$pro_data[$count][1]["product_price"].'</del><br><span style="font-size:15px; color:blue">'.$pro_data[$count][1]["product_offer_percentage"].'% off</span></p>';
                                                                }
                                                                else{
                                                                    echo '<p class="price">'.$currency.$pro_data[$count][1]["product_price"].'</p>';
                                                                }
                                                            echo '</div>
                                                        </div>
                                                    </div>';
                                                    $count++;
                                                }
                                                else {
                                                    break;
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        ?>

                    </div>

                </div>
                <!-- /.col-md-9 -->
            </div>
            <!-- /.container -->
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