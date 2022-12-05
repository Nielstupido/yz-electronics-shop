<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM categories";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Product Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["cat_id"];
			$cat_name = $row["cat_title"];
			echo "
					<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
		<div class='nav nav-pills nav-stacked'>
			<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["brand_id"];
			$brand_name = $row["brand_title"];
			echo "
					<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}

if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
			<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}


if(isset($_POST["getProduct"])){
	$limit = 12;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-6 col-md-4 col-lg-4 col-xl-3'>
					<div class='product product-2 just-action-icons-sm'>
						<figure class='product-media'>
							<span class='product-label label-new'>New</span>
							<a href='#' pid='$pro_id' id='show_product' title='Show product'>
								<img src='assets/images/products/$pro_image' alt='Product image' class='product-image'>
							</a>

							<div class='product-action'>
								<a href='#' pid='$pro_id' id='product' title='Add to cart' class='btn-product btn-cart'><span>add to cart</span></a>
								<a href='popup/quickView.html' class='btn-product btn-quickview' title='Quick view'><span>quick view</span></a>
							</div>
						</figure>

						<div class='product-body'>
							<div class='product-cat'>
								<a href='#'>Celeron</a>
							</div>
							<h3 class='product-title'><a href='#' pid='$pro_id' id='show_product' title='Show product'>$pro_title</a></h3>
							<div class='product-price'>
							&#8369;$pro_price
							</div>
							<div class='ratings-container'>
								<div class='ratings'>
									<div class='ratings-val' style='width: 100%;'></div>
								</div>
								<span class='ratings-text'>( 4 Reviews )</span>
							</div>

						</div>
					</div>
				</div>
			";
		}
	}
}



if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE product_cat = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE product_brand = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
	}
	
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];
			echo "
				<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading'>$pro_title</div>
								<div class='panel-body'>
									<img src='product_images/$pro_image' style='width:220px; height:250px;'/>
								</div>
								<div class='panel-heading'>Rs.$pro_price.00/-
									<button pid='$pro_id' style='float:right;' id='product' class='btn btn-danger btn-xs'>Add To Cart</button>
								</div>
							</div>
						</div>	
			";
		}
	}


