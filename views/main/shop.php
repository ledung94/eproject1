<?php
    session_start();
    include '../../utilities/connectToDatabase.php';
    $category = 'All';
    // Add item to cart
    if(isset($_GET['action']) && $_GET['action']=="add"){ 
      $id=$_GET['id']; 
      $category = $_GET['category'];
      if(isset($_SESSION['cart'][$id])){ 
          $_SESSION['cart'][$id]['quantity']++; 
          $_SESSION['cart'][$id]['amount']--; 
      }else{ 
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
    
    //Category
    if(isset($_GET['action']) && $_GET['action']=="category"){ 
      $category = $_GET['category'];
    }

    if(isset($_GET['page'])&&isset($_GET['category'])){
      $current_page = $_GET['page'];
      $category = $_GET['category'];
    } else {
      $current_page = 1;
    }

    // pagination
    if($category == 'All'){
      $result_s = mysqli_query($conn, "select count(ProductID) as total from products");
    } else {
      $result_s = mysqli_query($conn, "select count(ProductID) as total from products WHERE Category = '$category'");
    }
    $row_s = mysqli_fetch_assoc($result_s);
    $total_records = $row_s['total'];
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $limit = 8;

    $total_page = ceil($total_records / $limit);

    if ($current_page > $total_page){
      $current_page = $total_page;
    }
    else if ($current_page < 1){
        $current_page = 1;
    }

    $start = ($current_page - 1) * $limit;


    include '../../utilities/_main_header.php';
?>

<!-- Background -->
<div class="hero-wrap hero-bread" style="background-image: url('../../templates/main/images/bg_1.jpg');">
  <div class="container">
    <div class="row no-gutters slider-text align-items-center justify-content-center">
      <div class="col-md-9 ftco-animate text-center">
        <p class="breadcrumbs"><span class="mr-2"><a href="home.php">Home</a></span> <span>Products</span></p>
        <h1 class="mb-0 bread">Products</h1>
      </div>
    </div>
  </div>
</div>

<!-- List products -->
<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 mb-5 text-center">
        <ul class="product-category">
          <li><a href="/eproject1/views/main/shop.php?action=category&category=All" class="<?php if($category=='All') echo "active" ?>">All</a></li>
          <?php 
            $sql_r = "SELECT DISTINCT Category FROM `Products` ORDER BY Category DESC";
            $resp = mysqli_query($conn,$sql_r);
            if(mysqli_num_rows($resp) != 0){
              while($row = mysqli_fetch_array($resp)){
          ?>
          <li><a href="/eproject1/views/main/shop.php?action=category&category=<?php echo $row['Category'] ?>" class="<?php if($category==$row['Category']) echo "active" ?>"><?php echo $row['Category'] ?></a></li>


          <?php
              };

            }
          ?>
        </ul>
      </div>
        </div>
    <div class="row">
      <?php 
        if($category == 'All'){
          $sql = "SELECT * FROM products LIMIT $start, $limit";
        } else {
          $sql = "SELECT * FROM products WHERE Category = '$category' LIMIT $start, $limit";
        }

        $query = mysqli_query($conn,$sql); 
        while ($row=mysqli_fetch_array($query)) { 
              
      ?> 
      
        <div class="col-md-6 col-lg-3 ftco-animate">
          <div class="product">

            <a class="img-prod" href="#">
              <img class="img-fluid" src="<?php echo $row['Image'] ?>" alt="Colorlib Template">
              <span class="status"><?php echo $row['Discount']*100 ?>%</span>
              <div class="overlay"></div>
            </a>

            <div class="text py-3 pb-4 px-3 text-center">

              <h3><a href="#"><?php echo $row['ProductName'] ?></a></h3>
              
              <div class="d-flex">
                <div class="pricing">
                  <p class="price"><span class="mr-2 price-dc">$<?php echo $row['Price'] ?>.00</span><span class="price-sale">$<?php echo $row['Price']*(1 - $row['Discount']) ?>.00</span></p>
                </div>
              </div>

              <div class="bottom-area d-flex px-3">
                <div class="m-auto d-flex">

                  <a href="shop.php?action=add&id=<?php echo $row['ProductID'] ?>&category=<?php echo $category; ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                    <span><i class="ion-ios-menu"></i></span>
                  </a>

                  <a href="/eproject1/views/main/cart.php?action=buynow&id=<?php echo $row['ProductID'] ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                    <span><i class="ion-ios-cart"></i></span>
                  </a>
                
                  <a href="/eproject1/views/main/single-product.php?action=viewProductDetail&id=<?php echo $row['ProductID'] ?>" class="heart d-flex justify-content-center align-items-center ">
                  <span><i class="ion-ios-add-circle-outline"></i></span>
                  </a>

                </div>
              </div>
            </div>
          </div>
        </div>
      <?php      
          }   
      ?> 


      <!-- Pagination -->
    </div>
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <?php 
              if ($current_page > 1 && $total_page > 1){
                echo '<li><a href="shop.php?category='.$category.'&page='.($current_page-1).'">&lt;</a></li>';
              }

              for ($i = 1; $i <= $total_page; $i++){
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page){
                    echo '<li class="active"><span>'.$i.'</span></li>';
                }
                else{
                    echo '<li><a href="shop.php?category='.$category.'&page='.$i.'">'.$i.'</a></li>';
                }
              } 

              if ($current_page < $total_page && $total_page > 1){
                echo '<li><a href="shop.php?category='.$category.'&page='.($current_page+1).'">&gt;</a></li>';
              }
            ?>
          </ul>
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
