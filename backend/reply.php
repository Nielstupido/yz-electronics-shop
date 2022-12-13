<?php 

require_once "../includes/conn.php";

session_start(); 

?>

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
            

            <?php 
                if(isset($_POST['response'])) {
                    $id = $_POST['id'];
                    /*$url = "http://localhost/yz-electronics-shop/backend/reply.php?id=".$id;
                    header("Location: {$url}");*/
                }
            ?>


            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-dark">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="mail"></i></div>
                                    <span>Reply</span>
                                </h1>
                            </div>
                        </div>
                    </div>

                    <?php 
                        if(isset($_POST['send-reply'])) {
                            $reply = trim($_POST['reply']);
                            $sql = "UPDATE messages SET ms_status = :status, ms_state = :state, reply = :reply WHERE ms_id = :id";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([
                                ':status' => 'Processed',
                                ':state' => 1,
                                ':reply'=>$reply,                                 
                                ':id'=>$_GET['id']
                            ]);
                            header("Location: messages.php");
                        }
                    ?>

                    <!--Start Form-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">Respond Here:</div>
                            <div class="card-body">
                                <?php 
                                    $sql = "SELECT * FROM messages WHERE ms_id = :id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([
                                        ':id'=>$id
                                    ]);
                                    $ms = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $ms_detail = $ms['ms_detail'];
                                ?>
                                <?php 
                                    if(isset($_COOKIE['uid'])) {
                                        $user_id = base64_decode($_COOKIE['uid']);
                                    } else if(isset($_SESSION['uid'])) {
                                        $user_id = $_SESSION['uid'];
                                    } else {
                                        $user_id = -1;
                                    }
                                    $sql = "SELECT * FROM user_info WHERE user_id = :id";
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->execute([
                                        ':id' => $user_id
                                    ]);
                                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                    $user_name = $user['first_name'];
                                ?>
                                <form action="reply.php?id=<?php echo $id; ?>" method="POST";>
                                    <div class="form-group">
                                        <label for="post-content">Message:</label>
                                        <textarea class="form-control" placeholder="Type here..." id="post-content" rows="9" readonly="true"><?php echo $ms_detail; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="user-name">User name:</label>
                                        <input name="user-name" value="<?php echo $user_name; ?>" class="form-control" id="user-name" type="text" placeholder="User name ..." readonly="true" />
                                    </div>                               

                                    <div class="form-group">
                                        <label for="post-tags">Reply:</label>
                                        <textarea name="reply" class="form-control" placeholder="Type your reply here..." id="post-tags" rows="9"></textarea>
                                    </div>

                                    <button name="send-reply" class="btn btn-primary mr-2 my-1" type="submit">Respond</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--End Form-->

                </main>

<?php require_once('./includes/footer.php'); ?>

</div>
</div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>