<?php 
	session_start();
	include '../../utilities/connectToDatabase.php';
	$flag = true;
	if($_SERVER["REQUEST_METHOD"] == 'POST') {
		if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0){
			$flag = false;
			$fisrtName = $_POST['firstName'];
			$lastName = $_POST['lastName'];
			$CusName = $fisrtName." ".$lastName;
			$address = $_POST['address'];
			$phone = $_POST['phone'];
			$mail = $_POST['mail'];
			$payment = $_POST['paymentMethod'];
			$totalprice = 0; 
			$orderID = "SOF".time();
			$userID = $_SESSION['UserInfo']['UserID'];
			$createTime = date('Y-m-d H:i:s');
			$status = "Waiting";
			
			foreach($_SESSION['cart'] as $id => $value) { 
				$price = $value['price']*(1-$value['discount']);
				$quantity = $value['quantity'];
				$totalprice += $price * $quantity*1.1;
				// Update orderdetail
				$sql = "INSERT INTO `orderdetail`(`OrderID`, `ProductID`, `Price`, `Quantity`) VALUES ('$orderID','$id','$price','$quantity')";
				$query = mysqli_query($conn,$sql);

				// Update products amount
				$sql = "UPDATE products SET Amount = Amount - $quantity WHERE ProductID = '$id'";
				$query = mysqli_query($conn,$sql);
			} 
			// Save cart -> order
			$sql = "INSERT INTO `orders`(`OrderID`, `UserID`,`Address`,`Phone`, `CreateTime`, `OrderStatus`,`Payment`,`TotalPrice`) VALUES ('$orderID','$userID','$address','$phone','$createTime','$status','$payment','$totalprice')";
			$query = mysqli_query($conn,$sql); 
			//Update user info
			if(isset($_POST['checkbox']) && !empty($_POST['checkbox'])){
				$sql = "UPDATE `users` SET `FirstName`='$fisrtName', `Lastname`='$lastName', `Phone`='$phone', `Address`='$address', `Mail`='$mail' WHERE UserID = '$userID'";
				$query = mysqli_query($conn,$sql);
			}
			// unset session cart
			unset($_SESSION['cart']);
		} else echo '<script>alert("There are nothing in your cart")</script>';
	}		
	include '../../utilities/_main_header.php';

	
	if(isset($_SESSION['cart'])&&$cartCount > 0){
		$sql = "SELECT * FROM products WHERE ProductID IN (";
			foreach($_SESSION['cart'] as $id => $value) { 
				$sql .= "'" . $id. "'" . ","; 
			} 	
		$sql = substr($sql, 0, -1).")"; 
		$query = mysqli_query($conn,$sql); 
		$totalprice = 0; 
		while($row = mysqli_fetch_array($query)){ 
			$subtotal = $_SESSION['cart'][$row['ProductID']]['quantity']*$row['Price']*(1-$row['Discount']); 
			$totalprice += $subtotal;
		}
	}
?>


<div class="hero-wrap hero-bread" style="background-image: url('../../templates/main/images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
				<p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Checkout</span></p>
				<h1 class="mb-0 bread">Checkout</h1>
			</div>
		</div>
	</div>
</div>

