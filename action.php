<?php
	session_start();
	$ip_add = getenv("REMOTE_ADDR");
	include "db.php";
	require_once('vendor/autoload.php');
	
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
	$count = 0;
	if(isset($_SESSION["count"]))
	{
		$count = $_SESSION["count"];
	}
	else
	{
		$sql = "SELECT * FROM products";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);
	}
	$pageno = ceil($count/12);
	$current = $_POST["pageNumber"];
	for($i=1;$i<=$pageno;$i++){
		if($i == $current)
		{
			echo "
			<li class='page-item active'><a class='page-link page_number' current='0' href='#' page='$i' id='page'>$i</a></li>
			";
		}
		else
		{
			echo "
			<li class='page-item'><a class='page-link page_number' current='1' href='#' page='$i' id='page'>$i</a></li>
			";
		}
	}
}

if(isset($_POST["filter_reset"])){
	if(isset($_SESSION["count"]))
	{
		unset($_SESSION["count"]);
	}
}


// if(isset($_POST["prod_filter_brand_only"]))
// {
// 	$_SESSION["prod_filter_brand_only"] = true;
// 	$_SESSION["brand_id"] = $_POST["brand_id"];
// 	if(isset($_SESSION['prod_filter_brand_cat']))
// 	{
// 		unset($_SESSION['prod_filter_brand_cat']);
// 	}

// 	if(isset($_SESSION['prod_filter_cat_only']))
// 	{
// 		unset($_SESSION['prod_filter_cat_only']);
// 	}
// }

// if(isset($_POST["prod_filter_cat_only"]))
// {
// 	$_SESSION["prod_filter_cat_only"] = true;
// 	$_SESSION["cat_id"] = $_POST["cat_id"];
// 	if(isset($_SESSION['prod_filter_brand_cat']))
// 	{
// 		unset($_SESSION['prod_filter_brand_cat']);
// 	}

// 	if(isset($_SESSION['prod_filter_brand_only']))
// 	{
// 		unset($_SESSION['prod_filter_brand_only']);
// 	}
// }

// if(isset($_POST["prod_filter_brand_cat"]))
// {
// 	$_SESSION["prod_filter_brand_cat"] = true;
// 	$_SESSION["cat_id"] = $_POST["cat_id"];
// 	$_SESSION["brand_id"] = $_POST["brand_id"];
// 	if(isset($_SESSION['prod_filter_brand_only']))
// 	{
// 		unset($_SESSION['prod_filter_brand_only']);
// 	}

// 	if(isset($_SESSION['prod_filter_cat_only']))
// 	{
// 		unset($_SESSION['prod_filter_cat_only']);
// 	}
// }


