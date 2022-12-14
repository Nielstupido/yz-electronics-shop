<?php require_once("../includes/conn.php"); ?>

<nav class="topnav navbar navbar-expand shadow navbar-light bg-white py-3" id="sidenavAccordion">
            <a class="navbar-brand d-none d-sm-block" href="index.php"><span style="color: #07BAE9;">YZ Electronics</span> Admin Panel</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
            <ul class="navbar-nav align-items-center ml-auto">
                
                <?php 
                    $sql = "SELECT * FROM orders WHERE order_status = :state";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([
                        ':state' => 'Pending'
                    ]);
                    $count_order = $stmt->rowCount();
                ?>
            
                <!--User Registration + New Comment Notification-->
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <?php 
                            if($count_order != 0) { ?>
                                <span class="badge badge-red"><?php echo $count_order; ?></span>
                            <?php }
                        ?>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="mr-2" data-feather="bell"></i>
                            Notification
                        </h6>

                        <?php 
                            $sql = "SELECT * FROM orders WHERE order_status = :state";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([
                                ':state' => 'Pending'
                            ]);
                            while($com = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $com_date = $com['order_date'];
                                //$com_detail = substr($com['order_status'],0, 35); ?>
                                    <a class="dropdown-item dropdown-notifications-item" href="orders.php">
                                        <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                                        <div class="dropdown-notifications-item-content">

                                            <div class="dropdown-notifications-item-content-details">
                                                <?php echo $com_date; ?>
                                            </div>
                                            <div class="dropdown-notifications-item-content-text">
                                                You received an order.
                                            </div>
                                        </div>
                                    </a>
                        <?php }
                        ?>

                        <!--<a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">

                                <div class="dropdown-notifications-item-content-details">
                                    November 2022
                                </div>
                                <div class="dropdown-notifications-item-content-text">
                                    You received an order from user01.
                                </div>
                            </div>
                        </a>

                        <a class="dropdown-item dropdown-notifications-item" href="#!">
                            <div class="dropdown-notifications-item-icon bg-warning"><i data-feather="activity"></i></div>
                            <div class="dropdown-notifications-item-content">

                                <div class="dropdown-notifications-item-content-details">
                                    November 2022
                                </div>
                                <div class="dropdown-notifications-item-content-text">
                                    You received an order from user02.
                                </div>
                            </div>
                        </a>-->

                        <a class="dropdown-item dropdown-notifications-footer" href="orders.php">
                            View All Orders
                        </a>
                    </div>
                </li>
                <!--User Registration + New Comment Notification-->

                <?php 
                    $sql = "SELECT * FROM messages WHERE ms_state = :state";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([':state'=>0]);
                    $count = $stmt->rowCount();
                ?>

                <!--Message Notification-->
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="mail"></i>
                        <?php 
                            if($count != 0) { ?>
                                <span class="badge badge-red"><?php echo $count; ?></span>
                        <?php } 
                        ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="mr-2" data-feather="mail"></i>
                            Message Notification
                        </h6>

                        <?php 
                            while($messages = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $ms_detail = $messages['ms_detail'];
                                $ms_username = $messages['ms_username'];
                                $ms_date = $messages['ms_date']; ?>
                                    <a class="dropdown-item dropdown-notifications-item" href="messages.php">
                                        <div class="dropdown-notifications-item-content">
                                            <div class="dropdown-notifications-item-content-text">
                                                <?php echo $ms_detail; ?>
                                            </div>
                                            <div class="dropdown-notifications-item-content-details">
                                                <?php echo $ms_username; ?> &#xB7; <?php echo $ms_date; ?>
                                            </div>
                                        </div>
                                    </a>
                            <?php }
                        ?>

                        <a class="dropdown-item dropdown-notifications-footer" href="messages.php">
                            Read All Messages
                        </a>
                    </div>
                </li>
                <!--Message Notification-->

                            <?php 
                                if(isset($_COOKIE['admin_id'])) {
                                    $id = base64_decode($_COOKIE['admin_id']);
                                } else if(isset($_SESSION['admin_id'])) {
                                    $id = $_SESSION['admin_id'];
                                } else {
                                    $id = -1;
                                }
                                $sql = "SELECT * FROM admin WHERE id = :id";
                                $stmt = $pdo->prepare($sql);
                                $stmt->execute([
                                    ':id' => $id
                                ]);
                                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                                $name = $user['name'];
                                $email = $user['email'];
                                $photo = $user['photo'];
                            ?>

        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="./assets/img/<?php echo $photo; ?>" alt="<?php echo $name; ?>" /></a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="./assets/img/<?php echo $photo; ?>" alt="<?php echo $name; ?>" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">
                            <?php echo $name; ?>
                        </div>
                        <div class="dropdown-user-details-email">
                            <?php echo $email; ?>
                        </div>
                    </div>
                </h6>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="profile.php">
                            <div class="dropdown-item-icon">
                                <i data-feather="settings"></i>
                            </div>
                            Profile
                        </a>
                        <a class="dropdown-item" href="admin-logout.php"
                            ><div class="dropdown-item-icon">
                                <i data-feather="log-out"></i>
                            </div>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>