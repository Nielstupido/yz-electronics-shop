<?php
	require_once "includes/conn.php";

    require "config/constants.php";
    session_start();
	if(!isset($_SESSION["uid"])){
		header("location:index.php");
	}
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
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-header text-center" style="background-image: url('assets/images/demos/demo-4/bg-7.jpg')">
        		<div class="container">
        			<h1 class="page-title text-white">My Account</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="mb-5"></div><!-- End .mb-4 -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
									<?php
										if(isset($_SESSION["ordered"]))
										{
											if($_SESSION["ordered"])
											{
												echo '								    
												<li class="nav-item">
													<a class="nav-link" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="false">Dashboard</a>
												</li>
												<li class="nav-item">
													<a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="true">Orders</a>
												</li>
												';
											}
											else
											{
												echo '								    
												<li class="nav-item">
													<a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
												</li>
												';
											}
										}
										else
										{
											echo '								    
												<li class="nav-item">
													<a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
												</li>
												';
										}
									?>

								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
									</li>
									<li class="nav-item">
								        <a class="nav-link" id="tab-message-link" data-toggle="tab" href="#tab-message" role="tab" aria-controls="tab-message" aria-selected="false">Messages</a>
									</li>
								    <li class="nav-item">
								        <a class="nav-link" href="logout.php">Sign Out</a>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
									<?php
										if(isset($_SESSION["ordered"]))
										{
											if($_SESSION["ordered"])
											{
												echo '<div class="tab-pane fade" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">';
											}
											else
											{
												echo '<div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">';
											}
										}
										else
										{
											echo '<div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">';
										}
									?>
								    
								    	<p>Hi, <strong><?php echo $_SESSION["name"]; ?></strong>
								    	<br>
								    	From your account dashboard you can view your <a href="#tab-orders" class="tab-trigger-link link-underline">recent orders</a>, manage your <a href="#tab-address" class="tab-trigger-link">shipping and billing addresses</a>, and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->
									<?php
										if(isset($_SESSION["ordered"]))
										{
											if($_SESSION["ordered"])
											{
												echo '<div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">';
											}
											else
											{
												echo '<div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">';
											}
											unset($_SESSION['ordered']);
										}
										else
										{
											echo '<div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">';
										}
									?>   
										<div class="col-md-8" id="review_msg">
											<!--Alert from signup form-->
										</div>
										<div class="table-responsive">
											<table class="table table-sm">
											<thead>
												<tr>
												<th>Order Qty</th>
												<th>Order Image</th>
												<th>Order Title</th>
												<th>Payment</th>
												<th>Order Status</th>
												</tr>
											</thead>
											<?php include 'review-modal.php';?>
											<tbody id="customer_order_list">
											
											</tbody>
											</table>
										</div>

								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Billing Address</h3><!-- End .card-title -->

														<p>User Name<br>
														User Company<br>
														John str<br>
														New York, NY 10001<br>
														1-234-987-6543<br>
														yourmail@mail.com<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->

								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->

														<p>You have not set up this type of address yet.<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

									<div class="tab-pane fade" id="tab-message" role="tabpanel" aria-labelledby="tab-message-link">
								    	<p>Hi, <strong><?php echo $_SESSION["name"]; ?></strong>
								    	<br>
								    	You can view your sent messages and replies here.
                                        <?php

											if(isset($_COOKIE['uid']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['uid'])) { 
												if(isset($_COOKIE['uid'])) {
													$user_id = base64_decode($_COOKIE['uid']);
												} else if(isset($_SESSION['uid'])) {
													$user_id = $_SESSION['uid'];
												} else {
													$user_id = -1;
												}
												$sql = "SELECT * FROM user_info WHERE user_id = :id";
												$stmt = $pdo->prepare($sql);
												$stmt->execute([
													':id' => $user_id
												]);
												$user = $stmt->fetch(PDO::FETCH_ASSOC);
												$user_name = $user['first_name'];
												$user_email = $user['email'];
											}
                                        ?>
										<table class="table table-bordered table-hover mt-5" id="dataTable" width="100%" cellspacing="0">
											<thead>
												<tr >
													<th class="p-4">Your messages:</th>
													<th class="p-4">Answers:</th>
												</tr>
											</thead>
											<tbody>
												<?php 
													$sql1 = "SELECT * FROM messages WHERE ms_useremail = :email";
													$stmt1 = $pdo->prepare($sql1);
													$stmt1->execute([
														':email' => $user_email
													]);
													while($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
														$ms_detail = $ms['ms_detail'];
														$reply = $ms['reply']; ?>
														<tr>
														<td class="p-4"><?php echo $ms_detail; ?></td>
														<td class="p-4"><?php echo $reply; ?></td>
														</tr>
													<?php }                                                  
												?>
											</tbody>
                                    	</table>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#">
			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>First Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		            						<label>Display Name *</label>
		            						<input type="text" class="form-control" required>
		            						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" required>

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2">

		                					<button type="submit" class="btn btn-outline-primary-2">
			                					<span>SAVE CHANGES</span>
			            						<i class="icon-long-arrow-right"></i>
			                				</button>
			                			</form>
								    </div><!-- .End .tab-pane -->
									
								</div>
	                		</div><!-- End .col-lg-9 -->
	                	</div><!-- End .row -->
	                </div><!-- End .container -->
                </div><!-- End .dashboard -->
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


<!-- molla/dashboard.html  22 Nov 2019 10:03:13 GMT -->
</html>