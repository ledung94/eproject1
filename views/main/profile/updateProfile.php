<?php
include '../../../utilities/connectToDatabase.php';
session_start();

$tempUser = $_SESSION['UserInfo']['UserID'];

if(isset($_POST)){

    $userFirstName = $_POST['firstName'];
    $userLastName = $_POST['lastName'];
    $userPassword = $_POST['password'];
    $hashedUserPassword = md5($userPassword);
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $userAddress = $_POST['address'];

    $updateUserSql = "UPDATE `users` 
    SET `FirstName`='$userFirstName',`LastName`='$userLastName',`Password`='$hashedUserPassword',`Phone`= '$userPhone',
    `Mail`= '$userEmail' ,`Address`= '$userAddress' WHERE `UserID`= '$tempUser'";

    $updateUser = mysqli_query($conn, $updateUserSql);

    if($updateUser) {
        header('Location: /eproject1/views/main/profile.php');
    }

}

?>