if(isset($_POST["showProduct"])){

	//$_SESSION["product_id"]
	$sql = "SELECT * FROM products WHERE product_id = '$_SESSION[product_id]'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	
	$str = <<<PRINT
		<div class="product-details-top">
			<div class="row">
				<div class="col-md-6">
					<div class="product-gallery product-gallery-vertical">
						<div class="row">
							<figure class="product-main-image">
								<img id="product-zoom" src="assets/images/products/$row[7]" data-zoom-image="assets/images/products/single/p1-big.jpg" alt="product image">

								<a href="#" id="btn-product-gallery" class="btn-product-gallery">
									<i class="icon-arrows"></i>
								</a>
							</figure><!-- End .product-main-image -->

							<div id="product-zoom-gallery" class="product-image-gallery">
								<a class="product-gallery-item active" href="#" data-image="assets/images/products/single/p1.jpg" data-zoom-image="assets/images/products/single/p1-big.jpg">
									<img src="assets/images/products/single/p1-small.jpg" alt="product side">
								</a>

								<a class="product-gallery-item" href="#" data-image="assets/images/products/single/p2.jpg" data-zoom-image="assets/images/products/single/p2-big.jpg">
									<img src="assets/images/products/single/p2-small.jpg" alt="product cross">
								</a>

								<a class="product-gallery-item" href="#" data-image="assets/images/products/single/p3.jpg" data-zoom-image="assets/images/products/single/p3-big.jpg">
									<img src="assets/images/products/single/p3-small.jpg" alt="product with model">
								</a>

								<a class="product-gallery-item" href="#" data-image="assets/images/products/single/p4.jpg" data-zoom-image="assets/images/products/single/p4-big.jpg">
									<img src="assets/images/products/single/p4-small.jpg" alt="product back">
								</a>
							</div><!-- End .product-image-gallery -->
						</div><!-- End .row -->
					</div><!-- End .product-gallery -->
				</div><!-- End .col-md-6 -->

				<div class="col-md-6">
					<div class="product-details">
						<h1 class="product-title">$row[3]</h1><!-- End .product-title -->

						<div class="ratings-container">
							<div class="ratings">
								<div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
							</div><!-- End .ratings -->
							<a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
						</div><!-- End .rating-container -->

						<div class="product-price">
						&#8369;$row[4]
						</div><!-- End .product-price -->

						<div class="product-content">
							<p>2nd hand Company-used Laptops. PRESENTABLE UNITS.</p>
						</div><!-- End .product-content -->

						<div class="details-filter-row details-row-size">
							<label for="qty">Qty:</label>
							<div class="product-details-quantity">
								<input type="number" id="qty" class="form-control" value="1" min="1" max="10" step="1" data-decimals="0" required>
							</div><!-- End .product-details-quantity -->
						</div><!-- End .details-filter-row -->

						<div class="product-details-action">
							<a href='#' pid='$_SESSION[product_id]' id='product' title='Add to cart' class='btn-product btn-cart'><span>add to cart</span></a>
						</div><!-- End .product-details-action -->

						<div class="product-details-footer">
							<div class="product-cat">
								<span>Category:</span>
								<a href="#">NEC</a>,
								<a href="#">Core i5</a>,
								<a href="#">Students</a>
							</div><!-- End .product-cat -->

							<div class="social-icons social-icons-sm">
								<span class="social-label">Share:</span>
								<a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
								<a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
								<a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
								<a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
							</div>
						</div><!-- End .product-details-footer -->
					</div><!-- End .product-details -->
				</div><!-- End .col-md-6 -->
			</div><!-- End .row -->
		</div><!-- End .product-details-top -->

		<div class="product-details-tab">
			<ul class="nav nav-pills justify-content-center" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Additional information</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews (2)</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
					<div class="product-desc-content">
						<h3>Product Information</h3>
						<pre style="color: #777; font-family: sans-serif; font-size: 1.4rem; font-weight: 300; letter-spacing: 0;">
						$row[6]
						</pre>
						
					</div><!-- End .product-desc-content -->
				</div><!-- .End .tab-pane -->
				<div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
					<div class="product-desc-content">
						<h3>Information</h3>
						<p>No additional information.</p>
					</div><!-- End .product-desc-content -->
				</div><!-- .End .tab-pane -->
				<div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
					<div class="product-desc-content">
						<h3>Delivery & returns</h3>
						<p>We deliver to all places within Bicol Region. We accept cash on delivery and payment via GCash or bank transfer through BDO. There is an additional charge for meet-ups. If you have questions, please contact us through this <a href="contact.php">form</a> or you can message us through our <a href="https://www.facebook.com/YzElectronics"> YZ Electronics</a> page.<br>
						<br>We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt. For full details of how to make a return, please view our <a href="#">Returns information</a></p>
					</div><!-- End .product-desc-content -->
				</div><!-- .End .tab-pane -->
				<div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
					<div class="reviews">
						<h3>Reviews (2)</h3>
						<div class="review">
							<div class="row no-gutters">
								<div class="col-auto">
									<h4><a href="#">Riah Calingacion</a></h4>
									<div class="ratings-container">
										<div class="ratings">
											<div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
										</div><!-- End .ratings -->
									</div><!-- End .rating-container -->
									<span class="review-date">6 days ago</span>
								</div><!-- End .col -->
								<div class="col">
									<h4>Good quality</h4>

									<div class="review-content">
										<p>Good quality laptops and Very accommodating seller. Thank you! 😊</p>
									</div><!-- End .review-content -->

									<div class="review-action">
										<a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
										<a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
									</div><!-- End .review-action -->
								</div><!-- End .col-auto -->
							</div><!-- End .row -->
						</div><!-- End .review -->

						<div class="review">
							<div class="row no-gutters">
								<div class="col-auto">
									<h4><a href="#">Roshelle Orlain</a></h4>
									<div class="ratings-container">
										<div class="ratings">
											<div class="ratings-val" style="width: 100%;"></div><!-- End .ratings-val -->
										</div><!-- End .ratings -->
									</div><!-- End .rating-container -->
									<span class="review-date">5 days ago</span>
								</div><!-- End .col -->
								<div class="col">
									<h4>Good</h4>

									<div class="review-content">
										<p>item is good 👍 very accommodating seller, salute!</p>
									</div><!-- End .review-content -->

									<div class="review-action">
										<a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
										<a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
									</div><!-- End .review-action -->
								</div><!-- End .col-auto -->
							</div><!-- End .row -->
						</div><!-- End .review -->
					</div><!-- End .reviews -->
				</div><!-- .End .tab-pane -->
			</div><!-- End .tab-content -->
		</div><!-- End .product-details-tab -->
		PRINT;

	echo $str;
}

