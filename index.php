<!doctype html>

<?php
    include 'connection.php';

    $db = new Database();
    $topProducts = $db->getTopProducts();
    $topSellers = $db->getTopSellers();
?>

<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ZagBay</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/bootstrap.css">
        <!-- endbuild -->
        <!-- build:js scripts/vendor/modernizr.js -->
        <script src="bower_components/modernizr/modernizr.js"></script>
        <script src="scripts/bootstrap.js"></script>
        <!-- endbuild -->
    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="category.php?id=1">Category 1</a></li>
                    <li><a href="search.html">Search</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>
                <h3 class="text-muted">ZagBay</h3>
            </div>

            <div class="jumbotron">
                <h1>Welcome to ZagBay</h1>
                <p class="lead">Always a pleasure to take your money.</p>
            </div>

            <h2>Trending Products</h2>

            <div class="row">
                <?php
                    foreach($topProducts as $product) {
                        echo '<div class="col-sm-6 col-md-4"><div class="thumbnail"><img src="';
                        echo $product['imageURL'];
                        echo '" alt="ALT NAME"><div class="caption"><h3>';
                        echo $product['name'];
                        echo '</h3><p>';
                        echo $product['description'];
                        echo '</p><p align="center"><a href="product.php?id='.$product['id'].'" class="btn btn-primary btn-block">Open</a></p>';
                        echo '</div></div></div>';
                    }
                ?>
			</div>

            <h2>Top Sellers</h2>

            <div class="row">
                <?php
                    foreach($topSellers as $seller) {
                        echo '<div class="col-sm-6 col-md-4"><div class="thumbnail"><img src="';
                        echo $seller['imageURL'];
                        echo '" alt="ALT NAME"><div class="caption"><h3>';
                        echo $seller['firstName'].' '.$seller['lastName'];
                        echo '</h3>';
                        echo '</div></div></div>';
                    }
                ?>
			</div>

        </div>


        <!-- build:js scripts/vendor.js -->
        <!-- bower:js -->
        <script src="bower_components/jquery/jquery.js"></script>
        <!-- endbower -->
        <!-- endbuild -->

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='//www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

        <!-- build:js scripts/main.js -->
        <script src="scripts/main.js"></script>
        <!-- endbuild -->

        <!-- build:js scripts/plugins.js -->
        <!-- endbuild -->
</body>
</html>
