<?php
    session_start();
	include_once("db.php");

    $trx_id = $_SESSION["tx"];
	$p_status = $_SESSION["payment_method"];



    $sql = "SELECT p_id,qty FROM cart WHERE user_id = '$_SESSION[uid]'";
	$query = mysqli_query($con,$sql);
	if (mysqli_num_rows($query) > 0) {
		# code...
		while ($row=mysqli_fetch_array($query)) {
		$product_id[] = $row["p_id"];
		$qty[] = $row["qty"];
		}

		for ($i=0; $i < count($product_id); $i++) { 
			$sql = "INSERT INTO orders (user_id,product_id,qty,trx_id,order_status,payment_status) VALUES ('$_SESSION[uid]','".$product_id[$i]."','".$qty[$i]."','$trx_id','Pending','$p_status')";
			mysqli_query($con,$sql);
		}
	}
    $_SESSION["ordered"] = true;
    header("Location:dashboard.php");
?>