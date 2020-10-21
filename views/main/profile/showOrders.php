<?php
include '../../../utilities/connectToDatabase.php';
session_start();
$tempUser = $_SESSION['UserInfo']['UserID'];
$getOrdersSql = 
"SELECT `products`.`ProductName`, `orderdetail`.`Price`, `orderdetail`.`Quantity` 
FROM `orders`
JOIN `orderdetail`
	ON `orderdetail`.`OrderID` = `orders`.`OrderID`
JOIN `products`
	ON `products`.`ProductID` = `orderdetail`.`ProductID`
    WHERE `orders`.`UserID` = '$tempUser'
    ORDER BY `orders`.`CreateTime` DESC
    LIMIT 15    
";

$orders = mysqli_query($conn, $getOrdersSql);

echo '<h4 class="mb-3">Lastest Orders</h4>';
echo '
    <div class="row">
        <div class="col-lg-4">
            <h6>Product Name</h6>
        </div>
        <div class="col-lg-4">
            <h6>Price</h6>
        </div>
        <div class="col-lg-4">
            <h6>Quantity</h6>
        </div>   
    </div>
    <hr>';
while ($order = mysqli_fetch_array($orders)) {

    echo '
    <div class="row">
        <div class="col-lg-4">
            <h6>'.$order['ProductName'].'</h6>
        </div>
        <div class="col-lg-4">
            <h6>'.$order['Price'].'</h6>
        </div>
        <div class="col-lg-4">
            <h6>'.$order['Quantity'].'</h6>
        </div>   
    </div>';
}
