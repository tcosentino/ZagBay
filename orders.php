<!doctype html>

<?php
    include 'connection.php';

    $db = new Database();
    $orders = $db->getOrders();
	$categories = $db->getCategories();
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
                    <li><a href="index.php">Home</a></li>
                    <?php
                        foreach($categories as $category) {
                            echo '<li><a href="category.php?id='.$category['id'].'">'.$category['name'].'</a></li>';
                        }
                    ?>
                    <li><a href="search.php">Search</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li class="active"><a href="orders.php">Orders</a></li>
                </ul>

                <h3 class="text-muted">ZagBay</h3>
            </div>
            
            <h2>My Orders</h2>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Fulfilled</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        foreach($orders as $order) {
                            echo '<tr><td>'.$order['firstName'].' '.$order['lastName'].'</td>';
                            echo '<td>$'.round($order['totalPrice'], 2).'</td>';
                            if($order['fulfilled']) {
                                echo '<td>Shipped</td>';
                            } else {
                                echo '<td>Processing</td>';
                            }
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>

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
        <script src="bower_components/sass-bootstrap/js/affix.js"></script>
        <script src="bower_components/sass-bootstrap/js/alert.js"></script>
        <script src="bower_components/sass-bootstrap/js/dropdown.js"></script>
        <script src="bower_components/sass-bootstrap/js/tooltip.js"></script>
        <script src="bower_components/sass-bootstrap/js/modal.js"></script>
        <script src="bower_components/sass-bootstrap/js/transition.js"></script>
        <script src="bower_components/sass-bootstrap/js/button.js"></script>
        <script src="bower_components/sass-bootstrap/js/popover.js"></script>
        <script src="bower_components/sass-bootstrap/js/carousel.js"></script>
        <script src="bower_components/sass-bootstrap/js/scrollspy.js"></script>
        <script src="bower_components/sass-bootstrap/js/collapse.js"></script>
        <script src="bower_components/sass-bootstrap/js/tab.js"></script>
        <!-- endbuild -->
</body>
</html>
