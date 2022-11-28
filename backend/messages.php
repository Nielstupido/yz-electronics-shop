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
                                    <div class="page-header-icon"><i data-feather="mail"></i></div>
                                    <span>Messages</span>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">All Messages</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Phone Number</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                                <th>Response</th>
                                                <th>Decline</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>
                                                    Marife
                                                </td>
                                                <td>
                                                    09090909000
                                                </td>
                                                <td>Meron pa po kayo yung a 11,500?</td>
                                                <td>17 Nov 2022</td>
                                                <td>
                                                    <div class="badge badge-success">
                                                        Pending
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
                                                    Gairus
                                                </td>
                                                <td>
                                                    09090909000
                                                </td>
                                                <td>Meron pa po kayong Toshiba?</td>
                                                <td>17 Nov 2022</td>
                                                <td>
                                                    <div class="badge badge-success">Pending
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-success btn-icon"><i data-feather="mail"></i></button>
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
