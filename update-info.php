<?php 
    include_once 'db.php';
    if(count($_POST)>0) {
        mysqli_query($con,"UPDATE user_info set f_name='" . $_POST['f_name'] . "', 
        l_name='" . $_POST['l_name'] . "', address1='" . $_POST['address1']. "',
        address2='" . $_POST["address2"]. "', email='" . $_POST['email'] . "', 
        mobile='" . $_POST['mobile']. "' WHERE user_id='$user_id'");
        $message = "Record Modified Successfully";
    }
    $result = mysqli_query($con,"SELECT * FROM user_info WHERE user_id='user_id'");
    $row= mysqli_fetch_array($result);
?>

<html>
<head>
<title>Edit User</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>
    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
        <form action="# ">
            <div class="row">
                <div class="col-sm-6">
                    <label>First Name *</label>
                    <input type="text" class="form-control" required>
                </div><!-- End .col-sm-6 -->

                <div class="col-sm-6">
                    <label>Last Name *</label>
                    <input type="text" class="form-control" required>
                </div><!-- End .col-sm-6 -->
            </div><!-- End .row -->

            <label>Email address *</label>
            <input type="email" class="form-control" required>


            <button type="submit" class="btn btn-outline-primary-2">
                <span>SAVE CHANGES</span>
                <i class="icon-long-arrow-right"></i>
            </button>
        </form>
    </div><!-- .End .tab-pane -->
    </body>
</html>