if(isset($_POST["getProduct"])){

	if(isset($_SESSION['searchEntry']))
	{
		$product_query = "SELECT * FROM products WHERE product_title LIKE '%$_SESSION[searchEntry]%' OR product_title LIKE '%$_SESSION[searchEntry]%'";
		$run_query = mysqli_query($con,$product_query);
		$count = mysqli_num_rows($run_query);
		$_SESSION["count"] = $count;
	}
	else if(isset($_POST["prod_filter_brand_only"]))
	{
		$product_query = "SELECT * FROM products WHERE product_brand = '$_POST[brand_id]'";
		$run_query = mysqli_query($con,$product_query);
		$count = mysqli_num_rows($run_query);
		$_SESSION["count"] = $count;
	}
	else if(isset($_POST["prod_filter_cat_only"]))
	{
		$product_query = "SELECT * FROM products WHERE product_cat = '$_POST[cat_id]'";
		$run_query = mysqli_query($con,$product_query);
		$count = mysqli_num_rows($run_query);
		$_SESSION["count"] = $count;
	}
	else if(isset($_POST["prod_filter_brand_cat"]))
	{
		$product_query = "SELECT * FROM products WHERE product_cat = '$_POST[cat_id]' AND product_brand = '$_POST[brand_id]'";
		$run_query = mysqli_query($con,$product_query);
		$count = mysqli_num_rows($run_query);
		$_SESSION["count"] = $count;
	}
	else
	{
		$product_query = "SELECT * FROM products WHERE 1";
		$run_query = mysqli_query($con,$product_query);
		$count = mysqli_num_rows($run_query);
	}

	$limit = 12;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}

	if(isset($_SESSION['searchEntry']))
	{
		$product_query = "SELECT * FROM products WHERE product_title LIKE '%$_SESSION[searchEntry]%' OR product_title LIKE '%$_SESSION[searchEntry]%' LIMIT $start,$limit";
		unset($_SESSION['searchEntry']);
	}
	else if(isset($_POST["prod_filter_brand_only"]))
	{
		$product_query = "SELECT * FROM products WHERE product_brand = '$_POST[brand_id]' LIMIT $start,$limit";
	}
	else if(isset($_POST["prod_filter_cat_only"]))
	{
		$product_query = "SELECT * FROM products WHERE product_cat = '$_POST[cat_id]' LIMIT $start,$limit";
	}
	else if(isset($_POST["prod_filter_brand_cat"]))
	{
		$product_query = "SELECT * FROM products WHERE product_cat = '$_POST[cat_id]' AND product_brand = '$_POST[brand_id]' LIMIT $start,$limit";
	}
	else
	{
		$product_query = "SELECT * FROM products LIMIT $start,$limit";
	}

	$run_query = mysqli_query($con,$product_query);
	$numOfShowing = 0;
	$cat_name = null;
	
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$numOfShowing++;
			$pro_id    = $row['product_id'];
			$pro_cat   = $row['product_cat'];
			$pro_brand = $row['product_brand'];
			$pro_title = $row['product_title'];
			$pro_price = $row['product_price'];
			$pro_image = $row['product_image'];


			$sql = "SELECT * FROM reviews WHERE review_prod_id = '$pro_id'";
			$query = mysqli_query($con,$sql);
			$num_reviews = 0;
			$stars = 0;
			while($row=mysqli_fetch_array($query)){
					$num_reviews++;
					$stars += $row['stars_number'];
			}

			$avg = $stars;
			if($num_reviews>1)
			{
				$avg = intval($stars/5);
			}

			$cat_query = "SELECT * FROM categories WHERE 1";
			$run_cat_query = mysqli_query($con,$cat_query);
			while($row_cat = mysqli_fetch_array($run_cat_query)){
				if($row_cat['cat_id'] == $pro_cat)
				{
					$cat_name = $row_cat['cat_title'];
					break;
				}
			}

			// <div class='product-cat'>
			// $cat_name
			// </div>

			echo "
				<div class='col-6 col-md-4 col-lg-4 col-xl-3'>
					<div class='product product-2 just-action-icons-sm'>
						<figure class='product-media'>
							<a href='#' pid='$pro_id' id='show_product' title='Show product'>
								<img src='assets/images/products/$pro_image' alt='Product image' class='product-image'>
							</a>

							<div class='product-action'>
								<a href='#' pid='$pro_id' id='product' title='Add to cart' class='btn-product btn-cart'><span>add to cart</span></a>
							</div>
						</figure>

						<div class='product-body'>

							<h3 class='product-title'><a href='#' pid='$pro_id' id='show_product' title='Show product'>$pro_title</a></h3>
							<div class='product-price'>
							&#8369;$pro_price
							</div>
							<div class='ratings-container'>";

			for($i=0;$i<$avg;$i++)
			{
				echo '<span class="fa fa-star checked"></span>';
			}
	
			$unchecked = 5-$avg;
	
			for($i=0;$i<$unchecked;$i++)
			{
				echo '<span class="fa fa-star"></span>';
			}
							echo "
								<span class='ratings-text'>( $num_reviews Reviews )</span>
							</div>

						</div>
					</div>
				</div>
			";
		}
	}
	else
	{
		echo '<img src="assets/images/error.png" width="90%" alt="Error Image">';
	}

	$_SESSION['productCount'] = $count;
	$_SESSION['showingProduct'] = $numOfShowing;
}


