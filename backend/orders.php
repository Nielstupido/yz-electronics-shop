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
                                                <th>Payment Status</th>
                                                <th>Delivery Status</th>
                                            </tr>
                                        </thead>
                                        <!--<tbody id="customer_order_list">-->
                                        <tbody>
                                        <?php 
                                        $sql = "SELECT o.order_id, o.product_id, o.qty, o.trx_id, o.p_status, o.p_state, p.product_title, p.product_image FROM orders o JOIN products p ON o.product_id = p.product_id";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                while($order = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    $order_id = $order['order_id'];
                                                    $prod_id = $order['product_id'];
                                                    $prod_name = $order['product_title'];
                                                    $qty = $order['qty'];
                                                    $trx_id = $order['trx_id']; 
                                                    $payment_status = $order['p_status'];
                                                    $delivery_status = $order['p_state']; ?>
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
                                                                <div class="badge badge-success">
                                                                    <?php echo $payment_status; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    //Check if the button was clicked
                                                                    //if (isset($_POST['submit_button'])) {
                                                                      //Update the value of the status column
                                                                      //$db->query("UPDATE orders SET p_status = 'Completed', p_state = 1");
                                                                    
                                                                        //Change the button to be non-clickable and display the text "complete"
                                                                        //echo "<input type='button' value='Complete' disabled />";
                                                                    //} else {
                                                                        //Display the button
                                                                        //echo "<form method='post'>
                                                                        //<input type='submit' name='submit_button' value='Confirm' />
                                                                        //</form>";
                                                                    //}
                                                                    ?>
                                                                    <?php 
                                                                        if(isset($_POST['confirm'])) {
                                                                            $id = $_POST['id'];
                                                                            $sql = "UPDATE orders SET p_status = 'Completed', p_state = 1 WHERE order_id = :id";
                                                                            $stmt = $pdo->prepare($sql);
                                                                            $stmt->execute([
                                                                                ':id' => $id
                                                                            ]);
                                                                            echo '<button name="confirm" class="btn btn-success disabled">Completed</button>';
                                                                        }
                                                                    ?>
                                                                    <form method="POST">
                                                                        <input type="hidden" name="id" value="<?php echo $order_id; ?>" >
                                                                        <button name="confirm" type="submit" class="btn btn-primary">Confirm</button>
                                                                    </form>
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
