<?php require("top-bar.php");
    if (!isset($_SESSION['reg_email'])){
        $_SESSION['redirect'] = 'customer-orders';
        echo "<script>alert('You need to sign in to view your orders!');
        window.location.href='register.php';</script>";
    }
    else {
        $user_file = file_get_contents('user_folder/user_data.json');
        $user_file_data = json_decode($user_file, true);
        $orders_id = [];
        $orders = [];
        if (isset($user_file_data['root'][$_SESSION['reg_email']]['orders'])){
            foreach ($user_file_data['root'][$_SESSION['reg_email']]['orders'] as $key => $value) {
                array_push($orders_id, $value);
            }
            $order_file = file_get_contents('orders.json');
            $order_file_data = json_decode($order_file, true);
            foreach ($orders_id as $order_key => $order_value) {
                if (isset($order_file_data[$shopname][$order_value])){
                    $get_data = $order_file_data[$shopname][$order_value];
                    array_push($orders, [$order_value, $get_data['date'], $get_data['time'], $get_data['total_amount'], $get_data['order_detail'][0]['status']]);
                }
            }
            if (file_exists('cancelled_orders.json')){
                $cancel_file = file_get_contents('cancelled_orders.json');
                $cancel_file_data = json_decode($cancel_file, true);
                foreach ($orders_id as $order_key => $order_value) {
                    if (isset($cancel_file_data[$shopname][$order_value])){
                        $get_data = $cancel_file_data[$shopname][$order_value];
                        array_push($orders, [$order_value, $get_data['date'], $get_data['time'], $get_data['total_amount'], $get_data['order_detail'][0]['status']]);
                    }
            }
            }
            if (file_exists('shipped_orders.json')){
                $ship_file = file_get_contents('shipped_orders.json');
                $ship_file_data = json_decode($ship_file, true);
                foreach ($orders_id as $order_key => $order_value) {
                    if (isset($ship_file_data[$shopname][$order_value])){
                        $get_data = $ship_file_data[$shopname][$order_value];
                        array_push($orders, [$order_value, $get_data['date'], $get_data['time'], $get_data['total_amount'], $get_data['order_detail'][0]['status']]);
                    }
            }
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
                        <li>My orders</li>
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

                <div class="col-md-9" id="customer-orders">
                    <div class="box">
                        <h1>My orders</h1>

                        <p class="lead">Your orders on one place.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <?php if (count($orders) == 0){
                                        echo "You have no orders.";
                                    }
                                    else {
                                        echo '<thead>
                                            <tr>
                                                <th>Order</th>
                                                <th>Date</th>
                                                <th>Time (IST)</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
                                        foreach ($orders as $key => $value) {
                                            echo '<tr>
                                                <th># '.$value[0].'</th>
                                                <td>'.$value[1].'</td>
                                                <td>'.$value[2].'</td>
                                                <td>'.$currency.$value[3].'</td>';
                                                if ($value[4] == 'order received'){
                                                    echo '<td><span class="label label-info">order received</span>';
                                                }
                                                else if ($value[4] == 'cancelled (user)'){
                                                    echo '<td><span class="label label-danger">cancelled by you</span>';
                                                }
                                                else if ($value[4] == 'order cancelled'){
                                                    echo '<td><span class="label label-danger">cancelled by seller</span>';
                                                }
                                                else if ($value[4] == 'order shipped'){
                                                    echo '<td><span class="label label-warning"  style="background-color:green">order shipped</span>';
                                                }
                                                echo '</td>
                                                <td><a href="customer-order.php?order_id='.$value[0].'" class="btn btn-primary btn-sm">View</a>
                                                </td>
                                            </tr>';
                                        }
                                        echo '</tbody>';
                                        }
                                    ?>
                            </table>
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