if(isset($_POST["getShowingProd"])){
	echo '<div class="toolbox-info">
			Showing <span>'.$_SESSION['showingProduct'].' of '.$_SESSION['productCount'].'</span> Products
		</div>';
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
	$num_reviews = 0;
	$sql = "SELECT * FROM reviews WHERE review_prod_id = '$_SESSION[product_id]'";
	$query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($query)){
		$num_reviews++;
	}
	//$_SESSION["product_id"]
	$sql = "SELECT * FROM products WHERE product_id = '$_SESSION[product_id]'";
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	
	echo '
		<div class="product-details-top">
			<div class="row">
				<div class="col-md-6">
					<div class="product-gallery product-gallery-vertical">
						<div class="row">
							<img class="mySlides" src="assets/images/products/single/'.$row[8].'" style="width:75%;">
							<img class="mySlides" src="assets/images/products/single/'.$row[9].'" style="width:75%;display:none">
							<img class="mySlides" src="assets/images/products/single/'.$row[10].'" style="width:75%;display:none">
							<img class="mySlides" src="assets/images/products/single/'.$row[11].'" style="width:75%;display:none">

							<div class="product-image-gallery">
								<div class="product-gallery-item">
									<img class="demo" src="assets/images/products/single/'.$row[8].'" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
								</div>
								<div class="product-gallery-item">
									<img class="demo" src="assets/images/products/single/'.$row[9].'" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
								</div>
								<div class="product-gallery-item">
									<img class="demo" src="assets/images/products/single/'.$row[10].'" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
								</div>
								<div class="product-gallery-item">
									<img class="demo" src="assets/images/products/single/'.$row[11].'" style="width:100%;cursor:pointer" onclick="currentDiv(4)">
								</div>
							</div>

							<script>
							function currentDiv(n) {
							showDivs(slideIndex = n);
							}

							function showDivs(n) {
							var i;
							var x = document.getElementsByClassName("mySlides");
							var dots = document.getElementsByClassName("demo");
							if (n > x.length) {slideIndex = 1}
							if (n < 1) {slideIndex = x.length}
							for (i = 0; i < x.length; i++) {
								x[i].style.display = "none";
							}
							for (i = 0; i < dots.length; i++) {
								dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
							}
							x[slideIndex-1].style.display = "block";
							dots[slideIndex-1].className += " w3-opacity-off";
							}
							</script>
						</div><!-- End .row -->
					</div><!-- End .product-gallery -->
				</div><!-- End .col-md-6 -->

				<div class="col-md-6">
					<div class="product-details">
						<h1 class="product-title">'.$row[3].'</h1><!-- End .product-title -->

						<div class="ratings-container">
							<div class="ratings">
								<div class="ratings-val" style="width: 80%;"></div><!-- End .ratings-val -->
							</div><!-- End .ratings -->
							<a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
						</div><!-- End .rating-container -->

						<div class="product-price">
						&#8369;'.$row[4].'
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
							<a href="#" pid="'.$_SESSION["product_id"].'" id="product" title="Add to cart" class="btn-product btn-cart"><span>add to cart</span></a>
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
								<a href="https://www.facebook.com" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
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
					<a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Shipping & Returns</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Reviews ('.$num_reviews.')</a>
				</li>
			</ul>
			<div class="tab-content">
				<div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
					<div class="product-desc-content">
						<h3>Product Information</h3>
						<pre style="color: #777; font-family: sans-serif; font-size: 1.4rem; font-weight: 300; letter-spacing: 0;">
						'.$row[6].'
						</pre>
						
					</div><!-- End .product-desc-content -->
				</div><!-- .End .tab-pane -->
				<div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
					<div class="product-desc-content">
						<h3>Delivery & returns</h3>
						<p>We deliver to all places within Bicol Region. We accept cash on delivery and payment via GCash. There is an additional charge for meet-ups. If you have questions, please contact us through this <a href="contact.php">form</a> or you can message us through our <a href="https://www.facebook.com/YzElectronics" target="_blank"> YZ Electronics</a> page.<br>
						<br>We hope you’ll love every purchase, but if you ever need to return an item you can do so within a month of receipt.</p>
					</div><!-- End .product-desc-content -->
				</div><!-- .End .tab-pane -->
				<div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
					<div class="reviews">
						<h3>Reviews ('.$num_reviews.')</h3>
						';


	$sql = "SELECT * FROM reviews WHERE review_prod_id = '$_SESSION[product_id]'";
	$query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($query)){
			$stars    = $row['stars_number'];
			$date    = $row['review_date'];
			$comment   = $row['review_detail'];
			$username = $row['review_user_name'];
			$pro_title = $row['review_product_name'];

			echo '
				<div class="review">
					<div class="row no-gutters">
						<div class="col-auto">
							<h4>'.$username.'</h4>
							<div class="ratings-container">';
	
		for($i=0;$i<$stars;$i++)
		{
			echo '<span class="fa fa-star checked"></span>';
		}

		$unchecked = 5-$stars;

		for($i=0;$i<$unchecked;$i++)
		{
			echo '<span class="fa fa-star"></span>';
		}

		
			echo'
							</div><!-- End .rating-container -->
							<span class="review-date">'.$date.'</span>
						</div><!-- End .col -->
						<div class="col">
							<div class="review-content">
								<p>'.$comment.'</p>
							</div><!-- End .review-content -->
						</div><!-- End .col-auto -->
					</div><!-- End .row -->
				</div><!-- End .review -->
			';
	}

	echo '		
					</div><!-- End .reviews -->
				</div><!-- .End .tab-pane -->
			</div><!-- End .tab-content -->
		</div><!-- End .product-details-tab -->
		';
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

		echo '<div class="dropdown-cart-products">';
		$n=0;
		if (mysqli_num_rows($query) > 0) {
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
							<a href="#" pid="'.$product_id.'" id="show_product" title="Show product">'.$product_title.'</a>
							</h4>

							<span class="cart-product-info">
								<span class="cart-product-qty">'.$qty.' x</span>
								'.$product_price.'
							</span>
						</div><!-- End .product-cart-details -->

						<figure class="product-image-container">
							<a href="#" class="product-image" pid="'.$product_id.'" id="show_product" title="Show product">
								<img src="assets/images/products/'.$product_image.'" alt="Product image">
							</a>
						</figure>
						<a href="#" remove_id="'.$product_id.'" class="btn-remove remove" title="Remove Product"><i class="icon-close"></i></a>
					</div>
					';
				
			}
			?>
				<!--<a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a>-->
			<?php
		}
		else
		{
			echo '
			<div class="product">
				<div class="product-cart-details">
					<h4 class="product-title">
					<a href="#" id="show_product" title="Show product">Empty Cart</a>
					</h4>

					<span class="cart-product-info">
						<span class="cart-product-qty"></span>
						
					</span>
				</div><!-- End .product-cart-details -->

				<figure class="product-image-container">
				</figure>
			</div>
			';
		}

		echo '
		</div>
		<div class="dropdown-cart-action">';
	
		if($n>0)
		{
			echo '<a href="cart.php" class="btn btn-primary">View Cart</a>';
		}
		else
		{
			echo '<a href="category.php" class="btn btn-primary">Browse Products</a>';
		}
		echo '</div>';

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
											<a href="#" pid="'.$product_id.'" id="show_product" title="Show product">'.$product_title.'</a>
										</h3><!-- End .product-title -->
									</div><!-- End .product -->
								</td>
								<td class="price-col price" value="'.$product_price.'">&#8369;'.$product_price.'</td>
								<td class="quantity-col">
									<div class="cart-product-quantity">
										<input type="number" update_id="'.$product_id.'" class="form-control qty update" value="'.$qty.'" min="1" max="10" step="1" data-decimals="0" required>
									</div><!-- End .cart-product-quantity -->                                 
								</td>
								<td class="total"></td>
								<td class="remove-col"><a href="#" remove_id="'.$product_id.'" class="btn-remove remove" title="Remove Product"><i class="icon-close"></i></a></td>
							</tr>';
				}

				echo '
				</tbody>
								</table><!-- End .table table-wishlist -->

	                		</div><!-- End .col-lg-9 -->
	                		<aside class="col-lg-3">
	                			<div class="summary summary-cart">
	                				<h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

	                				<table class="table table-summary">
	                					<tbody>
	                						<tr class="summary-total">
	                							<td>Total:</td>
	                							<td class="net_total"></td>
	                						</tr><!-- End .summary-total -->
	                					</tbody>
	                				</table><!-- End .table table-summary -->';

				echo (isset($_SESSION["uid"])) ? '<a href="checkout.php" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>': '<a href="#signin-modal" data-toggle="modal" class="btn btn-outline-primary-2 btn-order btn-block">PROCEED TO CHECKOUT</a>';
	            echo '
	                			</div><!-- End .summary -->

		            			<a href="category.php" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
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


