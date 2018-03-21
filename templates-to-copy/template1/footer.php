<div id="footer" data-animate="fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <h4>Pages</h4>

                <ul>
                    <li><a href="#">Homepage</a>
                    </li>
                    <li><a href="text.php">About us</a>
                    </li>
                    <li><a href="text.php">Terms and conditions</a>
                    </li>
                    <li><a href="faq.php">FAQ</a>
                    </li>
                    <li><a href="contact.php">Contact us</a>
                    </li>
                </ul>

            </div>
                        
            <div class="col-md-3 col-sm-6">
                <h4>User section</h4>

                    <ul>
                        <?php 
                            if (isset($_SESSION['reg_email'])){
                                echo '<li><a href="customer-orders.php">My account</a></li>';
                                echo '<li><a href="logout.php">Logout</a></li>';
                            }
                            else {
                                echo '<li><a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                                    </li>
                                    <li><a href="register.php">Regiter</a>
                                    </li>';
                            }
                        ?>
                    </ul>
                <hr class="hidden-md hidden-lg">
            </div>

            <div class="col-md-3 col-sm-6">

                <h4>Where to find us</h4>

                    <?php
                        foreach ($read_data as $key => $value) {
                            $owner = $key;
                        }
                    ?>

                    <p>
                        <strong><?php echo $read_data[$owner]['shop_address']; ?></strong>
                        <?php 
                            $split_nearest_location = explode(',', $read_data[$owner]['shop_nearest_location']);
                            foreach ($split_nearest_location as $key => $value) {
                                if ($key != (count($split_nearest_location) - 1)){
                                    echo '<br>'.$value;
                                }
                                else {
                                    echo '<br><strong>'.$value.'</strong>'; // Country name
                                }
                            }
                        ?>  
                    </p>

                    <a href="contact.php">Go to contact page</a>

                    <hr class="hidden-md hidden-lg">

            </div>
                    <!-- /.col-md-3 -->

            <div class="col-md-3 col-sm-6">

                <h4>Stay in touch</h4>

                    <p class="social">
                        <a href="#" class="facebook external" data-animate-hover="shake"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="twitter external" data-animate-hover="shake"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="instagram external" data-animate-hover="shake"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="gplus external" data-animate-hover="shake"><i class="fa fa-google-plus"></i></a>
                        <a href="#" class="email external" data-animate-hover="shake"><i class="fa fa-envelope"></i></a>
                    </p>


            </div>
                    <!-- /.col-md-3 -->

        </div>
                <!-- /.row -->

    </div>
            <!-- /.container -->
</div>
        <!-- /#footer -->

<!-- copyright -->
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">&copy; onlineshopmaker</p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">Template by <a href="http://onlineshopmaker.dx.am">Onlineshopmaker</a>
                         
            </p>
        </div>
    </div>
</div>