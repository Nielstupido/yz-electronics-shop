<?php session_start(); ?>

<?php require_once("../includes/conn.php"); ?>
<?php require_once("./includes/header.php"); ?>

    <body class="nav-fixed">
        <?php require_once ("./includes/top-navbar.php"); ?>

        <!--Side Nav-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php require_once ("./includes/left-sidebar.php"); ?>
            </div>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-dark">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="activity"></i></div>
                                    <span>Dashboard</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Table-->
                    <div class="container-fluid mt-n10">

                    <!--Card Primary-->
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Orders</p>
                                    <?php 
                                        $sql = "SELECT * FROM orders";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $order_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $order_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="orders.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-warning text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Products</p>
                                    <?php 
                                        $sql = "SELECT * FROM products";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $product_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $product_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="products.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-success text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Customers</p>
                                    <?php 
                                        $sql = "SELECT * FROM user_info";
                                        $stmt = $pdo->prepare($sql);
                                        $stmt->execute();
                                        $user_count = $stmt->rowCount();
                                    ?>
                                    <p><?php echo $user_count; ?></p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="users.php">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-danger text-white mb-4">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <p>Admins</p>
                                    <p>2</p>
                                </div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" href="#">View Details</a>
                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Card Primary-->

                        <div class="card mb-4">
                            <div class="card-header">Most Popular Products:</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Number of Orders</th>
                                                <th>Photo</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    <a href="#">
                                                        Versa Pro VH
                                                    </a>
                                                </td>
                                                <td>Core</td>
                                                <td>5</td>
                                                <td>Photo</td>
                                                <td>17 Nov 20</td>
                                            </tr>     
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    <a href="#">
                                                        HP Corei5
                                                    </a>
                                                </td>
                                                <td>Core</td>
                                                <td>3</td>
                                                <td>Photo</td>
                                                <td>17 Nov 20</td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>
                                                    <a href="#">
                                                        NEC 5800U
                                                    </a>
                                                </td>
                                                <td>Core</td>
                                                <td>2</td>
                                                <td>Photo</td>
                                                <td>17 Nov 20</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>

                <?php require_once ("./includes/footer.php"); ?>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
