<?php
//session
require "config/constants.php";
session_start();

require "includes/conn.php";
include 'signin-up-modal.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/e5c2e63fe0.js" crossorigin="anonymous"></script>
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
                        <!--<li class="breadcrumb-item"><a href="#">Pages</a></li>-->
                        <li class="breadcrumb-item active" aria-current="page">Contact</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-header text-center" style="background-image: url('assets/images/demos/demo-4/bg-7.jpg')">
        		<div class="container">
        			<h1 class="page-title text-white">Contact</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="mb-5"></div><!-- End .mb-4 -->

            <div class="page-content pb-0">
                <div class="container">
                	<div class="row">
                		<div class="col-lg-6 mb-2 mb-lg-0">
                			<h2 class="title mb-1">Contact Information</h2><!-- End .title mb-2 -->
                			<p class="mb-3">YZ Electronics has no physical store. Transactions are done online and delivery is done through meet-up.</p>
                			<div class="row">
                				<div class="col-sm-7">
                					<div class="contact-info">
                						<h3>Address</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-map-marker"></i>
	                							Zone 2, San Fernando, Santo. Domingo, Albay, Philippines, 4508
	                						</li>
                							<li>
                								<i class="icon-phone"></i>
                								<a href="tel:#">+63 909 133 5801</a>
                							</li>
                							<li>
                								<i class="icon-envelope"></i>
                								<a href="mailto:darylcallo@gmail.com">darylcallo@gmail.com</a>
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-7 -->

                				<div class="col-sm-5">
                					<div class="contact-info">
                						<h3>Opening Hours</h3>

                						<ul class="contact-list">
                							<li>
                								<i class="icon-clock-o"></i>
	                							<span class="text-dark">Monday-Thursday</span> <br>9:00am-5:00pm
	                						</li>
                							<li>
                								<i class="icon-calendar"></i>
                								<span class="text-dark">Friday-Sunday</span> <br>8:00am-7:00pm
                							</li>
                						</ul><!-- End .contact-list -->
                					</div><!-- End .contact-info -->
                				</div><!-- End .col-sm-5 -->
                			</div><!-- End .row -->
                		</div><!-- End .col-lg-6 -->
                		<div class="col-lg-6">
                			<h2 class="title mb-1">Follow us on Social Media</h2><!-- End .title mb-2 -->
                			<div class="row">
                                <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="assets/images/logo/yz-logo.png" width="250" height="250">
                                </div>
                            <div class="col-lg-6">
                                <div class="mx-2 px-1"><a aria-label="Facebook" href="https://www.facebook.com/YzElectronics" target="_blank"><i class="bi bi-facebook fa-9x"></i></a></div>
                            </div>
                        </div>
                	</div><!-- End .col-lg-6 -->
                	</div><!-- End .row -->

                	<hr class="mt-4 mb-5">

                	<div class="stores mb-4 mb-lg-5">
	                	<!--<h2 class="title text-center mb-3">Explore</h2>--><!-- End .title text-center mb-2 -->

	                	<div class="row">
	                       <div class="col-lg-6">
	                			<div class="store">
	                				<div class="row">
	                					<div class="col-md-6">
	                						<div class="store-media mb-2 mb-lg-0">
	                							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3883.389795083745!2d123.75890281477373!3d13.263564390664808!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a1ab02909ba8fd%3A0x2399668ddf9cb5d0!2s120%20Bicol%20630%2C%20Santo%20Domingo%2C%20Albay!5e0!3m2!1sen!2sph!4v1668187542720!5m2!1sen!2sph" width="550" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	                						</div><!-- End .store-media -->
	                					</div><!-- End .col-xl-6 -->

	                					</div><!-- End .col-xl-6 -->
	                				</div><!-- End .row -->
	                			</div><!-- End .store -->
                                <div class="col-lg-6">
                            <h2 class="title mb-1">Got Any Questions?</h2><!-- End .title mb-2 -->
                            <p class="mb-2">Use the form below to get in touch with the sales team.</p>
                            
                            <?php 
                                if(isset($_COOKIE['uid']) || isset($_COOKIE['_uiid_']) || isset($_SESSION['uid'])) { ?>
                                <form action="contact.php" method="POST">
                                    <?php 
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

                                        if(isset($_POST['send'])) {
                                            $message = trim($_POST['message']);
                                            $sql = "INSERT INTO messages SET ms_username = :username, ms_useremail = :email, ms_detail = :detail, ms_date = :date";
                                            $stmt = $pdo->prepare($sql);
                                            $stmt->execute([
                                                ':username' => $user_name,
                                                ':email' => $user_email,
                                                ':detail' => $message,
                                                ':date' => date("M n, Y") . ' at ' . date("h:i A")
                                            ]);
                                            echo "<p class='p-4 alert alert-success'>Message has been send successfully!</p><br>";
                                        }
                                    ?>
                            <div class="contact-form mb-3">
                                <div class="form-row">
                                    <div class="form group col-sm-6">
                                        <label for="inputName" class="text-dark">First Name</label>
                                        <input value="<?php echo $user_name; ?>" readonly="true" class="form-control" id="inputName" type="text" placeholder="Name" />
                                    </div><!-- End .col-sm-6 -->

                                    <div class="form group col-sm-6">
                                        <label for="inputEmail" class="text-dark">Email</label>
                                        <input value="<?php echo $user_email; ?>" readonly="true" class="form-control" id="inputEmail" type="email" placeholder="name@gmail.com" />
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="form group">
                                    <label for="inputMessage" class="sr-only">Message</label>
                                    <textarea class="form-control" name="message" cols="30" rows="4" id="inputMessage" placeholder="Enter your message..."></textarea>
                                </div>
                                <div class="text-center">
                                    <!--<input type="submit" value="SUBMIT" class="btn btn-outline-primary-2 btn-minwidth-sm">-->
                                    <button name="send" class="btn btn-primary btn-marketing mt-2" type="submit">Submit</button>
                                </div>
                            </form><!-- End .contact-form -->
                            <!--<table class="table table-bordered table-hover mt-5" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Your messages:</th>
                                                <th>Answers:</th>
                                            </tr>
                                        </thead>
                                        <tbody>-->
                                            <?php 
                                                /*$sql1 = "SELECT * FROM messages WHERE ms_useremail = :email";
                                                $stmt1 = $pdo->prepare($sql1);
                                                $stmt1->execute([
                                                    ':email' => $user_email
                                                ]);
                                                while($ms = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                                                    $ms_detail = $ms['ms_detail'];
                                                    $reply = $ms['reply']; ?>
                                                    <tr>
                                                      <td><?php echo $ms_detail; ?></td>
                                                      <td><?php echo $reply; ?></td>
                                                  </tr>
                                                <?php }*/                                                  
                                            ?>
                                        <!--</tbody>
                                    </table>-->


                               <?php } else { ?>
                                    <a href="signin-up-modal.php">Log in to contact us!</a>
                               <?php }
                            ?>

                        </div><!-- End .col-lg-6 -->
	                		</div><!-- End .col-lg-6 -->
	                	</div><!-- End .row -->

                	<!--</div>--><!-- End .stores -->
                </div><!-- End .container -->
            	<!--<div id="map"></div>--><!-- End #map -->

            </div><!-- End .page-content -->
        </main><!-- End .main -->

        <!--Footer-->
    <div class="footer">
        <?php include 'includes/footer.php';?>
    </div>

    <!-------- Mobile Menu ------->
    <div class="mobile-menu">
        <?php include 'includes/mobile-nav.php';?>
    </div>
    <!----------------------------------------------------------->

    <!-- Google Map -->
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDc3LRykbLB-y8MuomRUIY0qH5S6xgBLX4"></script>

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


<!-- molla/contact.html  22 Nov 2019 10:04:03 GMT -->
</html>