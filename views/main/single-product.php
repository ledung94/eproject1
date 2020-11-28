<?php
    include '../../utilities/_main_header.php';
    include '../../utilities/connectToDatabase.php';

    if(isset($_GET['action']) && $_GET['action']=="viewProductDetail"){ 
		$id=$_GET['id']; 
        $sql="SELECT * FROM products 
            WHERE ProductID='{$id}'"; 
        $query=mysqli_query($conn,$sql); 
        if(mysqli_num_rows($query)!=0){ 
            $row=mysqli_fetch_array($query); 
        }else{         
            $message="This product id it's invalid!";            
         }   
    }
?>

<div class="hero-wrap hero-bread" style="background-image: url('../../templates/main/images/bg_1.jpg');">
    <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
        <h1 class="mb-0 bread">Product Single</h1>
        </div>
    </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="<?php echo $row['Image'] ?>" class="image-popup"><img src="<?php echo $row['Image'] ?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?php echo $row['ProductName'] ?></h3>
                <div class="rating d-flex">

                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>

                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
                    </p>

                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;">
                        <?php 
                            $sql = "SELECT Quantity FROM orderdetail WHERE ProductID='{$id}'";
                            $query_s = mysqli_query($conn,$sql); 
                            if(mysqli_num_rows($query_s)!=0){ 
                                $sold = 0;
                                while($row_s=mysqli_fetch_array($query_s)){
                                    $sold += $row_s['Quantity'];
                                }
                                echo $sold;
                            } else echo "0";
                        ?>
                            <span style="color: #bbb;">Sold</span></a>
                    </p>

                </div>

                <p class="price">
                    <span>$<?php echo $row['Price'] ?></span>
                    <small class="text-muted">(Discount <?php echo $row['Discount']*100 ?>%)</small>
                </p>

                <p><?php echo $row['Description'] ?></p>
                <div class="row mt-4">

                    <div class="w-100"></div>

                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                                <i class="ion-ios-remove"></i>
                             </button>
                        </span>

                        <input type="text" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max=<?php echo $row['Amount'] ?>>

                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>

                    <div class="w-100"></div>
                
                    <div class="col-md-12">
                        <p style="color: #000;"><?php echo $row['Amount'] ?> kg available</p>
                    </div>
                </div>

                <p>
                    <a id="addButton" href="/eproject1/views/main/cart.php?action=add&id=<?php echo $row['ProductID'] ?>" class="btn btn-black py-3 px-5">Add to Cart</a>

                    <a href="/eproject1/views/main/shop.php" class="btn btn-black py-3 px-5">Back</a>
                </p>

            </div>
        </div>
    </div>
</section>

<!-- Related prod -->
<section class="ftco-section">
    <div class="container">
            <div class="row justify-content-center mb-3 pb-3">
        <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Products</span>
        <h2 class="mb-4">Related Products</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
        </div>
    </div>   		
    </div>
    <div class="container">
        <div class="row">
            <?php 
                $sql = "SELECT * FROM products WHERE Category IN ( SELECT Category FROM products WHERE ProductID = '$id')";
                $query_s = mysqli_query($conn,$sql); 
                if(mysqli_num_rows($query_s)!=0){ 
                    while($row_s=mysqli_fetch_array($query_s)){
            ?>

                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">

                        <a class="img-prod" href="#">
                            <img class="img-fluid" src="<?php echo $row_s['Image'] ?>" alt="Colorlib Template">
                            <span class="status"><?php echo $row_s['Discount']*100 ?>%</span>
                            <div class="overlay"></div>
                        </a>

                        <div class="text py-3 pb-4 px-3 text-center">

                            <h3><a href="#"><?php echo $row_s['ProductName'] ?></a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">$<?php echo $row_s['Price'] ?>.00</span><span class="price-sale">$<?php echo $row_s['Price']*(1 - $row_s['Discount']) ?>.00</span></p>
                                </div>
                            </div>
                        

                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">

                                    <a href="shop.php?action=add&id=<?php echo $row_s['ProductID'] ?>&category=<?php echo $category; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>

                                    <a href="/eproject1/views/main/cart.php?action=buynow&id=<?php echo $row_s['ProductID'] ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    
                                    <a href="/eproject1/views/main/single-product.php?action=viewProductDetail&id=<?php echo $row_s['ProductID'] ?>" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-add-circle-outline"></i></span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
                    }
                } 
            ?>
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

<?php 
include '../../utilities/_main_footer.php';
?>
<script>
      $(document).ready(function () {
        var quantitiy = 0;        
        console.log($("#quantity").attr("max"));
        $(".quantity-right-plus").click(function (e) {
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($("#quantity").val());

          // Increment
          if(quantity < parseInt($("#quantity").attr("max"))){
            $("#quantity").val(quantity + 1);
          }

          var quantity = parseInt($("#quantity").val());

          document.cookie = "quantity = " + quantity;
        });

        $(".quantity-left-minus").click(function (e) {
          // Stop acting like a button
          e.preventDefault();
          // Get the field name
          var quantity = parseInt($("#quantity").val());

          // Decrement
          if (quantity > 0) {
            $("#quantity").val(quantity - 1);
          } 

          var quantity = parseInt($("#quantity").val());

          document.cookie = "quantity = " + quantity;
        });

      });
</script>