<!-- Checkout -->
<?php if($flag == true){ ?>
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-7 ftco-animate">
				<!-- form -->
				<h4 class="mb-3">Billing Details</h4>
				<form class="needs-validation" action="/eproject1/views/main/checkout.php" method="POST">
						<div class="row">	
						<div class="col-md-6 mb-3">
							
							<label for="firstName">First name</label>
							<input type="text" <?php if(!empty($_SESSION['UserInfo']['FirstName'])) { ?>readonly <?php } ?> class="form-control" name="firstName"  value="<?php echo $_SESSION['UserInfo']['FirstName']; ?>" required>
							<div class="invalid-feedback">
							Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Last name</label>
							<input type="text" <?php if(!empty($_SESSION['UserInfo']['FirstName'])) { ?>readonly <?php } ?> class="form-control" name="lastName" value="<?php echo $_SESSION['UserInfo']['LastName']; ?>" required>
							<div class="invalid-feedback">
							Valid last name is required.
							</div>
						</div>
						</div>

						

						<div class="mb-3">
						<label for="phone">Phone</label>
						<input type="tel" class="form-control" name="phone" value="<?php echo $_SESSION['UserInfo']['Phone']; ?>">
						<small class="form-text text-muted">You can change phone number.</small>
						</div>

						

						<div class="mb-3">
						<label for="address">Address</label>
						<input type="text" class="form-control" name="address" value="<?php echo $_SESSION['UserInfo']['Address']; ?>" required="">
						<small class="form-text text-muted">You can change address.</small>
						</div>

						<div class="mb-3">
	                		<div class="form-group">
	                			<label for="emailaddress">Email Address</label>
	                  			<input type="text" class="form-control" name="mail" value="<?php echo $_SESSION['UserInfo']['Mail']; ?>" required="">
	                		</div>
                		</div>
						
						<div class="row mb-3">
							<div class="col-12">
							<div class="form-check">
								<input type="checkbox" class="form-check-input" name="checkbox[]"  value="1">
								<label class="form-check-label">Save this infomation for next time</label>
							</div>
							</div>
						</div>

						<h4 class="mb-3">Payment</h4>

						<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="Cash" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="" value="Cash">
							<label class="custom-control-label" for="Cash">Cash</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="Credit" name="paymentMethod" type="radio" class="custom-control-input" required="" value="Credit">
							<label class="custom-control-label" for="Credit">Credit card</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="ATM" name="paymentMethod" type="radio" class="custom-control-input" required="" value="ATM">
							<label class="custom-control-label" for="ATM">ATM</label>
						</div>
						</div>

						
						
						<hr class="mb-4">
						<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
				</form>
			</div>
				<!-- End -->
					
			<div class="col-xl-5">
				<div class="row mt-5 pt-3">
					<div class="col-md-12 d-flex mb-5">
						<div class="cart-detail cart-total p-3 p-md-4">
							<h3 class="billing-heading mb-4">Your cart</h3>
								<?php if(isset($_SESSION['cart'])&&$cartCount > 0){
									foreach($_SESSION['cart'] as $id => $value) { ?>
									<p class="d-flex">
										<span><?php echo $value['productName'] ?></span>
										$
										<span><?php echo $value['price']*(1 - $value['discount'])." x ".$value['quantity'] ?></span>
									</p>
								<?php }} ?>
								<hr>
								<p class="d-flex">
									<span>Total</span>
									$
									<span>
										<?php 
											if(isset($_SESSION['cart'])&&$cartCount > 0){
												echo $totalprice;
											} else
											echo 0;
										?>
										
									</span>
								</p>

								<p class="d-flex">
									<span>Tax (10%)</span>
									$
									<span>
										<?php 
											if(isset($_SESSION['cart'])&&$cartCount > 0){
												echo $totalprice * 0.1;
											} else
											echo 0;
										?>
										
									</span>
								</p>
								<hr>
								<p class="d-flex">
									<span>Total (include tax)</span>
									$
									<span>
										<?php 
											if(isset($_SESSION['cart'])&&$cartCount > 0){
												echo $totalprice * 1.1;
											} else
											echo 0;
										?>
									</span>
								</p>
						</div>
					</div>
				</div>
			</div>
        </div> 
    </div>   
</section> 

<!-- Email -->
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
	<div class="container py-4">
	<div class="row d-flex justify-content-center py-5">
		<div class="col-md-6">
		<h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
		<span>Get e-mail updates about our latest shops and special offers</span>
		</div>
		<div class="col-md-6 d-flex align-items-center">
		<form action="#" class="subscribe-form">
			<div class="form-group d-flex">
			<input type="text" class="form-control" placeholder="Enter email address">
			<input type="submit" value="Subscribe" class="submit px-3">
			</div>
		</form>
		</div>
	</div>
	</div>
</section>
<?php } else { ?>

<!-- Done checkout -->
<br>
<br>
<h3 class="text-center">Thanks for your order</h3>
<br>
<h4 class="text-center">Order Confirmation</h4>
<section class="ftco-section ftco-cart">
	<div class="row justify-content-center">
	<div class="cart-wrap col-3 ftco-animate">
			<div class="cart-total mb-3 bg-light">
				<h3>Order Info</h3>
				<hr>
				<p class="d-flex">
					<span>Order Id</span>
					<span><?php echo $orderID; ?></span>
				</p>

				<p class="d-flex">
					<span>Name</span>
					<span><?php echo $CusName; ?></span>
				</p>

				<p class="d-flex">
					<span>Address</span>
					<span><?php echo $address; ?></span>
				</p>

				<p class="d-flex">
					<span>Phone</span>
					<span><?php echo $phone; ?></span>
				</p>

				<p class="d-flex">
					<span>Total</span>
					<span>$<?php echo $totalprice; ?></span>
				</p>

				<p class="d-flex">
					<span>Order Status</span>
					<span><?php echo $status; ?></span>
				</p>

			</div>
		</div>
		<div class="row">
				<div class="col-md-12 ftco-animate">
						<table class="table">
						<thead class="bg-light">
							<tr class="text-center">
							<th colspan="4">Order Detail (<?php echo $orderID; ?>)</th>
							<!-- <th>&nbsp;</th>
							<th>Product name</th>
							<th>Price</th>
							<th>Quantity</th> -->
							</tr>
						</thead>
						<tbody>
						<?php 
							$sql = "SELECT * FROM orderdetail WHERE OrderID = '$orderID'";
							$query=mysqli_query($conn,$sql); 
							while($row = mysqli_fetch_array($query)){ 
							$prdID = $row['ProductID'];
							$sql = "SELECT * FROM products WHERE ProductID = '$prdID'";
							$query_s = mysqli_query($conn,$sql); 
							$row_s = mysqli_fetch_array($query_s);
						?>
							<tr class="text-center">						
								<td class="image-prod"><div class="img" style="background-image:url(<?php echo $row_s['Image'] ?>);"></div></td>
								
								<td class="product-name">
									<h3><?php echo $row_s['ProductName']; ?></h3>
								</td>
								
								<td class="price">$<?php echo $row['Price'] ?></td>
								
								<td class="quantity">
									<?php echo $row['Quantity'] ?>
								</td>
							</tr>
						<?php
							}
						?>
						</tbody>
						</table>
				</div>
		</div>
		<!-- Cart total -->
		
	</div>
</section>
<div class="container" style="margin-bottom:5rem">
	<div class="row justify-content-center">
		<a class="btn btn-primary py-3 px-4" href="/eproject1/views/main/shop.php">Continue shopping</a>
	</div>
</div>

<?php } ?>
<?php 
    include '../../utilities/_main_footer.php';
?>