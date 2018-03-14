<?php require("top-bar.php"); ?>
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
        function check_update_pass(){
            var password_old = document.getElementById('password_old').value;
            var password_1 = document.getElementById('password_1').value;
            var password_2 = document.getElementById('password_2').value;
            var pass_pattern = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
            if (password_old == ''){
                event.preventDefault();
                alert("Please enter old password!");
                document.getElementById('password_old').focus();
                return false;
            }
            else if (password_1 == ''){
                event.preventDefault();
                alert("Please enter new password!");
                document.getElementById('password_1').focus();
                return false;
            }
            else if (password_old == password_1){
                event.preventDefault();
                alert("You have entered same password!");
                document.getElementById('password_1').focus();
                return false;
            }
            else if (password_1 != password_2){
                event.preventDefault();
                alert("New passwords not matched!");
                document.getElementById('password_2').focus();
                return false;
            }
            else if (pass_pattern.test(password_1) == false){
                event.preventDefault();
                alert("Password must contain at least one number, one special character(!@#$%^&*), one upper and lower case character with the length between 8-20!");
                document.getElementById('password_1').focus();
                return false;
            }
            document.update_pass.submit();
        }

        function check_detail(){
            var email = document.getElementById('email').value;
            var email_pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
            if (email_pattern.test(email) == false){
                event.preventDefault();
                alert("Please enter valid Email!");
                document.getElementById('email').focus();
                return false;
            }
            document.add_detail.submit();
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
                        <li>My account</li>
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
                                <li>
                                    <a href="customer-orders.php"><i class="fa fa-list"></i> My orders</a>
                                </li>
                                <li>
                                    <a href="customer-wishlist.php"><i class="fa fa-heart"></i> My wishlist</a>
                                </li>
                                <li class="active">
                                    <a href="customer-account.php"><i class="fa fa-user"></i> My account</a>
                                </li>
                                <li>
                                    <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                    <!-- *** CUSTOMER MENU END *** -->
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <h1>My account</h1>
                        <p class="lead">Change your personal details or your password here.</p>

                        <h3>Change password</h3>

                        <form name="update_pass" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_old">Old password</label>
                                        <input type="password" class="form-control" name="password_old" id="password_old">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_1">New password</label>
                                        <input type="password" class="form-control" name="password_1" id="password_1">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password_2">Retype new password</label>
                                        <input type="password" class="form-control" name="password_2" id="password_2">
                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

                            <div class="col-sm-12 text-center">
                                <button onclick="check_update_pass();" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save new password</button>
                            </div>
                        </form>

                        <hr>

                        <h3>Personal details</h3>
                        <form name="add_detail" method="post">
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
                                        <label for="street">Address</label>
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
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['city'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['city'];
                                            }
                                         ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" class="form-control" id="zip" name='zip' value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['zip'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['zip'];
                                            }
                                         ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" class="form-control" id="state" name="state" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['state'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['state'];
                                            }
                                         ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-3">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" class="form-control" id="country" name="country" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['country'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['country'];
                                            }
                                         ?>">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="phone">Telephone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['contact_phone'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['contact_phone'];
                                            }
                                         ?>">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php 
                                            if (isset($my_data1['root'][$_SESSION['reg_email']]['contact_email'])){
                                                echo $my_data1['root'][$_SESSION['reg_email']]['contact_email'];
                                            }
                                         ?>">
                                    </div>
                                </div>
                                <div class="col-sm-12 text-center">
                                    <button type="submit" onclick="check_detail();" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>

                                </div>
                            </div>
                        </form>
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

<?php
    if (isset($_POST["password_old"])){
        $file_open = fopen('user_folder/user_data.json', 'a+');
        $file_read_data = fread($file_open, filesize('user_folder/user_data.json'));
        $file_data = json_decode($file_read_data, true);
        $old_pass = $file_data['root'][$_SESSION['reg_email']]['password'];
        if ($old_pass != $_POST['password_old']){
            echo "<script>alert('Old password not matched! Please try again!')</script>";
        }
        else{
            $file_data['root'][$_SESSION['reg_email']]['password'] = $_POST['password_1'];
            file_put_contents('user_folder/user_data.json', json_encode($file_data));
            echo "<script>alert('Password successfully changed!'); 
                window.location.href = 'customer-account.php'
            </script>";
        }
        fclose($file_open);
    }
    else if (isset($_POST['firstname'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $company = $_POST['company'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $zip = $_POST['zip'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $file_open = fopen('user_folder/user_data.json', 'a+');
        $file_read_data = fread($file_open, filesize('user_folder/user_data.json'));
        $file_data = json_decode($file_read_data, true);
        $file_data['root'][$_SESSION['reg_email']]['firstname'] = $firstname;
        $file_data['root'][$_SESSION['reg_email']]['lastname'] = $lastname;
        $file_data['root'][$_SESSION['reg_email']]['contact_email'] = $email;
        $file_data['root'][$_SESSION['reg_email']]['company'] = $company;
        $file_data['root'][$_SESSION['reg_email']]['street'] = $street;
        $file_data['root'][$_SESSION['reg_email']]['city'] = $city;
        $file_data['root'][$_SESSION['reg_email']]['zip'] = $zip;
        $file_data['root'][$_SESSION['reg_email']]['state'] = $state;
        $file_data['root'][$_SESSION['reg_email']]['country'] = $country;
        $file_data['root'][$_SESSION['reg_email']]['contact_phone'] = $phone;
        file_put_contents('user_folder/user_data.json', json_encode($file_data));
        fclose($file_open);
        echo "<script>alert('Your details have been updated!'); 
            window.location.href = 'customer-account.php'
        </script>";
    }
?>