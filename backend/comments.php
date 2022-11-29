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
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>In response to</th>
                                                <th>Details</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Approve</th>
                                                <th>Decline</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    Gairus
                                                </td>
                                                <td>
                                                    niel@gmail.com
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        NEC Intel Celeron 3855U
                                                    </a>
                                                </td>
                                                <td>Good quality laptops</td>
                                                <td>17 Nov 2020</td>
                                                <td>
                                                    <div class="badge badge-success">
                                                        Approved
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-icon"><i data-feather="check"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="delete"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
                                            </tr>  
                                            <tr>
                                                <td>2</td>
                                                <td>
                                                    Marife
                                                </td>
                                                <td>
                                                    dianebnrs09@gmail.com
                                                </td>
                                                <td>
                                                    <a href="#">
                                                        NEC VersaPro VH
                                                    </a>
                                                </td>
                                                <td>Parang brand new lang yung laptop. Thank you seller!</td>
                                                <td>17 Nov 2020</td>
                                                <td>
                                                    <div class="badge badge-success">Approved
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-icon"><i data-feather="check"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="delete"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>
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
