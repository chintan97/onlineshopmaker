<?php 
session_start();
$str = file_get_contents('product_data.json');
$json = json_decode($str, true);
$shopname = array_keys($json)[0];
$category = array_keys($json[$shopname]);
$read_file = file_get_contents("owner_data.json");
$read_data = json_decode($read_file, true);
$user = array_keys($read_data)[0];
$currency = $read_data[$user]['product_currency'];
if($currency == 'rupee'){
    $currency = '&#8377;';
}
else if($currency == 'dollar'){
    $currency = '$';
}
else{
    $currency = '£';
}
?>

<div id="top">
        <div class="container">
            <div class="col-md-6 offer" data-animate="fadeInDown">
                
            <?php 
                if (isset($_SESSION['offer'])){
                    if ($_SESSION['offer'] != "No Offers For Now"){
                        echo '<a id="offer_button" href="detail.php?pro='.$_SESSION["offer_product"].'&id='.$_SESSION["offer_product_id"].'" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>
                            <a id="offer_text" href="detail.php?pro='.$_SESSION["offer_product"].'&id='.$_SESSION["offer_product_id"].'">';
                    }
                    else {
                        echo '<a id="offer_button" href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>
                            <a id="offer_text" href="#"> ';
                    }
                    echo $_SESSION['offer'];
                }
                else {
                    $max_offer = 0;
                    $max_offer_product_name = '';
                    $max_offer_product_id = '';
                    foreach ($json[$shopname] as $o_cat => $o_catdata) {
                        foreach ($o_catdata as $o_subcat => $o_subcatdata) {
                            foreach ($o_subcatdata as $o_productname => $o_productdata) {
                                if ((int)$o_productdata['product_offer_percentage'] > (int)$max_offer){
                                    $max_offer = (int)$o_productdata['product_offer_percentage'];
                                    $max_offer_product_name = $o_productname;
                                    $max_offer_product_id = $o_productdata['product_id'];
                                }
                            }
                        }
                    }
                    if ($max_offer == 0){
                        $_SESSION['offer'] = "No Offers For Now";
                        echo '<a id="offer_button" href="#" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>
                            <a id="offer_text" href="#"> ';
                        echo $_SESSION['offer'];
                    }
                    else {
                        $_SESSION['offer'] = $max_offer."% off on ".$max_offer_product_name."";
                        $_SESSION['offer_product'] = $max_offer_product_name;
                        $_SESSION['offer_product_id'] = $max_offer_product_id;
                        echo '<a id="offer_button" href="detail.php?pro='.$_SESSION["offer_product"].'&id='.$_SESSION["offer_product_id"].'" class="btn btn-success btn-sm" data-animate-hover="shake">Offer of the day</a>
                            <a id="offer_text" href="detail.php?pro='.$_SESSION["offer_product"].'&id='.$_SESSION["offer_product_id"].'">';
                        echo $_SESSION['offer'];
                    }
                }
            ?>
            </a>
            </div>
            <div class="col-md-6" data-animate="fadeInDown">
                <ul class="menu">
                    <?php
                        if (isset($_SESSION['reg_email'])){
                            echo '<li><a href="customer-orders.php">My account</a></li>';
                            echo '<li><a href="logout.php">Logout</a></li>';
                        }
                        else {
                            echo '<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                                    </li>
                                    <li><a href="register.php">Register</a>
                                    </li>
                                    <li><a href="contact.php">Contact</a>
                                    </li>';
                        } 
                    ?>
                    
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
                        <form action="login_customer.php" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" id="login_email" name="login_email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="login_password" name="login_password" placeholder="Password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">Not registered yet?</p>
                        <p class="text-center text-muted"><a href="register.php"><strong>Register now</strong></a>! It is easy and done in 1&nbsp;minute and gives you access to special discounts and much more!</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
