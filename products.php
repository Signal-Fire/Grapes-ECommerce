<!--
Written using the Bootstrap engine as a base - edited by Henry Pye
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'main.php';
    ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Products - Grape World</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/other-style.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>

            </div>
            <!-- Navigation bar -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <?php
                    session_start();
                    if (!isset($_COOKIE['fname'])) {
                        echo "<li><a href='login.php'>Login</a></li>";
                        echo "<li><a href = 'register.php'>Register</a></li>";
                    } else {
                        echo "<li><a href = 'logout.php'>Logout from ".ucfirst($_COOKIE['fname'])."</a></li>";
                        echo "<li><a href = 'account.php'>Account</a></li>";
                    }
                    ?>
                    <li><a href = "products.php">Products</a></li>
                    <li><a href = "basket.php">Basket</a></li>
                    <li><a href = "newsletter.php">Subscribe</a></li>
                    <li><a href = "contact.php">Contact</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <div class="intro-small">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Grape World</h1>
                        <h3>Scroll down to view our produce</h3>
                        <hr class="intro-divider">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <?php
        display_products();
    ?>
    <!-- /.content-section-a -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="products.php">Products</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="basket.php">Basket</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <?php
                        if (!isset($_COOKIE['fname'])) {
                            ?>
                            <li>
                                <a href="register.php">Register</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                            <li>
                                <a href="login.php">Login</a>
                            </li>
                            <li class="footer-menu-divider">&sdot;</li>
                        <?php
                        }
                        ?>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Grapes and Grape Product 2015. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
