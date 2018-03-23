<?php require("top-bar.php"); 
    if (!isset($_SESSION['reg_email'])){
        $_SESSION['redirect'] = 'customer-orders';
        echo "<script>alert('You need to sign in to view your orders!');
        window.location.href='register.php';</script>";
    }
    else {
        if (isset($_GET['order_id'])){
            $order_id = $_GET['order_id'];
            $order_file = fopen('orders.json', 'a+');
            $order_file_read = fread($order_file, filesize('orders.json'));
            $order_file_data = json_decode($order_file_read, true);
            $show_data = []; // [0=product name, 1=product id, 2=quantity, 3=sold price, 4=subtotal, 5=status]
            if (isset($order_file_data[$shopname][$order_id])){
                $order_data = $order_file_data[$shopname][$order_id];
                foreach ($order_data['order_detail'] as $key => $value) {
                    array_push($show_data, [$value['product_name'], $value['product_id'], $value['product_quantity'], $value['sold_price'], $value['subtotal'], $value['status']]);
                }
                $other_data = [$order_data['name'], $order_data['address'], $order_data['city'], $order_data['zip'], $order_data['state'], $order_data['country'], $order_data['total_amount'], $order_data['date'], $order_data['time']];
            }
            if (file_exists('cancelled_orders.json')){
                $cancel_file_read = file_get_contents('cancelled_orders.json');
                $cancel_file_data = json_decode($cancel_file_read, true);
                if (isset($cancel_file_data[$shopname][$order_id])){
                    $order_data = $cancel_file_data[$shopname][$order_id];
                    foreach ($order_data['order_detail'] as $key => $value) {
                        array_push($show_data, [$value['product_name'], $value['product_id'], $value['product_quantity'], $value['sold_price'], $value['subtotal'], $value['status']]);
                    }
                    $other_data = [$order_data['name'], $order_data['address'], $order_data['city'], $order_data['zip'], $order_data['state'], $order_data['country'], $order_data['total_amount'], $order_data['date'], $order_data['time']];
                }
            }
            if (file_exists('shipped_orders.json')){
                $ship_file_read = file_get_contents('shipped_orders.json');
                $ship_file_data = json_decode($ship_file_read, true);
                if (isset($ship_file_data[$shopname][$order_id])){
                    $order_data = $ship_file_data[$shopname][$order_id];
                    foreach ($order_data['order_detail'] as $key => $value) {
                        array_push($show_data, [$value['product_name'], $value['product_id'], $value['product_quantity'], $value['sold_price'], $value['subtotal'], $value['status']]);
                    }
                    $other_data = [$order_data['name'], $order_data['address'], $order_data['city'], $order_data['zip'], $order_data['state'], $order_data['country'], $order_data['total_amount'], $order_data['date'], $order_data['time']];
                }
            }
        }
        else {
            echo '<script>window.location.href="customer-orders.php";</script>';
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
                        <li><a href="#">My orders</a>
                        </li>
                        <li>Order # <?php echo $_GET['order_id']; ?></li>
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
                                <li class="active">
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
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

                <div class="col-md-9" id="customer-order">
                    <div class="box">
                        <h1>Order #<?php echo $_GET['order_id']; ?></h1>

                        <p class="lead">Order #<?php echo $_GET['order_id']; ?> was placed on <strong><?php echo $other_data[7]; ?></strong> at <strong><?php echo $other_data[8]; ?> (IST)</strong>.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7. Order total shown here will not change if you cancel order.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th colspan="2">Product</th>
                                        <th>Quantity</th>
                                        <th>Unit price</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Cancel</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($show_data as $key => $value) {
                                              echo '<tr>
                                                    <td>'.($key+1).'</td>
                                                    <td><a href="detail.php?pro='.$value[0].'&id='.$value[1].'">'.$value[0].'</a>
                                                    </td>
                                                    <td>'.$value[2].'</td>
                                                    <td>'.$currency.$value[3].'</td>
                                                    <td>'.$currency.$value[4].'</td>
                                                    <td>';
                                                    if ($value[5] == 'order received'){
                                                        echo '<span class="label label-info">order received</span>';
                                                    }
                                                    else if ($value[5] == 'cancelled (user)'){
                                                        echo '<span class="label label-danger">cancelled by you</span>';
                                                    }
                                                    else if ($value[5] == 'order cancelled'){
                                                        echo '<span class="label label-danger">cancelled by seller</span>';
                                                    }
                                                    else if ($value[5] == 'order shipped'){
                                                        echo '<span class="label label-warning"  style="background-color:green">order shipped</span>';
                                                    }
                                                    echo '</td>
                                                    <td>';
                                                    if ($value[5] == 'order received'){
                                                        echo '<a href="delete-order.php?id='.$order_id.'&ind='.$key.'&root='.$shopname.'"><i class="fa fa-trash-o"></i></a>';
                                                    }
                                                    else {
                                                        echo 'You can not cancel now!';
                                                    }
                                                    echo '</td>
                                                </tr>';
                                          }  
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-right">Order total</th>
                                        <th><strong><?php echo $currency.$other_data[6]; ?></strong></th>
                                    </tr>
                                </tfoot>
                            </table>

                        </div>
                        <!-- /.table-responsive -->

                        <div class="row addresses">
                            <div class="col-md-12">
                                <h2>Shipping details</h2>
                                <?php
                                    echo '<p><strong>'.$other_data[0].'</strong>
                                    <br>'.$other_data[1].'
                                    <br>'.$other_data[2].'
                                    <br>'.$other_data[3].'
                                    <br>'.$other_data[4].'
                                    <br>'.$other_data[5].'
                                    </p>'; 
                                ?>
                            </div>
                        </div>

                    </div>
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
