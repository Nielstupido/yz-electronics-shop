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
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center bg-dark"><h3 class="font-weight-light my-4 text-white">CREATE AN ACCOUNT</h3></div>
                                    <div class="card-body">
                                    <p class="message"></p>
                                        <form id="admin-register-form">  
                                            <div class="form-group">
                                                <label class="small mb-1" for="name">Full Name</label><input class="form-control py-4" id="name" name="name" type="text" placeholder="Enter full name" /></div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="email">Email</label><input class="form-control py-4" id="email" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="password">Password</label><input class="form-control py-4" id="password" name="password" type="password" placeholder="Enter password" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="cpassword">Confirm Password</label><input class="form-control py-4" id="cpassword" name="cpassword" type="password" placeholder="Confirm password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0">
                                            <input type="hidden" name="admin_register" value="1">
			                                    <button type="button" class="btn btn-primary btn-block register-btn" style="background-color: #26B7D3;">Create Account</button>
                                            </div>
                                            <!--<div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block" href="#">Create Account</a></div>-->
                                        </form>
                                    </div>
                                    <div class="card-footer text-center bg-dark">
                                        <div class="small"><a href="login.php" style="color: #fff;">Have an account? Login here.</a></div>
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
