<?php require_once("../includes/conn.php"); ?>

<nav class="topnav navbar navbar-expand shadow navbar-light bg-white py-3" id="sidenavAccordion">
            <a class="navbar-brand d-none d-sm-block" href="index.php"><span style="color: #07BAE9;">YZ Electronics</span> Admin Panel</a><button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle" href="#"><i data-feather="menu"></i></button>
            <ul class="navbar-nav align-items-center ml-auto">
                
                <!--User Registration + New Comment Notification-->
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell"></i>
                        <span class="badge badge-red">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="mr-2" data-feather="bell"></i>
                            Notification
                        </h6>

                        <a class="dropdown-item dropdown-notifications-item" href="#!">
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
                        </a>

                        <a class="dropdown-item dropdown-notifications-footer" href="#">
                            View All Alerts
                        </a>
                    </div>
                </li>
                <!--User Registration + New Comment Notification-->

                <!--Message Notification-->
                <li class="nav-item dropdown no-caret mr-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownMessages" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="mail"></i>
                        <span class="badge badge-red">1</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownMessages">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <i class="mr-2" data-feather="mail"></i>
                            Message Notification
                        </h6>

                        <a class="dropdown-item dropdown-notifications-item" href="#"
                            ><img class="dropdown-notifications-item-img" src="./assets/img/default.jpg" />
                            <div class="dropdown-notifications-item-content">
                                <div class="dropdown-notifications-item-content-text">
                                    Meron pa po kayo yung a 11,500?
                                </div>
                                <div class="dropdown-notifications-item-content-details">
                                    Marife &#xB7; 58m
                                </div>
                            </div>
                        </a>

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
                            ?>

        <li class="nav-item dropdown no-caret mr-3 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="./assets/img/admin.png"/></a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="./assets/img/admin.png" />
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