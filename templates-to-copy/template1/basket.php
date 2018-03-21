<?php require("top-bar.php"); 
    if (count($_SESSION['cart']) > 0){
        $file_open = file_get_contents('product_data.json');
        $file_data = json_decode($file_open, true);
        $buy_data = [];
        foreach ($_SESSION['cart'] as $cart_key => $cart_value) {
            $temp_data = $file_data[$shopname][$cart_value[0]][$cart_value[1]][$cart_value[2]];
            array_push($buy_data, [$temp_data['product_image'][0], $cart_value[2], $temp_data['product_price'], ($temp_data['product_price'] - $temp_data['product_offer_price']), $temp_data['product_offer_price'], $cart_value[3], $cart_value[4], $temp_data['product_max_quantity']]);
        }
    }
    else{
        echo "<script>alert('You have not added any products to cart!');
        window.history.back();</script>";
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
    <script type="text/javascript">
        var product_data = new Array();
        <?php foreach ($buy_data as $key2 => $value2) { ?>
            var temp = []; // [pro_id, pro_name, pro_price, pro_discount, pro_total, quantity, currency]
            temp.push('<?php echo $value2[5]; ?>');
            temp.push('<?php echo $value2[1]; ?>');
            temp.push('<?php echo $value2[2]; ?>');
            if (<?php echo $value2[2]; ?> == <?php echo $value2[3] ?>){
                temp.push('0');
                temp.push('<?php echo $value2[2]; ?>');
            }
            else{
                temp.push('<?php echo $value2[3]; ?>');
                temp.push('<?php echo $value2[4]; ?>');
            }
            temp.push('1');
            temp.push('<?php echo $currency ?>');
            temp.push('<?php echo $value2[7] ?>');
            product_data.push(temp);
        <?php } ?>
        console.log(product_data);
        function update_table(qua, ind){
            console.log(ind);
            var val = product_data[ind][4];
            var grand_total = 0;
            if (qua <= product_data[ind][7] && qua > 0){
                document.getElementById('product_total['+ind+']').textContent = val*qua;
                product_data[ind][5] = qua;
                for (i=0; i<product_data.length; i++){
                    grand_total = grand_total + parseInt(document.getElementById('product_total['+i+']').textContent);
                }
                document.getElementById('grand_total').textContent = grand_total;
                document.getElementById('total_to_submit').value = grand_total;
                document.getElementById('product_quantity_sum['+ind+']').textContent = qua;
            }
        }
    </script>
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
                        <li>Shopping cart</li>
                    </ul>
                </div>

                <div class="col-md-9" id="basket">

                    <div class="box">

                        <form method="post" action="checkout1.php">

                            <h1>Shopping cart</h1>
                            <p class="text-muted">You currently have <?php echo count($_SESSION['cart']) ?> item(s) in your cart. (Leaving this page without checkout will distroy quantity savings)</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Product</th>
                                            <th>Quantity</th>
                                            <th>Unit price</th>
                                            <th>Discount</th>
                                            <th>Summary</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $total = 0;
                                            foreach ($buy_data as $buy_key => $buy_value) {
                                                echo '<tr>
                                                    <td>
                                                        <img style="width: 45px; height:50px;" src="images/'.$buy_value[0].'" alt="Image not available">
                                                    </td>
                                                    <td>'.$buy_value[1].'
                                                    </td>
                                                    <td>
                                                        <input type="number" id="product_quantity['.$buy_key.']" name="product_quantity['.$buy_key.']" value="'.$buy_value[6].'" min="1" max="'.$buy_value[7].'" class="form-control" onchange="update_table(this.value, '.$buy_key.');">
                                                    </td>
                                                    <td>'.$currency.'<label id="product_price['.$buy_key.']">'.$buy_value[2].'</label></td>';
                                                    if ($buy_value[2] == $buy_value[3]){
                                                        echo '<td>'.$currency.'<label id="product_discount['.$buy_key.']">0</label></td>';
                                                        echo '<td><label id="product_quantity_sum['.$buy_key.']">'.$buy_value[6].'</label> x '.$buy_value[2].'</td>';
                                                        echo '<td>'.$currency.'<label id="product_total['.$buy_key.']">'.($buy_value[2]*$buy_value[6]).'</label></td>';
                                                        $total += ($buy_value[2]*$buy_value[6]);
                                                    }
                                                    else{
                                                        echo '<td>'.$currency.'<label id="product_discount['.$buy_key.']">'.$buy_value[3].'</label></td>';
                                                        echo '<td><label id="product_quantity_sum['.$buy_key.']">'.$buy_value[6].'</label> x '.$buy_value[4].'</td>';
                                                        echo '<td>'.$currency.'<label id="product_total['.$buy_key.']">'.($buy_value[4]*$buy_value[6]).'</label></td>';
                                                        $total += ($buy_value[4]*$buy_value[6]);
                                                    }
                                                    echo '<td><a href="delete_from_cart.php?ind='.$buy_key.'"><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>';
                                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="5">Total</th>
                                            <th></th>
                                            <th colspan="2"><?php echo $currency.'<label id="grand_total">'.$total.'</label>'; ?>
                                                <input type="hidden" name="total_to_submit" id="total_to_submit" value="<?php echo $total; ?>">
                                            </th>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <!-- /.table-responsive -->

                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary">Proceed to checkout <i class="fa fa-chevron-right"></i>
                                    </button>
                                </div>
                            </div>

                        </form>

                    </div>
                    <!-- /.box -->

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