if(isset($_POST["gotoProduct"]))
{
	$_SESSION["product_id"] = $_POST["proId"];
}


	if(isset($_POST["addToCart"])){
		

		$p_id = $_POST["proId"];
		

		if(isset($_SESSION["uid"])){

		$user_id = $_SESSION["uid"];

		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
		if($count > 0){
			echo "
				<div class='alert alert-warning'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is already added into the cart Continue Shopping..!</b>
				</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is Added..!</b>
					</div>
				";
			}
		}
		}else{
			$sql = "SELECT id FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
			$query = mysqli_query($con,$sql);
			if (mysqli_num_rows($query) > 0) {
				echo "
					<div class='alert alert-warning'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<b>Product is already added into the cart Continue Shopping..!</b>
					</div>";
					exit();
			}
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','-1','1')";
			if (mysqli_query($con,$sql)) {
				echo "
					<div class='alert alert-success'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Your product has been added to cart!</b>
					</div>
				";
				exit();
			}
			
		}
	}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

//Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (isset($_POST["getCartItem"])) {
		//display cart item in dropdown menu
		if (mysqli_num_rows($query) > 0) {
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["product_id"];
				$product_title = $row["product_title"];
				$product_price = $row["product_price"];
				$product_image = $row["product_image"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				echo '
					<div class="product">
						<div class="product-cart-details">
							<h4 class="product-title">
								<a href="product.php">'.$product_title.'</a>
							</h4>

							<span class="cart-product-info">
								<span class="cart-product-qty">1</span>
								'.$product_price.'
							</span>
						</div><!-- End .product-cart-details -->

						<figure class="product-image-container">
							<a href="product.php" class="product-image">
								<img src="assets/images/products/'.$product_image.'" alt="product">
							</a>
						</figure>
						<a href="#" remove_id="'.$product_id.'" class="btn-remove remove" title="Remove Product"><i class="icon-close"></i></a>
					</div>
					';
				
			}
			?>
				<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>
			<?php
			exit();
		}
	}
	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login

			echo '
				<div class="col-lg-9">
				<table class="table table-cart table-mobile">
					<thead>
						<tr>
							<th>Product</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
			';
			echo "<form method='post' action='login_form.php'>";
				$n=0;
				while ($row=mysqli_fetch_array($query)) {
					$n++;
					$product_id = $row["product_id"];
					$product_title = $row["product_title"];
					$product_price = $row["product_price"];
					$product_image = $row["product_image"];
					$cart_item_id = $row["id"];
					$qty = $row["qty"];

					echo 
						'
							<tr>
								<td class="product-col">
									<div class="product">
										<figure class="product-media">
											<a href="#" pid="'.$product_id.'" id="show_product" title="Show product">
												<img src="assets/images/products/'.$product_image.'" alt="Product image">
											</a>
										</figure>

										<h3 class="product-title">
											<a href="#">'.$product_title.'</a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col price" value="'.$product_price.'">'.$product_price.'</td>
								<td class="quantity-col">
									<div class="cart-product-quantity">
										<input type="number" class="form-control qty" value="'.$qty.'" min="1" max="10" step="1" data-decimals="0" required>
									</div><!-- End .cart-product-quantity -->                                 
								</td>
								<td class="total"></td>
								<td class="remove-col"><button class="btn-remove"><i class="icon-close"></i></button></td>
							</tr>';
				}

				echo '
				</tbody>
								</table><!-- End .table table-wishlist -->

	                			<div class="cart-bottom">
			            			<div class="cart-discount">
			            				<form action="#">
			            					<div class="input-group">
				        						<input type="text" class="form-control" required placeholder="coupon code">
				        						<div class="input-group-append">
													<button class="btn btn-outline-primary-2" type="submit"><i class="icon-long-arrow-right"></i></button>
												</div><!-- .End .input-group-append -->
			        						</div><!-- End .input-group -->
			            				</form>
			            			</div><!-- End .cart-discount -->

			            			<a href="#" class="btn btn-outline-dark-2"><span>UPDATE CART</span><i class="icon-refresh"></i></a>
		            			</div><!-- End .cart-bottom -->
	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-subtotal">
	                							<td>Subtotal:</td>
	                							<td class="net_total"></td>
	                						</tr><!-- End .summary-subtotal -->
	                						<tr class="summary-shipping">
	                							<td>Shipping:</td>
	                							<td>&nbsp;</td>
	                						</tr>

	                						<tr class="summary-shipping-row">
	                							<td>
													<div class="custom-control custom-radio">
														<input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="free-shipping">Free Shipping</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>$0.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="standart-shipping">Standart:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>00.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-row">
	                							<td>
	                								<div class="custom-control custom-radio">
														<input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
														<label class="custom-control-label" for="express-shipping">Express:</label>
													</div><!-- End .custom-control -->
	                							</td>
	                							<td>00.00</td>
	                						</tr><!-- End .summary-shipping-row -->

	                						<tr class="summary-shipping-estimate">
	                							<td>Estimate for Your Country<br> <a href="dashboard.html">Change address</a></td>
	                							<td>&nbsp;</td>
	                						</tr><!-- End .summary-shipping-estimate -->

	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td class="net_total"></td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->

	                				<a href="checkout.php" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>
	                			</div><!-- End .summary -->

		            			<a href="category.html" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
	                		</aside><!-- End .col-lg-3 -->
				';
