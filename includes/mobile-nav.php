    <!-------------------------- Mobile Menu ----------------------------->
    <div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

    <div class="mobile-menu-container mobile-menu-light">
        <div class="mobile-menu-wrapper">
            <span class="mobile-menu-close"><i class="icon-close"></i></span>
            
            <form action="#" method="get" class="mobile-search">
                <label for="mobile-search" class="sr-only">Search</label>
                <input type="search" class="form-control" name="mobile-search" id="mobile-search" placeholder="Search in..." required>
                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
            </form>

            <ul class="nav nav-pills-mobile nav-border-anim" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="mobile-menu-link" data-toggle="tab" href="#mobile-menu-tab" role="tab" aria-controls="mobile-menu-tab" aria-selected="true">Menu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="mobile-cats-link" data-toggle="tab" href="#mobile-cats-tab" role="tab" aria-controls="mobile-cats-tab" aria-selected="false">Categories</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="mobile-menu-tab" role="tabpanel" aria-labelledby="mobile-menu-link">
                    <nav class="mobile-nav">
                        <ul class="mobile-menu">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="about.php">About</a>
                            </li>
                            <li>
                                <a href="category.php" class="sf-with-ul">Products</a>
                                <!--<ul>
                                    <li><a href="product.php"><span>NEC VersaPro VH<span class="tip tip-new">New</span></span></a></li>
                                    <li><a href="product.php">NEC Intel Core</a></li>
                                    <li><a href="product.php">NEC Intel Celeron</a></li>
                                    <li><a href="product.php">Toshiba R732</a></li>
                                    <li><a href="product.php">HP</a></li>
                                    <li><a href="product.php">Fujitso</a></li>
                                </ul>-->
                            </li>
                            <li>
                                <a href="#">Other services</a>
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
                            <!--<li>
                                <a href="#">Reviews</a>
                                <ul>
                                        <li><a href="#">Albay</a></li>
                                        <li><a href="#">Camarines Sur</a></li>
                                        <li><a href="#">Camarines Norte</a></li>
                                        <li><a href="#">Catanduanes</a></li>
                                        <li><a href="#">Masbate</a></li>
                                        <li><a href="#">Sorsogon</a></li>
                                </ul>
                            </li>-->
                            <li>
                                <a href="contact.php">Contact</a>
                            </li>
                        </ul>
                    </nav><!-- End .mobile-nav -->
                </div><!-- .End .tab-pane -->
                <div class="tab-pane fade" id="mobile-cats-tab" role="tabpanel" aria-labelledby="mobile-cats-link">
                    <nav class="mobile-cats-nav">
                        <ul class="mobile-cats-menu">
                            <li><a class="mobile-cats-lead" href="#">Promos</a></li>
                            <!--<li><a class="mobile-cats-lead" href="#">Rental units/laptops</a></li>-->
                            <li><a href="category.php">NEC</a></li>
                            <li><a href="category.php">Toshiba</a></li>
                            <li><a href="category.php">HP</a></li>
                            <li><a href="category.php">Fujitso</a></li>
                            <li><a href="category.php">Core i5</a></li>
                            <li><a href="category.php">Celeron</a></li>
                        </ul><!-- End .mobile-cats-menu -->
                    </nav><!-- End .mobile-cats-nav -->
                </div><!-- .End .tab-pane -->
            </div><!-- End .tab-content -->

            <div class="social-icons">
                <a href="https://www.facebook.com/YzElectronics" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
                <!--<a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
                <a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>-->
                <a href="https://api.whatsapp.com/send?phone=%2B639091335801&data=AWBjSmWwYgUbborIuQKGecg_7K-BpuEA4-bnkQdO2S6g_1fbCg5T6DtMmengsu7T5IRiFrHV7xzhYw-95OgSvisKzqLkmoCYZoXZsZLa5suiKvPN3FUCsGqPq5FkkXBzifWaWqrSHxuv5QBZoLK8_jkc3SRccppIG3w7clcsiQFzZOvmHd74SRrEExDs_RfR4Mnc80Cg3baSiekiyUwu7b4UaLMvIMjjHcmmaBi2RiJfjgAfqDhE_zsuM88GRdM7lP_vDY33FLzEdSpkFOaZ9PoA441R7RxFfAyex5eLNLPEvp-QBRUPbj66JrbFLOVHhyY&source=FB_Page&app=facebook&entry_point=page_cta&fbclid=IwAR2Dq6nnkTnbnFW3gNwYWQQsX-snJzEm1K8cYukpkSCFQDmIEqPbbbz9Gyc" class="social-icon" target="_blank" title="Whatsapp"><i class="icon-whatsapp"></i></a>
            </div><!-- End .social-icons -->
        </div><!-- End .mobile-menu-wrapper -->
    </div><!-- End .mobile-menu-container -->