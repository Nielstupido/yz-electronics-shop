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
                                    <div class="page-header-icon"><i data-feather="user"></i></div>
                                    <span>Your Profile</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($_COOKIE['admin_id'])) {
                            $user_id = base64_decode($_COOKIE['admin_id']);
                        } else if(isset($_SESSION['admin_id'])) {
                            $user_id = $_SESSION['admin_id'];
                        } else {
                            $user_id = -1;
                        }
                        $sql = "SELECT * FROM admin WHERE id = :id";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute([
                            ':id' => $user_id
                        ]);
                        $user = $stmt->fetch(PDO::FETCH_ASSOC);
                        $user_name = $user['name'];
                        $user_email = $user['email'];
                        $user_photo = $user['photo'];
                    ?>

                    <?php 
                        if(isset($_POST['submit'])) {
                            $user_name = $_POST['user-name'];
                            $user_email = $_POST['user-email'];
                            $user_photo = $_FILES['user-photo']['name'];
                            $user_photo_tmp = $_FILES['user-photo']['tmp_name'];
                            move_uploaded_file("{$user_photo_tmp}", "./assets/img/{$user_photo}");
                            if(empty($user_photo)) {
                                $sql = "SELECT * FROM admin WHERE id = :id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':id' => $user_id
                                ]);
                                $u = $stmt->fetch(PDO::FETCH_ASSOC);
                                $user_photo = $u['photo'];
                            }
                            $sql = "UPDATE admin SET name = :name, email = :email, photo = :photo WHERE id = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([
                                ':name' => $user_name,
                                ':email' => $user_email,
                                ':photo' => $user_photo,
                                ':id' => $user_id
                            ]);
                            header("Location: profile.php");
                        }
                    ?>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Profile</div>
                            <div class="card-body">
                                <form action="profile.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="user-name">User Name:</label>
                                        <input class="form-control" name="user-name" id="user-name" value="<?php echo $user_name; ?>" type="text" placeholder="User Name..." />
                                    </div>
                                    <div class="form-group">
                                        <label for="user-email">User Email:</label>
                                        <input class="form-control" name="user-email" id="user-email" type="email" value="<?php echo $user_email; ?>" placeholder="User Email..." />
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                        <label for="post-title">Choose photo:</label>
                                        <input class="form-control" name="user-photo" id="post-title" type="file" />
                                        <img src="./assets/img/<?php echo $user_photo; ?>" width="50" height="50" />
                                    </div>
                                    </div>
                                    <button class="btn btn-primary mr-2 my-1" name="submit" type="submit">Update now!</button>
                                </form>
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
