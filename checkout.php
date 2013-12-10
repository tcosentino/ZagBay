<!doctype html>
<?php
    include 'connection.php';

    $db = new Database();
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
                    <li class="active"><a href="cart.php">Cart</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>

                <h3 class="text-muted">ZagBay</h3>
            </div>

            <form class="form-horizontal span6" role='form' method='post' action='insert.php?type=credit'>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Holder's Name</label>
                    <div class="col-sm-10">
                        <input type="text" name='name' class="form-control" title="Fill your first and last name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Type</label>
                    <div class="col-sm-10">
                        <select name='cardType'>
                            <option val='VISA'>VISA</option>
                            <option val='Master Card'>Master Card</option>
                            <option val='American Express'>American Express</option>
                        </select>
                    </div>
                </div>
           
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Number</label>
                    <div class="col-sm-10">
                        <div class="row-fluid">
                            <div class="col-sm-10">
                                <input type="text" name='cardNumber' class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="form-group">
                    <label class="col-sm-2 control-label">Expiration Date (yyyy-mm-dd)</label>
                    <div class="col-sm-10">
                        <div class="row-fluid">
                            <div class="col-sm-10">
                                <input type="text" name='expire' class="form-control" autocomplete="off">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Card CVV</label>
                    <div class="col-sm-10">
                        <input type="text" name='cvv' class="form-control" title="Three digits at back of your card" required>
                    </div>
                </div>
           
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>

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
