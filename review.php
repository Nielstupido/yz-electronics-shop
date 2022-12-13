<?php

    //connection to database
    require_once "includes/conn.php";
    
    require "config/constants.php";
    session_start();
?>

<!DOCTYPE html>
<html lang="en">


<!-- molla/blog-grid-4cols.html  22 Nov 2019 10:04:20 GMT -->
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
                        <!--<li class="breadcrumb-item"><a href="#">About</a></li>-->
                        <li class="breadcrumb-item active" aria-current="page">Reviews</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->
            <div class="page-header text-center" style="background-image: url('assets/images/demos/demo-4/bg-7.jpg')">
        		<div class="container">
        			<h1 class="page-title text-white">Reviews</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->

            <div class="mb-5"></div><!-- End .mb-4 -->

            <div class="page-content">
                <div class="container">
                    <nav class="blog-nav">
                        <ul class="menu-cat entry-filter justify-content-center">
                            <li class="active"><a href="#" data-filter="*">All<span>5</span></a></li>
                            <li><a href="#" data-filter=".lifestyle">Albay<span>3</span></a></li>
                            <li><a href="#" data-filter=".shopping">Camarines Sur<span>1</span></a></li>
                            <li><a href="#" data-filter=".fashion">Camarines Norte<span>2</span></a></li>
                            <li><a href="#" data-filter=".travel">Sorsogon<span>3</span></a></li>
                            <li><a href="#" data-filter=".hobbies">Catanduanes<span>2</span></a></li>
                            <li><a href="#" data-filter=".hobbies">Masbate<span>2</span></a></li>
                        </ul><!-- End .blog-menu -->
                    </nav><!-- End .blog-nav -->

                    <div class="entry-container max-col-4" data-layout="fitRows">
                        
                    <?php 
                    $sql = "SELECT * FROM reviews";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                        while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $date = $posts['date'];
                            $review_image = 'assets/images/review/'.$posts['review_image'];
                            $username = $posts['username'];
                            $review_detail = $posts['review_detail'];
                            $facebook_link = $posts['facebook_link']; ?>
                            
                            <div class="entry-item lifestyle shopping col-sm-6 col-md-4 col-lg-3">
                            <article class="entry entry-grid text-center">
                                <figure class="entry-media">
                                    <a href="<?php echo $facebook_link; ?>" target="_blank">
                                        <?php echo "<img src='$review_image' alt='image desc'>" ?>
                                    </a>
                                </figure><!-- End .entry-media -->

                                <div class="entry-body">
                                    <div class="entry-meta">
                                        <?php echo $date; ?>
                                        <span class="meta-separator">|</span>
                                        <a href="#">2 Comments</a>
                                    </div><!-- End .entry-meta -->

                                    <h2 class="entry-title">
                                        <?php echo $username; ?>
                                    </h2><!-- End .entry-title -->

                                    <div class="entry-cats">
                                    in <a href="#">Nec Intel Celeron 3855U</a>
                                    </div><!-- End .entry-cats -->

                                    <div class="entry-content">
                                        <p><?php echo $review_detail; ?></p>
                                        <a href="<?php echo $facebook_link; ?>" target="_blank" class="read-more">Continue Reading</a>
                                    </div><!-- End .entry-content -->
                                </div><!-- End .entry-body -->
                            </article><!-- End .entry -->
                        </div><!-- End .entry-item -->
                        <?php } ?>
                        </div><!-- End .entry-container -->

                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                    <span aria-hidden="true"><i class="icon-long-arrow-left"></i></span>Prev
                                </a>
                            </li>
                            <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item">
                                <a class="page-link page-link-next" href="#" aria-label="Next">
                                    Next <span aria-hidden="true"><i class="icon-long-arrow-right"></i></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div><!-- End .container -->
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

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
</body>


<!-- molla/blog-grid-4cols.html  22 Nov 2019 10:04:23 GMT -->
</html>