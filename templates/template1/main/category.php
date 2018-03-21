<?php require("top-bar.php");
    if (isset($_GET['cat'])){
        $cat_get = $_GET['cat'];
        $subcat_get = $_GET['subcat'];
    }
    $file_pro = file_get_contents('product_data.json');
    $data_pro = json_decode($file_pro, true);
    $categories = [];
    $brands = [];
    $colors = [];
    $data_show = [];  // Products data here, format: [product name, product data]
    foreach ($data_pro as $shname => $shdata) {
        foreach ($shdata as $catname => $catdata) {
            $procount = 0;
            $subcategories = [];
            foreach ($catdata as $subcatname => $subcatdata) {
                array_push($subcategories, $subcatname);
                foreach ($subcatdata as $proname1 => $prodata) {
                    $procount++;
                    if ($subcat_get == '' && $catname == $cat_get){
                        array_push($data_show, [$proname1, $prodata, $subcatname]);
                        if ($prodata['product_brand'] != '' && !in_array(strtolower($prodata['product_brand']), $brands)){
                            array_push($brands, strtolower($prodata['product_brand']));
                        }
                        if ($prodata['product_color'] != '' && !in_array(strtolower($prodata['product_color']), $colors)){
                            array_push($colors, strtolower($prodata['product_color']));
                        }
                    }
                    else if ($subcat_get != '' && $subcatname == $subcat_get){
                        array_push($data_show, [$proname1, $prodata, $subcatname]);
                        if ($prodata['product_brand'] != '' && !in_array(strtolower($prodata['product_brand']), $brands)){
                            array_push($brands, strtolower($prodata['product_brand']));
                        }
                        if ($prodata['product_color'] != '' && !in_array(strtolower($prodata['product_color']), $colors)){
                            array_push($colors, strtolower($prodata['product_color']));
                        }
                    }
                }
            }
            array_push($categories, [$catname, $procount, $subcategories]);
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
                        <li>
                            <?php if ($subcat_get == ''){
                                    echo $cat_get; 
                                }
                                else{
                                    echo '<a href="category.php?cat='.$cat_get.'&subcat=">'.$cat_get.'</a>';
                                }
                            ?>
                        </li>
                        <?php if ($subcat_get != ''){
                            echo '<li>'.$subcat_get.'</li>';
                        } ?>
                        
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
                            <h3 class="panel-title">Brands </h3>
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
                    <div class="box">
                        <h1><?php echo ucfirst($cat_get); ?></h1>
                        <p>In our <?php echo $cat_get; ?> department we offer wide selection of the best products we have found and carefully selected.</p>
                    </div>

                    <div class="box info-bar">
                        <div class="row">
                            <div class="col-sm-12 col-md-4 products-showing">
                                Showing <strong>12</strong> of <strong>25</strong> products
                            </div>

                            <div class="col-sm-12 col-md-8  products-number-sort">
                                <div class="row">
                                    <form class="form-inline">
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-number">
                                                <strong>Show</strong>  <a href="#" class="btn btn-default btn-sm btn-primary">12</a>  <a href="#" class="btn btn-default btn-sm">24</a>  <a href="#" class="btn btn-default btn-sm">All</a> products
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <div class="products-sort-by">
                                                <strong>Sort by</strong>
                                                <select name="sort-by" class="form-control">
                                                    <option>Price</option>
                                                    <option>Name</option>
                                                    <option>Sales first</option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row products">

                        <?php 
                            foreach ($data_show as $key_data => $value_data) {
                            
                            echo '<div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">';
                                                if ($value_data[1]['product_offer_price'] != ""){
                                                   echo "<div class='ribbon sale'>
                                                    <div class='theribbon'>SALE</div>
                                                    <div class='ribbon-background'></div>
                                                    </div>";
                                                }
                                            echo '<div class="front">
                                                <a href="detail.php?pro='.$value_data[0].'&id='.$value_data[1]["product_id"].'">
                                                    <img style="width:250px; height:200px; margin-left:30px; margin-top:10px;" src="images/'.$value_data[1]["product_image"][0].'" alt="Image not available" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <a href="detail.php?pro='.$value_data[0].'&id='.$value_data[1]["product_id"].'">';
                                                    if (isset($value_data[1]['product_image'][1])){
                                                        echo '<img style="width:250px; height:200px; margin-left:30px;  margin-top:10px;" src="images/'.$value_data[1]["product_image"][1].'" alt="Image not available" class="img-responsive">';
                                                    }
                                                    else {
                                                        echo '<img style="width:250px; height:200px; margin-left:30px;  margin-top:10px;" src="images/'.$value_data[1]["product_image"][0].'" alt="Image not available" class="img-responsive">';
                                                    }
                                                    echo '</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    </a>
                                    <div class="text">
                                        <h3><a href="detail.php?pro='.$value_data[0].'&id='.$value_data[1]["product_id"].'">'.$value_data[0].'</a></h3>';
                                                if ($value_data[1]["product_offer_price"] != ""){
                                                    echo '<p class="price">'.$currency.$value_data[1]["product_offer_price"].'<del style="font-size:15px;">'.$currency.$value_data[1]["product_price"].'</del><br><span style="font-size:15px; color:blue">'.$value_data[1]["product_offer_percentage"].'% off</span></p>';
                                                }
                                                else{
                                                    echo '<p class="price">'.$currency.$value_data[1]["product_price"].'</p>';
                                                }
                                        if ($value_data[1]['product_stock'] == 0){
                                            echo '<p class="price" style="color:#ff0000; font-size:20px;">Out of stock</p>';
                                        }
                                        else if ($value_data[1]['product_stock'] < 5){
                                           echo "<p class='price' style='color:#ff0000; font-size:20px;'>Hurry, only ".$value_data[1]['product_stock']." left in stock</p>";
                                        }
                                        else{
                                            echo "<p class='price' style='color:#009900; font-size:20px;'>In stock</p>";
                                        }
                                        echo '<p class="buttons">
                                            <a href="detail.php?pro='.$value_data[0].'&id='.$value_data[1]["product_id"].'" class="btn btn-default">View detail</a>';
                                            if (!isset($_SESSION["cart"])){
                                                echo '<a href="add_to_cart.php?pro='.$value_data[0].'&id='.$value_data[1]["product_id"].'&cat='.$cat_get.'&subcat='.$value_data[2].'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                            }
                                            else {
                                                $flag = 0;
                                                foreach ($_SESSION["cart"] as $cart_key => $cart_value) {
                                                    if ($value_data[1]["product_id"] == $cart_value[3]){
                                                        echo '<a href="basket.php" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Proceed to checkout</a>';
                                                        $flag = 1;
                                                        break;
                                                    }
                                                }
                                                if ($flag == 0){
                                                    echo '<a href="add_to_cart.php?pro='.$value_data[0].'&id='.$value_data[1]["product_id"].'&cat='.$cat_get.'&subcat='.$value_data[2].'" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Add to cart</a>';
                                                }
                                            }
                                        echo '</p>
                                    </div>
                                </div>
                             </div>';
                            }
                        ?>
                        <!-- /.col-md-4 -->
                    </div>
                    <!-- /.products -->

                    <div class="pages">

                        <ul class="pagination">
                            <li><a href="#">&laquo;</a>
                            </li>
                            <li class="active"><a href="#">1</a>
                            </li>
                            <li><a href="#">2</a>
                            </li>
                            <li><a href="#">3</a>
                            </li>
                            <li><a href="#">4</a>
                            </li>
                            <li><a href="#">5</a>
                            </li>
                            <li><a href="#">&raquo;</a>
                            </li>
                        </ul>
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
        
        <!-- /#footer -->

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