if (isset($_POST["finishCheckoutGcash"])) {
	$amount = preg_replace('/[.]/', '', $_POST["total_amount"]);
	$amount = (int)$amount;
	$client = new \GuzzleHttp\Client();

	$response = $client->request('POST', 'https://api.paymongo.com/v1/sources', [
	  'body' => '{"data":{"attributes":{"amount":'.$amount.',"redirect":{"success":"http://localhost/yz-electronics-shop/success.php","failed":"http://localhost/yz-electronics-shop/checkout.php"},"type":"gcash","currency":"PHP"}}}',
	  'headers' => [
		'accept' => 'application/json',
		'authorization' => 'Basic cGtfdGVzdF92Q1VQZWpuNnZ1WnRMS0ROeUNOTEN2SGI6c2tfdGVzdF9HZXhWZjdXMVlzZkdvODVmTkVBRXhMU0g=',
		'content-type' => 'application/json',
	  ],
	]);
	$data = json_decode($response->getBody(),true);
	$_SESSION["tx"] = $data['data']['id'];
	$_SESSION["payment_method"] = "paid";
	$key_value = $data['data']['attributes']['redirect']['checkout_url'];
	//header("Refresh:2; url=".$key_value);
	echo $key_value;
}

if (isset($_POST["finishCheckoutCOD"])) {
	$amount = (int)$_POST["total_amount"];

	$trxID = strval(time()) . generateRandomString();
	$_SESSION["tx"] = $trxID;

	$amount = number_format($amount);

	$_SESSION["payment_method"] = strval($amount).'.00';
	
	echo 'http://localhost/yz-electronics-shop/success.php';
}

