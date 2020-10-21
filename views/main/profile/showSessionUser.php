<?php 
$userName = $_SESSION['UserInfo']['UserName'];

$getUserSql = "SELECT * FROM `users` WHERE `UserName` = '$userName'";

$user = mysqli_query($conn, $getUserSql);

if ($user && mysqli_num_rows($user) > 0) {
    $row = mysqli_fetch_array($user);
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
}
?>