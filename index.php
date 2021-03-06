<!--
Written using the Bootstrap engine as a base - edited by Henry Pye
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home - Grape World</title>
    <script>
        setInterval(function () {
            $('#fade').fadeOut('slow');
        }, 10000);
    </script>
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
            <!-- Collect the nav links, forms, and other content for toggling -->
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
        <?php
        $e = -1;
        if(isset($_GET['e']))
            $e = $_GET['e'];
        if ($e == 1)
            echo "<div class = 'success' id = 'fade'><p>Welcome to Grape World!</p></div>";
        if ($e == 4)
            echo "<div class = 'success' id = 'fade'><p>Succesfully Subscribed!</p></div>";
        ?>
        <!-- /.container -->
    </nav>

    <!-- Header -->
    <div class="intro-header">

        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Grape World</h1>
                        <h3>'Pop in your mouth' deliciousness</h3>
                        <h4>Scroll down to find out more</h4>
                        <hr class="intro-divider">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">About Grape World</h2>
                    <p class = "lead">Here at Grape World we have carefully selected a cross section of what we believe to be the best strains of Grapes, all grown to give the very best flavours when eaten. All of our vines are grown by us, farmed by us, packaged and then sold by us.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/vineyard.jpg" alt="">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-lg-offset-0 col-sm-4">
                    <img class="img-responsive" src="img/wine.jpg" alt="">
                </div>
                <div class="col-lg-5 col-sm-6">

                    <div class="clearfix"></div>
                    <h2 class="section-heading">Our Grapes</h2>
                    <p class = "lead">The Grapes and Grape Produce we provide are fantastic for any uses, they taste good and are perfect for any wine-makers out there.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-sm-6">

                    <div class="clearfix"></div>
                    <h2 class="section-heading">Spoilt For Choice</h2>
                    <p class = "lead">We pride ourselves for the amount of Grape Produce we make available, just from browsing you will see we have many Purple and Green grapes in stock, but we also have stock of White Grapes, plus multiple Wine types to choose from.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/grapeharvest.jpg" alt="" style = "">
                </div>
            </div>
            <div class="row">
                <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- /.container -->

    </div>
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