function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


if(isset($_POST["shippingAdd"]))
{
	$sql = "SELECT address1 FROM user_info WHERE user_id = '$_SESSION[uid]'";
	$run_query = mysqli_query($con,$sql);
	$result = mysqli_fetch_assoc($run_query);
	echo $result["address1"]; 
}


if(isset($_POST["netTotal"]))
{
	$_SESSION["totalCart"] = $_POST["total"];
}


if(isset($_POST["checkOutCart"]))
{
	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.product_id,a.product_title,a.product_price,a.product_image,b.id,b.qty FROM products a,cart b WHERE a.product_id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}

	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query) > 0) {
		//display user cart item with "Ready to checkout" button if user is not login
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
					'<tr>
					<td>'.$product_title.'</td>
					<td>₱'.$product_price.' x '.$qty.'</td>
					</tr>
					';
			}

			echo '
				<tr class="summary-subtotal">
					<td>Subtotal:</td>
					<td>₱'.$_SESSION["totalCart"].'.00</td>
				</tr><!-- End .summary-subtotal -->
				<tr>
					<td>Shipping:</td>
					<td>Free shipping</td>
				</tr>
				<tr class="summary-total">
					<td>Total: ₱</td>
					<td><input type="text" id="total_amount" name="total_amount" value="'.$_SESSION["totalCart"].'.00" readonly></td>
				</tr><!-- End .summary-total -->
			';
	}
}