/*
				if (!isset($_SESSION["uid"])) {
					echo '<input type="submit" style="float:right;" name="login_user_with_product" class="btn btn-info btn-lg" value="Ready to Checkout" >
							</form>';
					
				}else if(isset($_SESSION["uid"])){
					//Paypal checkout form
					echo '
						</form>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
							<input type="hidden" name="cmd" value="_cart">
							<input type="hidden" name="business" value="shoppingcart@ecommerceastro.com">
							<input type="hidden" name="upload" value="1">';
							  
							$x=0;
							$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
							$query = mysqli_query($con,$sql);
							while($row=mysqli_fetch_array($query)){
								$x++;
								echo  	
									'<input type="hidden" name="item_name_'.$x.'" value="'.$row["product_title"].'">
								  	 <input type="hidden" name="item_number_'.$x.'" value="'.$x.'">
								     <input type="hidden" name="amount_'.$x.'" value="'.$row["product_price"].'">
								     <input type="hidden" name="quantity_'.$x.'" value="'.$row["qty"].'">';
								}
							  
							echo   
								'<input type="hidden" name="return" value="http://localhost/project1/payment_success.php"/>
					                <input type="hidden" name="notify_url" value="http://localhost/ecommerce-app-h/payment_success.php">
									<input type="hidden" name="cancel_return" value="http://localhost/ecommerce-app-h/cancel.php"/>
									<input type="hidden" name="currency_code" value="USD"/>
									<input type="hidden" name="custom" value="'.$_SESSION["uid"].'"/>
									<input style="float:right;margin-right:80px;" type="image" name="submit"
										src="https://www.paypalobjects.com/webstatic/en_US/i/btn/png/blue-rect-paypalcheckout-60px.png" alt="PayPal Checkout"
										alt="PayPal - The safer, easier way to pay online">
								</form>';
				}*/
			}
	}
	
	
}

//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-danger'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is removed from cart</b>
				</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
						<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
						<b>Product is updated</b>
				</div>";
		exit();
	}
}




?>






