<?php
    include 'connection.php';

    $db = new Database();
	$categories = $db->getCategories();
?>
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
                    <li><a href="sellerHome.html">Home</a></li>
                    <li class="active"><a href="addProduct.php">Add Product</a></li>
                    <li><a href="addInventory.php">Add Inventory</a></li>
                </ul>
                <h3 class="text-muted">ZagBay - seller</h3>
            </div>

            <form class="form-horizontal" role="form" method='post' action='insert.php?type=product'>

                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Product Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name='name' class="form-control" id="inputEmail3" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Price:</label>
                    <div class="col-sm-10">
                        <input type="text" name='price' class="form-control" id="inputPassword3" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Shipping Price:</label>
                    <div class="col-sm-10">
                        <input type="text" name='shipping' class="form-control" id="inputPassword3" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Quantity:</label>
                    <div class="col-sm-10">
                        <input type="text" name='qty' class="form-control" id="inputPassword3" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Description:</label>
                    <div class="col-sm-10">
                        <input type="text" name='description' class="form-control" id="inputPassword3" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Image URL:</label>
                    <div class="col-sm-10">
                        <input type="text" name='imgUrl' class="form-control" id="inputPassword3" placeholder="">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Category:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name='category'>
                    <?php
                        foreach($categories as $category) {
                            echo '<option value="'.$category['id'].'">'.$category['name'].'</option>';
                        }
                    ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                    </div>
                </div>
            </form>

        </div>


        <!-- build:js scripts/vendor.js -->
        <!-- bower:js -->
        <script src="bower_components/jquery/jquery.js"></script>
        <!-- endbower -->
        <!-- endbuild -->

        <!-- build:js scripts/main.js -->
        <script src="scripts/main.js"></script>
        <!-- endbuild -->
</body>
</html>
