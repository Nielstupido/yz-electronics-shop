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
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="star"></i></div>
                                    <span>All Reviews</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">All Reviews</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>User Name</th>
                                                <th>User Email</th>
                                                <th>In response to</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Approve</th>
                                                <th>Unapprove</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                $sql = "SELECT * FROM reviews";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                while($reviews = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                    // com_id, com_detail, com_date, com_status, 
                                                    // com_user_id, user_name, user_email, com_post_id, post_title
                                                    $com_id = $reviews['review_id'];
                                                    $com_detail = $reviews['review_detail'];
                                                    $com_date = $reviews['review_date'];
                                                    $com_status = $reviews['review_status'];
                                                    $com_user_id = $reviews['review_user_id'];
                                                    // getting user_name and user_email from users table
                                                    $sql1 = "SELECT * FROM user_info WHERE user_id = :id";
                                                    $stmt1 = $pdo->prepare($sql1);
                                                    $stmt1->execute([
                                                        ':id' => $com_user_id
                                                    ]);
                                                    $user = $stmt1->fetch(PDO::FETCH_ASSOC);
                                                    $user_name = $user['first_name'];
                                                    $user_email = $user['email'];

                                                    $review_prod_id = $reviews['review_prod_id'];
                                                    // product_id and product_title from products table
                                                    $sql2 = "SELECT * FROM products WHERE product_id = :id";
                                                    $stmt2 = $pdo->prepare($sql2);
                                                    $stmt2->execute([
                                                        ':id' => $review_prod_id
                                                    ]);
                                                    $product = $stmt2->fetch(PDO::FETCH_ASSOC);
                                                    $product_id = $product['product_id'];
                                                    $product_title = $product['product_title']; ?>
                                                        <tr>
                                                            <td><?php echo $com_id; ?></td>
                                                            <td>
                                                                <?php echo $user_name; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $user_email; ?>
                                                            </td>
                                                            <td>
                                                                <a href="../single.php?post_id=<?php echo $product_id; ?>" target="_blank">
                                                                    <?php echo $product_title; ?>
                                                                </a>
                                                            </td>
                                                            <td><?php echo $com_detail; ?></td>
                                                            <td><?php echo $com_date; ?></td>
                                                            <td>
                                                                <div class="badge badge-<?php echo $com_status=="approved"?"success":"danger"; ?>">
                                                                    <?php echo $com_status; ?>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_POST['approve'])) {
                                                                        $review_id = $_POST['review_id'];
                                                                        $sql = "UPDATE reviews SET review_status = :status, review_state = :state WHERE review_id = :id";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        $stmt->execute([
                                                                            ':status' => 'approved',
                                                                            ':state' => 1,
                                                                            ':id' => $review_id
                                                                        ]);
                                                                        header("Location: comments.php");
                                                                    }
                                                                ?>
                                                                <?php 
                                                                    if($com_status == 'approved') { ?>
                                                                        <button title="Sorry, the status was already approved!" class="btn btn-success btn-icon"><i data-feather="check"></i></button>
                                                                    <?php } else { ?>
                                                                        <form action="comments.php" method="POST">
                                                                            <input type="hidden" name="com_id" value="<?php echo $com_id; ?>" />
                                                                            <button name="approve" type="submit" class="btn btn-success btn-icon"><i data-feather="check"></i></button>
                                                                        </form>
                                                                    <?php }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_POST['unapprove'])) {
                                                                        $review_id = $_POST['com_id'];
                                                                        $sql = "UPDATE reviews SET review_status = :status, review_state = :state WHERE review_id = :id";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        $stmt->execute([
                                                                            ':status' => 'unapproved',
                                                                            ':state' => 0,
                                                                            ':id' => $review_id
                                                                        ]);
                                                                        header("Location: comments.php");
                                                                    }
                                                                ?>
                                                                <?php 
                                                                    if($com_status == 'unapproved') { ?>
                                                                        <button title="Sorry, it's already unapproved!" name="unapprove" class="btn btn-red btn-icon"><i data-feather="delete"></i></button>
                                                                    <?php } else { ?>
                                                                        <form action="comments.php" method="POST">
                                                                            <input type="hidden" name="com_id" value="<?php echo $com_id; ?>" />
                                                                            <button name="unapprove" class="btn btn-red btn-icon"><i data-feather="delete"></i></button>
                                                                        </form>
                                                                   <?php }
                                                                ?>
                                                                
                                                            </td>
                                                            <td>
                                                                <?php 
                                                                    if(isset($_POST['delete'])) {
                                                                        $review_id = $_POST['review_id'];
                                                                        $sql = "DELETE FROM reviews WHERE review_id = :id";
                                                                        $stmt = $pdo->prepare($sql);
                                                                        $stmt->execute([
                                                                            ':id' => $review_id
                                                                        ]);
                                                                        header("Location: comments.php");
                                                                    }
                                                                ?>
                                                                <form action="comments.php" method="POST" >
                                                                    <input type="hidden" name="com_id" value="<?php echo $com_id; ?>" />
                                                                    <button name="delete" type="submit" class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
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
