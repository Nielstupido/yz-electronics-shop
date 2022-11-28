<!-- Sign in / Register Modal -->
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="js/jquery2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="main.js"></script>
</head>
<body>
    
    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill nav-border-anim" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form onsubmit="return false" id="login">
                                        <div class="form-group">
                                            <label for="email">Email</label>
							                <input type="email" class="form-control" name="email" id="email" required/>
                                        </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label for="email">Password</label>
							                <input type="password" class="form-control" name="password" id="password" required/>
                                        </div><!-- End .form-group -->

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2" Value="Login">
                                                <span>LOG IN</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                            </div><!-- End .custom-checkbox -->

                                            <a href="#" class="forgot-link">Forgot Your Password?</a>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                                <div class="row">
                                    <div class="col-md-2"><br></div>
                                    <div class="col-md-8" id="signup_msg">
                                        <!--Alert from signup form-->
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form id="signup_form" onsubmit="return false">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="f_name">First Name</label>
                                                <input type="text" id="f_name" name="f_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="f_name">Last Name</label>
                                                <input type="text" id="l_name" name="l_name"class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" name="email"class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password"class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="repassword">Confirm Password</label>
                                                <input type="password" id="repassword" name="repassword"class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="mobile">Contact Number</label>
                                                <input type="text" id="mobile" name="mobile"class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address1">Address 1</label>
                                                <input type="text" id="address1" name="address1"class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="address2">Address 2</label>
                                                <input type="text" id="address2" name="address2"class="form-control" required>
                                            </div>
                                        </div>
                                        <p><br/></p>
                                        <div class="form-footer">
                                            <button name="signup_button" value="Sign Up" type="submit" class="btn btn-outline-primary-2">
                                                <span>SIGN UP</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div><!-- End .form-footer -->
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div><!-- End .tab-content -->
                        </div><!-- End .form-tab -->
                    </div><!-- End .form-box -->
                </div><!-- End .modal-body -->
            </div><!-- End .modal-content -->
        </div><!-- End .modal-dialog -->
    </div><!-- End .modal -->

    </body>
</html>