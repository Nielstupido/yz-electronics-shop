<!--header code-->
<?php include 'signin-up-modal.php';?>

<div class="page-wrapper">
        <header class="header header-intro-clearance header-4">
            <div class="header-top" style="color:#000;">
                <div class="container">
                    <div class="header-left">
                        <a href="tel:+639091335801"><i class="icon-phone"></i>Call: 09091335801</a>
                    </div><!-- End .header-left -->

                    <div class="header-right" style="color:#000;">

                        <ul class="top-menu">
                            <li>
                                <a href="#">Account</a>
                                <ul>
                                    <li>
                                        <div class="pt-4">
                                            <div class="header-menu">
                                            </div><!-- End .header-menu -->
                                        </div>
                                    </li>
                                    <?php 
                                        if (!isset($_SESSION["uid"]))
                                        {
                                            echo '
                                                <li><a href="#signin-modal" data-toggle="modal">Login | Register</a></li>
                                            ';
                                        }
                                    ?>
                                </ul>
                            </li>
                        </ul><!-- End .top-menu -->
                    </div><!-- End .header-right -->

                </div><!-- End .container -->
            </div><!-- End .header-top -->

            <div class="header-middle">
                <div class="container">
                    <div class="header-left">
                        <button class="mobile-menu-toggler">
                            <span class="sr-only">Toggle mobile menu</span>
                            <i class="icon-bars"></i>
                        </button>
                        
                        <a href="index.php" class="logo">
                            <img src="assets/images/logo/navbar-logo.png" alt="YZ Logo" width="105" height="25">
                        </a>
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper search-wrapper-wide">
                                    <label for="q" class="sr-only">Search</label>
                                    <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." required>
                                </div><!-- End .header-search-wrapper -->
                            </form>
                        </div><!-- End .header-search -->
                    </div>

                    <div class="header-right">

                        <div class="account">
                            <?php echo (isset($_SESSION["uid"])) ? '<a href="dashboard.php" title="My account">': '<a href="#signin-modal" data-toggle="modal">';?>
                                <div class="icon">
                                    <i class="icon-user"></i>
                                </div>
                                <p>Account</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="wishlist">
                            <a href="wishlist.php" title="Wishlist">
                                <div class="icon">
                                    <i class="icon-heart-o"></i>
                                    <span class="wishlist-count badge">3</span>
                                </div>
                                <p>Wishlist</p>
                            </a>
                        </div><!-- End .compare-dropdown -->

                        <div class="dropdown cart-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                <div class="icon">
                                    <i class="icon-shopping-cart"></i>
                                    <span class="cart-count">2</span>
                                </div>
                                <p>Cart</p>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-cart-products"  id="cart_product">
                                    <!-- 
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="product.php">HP Intel Corei5 5300U 8GB RAM/120GB SSD</a>
                                            </h4>

                                            <span class="cart-product-info">
                                                <span class="cart-product-qty">1</span>
                                                x 13,600.00
                                            </span>
                                        </div>

                                        <figure class="product-image-container">
                                            <a href="product.php" class="product-image">
                                                <img src="assets/images/products/product3.jpg" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                                    </div>-->
                                </div>
                                <div class="dropdown-cart-total">
                                    <span>Total</span>

                                    <span class="cart-total-price">$160.00</span>
                                </div><!-- End .dropdown-cart-total -->

                                <div class="dropdown-cart-action">
                                    <a href="cart.php" class="btn btn-primary">View Cart</a>
                                    <a href="checkout.php" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                                </div><!-- End .dropdown-cart-total -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .cart-dropdown -->
                    </div><!-- End .header-right -->
                </div><!-- End .container -->
            </div><!-- End .header-middle -->

            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="header-left">
                        <div class="dropdown category-dropdown">
                            <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static" title="Browse Categories">
                                Browse Categories <i class="icon-angle-down"></i>
                            </a>

                            <div class="dropdown-menu">
                                <nav class="side-nav">
                                    <ul class="menu-vertical sf-arrows">
                                        <li class="item-lead"><a href="#">Promos</a></li>
                                        <li class="item-lead"><a href="#">Rental units/laptops</a></li>
                                        <li><a href="#">NEC</a></li>
                                        <li><a href="#">Toshiba</a></li>
                                        <li><a href="#">HP</a></li>
                                        <li><a href="#">Fujitso</a></li>
                                        <li><a href="#">Core i5</a></li>
                                        <li><a href="#">Celeron</a></li>
                                    </ul><!-- End .menu-vertical -->
                                </nav><!-- End .side-nav -->
                            </div><!-- End .dropdown-menu -->
                        </div><!-- End .category-dropdown -->
                    </div><!-- End .header-left -->

                    <div class="header-center">
                        <nav class="main-nav">
                            <ul class="menu sf-arrows">
                                <li class="megamenu-container"> <!--inalis ko active-->
                                    <a href="index.php">Home</a>
                                </li>
                                <li>
                                    <a href="about.php">About</a>
                                </li>
                                <li>
                                    <a href="category.php" class="sf-with-ul">Products</a>

                                    <div class="megamenu megamenu-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <div class="menu-col">
                                                    <div class="menu-title">Product Details</div><!-- End .menu-title -->
                                                    <ul>
                                                        <li><a href="product.php"><span>NEC VersaPro VH<span class="tip tip-new">New</span></span></a></li>
                                                        <li><a href="product.php">NEC Intel Core</a></li>
                                                        <li><a href="product.php">NEC Intel Celeron</a></li>
                                                        <li><a href="product.php">Toshiba R732</a></li>
                                                        <li><a href="product.php">HP</a></li>
                                                        <li><a href="product.php">Fujitso</a></li>
                                                    </ul>
                                                </div><!-- End .menu-col -->
                                            </div><!-- End .col-md-6 -->

                                            <div class="col-md-6">
                                                <div class="banner banner-overlay">
                                                    <a href="category.php">
                                                        <img src="assets/images/menu/nec-banner3.jpg" alt="Banner">

                                                        <div class="banner-content banner-content-bottom">
                                                            <div class="banner-title text-white">Albay Laptops 2022<br><span><strong>Buy Now!</strong></span></div><!-- End .banner-title -->
                                                        </div><!-- End .banner-content -->
                                                    </a>
                                                </div><!-- End .banner -->
                                            </div><!-- End .col-md-6 -->
                                        </div><!-- End .row -->
                                    </div><!-- End .megamenu megamenu-sm -->
                                </li>
                                <li>
                                    <a href="#" class="sf-with-ul">Other Services</a>

                                    <ul>
                                        <li>
                                            <a href="#">Rental Units/Laptops</a>
                                        </li>
                                        <li>
                                            <a href="#">Piso Wifi</a>
                                        </li>
                                        <li>
                                            <a href="#">Laptop Repair</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="review.php" class="sf-with-ul">Reviews</a>

                                    <ul>
                                        <li><a href="review.php">Albay</a></li>
                                        <li><a href="review.php">Camarines Sur</a></li>
                                        <li><a href="review.php">Camarines Norte</a></li>
                                        <li><a href="review.php">Catanduanes</a></li>
                                        <li><a href="review.php">Masbate</a></li>
                                        <li><a href="review.php">Sorsogon</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                            </ul><!-- End .menu -->
                        </nav><!-- End .main-nav -->
                    </div><!-- End .header-center -->

                    <div class="header-right">
                        <i class="la la-lightbulb-o"></i><p>Warranty<span class="highlight">&nbsp;Up to 3 Months</span></p>
                    </div>
                </div><!-- End .container -->
            </div><!-- End .header-bottom -->
        </header><!-- End .header -->
    </div>