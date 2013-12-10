<!doctype html>
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
        <!-- endbuild -->
        <!-- build:js scripts/vendor/modernizr.js -->
        <script src="bower_components/modernizr/modernizr.js"></script>
        <!-- endbuild -->
                <link rel="stylesheet" href="styles/bootstrap.css">

    </head>
    <body>
        <!--[if lt IE 10]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->


        <div class="container">
            <div class="header">
                <ul class="nav nav-pills pull-right">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="category.php">Category 1</a></li>
                    <li><a href="search.php">Search</a></li>
                    <li class="active"><a href="cart.php">Cart</a></li>
                    <li><a href="orders.php">Orders</a></li>
                </ul>

                <h3 class="text-muted">ZagBay</h3>
            </div>

            <form class="form-horizontal span6" role='form'>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Holder's Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" title="Fill your first and last name" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Type</label>
                    <div class="col-sm-10">
                        <select>
                            <option>VISA</option>
                            <option>Master Card</option>
                            <option>American Express</option>
                        </select>
                    </div>
                </div>
           
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Number</label>
                    <div class="col-sm-10">
                        <div class="row-fluid">
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="First four digits" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Second four digits" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Third four digits" required>
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" autocomplete="off" maxlength="4" pattern="\d{4}" title="Fourth four digits" required>
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="form-group">
                    <label class="col-sm-2 control-label">Card Expiry Date</label>
                    <div class="col-sm-10">
                        <div class="col-sm-9">
                            <select class="form-control">
                                <option>January</option>
                                <option>...</option>
                                <option>December</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-control">
                                <option>2013</option>
                                <option>...</option>
                                <option>2015</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">Card CVV</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" title="Three digits at back of your card" required>
                    </div>
                </div>
           
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn">Cancel</button>
                    </div>
                </div>
            </form>

            <div class="footer">
                <p>♥ from the Yeoman team</p>
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