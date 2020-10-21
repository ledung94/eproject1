<?php
	session_start();
	// Header
	include '../../utilities/connectToDatabase.php';

	// Add item to cart 
	if(isset($_COOKIE['quantity'])){
		$quantity =  $_COOKIE['quantity'];
	}
	
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		$id=$_GET['id']; 
		if(isset($_SESSION['cart'][$id])){ 
			$_SESSION['cart'][$id]['quantity'] += $quantity; 
			$_SESSION['cart'][$id]['amount']--; 
		} else { 
			$sql="SELECT * FROM products 
				WHERE ProductID='{$id}'"; 
			$query=mysqli_query($conn,$sql); 
			if(mysqli_num_rows($query)!=0){ 
				$row=mysqli_fetch_array($query); 
				$_SESSION['cart'][$row['ProductID']]=array( 
						"quantity" => $quantity, 
						"discount" => $row['Discount'],
						"productName" => $row['ProductName'],
						"price" => $row['Price'],
						"amount" => $row['Amount'] - $quantity
					); 
			
			} else {         
				$message="This product id it's invalid!";            
			}   
		}  
	} 

	//login
	if($_SERVER["REQUEST_METHOD"] == 'POST') {
        $userName = $_POST['userName'];
        $userPassword = $_POST['userPassword'];
        // encrypt + decrypt/hash
        $hashedUserPassword = md5($userPassword);
        $sql = "select * from Users where UserName = '$userName' and Password = '$hashedUserPassword'";
        $resp = mysqli_query($conn, $sql);
        if($resp) {
            // print_r($resp);
            if(mysqli_num_rows($resp) > 0) {
                $row=mysqli_fetch_array($resp); 
                $_SESSION['UserInfo'] = array(
                    'isLoggedIn' => true,
                    'UserID' => $row['UserID'],
                    'UserName' => $row['UserName'],
                    'FirstName' => $row['FirstName'],
                    'LastName' => $row['LastName'],
                    'Phone' => $row['Phone'],
                    'Mail' => $row['Mail'],
                    'Address' => $row['Address'],
                );
                header('Location: checkout.php');
			} else echo '<script>alert("Invalid user name or password")</script>'; 
		} else echo '<script>alert("Invalid user name or password")</script>'; 

    }
	//buy now
	if(isset($_GET['action']) && $_GET['action']=="buynow"){ 
		$id=$_GET['id']; 
		if(isset($_SESSION['cart'][$id])){ 
			$_SESSION['cart'][$id]['quantity']++; 
			$_SESSION['cart'][$id]['amount']--; 
        } else { 
			$sql="SELECT * FROM products 
                WHERE ProductID='{$id}'"; 
            $query=mysqli_query($conn,$sql); 
            if(mysqli_num_rows($query)!=0){ 
                $row=mysqli_fetch_array($query); 
                $_SESSION['cart'][$row['ProductID']]=array( 
                        "quantity" => 1, 
                        "discount" => $row['Discount'],
                        "productName" => $row['ProductName'],
						"price" => $row['Price'],
						"amount" => $row['Amount']-1
                    ); 
            }else{         
                $message="This product id it's invalid!";            
            }   
		}
	}
	// Remove item
	if(isset($_GET['action']) && $_GET['action']=="remove"){ 
		$id=$_GET['id']; 
		if(isset($_SESSION['cart'][$id])){ 
			unset($_SESSION['cart'][$id]);
		}
	}
	// decrease quantity
	if(isset($_GET['action']) && $_GET['action']=="decrease"){ 
		$id=$_GET['id']; 
		if($_SESSION['cart'][$id]['quantity'] > 0){ 
			$_SESSION['cart'][$id]['quantity']--;
			$_SESSION['cart'][$id]['amount']++; 
			if($_SESSION['cart'][$id]['quantity'] == 0) {
				unset($_SESSION['cart'][$id]);
			}
		} 
		
	}

	// increase quantity
	if(isset($_GET['action']) && $_GET['action']=="increase"){ 
		$id=$_GET['id']; 
		if($_SESSION['cart'][$id]['amount'] > 0){ 
			$_SESSION['cart'][$id]['quantity']++; 
			$_SESSION['cart'][$id]['amount']--; 

		}
		
	}
	include '../../utilities/_main_header.php';
	
