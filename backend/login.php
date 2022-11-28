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
    <body class="bg-light text-dark">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center bg-dark"><h3 class="font-weight-light my-4 text-white"><b>LOG IN YOUR ACCOUNT</b></h3></div>
                                    <div class="card-body">
                                        <p class="message"></p>
                                        <form id="admin-login-form">
                                            <div class="form-group"><label class="small mb-1" for="email">Email</label><input class="form-control py-4" id="email" name="email" type="email" placeholder="Enter email address" /></div>
                                            <div class="form-group"><label class="small mb-1" for="password">Password</label><input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" /></div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox"><input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" /><label class="custom-control-label" for="rememberPasswordCheck">Remember password</label></div>
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <input type="hidden" name="admin_login" value="1">
			                                    <button type="button" class="btn-primary btn-block login-btn py-2 rounded" style="background-color: #26B7D3;">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center bg-dark">
                                        <div class="small"><a href="register.php" style="color: #fff;">Need an account? Register here.</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>
