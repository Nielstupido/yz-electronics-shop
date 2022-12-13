<?php
    require_once "includes/conn.php";
    include "db.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--Bootstrap 5-->
    <!--<link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css">-->
    <style>
    .checked {
    color: orange;
    }
    </style>
</head>

<body>
<!--menu-->
    <div class="menu1">
        <?php include 'includes/header.php';?>
    </div>
    <!-- End of menu-->

        <main class="main">
            <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
                <div class="container d-flex align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <!--<li class="breadcrumb-item"><a href="product.php">Products</a></li>-->
                        <li class="breadcrumb-item active" aria-current="page">Products</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
                <div class="container">
                    <div id="product-dets">

                    </div>




                    <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->

                    <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                        data-owl-options='{
                            "nav": false, 
                            "dots": true,
                            "margin": 20,
                            "loop": false,
                            "responsive": {
                                "0": {
                                    "items":1
                                },
                                "480": {
                                    "items":2
                                },
                                "768": {
                                    "items":3
                                },
                                "992": {
                                    "items":4
                                },
                                "1200": {
                                    "items":4,
                                    "nav": true,
                                    "dots": false
                                }
                            }
                        }'>

                    <?php 
                        $sql = "SELECT * FROM products WHERE product_tag = :tag";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([
                            ':tag' => 'Featured-ALL'
                        ]);
                        while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $product_id = $posts['product_id'];
                            $product_title = $posts['product_title'];
                            $product_price = $posts['product_price'];
                            $product_images = $posts['product_image'];
                            $product_category = $posts['product_cat'];

                            $sql = "SELECT * FROM reviews WHERE review_prod_id = '$product_id'";
                            $query = mysqli_query($con,$sql);
                            $num_reviews = 0;
                            $stars = 0;
                            while($row=mysqli_fetch_array($query)){
                                    $num_reviews++;
                                    $stars += $row['stars_number'];
                            }

                            $cat_query = "SELECT * FROM categories WHERE 1";
                            $run_cat_query = mysqli_query($con,$cat_query);
                            while($row_cat = mysqli_fetch_array($run_cat_query)){
                                if($row_cat['cat_id'] == $product_category)
                                {
                                    $cat_name = $row_cat['cat_title'];
                                    break;
                                }
                            }
                
                            $avg = $stars;
                            if($num_reviews>1)
                            {
                                $avg = intval($stars/5);
                            }

                            echo "
                                    <div class='product product-7 text-center'>
                                        <figure class='product-media'>
                                            <a href='#' pid='$product_id' id='show_product' title='Show product'>
                                                <img src='assets/images/products/$product_images' alt='Product image' class='product-image'>
                                            </a>

                                            <div class='product-action'>
                                                <a href='#' pid='$product_id' id='product' title='Add to cart' class='btn-product btn-cart'><span>add to cart</span></a>
                                            </div>
                                        </figure>

                                        <div class='product-body'>
                                            <h3 class='product-title'><a href='#' pid='$product_id' id='show_product' title='Show product'>$product_title</a></h3>
                                            <div class='product-price'>
                                            &#8369;$product_price
                                            </div>
                                            <div class='ratings-container'>";

                            for($i=0;$i<$avg;$i++)
                            {
                                echo '<span class="fa fa-star checked"></span>';
                            }
                    
                            $unchecked = 5-$avg;
                    
                            for($i=0;$i<$unchecked;$i++)
                            {
                                echo '<span class="fa fa-star"></span>';
                            }
                                            echo "
                                                <span class='ratings-text'>( $num_reviews Reviews )</span>
                                            </div>

                                        </div>
                                    </div>
                            ";
                        }
                    ?>

                    </div><!-- End .owl-carousel -->
                </div><!-- End .container -->
            </div><!-- End .page-content -->
        </main><!-- End .main -->

    <div class="footer">
        <?php include 'includes/footer.php';?>
    </div>

    <!-------- Mobile Menu ------->
    <div class="footer">
        <?php include 'mobile-nav.php';?>
    </div>

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/automatic-slider.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.plugin.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/jquery.countdown.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/demos/demo-4.js"></script>
</body>


<!-- molla/product.html  22 Nov 2019 09:55:05 GMT -->
</html>