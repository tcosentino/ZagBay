<?php
    include 'connection.php';
	
    $db = new Database();
	
	if (isset($_GET['id']) and isset($_GET['orderID'])) {
		$db->removeProduct($_GET['id'], $_GET['orderID']);
	}
	$categories = $db->getCategories();
	$items = $db->getCartItems();
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

            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                 <?php
				 if (!empty($items)) {

                    foreach($items as $item) {
						echo '<tr><td class="col-sm-8 col-md-6">
                                <div class="media">
                                    <a class="thumbnail pull-left" href="product.php?id=';
						echo $item['id'];
						echo '"> <img class="media-object" src="';
						echo $item['imageURL'];
						echo '" style="width: 72px; height: 72px;"> </a>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a href="product.php?id=';
						echo $item['id'];
						echo '">';
						echo $item['name'];
						echo '</a></h4>
                                        <h5 class="media-heading"> by <a href="product.php?id=';
						echo $item['id'];
						echo '">Brand name</a></h5>
                                        <span>Status: </span>';
						echo '<span class="text-success"><strong>In Stock</strong></span>';
						echo '
                                    </div>
                                </div></td>
                                <td class="col-sm-1 col-md-1" style="text-align: center">
                                ';
						echo $item['quantity'];
						echo '
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>$';
						echo round($item['price'],2);
						echo '</strong></td>
                                <td class="col-sm-1 col-md-1 text-center"><strong>$';
						echo round($item['shippingPrice'],2);
						echo '</strong></td>
                                <td class="col-sm-1 col-md-1">
                                <a href="cart.php?';
						echo 'orderID='.$item['orderID'].'&id='.$item['id'];
						echo '" class="btn btn-danger">
                                    <span class="glyphicon glyphicon-remove"></span> Remove
                                </a></td>
                            </tr>';
					}
				 }
				?>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Subtotal</h5></td>
                                <td class="text-right"><h5><strong>$
                                <?php
									$subtotal = 0;
									if (!empty($items)) {
										foreach($items as $item) {
											$subtotal += ($item['price'] * $item['quantity']);
										}
									}
									echo round($subtotal, 2);
								
                                ?>
                                </strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h5>Estimated shipping</h5></td>
                                <td class="text-right"><h5><strong>$
                                <?php
									$subShipping = 0;
									if (!empty($items)) {
										foreach($items as $item) {
											$subShipping += $item['shippingPrice'];
										}	
									}
									echo round($subShipping, 2);
								
                                ?>
                                </strong></h5></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h3><strong>
                                <?php
								
								echo round(($subtotal + $subShipping), 2);
								
								?>
                                
                                </strong></h3></td>
                            </tr>
                            <tr>
                                <td>   </td>
                                <td>   </td>
                                <td>   </td>
                                <td>
                                <button type="button" class="btn btn-default">
                                    Continue Shopping
                                </button></td>
                                <td>
                                <a type="button" class="btn btn-success" href='checkout.php'>Checkout</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
