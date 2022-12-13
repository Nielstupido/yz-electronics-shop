<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>YZ Electronics - Admin Panel</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="180x180" href="assets/img/yz-logo.ico">
        <!-- Plugins CSS File -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Plugins JS File -->
        <script data-search-pseudo-elements defer src="js/all.min.js"></script>
        <script src="js/feather.min.js"></script>
    </head>
    
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
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="book-open"></i></div>
                                    <span>Orders</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!--Table-->
                    <div class="container-fluid mt-n10">

                        <div class="card mb-4">
                            <div class="card-header">All Orders</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Order #</th>
                                                <th>Product ID</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>TRX ID</th>
                                                <th>Order Status</th>
                                                <th>Payment Status</th>
                                            </tr>
                                        </thead>
                                        <!--<tbody id="customer_order_list">-->
                                        <tbody>
                                        <?php 
                                        $sql = "SELECT o.order_id, o.product_id, o.qty, o.trx_id, o.order_status, o.payment_status, p.product_title, p.product_image FROM orders o JOIN products p ON o.product_id = p.product_id";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                while($order = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $order_id = $order['order_id'];
                                                    $prod_id = $order['product_id'];
                                                    $prod_name = $order['product_title'];
                                                    $qty = $order['qty'];
                                                    $trx_id = $order['trx_id']; 
                                                    $order_status = $order['order_status'];
                                                    $payment_status = $order['payment_status']; ?>
                                                        <tr>
                                                            <td><?php echo $order_id; ?></td>
                                                            <td>
                                                                <?php echo $prod_id; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $prod_name; ?>
                                                            </td>
                                                            <td><?php echo $qty; ?></td>
                                                            <td><?php echo $trx_id; ?></td>
                                                            <td>
                                                                <form method="POST">
                                                                    <input type="hidden" name="id" value="<?php echo $order_id; ?>" >
                                                                    <?php 
                                                                        if ($order_status == "Pending") {
                                                                            echo "<button name='pending' type='submit' class='btn-primary p-1' style='width: 100%'>Accept</button>";
                                                                        } else if ($order_status == "Shipped Out") {
                                                                            echo "<button name='shipped' type='submit' class='btn-warning p-1' style='width: 100%'>Product Delivered</button>";
                                                                        } else if ($order_status == "Delivered") {
                                                                            echo "<button name='delivered' type='submit' class='btn-success p-1' style='width: 100%' disabled>Completed</button>";
                                                                        }
                                                                    ?>
                                                                </form>

                                                            <?php 
                                                                if(isset($_POST['pending'])) {
                                                                    $id = $_POST['id'];
                                                                    $sql = "UPDATE orders SET order_status = 'Shipped Out' WHERE order_id = :id";
                                                                    $stmt = $pdo->prepare($sql);
                                                                    $stmt->execute([
                                                                        ':id' => $id
                                                                    ]);
                                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                                } elseif(isset($_POST['shipped'])) {
                                                                    $id = $_POST['id'];
                                                                    $sql = "UPDATE orders SET order_status = 'Delivered' WHERE order_id = :id";
                                                                    $stmt = $pdo->prepare($sql);
                                                                    $stmt->execute([
                                                                        ':id' => $id
                                                                    ]);
                                                                    echo "<meta http-equiv='refresh' content='0'>";
                                                                }
                                                            ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php
                                                                    if ($payment_status == "Paid") {
                                                                        $color = "green";
                                                                    } elseif ($payment_status == "COD") {
                                                                        $color = "blue";
                                                                    } else {
                                                                        $color = "gray";
                                                                    }
                                                                    echo "<p style='color: $color;'>$payment_status</p>";
                                                                ?>
                                                            </td>
                                                        </tr> 
                                                <?php }
                                            ?>             
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </main>

                <?php require_once ("./includes/footer.php"); ?>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="./js/customers.js"></script>
    </body>
</html>
