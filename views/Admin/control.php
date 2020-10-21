<?PHP 
    session_start();
    $data=[];
    include '../../utilities/connectToDatabase.php';
// Post REQUEST_METHOD
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $discount = 0;
        $action = $_POST['action'];
        if($action =='create'){
            $prodName= $_POST['name'];
            $prodAmount=$_POST['amount'];
            $prodDesc=$_POST['desc'];
            $prodPrice=$_POST['price'];
            if(isset($_POST['discount']) && $_POST['discount']!= ""){
              $discount=$_POST['discount'];
            }
            $prodType=$_POST['prodType'];
            $idProd = mb_substr($prodType, 0, 1, "UTF-8").date("YmdHis");
            if(isset($_FILES['inputImg'])){
              if($_FILES['inputImg']['error']== 0 && $_FILES["inputImg"]["size"] > 0)
              {
                $newFileName = str_replace(' ','',$prodName).date('Y-m-d').'.png';
                move_uploaded_file($_FILES['inputImg']['tmp_name'], '../../utilities/media/' . $newFileName);
                $path='../../utilities/media/' . $newFileName;
                $sqlCmd="INSERT INTO `products` (`ProductID`, `ProductName`, `Price`, `Discount`, `Amount`, `Description`, `Category`, `Image`) 
                          VALUES ('$idProd', '$prodName', $prodPrice, $discount,  $prodAmount, '$prodDesc', '$prodType', '$path')";
                $response = mysqli_query($conn,$sqlCmd);
                echo $response;
              }
            }
        }
        else if ($action =='edit'){
            $prodId=$_POST['idProd'];
            $prodName= $_POST['name'];
            $prodAmount=$_POST['amount'];
            $prodDesc=$_POST['desc'];
            $prodPrice=$_POST['price'];
            if(isset($_POST['discount'])){
              $discount=$_POST['discount'];
            }
            $prodType=$_POST['prodType'];
            if(isset($_FILES['inputImg'])){
              if($_FILES['inputImg']['error']== 0 && $_FILES["inputImg"]["size"] > 0)
              {
                $newFileName = str_replace(' ','',$prodName).date('Y-m-d').'.png';
                move_uploaded_file($_FILES['inputImg']['tmp_name'], '../../utilities/media/' . $newFileName);
                $path='../../utilities/media/' . $newFileName;
                $sqlCmd="UPDATE `eproject1`.`products` 
                SET `ProductName` = '$prodName', `Price` = '$prodPrice', `Discount` = '$discount',`Amount` = '$prodAmount', `Description` = '$prodDesc', `Category` = '$prodType', `Image` = ' $path' 
                WHERE (`ProductID` = '$prodId');";
                $response = mysqli_query($conn,$sqlCmd);
                echo $response;
              }
            }
            else{
              $sqlCmd="UPDATE `eproject1`.`products` 
              SET `ProductName` = '$prodName', `Price` = '$prodPrice', `Discount` = '$discount',`Amount` = '$prodAmount', `Description` = '$prodDesc', `Category` = '$prodType'
              WHERE (`ProductID` = '$prodId');";
              $response = mysqli_query($conn,$sqlCmd);
              echo $response;
            }
        }
        else if ($action =='delete'){
          $prodId=$_POST['idProd'];
          $sqlCmd ="DELETE FROM `eproject1`.`products` WHERE (`ProductID` = '$prodId');";
          $response = mysqli_query($conn,$sqlCmd);
          echo $response;
        }
        else if ($action =='updateStatus'){
          $id=$_POST['id'];
          $status=$_POST['status'];
          $sqlCmd ="UPDATE `eproject1`.`orders` SET `OrderStatus` = '$status' WHERE (`OrderID` = '$id');";
          $response = mysqli_query($conn,$sqlCmd);
          echo $response ;
        }
        else if ($action =='login'){
          $username = $_POST['userName'];
          $password = $_POST['pass'];
          if($username == "admin" && $password == "admin"){
            echo 1;
          }
          else echo 0;
        }
    }

// Get REQUEST_METHOD
    if($_SERVER['REQUEST_METHOD']=='GET'){
      $action = $_GET['action'];
      $sqlCmd ='';
      if($action == 'getProdRecord'){
        if(isset($_GET['id']) && $_GET['id'] != ''){
          $id = $_GET['id'];
          $search='';
        //if(isset($_GET['search'])){
        //  $search = $_GET['search'];
        //}
        $sqlCmd="SELECT * FROM eproject1.products WHERE ProductID = '$id';";
        }
        else {
          $sqlCmd="SELECT * FROM eproject1.products;";
        }
        $result = mysqli_query($conn,$sqlCmd); 
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
      }
      else if($action == 'getOrderRecord'){
        if(isset($_GET['id']) && $_GET['id'] != ''){
          $id = $_GET['id'];
        $sqlCmd="SELECT * FROM eproject1.orderview WHERE OrderID = '$id';";
        }
        else {
          $sqlCmd="SELECT * FROM eproject1.orderview;";
        }
        $result = mysqli_query($conn,$sqlCmd); 
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
      }
      else if($action == 'getOrderItems'){
        if(isset($_GET['id']) && $_GET['id'] != ''){
          $id = $_GET['id'];
        $sqlCmd="SELECT * FROM eproject1.oderitemsview WHERE OrderID = '$id';";
        }
        $result = mysqli_query($conn,$sqlCmd); 
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
      }
      else if($action == 'getDashboard'){
        $sqlCmd="SELECT COUNT(*) AS totalOrder FROM eproject1.orders;";
        $result = mysqli_query($conn,$sqlCmd); 
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
        $sqlCmd="SELECT COUNT(*) AS totalProduct FROM eproject1.products;";
        $result = mysqli_query($conn,$sqlCmd);
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
        $sqlCmd="SELECT ROUND(SUM(TotalPrice),2) AS Revenue FROM eproject1.orders;";
        $result = mysqli_query($conn,$sqlCmd); 
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
        $sqlCmd="SELECT COUNT(*) AS totalUser FROM eproject1.users;";
        $result = mysqli_query($conn,$sqlCmd); 
        while ($row = mysqli_fetch_assoc($result)) {
          array_push($data,$row);
        }
      }
    $jsonData = json_encode($data);
    echo $jsonData;
  }
?>