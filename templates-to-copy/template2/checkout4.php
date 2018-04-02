<?php require("top-bar.php");
    if (!isset($_SESSION['reg_email'])){
        echo '<script>window.location.href="index.php";</script>';
    } 
    $file_open = file_get_contents('product_data.json');
    $file_data = json_decode($file_open, true);
    $buy_data = [];
    foreach ($_SESSION['cart'] as $cart_key => $cart_value) {
        $temp_data = $file_data[$shopname][$cart_value[0]][$cart_value[1]][$cart_value[2]];
        array_push($buy_data, [$temp_data['product_image'][0], $cart_value[2], $temp_data['product_price'], ($temp_data['product_price'] - $temp_data['product_offer_price']), $temp_data['product_offer_price'], $cart_value[3], $cart_value[4], $cart_value[0], $cart_value[1]]);
    }
    $_SESSION['buy_data'] = $buy_data;
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
                        <li>Checkout - Order review</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" action="checkout4.php">
                            <h1>Checkout - Order review</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li><a href="checkout1.php"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li><a href="checkout3.php"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="active"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Product</th>
                                                <th>Quantity</th>
                                                <th>Unit price</th>
                                                <th>Discount</th>
                                                <th>Summary</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            foreach ($buy_data as $buy_key => $buy_value) {
                                                echo '<tr>
                                                    <td>
                                                        <img style="width:45px; height:50px" src="images/'.$buy_value[0].'" alt="Image not available">
                                                    </td>
                                                    <td>'.$buy_value[1].'
                                                    </td>
                                                    <td>'.$buy_value[6].'
                                                    </td>
                                                    <td>'.$currency.$buy_value[2].'</td>';
                                                    if ($buy_value[2] == $buy_value[3]){
                                                        echo '<td>'.$currency.'0</td>';
                                                        echo '<td>'.$buy_value[6].' x '.$buy_value[2].'</td>';
                                                        echo '<td>'.$currency.($buy_value[2]*$buy_value[6]).'</td>';
                                                    }
                                                    else{
                                                        echo '<td>'.$currency.$buy_value[3].'</td>';
                                                        echo '<td>'.$buy_value[6].' x '.$buy_value[4].'</td>';
                                                        echo '<td>'.$currency.($buy_value[4]*$buy_value[6]).'</td>';
                                                    }
                                                echo '</tr>';
                                            }

                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th></th>
                                                <th><?php echo $currency.$_SESSION['grand_total']; ?></th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.content -->

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="checkout3.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to Payment method</a>
                                </div>
                                <div class="pull-right">
                                    <a href="place-order.php?shop=<?php echo $shopname; ?>" class="btn btn-primary">Place an order<i class="fa fa-chevron-right"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->


                </div>
                <!-- /.col-md-9 -->

                <div class="col-md-3">

                    <div class="box" id="order-summary">
                        <div class="box-header">
                            <h3>Order summary</h3>
                        </div>
                        <p class="text-muted">Shipping and additional costs are calculated based on the values you have entered.</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Order total</td>
                                        <th><?php echo $currency.$_SESSION['grand_total']; ?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
                <!-- /.col-md-3 -->

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