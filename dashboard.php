<?php
	require_once "includes/conn.php";

	include "db.php";

    session_start();
	if(!isset($_SESSION["uid"])){
		header("location:index.php");
	}

	$sql = "SELECT * FROM user_info WHERE user_id = '$_SESSION[uid]'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	$userName = $row['first_name'];
	$userLname = $row['last_name'];
	$userMail = $row['email'];
	$userNo = $row['mobile'];
	$userAdd1 = $row['house_num_street'];
	$userAdd2 = $row['brgy'];
	$userCity = $row['city_mun'];
	$userProv = $row['province'];
	$userZip = $row['zip_code'];
	$concatAdd1 = $row['house_num_street']. ' ' .$row['brgy'] . ' ' .$row['city_mun'];
	$concatAdd2 = $row['province']. ' ' .$row['zip_code'];
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


									<?php 
										if(isset($_COOKIE['uid'])) {
											$userId = base64_decode($_COOKIE['uid']);
										} else if(isset($_SESSION['uid'])) {
											$userId = $_SESSION['uid'];
										} else {
											$userId = -1;
										}
										$sql = "SELECT * FROM user_info WHERE user_id = :user_id";
										$stmt = $pdo->prepare($sql);
										$stmt->execute([
											':user_id' => $userId
										]);
										$user = $stmt->fetch(PDO::FETCH_ASSOC);
										$user_fname = $user['first_name'];
										$user_lname = $user['last_name'];
										$user_email = $user['email'];
										$user_password = md5($user['password']);
										$user_no = $user['mobile'];
										$user_address1 = $user['house_num_street'];
										$user_address2 = $user['brgy'];
										$user_city_mun = $user['city_mun'];
										$user_prov = $user['province'];
										$user_zip_code = $user['zip_code'];
										?>

										<?php 
										if(isset($_POST['submit'])) {
											$user_fname = $_POST['user-fname'];
											$user_lname = $_POST['user-lname'];
											$user_email = $_POST['user-email'];
											$user_password = md5($_POST['user-pass']);
											$user_no = $_POST['user-number'];
											$user_address1 = $_POST['house-num-street'];
											$user_address2 = $_POST['user-brgy'];
											$user_city_mun = $_POST['city-mun'];
											$user_prov = $_POST['user-prov'];
											$user_zip_code = $_POST['user-zip-code'];

											$sql = "UPDATE user_info SET first_name='$user_fname', last_name='$user_lname', email='$user_email', password='$user_password', mobile='$user_no', house_num_street='$user_address1', brgy='$user_address2', city_mun='$user_city_mun', province='$user_prov', zip_code='$user_zip_code'
												WHERE user_id = '$_SESSION[uid]'";

											if(mysqli_query($con,$sql))
											{
												//$userName = $user_fname;
												echo "<meta http-equiv='refresh' content='0'>";
												// header("Location: dashboard.php");
											}

											// $sql = "UPDATE user_info SET first_name = :user_fname, last_name = :user_lname, email = :user_email, address1 = :user_address1,
											// address2 = :address1 WHERE user_id =:user_id";
											// $stmt = $pdo->prepare($sql);
											// $stmt->execute([
											//     ':first_name' => $user_fname,
											//     ':last_name' => $user_lname,
											//     ':email' => $user_email,
											//     ':address1' => $user_address1,
											//     ':address1' => $address1,
											//     ':user_id' => $userId
											// ]);
										}
									?>

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
								    	<p>The following addresses will be used on the checkout page by default.</p>

								    	<div class="row">
								    		<div class="col-lg-8">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Shipping Address</h3><!-- End .card-title -->
								    						<?php echo $concatAdd1; ?>,  <?php echo $concatAdd2; ?><br></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->

											<div class="col-lg-12">
												<div class="card card-dashboard">
													<div class="card-body">
														<h3 class="card-title">Edit Your Address Here</h3>

														<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">			
														<div class="row">
															<div class="col-sm-6">
																<label>House No. / Street*</label>
																<input type="text" name="house-num-street" id="house-num-street" value="<?php echo $user_address1; ?>" class="form-control">
															</div>
												
															<div class="col-sm-6">
																<label>Barangay *</label>
																<input type="text" name="user-brgy" id="user-brgy" value="<?php echo $user_address2; ?>" class="form-control">
															</div>

															<div class="col-sm-5">
																<label>City / Municipality *</label>
																<input type="text" name="city-mun" id="city-mun" value="<?php echo $user_city_mun; ?>" class="form-control">
															</div>

															<div class="col-sm-4">
																<label>Province *</label>
																<input type="text" name="user-prov" id="user-prov" value="<?php echo $user_prov; ?>" class="form-control">
															</div>

															<div class="col-sm-3">
																<label>Zip Code *</label>
																<input type="text" name="user-zip-code" id="user-zip-code" value="<?php echo $user_zip_code; ?>" class="form-control">
															</div>		        		

														</div>
													</div>
												</div>

												<button type="submit" name="submit" class="btn btn-outline-primary-2">
													<span>SAVE CHANGES</span>
													<i class="icon-long-arrow-right"></i>
												</button>

								    		</div><!-- End .row -->
								    	</div><!-- .End .tab-pane -->
									</div>

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
								    	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>First Name *</label>
			                						<input type="text" name="user-fname" id="user-fname" value="<?php echo $user_fname; ?>"class="form-control">
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" name="user-lname" id="user-lname" value="<?php echo $user_lname; ?>" class="form-control">
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		                					<label>Email address *</label>
		        							<input type="email" name="user-email" id="user-email" value="<?php echo $user_email; ?>" class="form-control">

		        							<label>Change Password *</label>
		        							<input type="password" name="user-pass" id="user-pass" value="<?php echo '*'; ?>" class="form-control">

		        							<label>Contact Number*</label>
		        							<input type="text" name="user-number" id="user-number" value="<?php echo $user_no; ?>" class="form-control">

		                					<button type="submit" name="submit" class="btn btn-outline-primary-2">
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