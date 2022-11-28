<?php require_once("../includes/conn.php"); ?>

<nav class="sidenav shadow-right sidenav-light">
                    <div class="sidenav-menu">
                        <div class="nav accordion" id="accordionSidenav">
                            <a class="nav-link collapsed pt-4" href="index.php">
                                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </a>
                            <!--<a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="nav-link-icon"><i data-feather="layout"></i></div>
                                Posts
                                <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" data-parent="#accordionSidenav">
                                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavLayout">
                                    <a class="nav-link" href="all-post.php">All Posts</a>
                                    <a class="nav-link" href="add-new.php">Add New Post</a>
                                </nav>
                            </div>-->

                            <a class="nav-link" href="orders.php" ><div class="nav-link-icon"><i data-feather="clipboard"></i></div>
                                Orders
                            </a>

                            <a class="nav-link" href="categories.php" ><div class="nav-link-icon"><i data-feather="layers"></i></div>
                                Categories
                            </a>

                            <a class="nav-link" href="brands.php" ><div class="nav-link-icon"><i data-feather="box"></i></div>
                                Brands
                            </a>

                            <a class="nav-link" href="products.php" ><div class="nav-link-icon"><i data-feather="shopping-cart"></i></div>
                                Products
                            </a>

                            <a class="nav-link" href="users.php" ><div class="nav-link-icon"><i data-feather="users"></i></div>
                                Customers
                            </a>

                            <a class="nav-link" href="comments.php" ><div class="nav-link-icon"><i data-feather="star"></i></div>
                                Reviews
                            </a>

                            <a class="nav-link" href="messages.php" ><div class="nav-link-icon"><i data-feather="mail"></i></div>
                                Messages
                            </a>

                            <a class="nav-link" href="profile.php" ><div class="nav-link-icon"><i data-feather="user"></i></div>
                                Profile
                            </a>
                        </div>
                    </div>

                    <div class="sidenav-footer">
                        <div class="sidenav-footer-content">
                            <div class="sidenav-footer-subtitle">Logged in as:</div>
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
                            ?>
                            <div class="sidenav-footer-title"><?php echo $name; ?></div>
                        </div>
                    </div>

                </nav>