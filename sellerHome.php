<!doctype html>

<?php
    include 'connection.php';

    $db = new Database();
    $topProduct = $db->getTopProducts(1);
    $totalInventory = $db->getTotalInventory();
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
                    <li class="active"><a href="sellerHome.html">Home</a></li>
                    <li><a href="addProduct.php">Add Product</a></li>
                    <li><a href="addInventory.html">Add Inventory</a></li>
                </ul>
                <h3 class="text-muted">ZagBay - seller</h3>
            </div>

            <div class="jumbotron">
                <h1>Welcome to ZagBay</h1>
                <p class="lead">Here are some of your selling statistics.</p>
            </div>

            <h2>Selling Analytics</h2>

            <div class="row">
				<div class="col-sm-6 col-md-4">
	            	<div class="thumbnail">
	                    <img src="http://placehold.it/320x200&text=graph" alt="ALT NAME">
	            	</div>
	            </div>

				<?php
                    echo '<div class="col-sm-6 col-md-4"><div class="thumbnail"><h3>Top selling product</h3><img src="';
                    echo $topProduct[0]['imageURL'];
                    echo '" alt="ALT NAME"><div class="caption"><h3>';
                    echo $topProduct[0]['name'];
                    echo '</h3><p>';
                    echo $topProduct[0]['description'];
                    echo '</p><p align="center"><a href="product.php?id='.$topProduct[0]['id'].'" class="btn btn-primary btn-block">Open</a></p>';
                    echo '</div></div></div>';
                ?>

				<div class="col-sm-6 col-md-4">
	            	<div class="thumbnail">
	                    <h3>Total Inventory</h3>
                        <h1><?php echo $totalInventory; ?></h1>
	            	</div>
	            </div>
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
