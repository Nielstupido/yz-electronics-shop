<?php

//connection to database
require_once "includes/conn.php";

//session
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
            <div class="intro-slider-container mb-5">
                <div class="intro-slider owl-carousel owl-theme owl-nav-inside owl-light" data-toggle="owl" 
                    data-owl-options='{
                        "dots": true,
                        "nav": false, 
                        "responsive": {
                            "1200": {
                                "nav": true,
                                "dots": false
                            }
                        }
                    }'>
                    <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide.png);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-third">Deals and Promotions</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">NEC VersaPro VH</h1>
                                    <h1 class="intro-title">Core i5-7Y54</h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup class="intro-old-price">&#8369;13,500</sup>
                                        <span class="text-third">
                                            &#8369;10,500<sup>.00</sup>
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="category.php" class="btn btn-primary btn-round">
                                        <span>Shop More</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-lg-11 offset-lg-1 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->

                    <div class="intro-slide" style="background-image: url(assets/images/demos/demo-4/slider/slide1.png);">
                        <div class="container intro-content">
                            <div class="row justify-content-end">
                                <div class="col-auto col-sm-7 col-md-6 col-lg-5">
                                    <h3 class="intro-subtitle text-primary">New Arrival</h3><!-- End .h3 intro-subtitle -->
                                    <h1 class="intro-title">Toshiba R732 <br>Intel Core i5</h1><!-- End .intro-title -->

                                    <div class="intro-price">
                                        <sup>Today:</sup>
                                        <span class="text-primary">
                                            &#8369;9,500<sup>.00</sup>
                                        </span>
                                    </div><!-- End .intro-price -->

                                    <a href="category.php" class="btn btn-primary btn-round">
                                        <span>Shop More</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </a>
                                </div><!-- End .col-md-6 offset-md-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .intro-content -->
                    </div><!-- End .intro-slide -->
                </div><!-- End .intro-slider owl-carousel owl-simple -->

                <span class="slider-loader"></span><!-- End .slider-loader -->
            </div><!-- End .intro-slider-container -->

            <div class="container">
                <h2 class="title text-center mb-4">Explore Popular Categories</h2><!-- End .title text-center -->
            <div class="mb-4"></div><!-- End .mb-4 -->

            <div class="container new-arrivals">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Featured</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <ul class="nav nav-pills nav-border-anim justify-content-center" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="new-all-link" data-toggle="tab" href="#new-all-tab" role="tab" aria-controls="new-all-tab" aria-selected="true">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-tv-link" data-toggle="tab" href="#new-tv-tab" role="tab" aria-controls="new-tv-tab" aria-selected="false">NEC</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-computers-link" data-toggle="tab" href="#new-computers-tab" role="tab" aria-controls="new-computers-tab" aria-selected="false">Toshiba</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-phones-link" data-toggle="tab" href="#new-phones-tab" role="tab" aria-controls="new-phones-tab" aria-selected="false">HP</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-phones-link" data-toggle="tab" href="#new-laptops-tab" role="tab" aria-controls="new-laptops-tab" aria-selected="false">Fujitso</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-watches-link" data-toggle="tab" href="#new-watches-tab" role="tab" aria-controls="new-watches-tab" aria-selected="false">Core</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="new-acc-link" data-toggle="tab" href="#new-acc-tab" role="tab" aria-controls="new-acc-tab" aria-selected="false">Celeron</a>
                            </li>
                        </ul>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="tab-content tab-content-carousel just-action-icons-sm">
                    <div class="tab-pane p-0 fade show active" id="new-all-tab" role="tabpanel" aria-labelledby="new-all-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
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
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_category = $posts['product_cat'];?>
                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="new-tv-tab" role="tabpanel" aria-labelledby="new-tv-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            
                            <?php 
                                $sql = "SELECT * FROM products WHERE product_brand = :brand";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':brand' => '1'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_brand = $posts['product_brand'];?>

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="new-computers-tab" role="tabpanel" aria-labelledby="new-computers-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            
                            <?php 
                                $sql = "SELECT * FROM products WHERE product_brand = :brand";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':brand' => '2'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_brand = $posts['product_brand'];?>

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="new-phones-tab" role="tabpanel" aria-labelledby="new-phones-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            
                            <?php 
                                $sql = "SELECT * FROM products WHERE product_brand = :brand";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':brand' => '3'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_brand = $posts['product_brand'];?>

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="new-laptops-tab" role="tabpanel" aria-labelledby="new-laptops-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            
                            <?php 
                                $sql = "SELECT * FROM products WHERE product_brand = :brand";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':brand' => '4'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_brand = $posts['product_brand'];?>

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

                    <div class="tab-pane p-0 fade" id="new-watches-tab" role="tabpanel" aria-labelledby="new-watches-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            
                            <?php 
                                $sql = "SELECT * FROM products WHERE product_cat = :category";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':category' => '2'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_brand = $posts['product_brand'];?>

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->
                    
                    <div class="tab-pane p-0 fade" id="new-acc-tab" role="tabpanel" aria-labelledby="new-acc-link">
                        <div class="owl-carousel owl-full carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                            data-owl-options='{
                                "nav": true, 
                                "dots": true,
                                "margin": 20,
                                "loop": false,
                                "responsive": {
                                    "0": {
                                        "items":2
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
                                        "items":5
                                    }
                                }
                            }'>
                            <?php 
                                $sql = "SELECT * FROM products WHERE product_cat = :category";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':category' => '3'
                                ]);
                                while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                                    $product_title = $posts['product_title'];
                                    $product_price = $posts['product_price'];
                                    $product_images = 'assets/images/products/'.$posts['product_image'];
                                    $product_brand = $posts['product_brand'];?>

                                    <div class="product product-2">
                                        <figure class="product-media">
                                            <!--<span class="product-label label-circle label-top">Top</span>-->
                                            <a href="product.php">
                                                <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                            </a>

                                            <div class="product-action-vertical">
                                                <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                            </div><!-- End .product-action -->

                                            <div class="product-action">
                                                <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                                <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                            </div><!-- End .product-action -->
                                        </figure><!-- End .product-media -->

                                        <div class="product-body">
                                            <div class="product-cat">
                                                <a href="#"><?php echo $product_category; ?></a>
                                            </div><!-- End .product-cat -->
                                            <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                            <div class="product-price">
                                            &#8369;<?php echo $product_price; ?>
                                            </div><!-- End .product-price -->
                                            <div class="ratings-container">
                                                <div class="ratings">
                                                    <div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
                                                </div><!-- End .ratings -->
                                                <span class="ratings-text">( 4 Reviews )</span>
                                            </div><!-- End .rating-container -->
                                        </div><!-- End .product-body -->
                                    </div><!-- End .product -->
                                <?php } 
                                ?>

                        </div><!-- End .owl-carousel -->
                    </div><!-- .End .tab-pane -->

            <div class="mb-6"></div><!-- End .mb-6 -->
            
            <div class="container">
                <div class="cta cta-border mb-5" style="background-image: url(assets/images/demos/demo-4/bg-4.jpg);">
                    <img src="assets/images/demos/demo-4/laptop.png" alt="camera" class="cta-img">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="cta-content">
                                <div class="cta-text text-right text-white">
                                    <p>Need a laptop? <br><strong>YZ Electronics is here to serve you.</strong></p>
                                </div><!-- End .cta-text -->
                                <a href="category.php" class="btn btn-primary btn-round"><span>Get yours now for only &#8369; 8,500</span><i class="icon-long-arrow-right"></i></a>
                            </div><!-- End .cta-content -->
                        </div><!-- End .col-md-12 -->
                    </div><!-- End .row -->
                </div><!-- End .cta -->
            </div><!-- End .container -->

            <div class="mb-5"></div><!-- End .mb-5 -->

            <!------------Recommendations---------------------->
            <div class="container for-you">
                <div class="heading heading-flex mb-3">
                    <div class="heading-left">
                        <h2 class="title">Recommendation For You</h2><!-- End .title -->
                    </div><!-- End .heading-left -->

                   <div class="heading-right">
                        <a href="#" class="title-link">View All Recommendations <i class="icon-long-arrow-right"></i></a>
                   </div><!-- End .heading-right -->
                </div><!-- End .heading -->

                <div class="products">
                <div class="row justify-content-center">

                <?php 
                   $sql = "SELECT * FROM products WHERE product_tag2 = :tag";
                   $stmt = $pdo->prepare($sql);
                   $stmt->execute([
                       ':tag' => 'Recommended'
                   ]);
                   while($posts = $stmt->fetch(PDO::FETCH_ASSOC)){
                       $product_title = $posts['product_title'];
                       $product_price = $posts['product_price'];
                       $product_images = 'assets/images/products/'.$posts['product_image'];
                       $product_brand = $posts['product_brand'];?>

                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="product product-2">
                                <figure class="product-media">
                                    <!--<span class="product-label label-circle label-sale">Sale</span>-->
                                    <a href="product.php">
                                        <?php echo "<img src='$product_images' alt='Product image' class='product-image'>" ?>
                                    </a>

                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-wishlist" title="Add to wishlist"></a>
                                    </div><!-- End .product-action -->

                                    <div class="product-action">
                                        <a href="#" class="btn-product btn-cart" title="Add to cart"><span>add to cart</span></a>
                                        <a href="popup/quickView.html" class="btn-product btn-quickview" title="Quick view"><span>quick view</span></a>
                                    </div><!-- End .product-action -->
                                </figure><!-- End .product-media -->

                                <div class="product-body">
                                    <div class="product-cat">
                                        <a href="#"><?php echo $product_brand; ?></a>
                                    </div><!-- End .product-cat -->
                                    <h3 class="product-title"><a href="product.php"><?php echo $product_title; ?></a></h3><!-- End .product-title -->
                                    <div class="product-price">
                                    &#8369;<?php echo $product_price; ?>
                                        <!--<span class="new-price">$279.99</span>
                                        <span class="old-price">Was $349.99</span>-->
                                    </div><!-- End .product-price -->
                                    <div class="ratings-container">
                                        <div class="ratings">
                                            <div class="ratings-val" style="width: 60%;"></div><!-- End .ratings-val -->
                                        </div><!-- End .ratings -->
                                        <span class="ratings-text">( 5 Reviews )</span>
                                    </div><!-- End .rating-container -->
                                </div><!-- End .product-body -->
                            </div><!-- End .product -->
                        </div><!-- End .col-sm-6 col-md-4 col-lg-3 -->
                         <?php }?>
                    </div><!-- End .row -->
                </div><!-- End .products -->
            </div><!-- End .container -->

            <div class="mb-4"></div><!-- End .mb-4 -->

            <div class="container">
                <hr class="mb-0">
            </div><!-- End .container -->
            <!--------------------------------------------------------->
            

        </main><!-- End .main -->
        <!--------------------------------------------->

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
</html>