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
                            <div class="page-header-content d-flex align-items-center justify-content-between text-white">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="layout"></i></div>
                                    <span>Products</span>
                                </h1>
                                <!--<a href="new-brand.php" title="Add new brand" class="btn btn-white">-->
                                <a href="#" data-toggle="modal" data-target="#add_product_modal" title="Add new product" class="btn btn-white">
                                    <div class="page-header-icon"><i data-feather="plus"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!--Start Table-->
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            <div class="card-header">All Products</div>
                            <div class="card-body">
                                <div class="datatable table-responsive">
                                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Product ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Category</th>
                                                <th>Brand</th>
                                                <th>Status</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                        </tfoot>
                                        <tbody id="product_list">
                                                <!--<td>
                                                    <div class="badge badge-success">Published
                                                    </div>
                                                </td>
                                                <td>
                                                    <button class="btn btn-blue btn-icon"><i data-feather="edit"></i></button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-red btn-icon"><i data-feather="trash-2"></i></button>
                                                </td>-->                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Table-->

                </main>

                <!-- Add Product Modal start -->
                <div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add-product-form" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Brand Name</label>
                                        <select class="form-control brand_list" name="brand_id">
                                            <option value="">Select Brand</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <select class="form-control category_list" name="category_id">
                                            <option value="">Select Category</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Description</label>
                                        <textarea class="form-control" name="product_desc" placeholder="Enter product desc"></textarea>
                                    </div>
                                </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Qty</label>
                                <input type="number" name="product_qty" class="form-control" placeholder="Enter Product Quantity">
                            </div>
                            </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="number" name="product_price" class="form-control" placeholder="Enter Product Price">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                                        <input type="text" name="product_keywords" class="form-control" placeholder="Enter Product Keywords">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                        <input type="file" name="product_image" class="form-control">
                                    </div>
                                </div>
                                <input type="hidden" name="add_product" value="1">
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary add-product">Add Product</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Add Product Modal end -->

                <!-- Edit Product Modal start -->
                <div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit-product-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="e_product_name" class="form-control" placeholder="Enter Product Name">
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <select class="form-control brand_list" name="e_brand_id">
                                <option value="">Select Brand</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <select class="form-control category_list" name="e_category_id">
                                <option value="">Select Category</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Description</label>
                                <textarea class="form-control" name="e_product_desc" placeholder="Enter product desc"></textarea>
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Qty</label>
                                <input type="number" name="e_product_qty" class="form-control" placeholder="Enter Product Quantity">
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="number" name="e_product_price" class="form-control" placeholder="Enter Product Price">
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Keywords <small>(eg: apple, iphone, mobile)</small></label>
                                <input type="text" name="e_product_keywords" class="form-control" placeholder="Enter Product Keywords">
                            </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group">
                                <label>Product Image <small>(format: jpg, jpeg, png)</small></label>
                                <input type="file" name="e_product_image" class="form-control">
                                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
                            </div>
                            </div>
                            <input type="hidden" name="pid">
                            <input type="hidden" name="edit_product" value="1">
                            <div class="col-12">
                            <button type="button" class="btn btn-primary submit-edit-product">Add Product</button>
                            </div>
                        </div>
                        
                        </form>
                    </div>
                    </div>
                </div>
                </div>
                <!-- Edit Product Modal end -->

                <?php require_once ("./includes/footer.php"); ?>
            </div>
        </div>

        <!--Script JS-->
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script type="text/javascript" src="./js/products.js"></script>
    </body>
</html>
