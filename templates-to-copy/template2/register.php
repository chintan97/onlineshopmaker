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
        function reg_data(){
            var reg_name = document.getElementById('reg_name').value;
            var reg_email = document.getElementById('reg_email').value;
            var reg_password = document.getElementById('reg_password').value;
            var email_pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
            var name_pattern=/^[A-Za-z ]+$/;
            var pass_pattern = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,20}$/;
            if (reg_name == ''){
                event.preventDefault();
                alert("Please enter name!");
                document.getElementById('reg_name').focus();
                return false;
            }
            else if (reg_email == ''){
                event.preventDefault();
                alert("Please enter Email!");
                document.getElementById('reg_email').focus();
                return false;
            }
            else if (reg_password == ''){
                event.preventDefault();
                alert("Please enter password!");
                document.getElementById('reg_password').focus();
                return false;
            }
            else if (name_pattern.test(reg_name) == false){
                event.preventDefault();
                alert("Name not valid!");
                document.getElementById('reg_name').focus();
                return false;
            }
            else if (email_pattern.test(reg_email) == false){
                event.preventDefault();
                alert("Email not valid!");
                document.getElementById('reg_email').focus();
                return false;
            }
            else if (pass_pattern.test(reg_password) == false){
                event.preventDefault();
                alert("Password must contain at least one number, one special character(!@#$%^&*), one upper and lower case character with the length between 8-20!");
                document.getElementById('reg_password').focus();
                return false;
            }
            document.reg_form.submit();
        }

        function check_login(){
            var login_email = document.getElementById('login_email1').value;
            var login_password = document.getElementById('login_password1').value;
            var email_pattern = /^\w+\@[a-zA-Z_.]+\.\w{2,5}$/;
            if (login_email == ''){
                event.preventDefault();
                alert("Please enter Email!");
                document.getElementById('login_email1').focus();
                return false;
            }
            else if (login_password == ''){
                event.preventDefault();
                alert("Please enter password!");
                document.getElementById('login_password1').focus();
                return false;
            }
            else if (email_pattern.test(login_email) == false){
                event.preventDefault();
                alert("Email not valid!");
                document.getElementById('login_email1').focus();
                return false;
            }
            document.login_form.submit();
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
                        <li>New account / Sign in</li>
                    </ul>

                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>New account</h1>

                        <p class="lead">Not our registered customer yet?</p>
                        <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <form action="reg_customer.php" name="reg_form" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="reg_name" id="reg_name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="reg_email" id="reg_email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="reg_password" id="reg_password">
                            </div>
                            <div class="text-center">
                                <button type="submit" onclick="reg_data();" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box">
                        <h1>Login</h1>

                        <p class="lead">Already our customer?</p>
                        <p>If you are already registered with our website, please login from here.</p>
                        <p class="text-muted">If you have any questions, please feel free to <a href="contact.php">contact us</a>, our customer service center is working for you 24/7.</p>

                        <hr>

                        <form action="login_customer.php" name="login_form" method="post">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="login_email1" id="login_email1">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="login_password1" id="login_password1">
                            </div>
                            <div class="text-center">
                                <button type="submit" onclick="check_login();" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
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
