<?php
    require "config/constants.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>YZ Electronics - Albay Laptops</title>
    <meta name="keywords" content="YZ Electronics">
    <meta name="description" content="YZ Electronics">
    <meta name="author" content="marifebanares-gairuslegaspi">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="180x180" href="assets/images/logo/yz-logo.ico">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/skins/skin-demo-4.css">
    <link rel="stylesheet" href="assets/css/demos/demo-4.css">
    <!--Bootstrap 5-->
    <!--<link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">-->
</head>

<body>
    <!--menu-->
    <div class="menu1">
        <?php include 'includes/header.php';?>
    </div>
    <!-- End of menu-->

    <main class="main">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-header text-center" style="background-image: url('assets/images/demos/demo-4/bg-7.jpg')">
        		<div class="container">
        			<h1 class="page-title text-white">Checkout</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="mb-5"></div><!-- End .mb-4 -->

            <div class="page-content">
            	<div class="checkout">
	                <div class="container">
		                	<div class="row">
		                		<div class="col-lg-4">
									<div class="response">
									</div>
		                			<h2 class="checkout-title">Shipping Details</h2><!-- End .checkout-title -->
									<div id="shipping_add">
									</div>
									<a href="cart.php" class="btn btn-primary">Change Address</a>
		                		</div><!-- End .col-lg-9 -->
		                		<aside class="col-lg-8">
		                			<div class="summary"><!--summry here-->
		                				<h3 class="summary-title">Your Order</h3><!-- End .summary-title -->
										<table class="table table-summary" style="width:100%">
											<thead>
												<tr>
													<th>Product</th>
													<th>Total</th>
												</tr>
											</thead>

											<tbody id="checkout_products">


											</tbody>
										</table><!-- End .table table-summary -->
		                				<div class="accordion-summary" id="accordion-payment">
											<div class="card">
											<h4 class="summary-title">Choose Your Payment Method</h4>
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
														<input type="radio" name="myradiogroup" id="cod"><label for="myrad1">&nbsp;&nbsp;Cash on Delivery</label>
										            </h2>
										        </div><!-- End .card-header -->
										    </div><!-- End .card -->
											<div class="card">
										        <div class="card-header" id="heading-4">
										            <h2 class="card-title">
														<input type="radio" name="myradiogroup" id="gcash"><label for="myrad2">&nbsp;&nbsp;GCash</label>
										            </h2>
										        </div><!-- End .card-header -->
										    </div><!-- End .card -->
											<div class="card error" style="color: #c12020; font-weight: bold;">
											</div>
										    <!--<div class="card">
										        <div class="card-header" id="heading-5">
										            <h2 class="card-title">
										                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
										                    Credit Card (Stripe)
										                    <img src="assets/images/payments-summary.png" alt="payments cards">
										                </a>
										            </h2>
										        </div>
										        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
										            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
										            </div>
										        </div>
										    </div>-->
										</div><!-- End .accordion -->
											<button name="confirmOrder" id="confirmOrder" class="btn btn-outline-primary-2 btn-order btn-block confirmOrder">
												<span class="btn-text">Place Order</span>
												<span class="btn-hover-text">Proceed to Checkout</span>
											</button>
		                			</div><!-- End .summary -->
		                		</aside><!-- End .col-lg-3 -->
		                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .checkout -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

    <!--Footer-->
    <div class="footer">
        <?php include 'includes/footer.php';?>
    </div>
    <!------------------------------------------------------------------->
    
    <!-------- Mobile Menu ------->
    <div class="mobile-menu">
        <?php include 'includes/mobile-nav.php';?>
    </div>
    <!----------------------------------------------------------->

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/checkout.html  22 Nov 2019 09:55:06 GMT -->
</html>