if(isset($_POST["showOrders"]))
{
    $sql = "SELECT o.order_id, o.product_id, o.qty, o.trx_id, o.order_status, o.payment_status, p.product_title, p.product_image, p.product_price FROM orders o JOIN products p ON o.product_id = p.product_id WHERE user_id = '$_SESSION[uid]'";
	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query) > 0) {
		# code...
		while ($row=mysqli_fetch_array($query)) {
			$order_id[] = $row["order_id"];
			$prod_price[] = $row["product_price"];
			$prod_payment[] = $row["payment_status"];
			$product_id[] = $row["product_id"];
			$product_title[] = $row["product_title"];
			$product_image[] = $row["product_image"];
			$status[] = $row["order_status"];
			$qty[] = $row["qty"];
		}

		for ($i=0; $i < count($prod_price); $i++) { 
			$price = preg_replace('/[,"₱"]/', '', $prod_price[$i]);
			$total = (int)$price * $qty[$i];
			$total = number_format($total);
			echo 
				'<tr>
					<td>x'.$qty[$i].'</td>
					<td><figure">
							<a href="#">
								<img src="assets/images/products/'.$product_image[$i].'" width="100px" alt="product">
							</a>
						</figure>
					</td>
					<td>'.$product_title[$i].'</td>';
					if($prod_payment[$i]=="paid")
					{
						echo '<td>'.$prod_payment[$i].'</td>';
					}
					else
					{
						echo '<td>₱'.$prod_payment[$i].'</td>';
					}

			if($status[$i]=="Delivered")
			{
				echo '<td>
				<a id="reviewBtn" href="#review-modal" data-toggle="modal" pid="'.$product_id[$i].'" pname="'.$product_title[$i].'" orderID="'.$order_id[$i].'" class="btn btn-primary">
					Received
				</a>
				</tr>';
			}
			else
			{
				echo '<td>'.$status[$i].'</td>
				</tr>';
			}
		}
	}
	else{
		echo '
		<p>No order has been made yet.</p>
		<a href="category.php" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
		';
	}
}


if(isset($_POST["submitRev"]))
{
	$numStars = $_POST["numberStars"];
	$orderID = $_POST["orderId"];
	$proID = $_POST["productId"];
	$proName = $_POST["productName"];
	$review = $_POST["reviewDets"];
	$date = date("m.d.y");  

	$user_id = $_SESSION["uid"];
	$user_name = $_SESSION["name"];

	$sql = "UPDATE orders SET order_status = 'Completed' WHERE order_id = '$orderID'";

	$result = mysqli_query($con,$sql);

	$sql = "INSERT INTO `reviews`
	(`review_prod_id`, `stars_number`, `review_date`, `review_detail`, `review_user_name`, `review_product_name`) 
	VALUES ('$proID','$numStars','$date','$review','$user_name','$proName')";
	$result = mysqli_query($con,$sql);
}


if(isset($_POST["searchProd"]))
{
	$_SESSION['searchEntry'] = $_POST["searchKey"];
}


if(isset($_POST["showCategories"]))
{
	$cat_query = "SELECT * FROM categories WHERE 1";
	$run_cat_query = mysqli_query($con,$cat_query);
	$i = 1;
	while($row_cat = mysqli_fetch_array($run_cat_query)){
		echo '
		<div class="filter-item">
			<div class="custom-control custom-checkbox">
				<input type="radio" class="custom-control-input cat_filter" id="cat-'.$i.'" cat_id="'.$row_cat['cat_id'].'" name="filter-search1">
				<label class="custom-control-label" for="cat-'.$i.'">'.$row_cat['cat_title'].'</label>
			</div>
		</div>';
		$i++;
	}
}

if(isset($_POST["showBrands"]))
{
	$cat_query = "SELECT * FROM brands WHERE 1";
	$run_cat_query = mysqli_query($con,$cat_query);
	$i = 1;
	while($row_cat = mysqli_fetch_array($run_cat_query)){
		echo '
			<div class="filter-item" >
				<div class="custom-control custom-checkbox">
					<input type="radio" class="custom-control-input brand_filter" id="brand-'.$i.'" brand_id="'.$row_cat['brand_id'].'" name="filter-search2">
					<label class="custom-control-label" for="brand-'.$i.'">'.$row_cat['brand_title'].'</label>
				</div>
			</div>';
		$i++;
	}
}


?>






