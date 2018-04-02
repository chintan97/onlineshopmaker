<?php require("top-bar.php"); 
    if (!isset($_SESSION['reg_email'])){
        $_SESSION['redirect'] = 'checkout1';
        echo "<script>alert('You must login first!');
        window.location.href='register.php';</script>";
    }
    if (isset($_POST['product_quantity'])){
        foreach ($_POST['product_quantity'] as $key => $value) {
            $_SESSION['cart'][$key][4] = $value;
        }
        $_SESSION['grand_total'] = $_POST['total_to_submit'];
        unset($_POST['product_quantity']);
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

    <script type="text/javascript">
        function check_data(){
            var email_pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
            var email = document.getElementById('email').value;
            if (document.getElementById('street').value == ''){
                event.preventDefault();
                alert("You must fill address!");
                document.getElementById('street').focus();
                return false;
            }
            else if (document.getElementById('city').value == ''){
                event.preventDefault();
                alert("You must fill city!");
                document.getElementById('city').focus();
                return false;
            }
            else if (document.getElementById('state').value == ''){
                event.preventDefault();
                alert("You must fill state!");
                document.getElementById('state').focus();
                return false;
            }
            else if (document.getElementById('country').value == ''){
                event.preventDefault();
                alert("You must fill country!");
                document.getElementById('country').focus();
                return false;
            }
            else if (document.getElementById('zip').value == ''){
                event.preventDefault();
                alert("You must fill ZIP!");
                document.getElementById('zip').focus();
                return false;
            }
            else if (document.getElementById('phone').value == ''){
                event.preventDefault();
                alert("You must fill phone!");
                document.getElementById('phone').focus();
                return false;
            }
            else if (document.getElementById('email').value == ''){
                event.preventDefault();
                alert("You must fill Email!");
                document.getElementById('email').focus();
                return false;
            }
            else if (email_pattern.test(email) == false){
                event.preventDefault();
                alert("Email not valid!");
                document.getElementById('email').focus();
                return false;   
            }
            document.update_data.submit();
        }
    </script>

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
                        <li>Checkout - Address</li>
                    </ul>
                </div>

                <div class="col-md-9" id="checkout">

                    <div class="box">
                        <form method="post" name="update_data" action="update_product_data_user.php">
                            <h1>Checkout</h1>
                            <ul class="nav nav-pills nav-justified">
                                <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Address</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-money"></i><br>Payment Method</a>
                                </li>
                                <li class="disabled"><a href="#"><i class="fa fa-eye"></i><br>Order Review</a>
                                </li>
                            </ul>

                            <div class="content">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php 
                                            $my_data = file_get_contents('user_folder/user_data.json');
                                            $my_data1 = json_decode($my_data, true);
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['firstname'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['firstname'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['lastname'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['lastname'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="company">Company</label>
                                            <input type="text" class="form-control" id="company" name="company" value="<?php
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['company'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['company'];
                                            }
                                        ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="street">Address</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="street" name="street" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['street'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['street'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.row -->

                                <div class="row">
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="city">City</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="city" name="city" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['city'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['city'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="zip">ZIP</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="zip" name='zip' value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['zip'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['zip'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="state">State</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="state" name="state" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['state'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['state'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="form-group">
                                            <label for="country">Country</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="country" name="country" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['country'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['country'];
                                            }
                                         ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="phone">Telephone</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="phone" name="phone" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['contact_phone'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['contact_phone'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="email">Email</label><span style="color: red;">*</span>
                                            <input type="text" class="form-control" id="email" name="email" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['contact_email'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['contact_email'];
                                            }
                                         ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">Note: all fields marked with <span style="color: red;">*</span> are required to fill</div>
                                </div>
                                <!-- /.row -->
                            </div>

                            <div class="box-footer">
                                <div class="pull-left">
                                    <a href="basket.php" class="btn btn-default"><i class="fa fa-chevron-left"></i>Back to basket</a>
                                </div>
                                <div class="pull-right">
                                    <button type="submit" onclick="check_data();" class="btn btn-primary">Continue to Delivery Method<i class="fa fa-chevron-right"></i>
                                    </button>
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