?>
<!-- Body -->
<div class="hero-wrap hero-bread" style="background-image: url('../../templates/main/images/bg_1.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text align-items-center justify-content-center">
			<div class="col-md-9 ftco-animate text-center">
			<p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Cart</span></p>
			<h1 class="mb-0 bread">My Cart</h1>
			</div>
		</div>
	</div>
</div>
	<!-- Item list -->
<section class="ftco-section ftco-cart">
	<div class="row justify-content-center">
		<div class="row">
				<div class="col-md-12 ftco-animate">
						<table class="table">
							<thead class="bg-light">
								<tr class="text-left">
									<th colspan="6">Your Cart (<?php echo $cartCount ?> item<?php if($cartCount > 1) echo "s" ?>)</th>
								</tr>
							</thead>
						<?php 
						// Get item to cart
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
						?> 
							<tbody>
								<tr class="text-center">
									<td class="product-remove"><a href="/eproject1/views/main/cart.php?action=remove&id=<?php echo $row['ProductID'] ?>"><span class="ion-ios-close"></span></a></td>

									<td class="image-prod"><div class="img" style="background-image:url(<?php echo $row['Image'] ?>);"></div></td>
									
									<td class="product-name">
										<?php echo $row['ProductName']; ?>
										<small id="emailHelp" class="form-text text-muted">There are only <?php echo $_SESSION['cart'][$row['ProductID']]['amount'] ?> items</small>
									</td>
									
									<td class="price">$<?php echo $row['Price']*(1-$row['Discount']) ?></td>
									
									<td class="quantity">
										<div class="input-group mb-3">

											<a href="/eproject1/views/main/cart.php?action=decrease&id=<?php echo $row['ProductID'] ?>" class="form-control" style="padding-top: 15px">-</a>

											<input type="text" readonly class="quantity form-control input-number" name="quantity[<?php echo $row['ProductID'] ?>]" value="<?php echo $_SESSION['cart'][$row['ProductID']]['quantity'] ?>" />

											<a href="/eproject1/views/main/cart.php?action=increase&id=<?php echo $row['ProductID'] ?>" class="form-control" style="padding-top: 15px">+</a>

										</div>
									</td>
								</tr>
							</tbody>
						<?php		
								}
							} else {
						?>
							<tbody>
								<tr>
									<td colspan="6">
									There are no items in your shopping cart.
									<br>
									<br>
									<a class="btn btn-primary py-3 px-4" href="/eproject1/views/main/shop.php">Continue shopping</a>
									</td>
								</tr>
							</tbody>
						<?php		
							}
						?> 
						</table>
				</div>
		</div>
		<!-- Cart total -->
		<div class="cart-wrap col-3 ftco-animate">
			<div class="cart-total mb-3 bg-light">
				<h3>Cart Total</h3>
				<p class="d-flex">
					<span>Subtotal</span>
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
				<p class="d-flex ">
					<span>Total</span>
					$
					<span>
						<?php 
							if(isset($_SESSION['cart'])&&$cartCount > 0){
								echo $totalprice * 1.1;
							} else
							echo "0";
						?>
					</span>
				</p>
			</div>
			<p><a href="/eproject1/views/main/checkout.php" class="btn btn-primary py-3 px-4" data-toggle="<?php if(!isset($_SESSION['UserInfo'])) echo "modal";  ?>" data-target="#checkout">Proceed to Checkout</a></p>
		</div>
	</div>
</section>

<!-- Modal login -->
<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Please sign in before checkout</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<div class="modal-body">
			<form action="" method="POST">
				<div class="form-group">
					<label>User Name</label>
					<input type="text" class="form-control" name="userName" id="userName">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" name="userPassword" id="userPassword">
				</div>
				<button type="submit" class="btn btn-primary" onclick="validate(event)">Login</button>
				<ul class="login-more mt-35">
				<li class="m-b-8">
						<span class="txt1">
							Forgot
						</span>

						<a href="forgot.php" class="txt2">
							Username / Password?
						</a>
					</li>

					<li>
						<span class="txt1">
							Don’t have an account?
						</span>

						<a href="register.php" class="txt2">
							Sign up
						</a>
					</li>
				</ul>
			</form>

		</div>
		</div>
	</div>
</div>

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
<!-- Footer -->
<?php
    include '../../utilities/_main_footer.php';
?>

