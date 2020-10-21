<?php
include '../../../utilities/connectToDatabase.php';
session_start();

$tempUser = $_SESSION['UserInfo']['UserID'];

$getUsersSql = "SELECT * FROM `users` WHERE UserID = '$tempUser' ";
$users = mysqli_query($conn, $getUsersSql);

echo '<h4 class="mb-3">User Profile</h4>';
while ($user = mysqli_fetch_assoc($users)) {

    echo '
    <div class="row">
        <div class="col-md-6">
            <h6>Username</h6>
            <p>' 
            . $user['UserName'] .
            '</p>
            <h6>Firstname</h6>
            <p>'
            . $user['FirstName'] .
            '</p>
            <h6>Lastname</h6>
            <p>'
            . $user['LastName'] .
            '</p>
        </div>
        <div class="col-md-6">
            <h6>Phone</h6>
            <p>'
            . $user['Phone'] .
            '</p>
            <h6>Mail</h6>
            <p>'
            . $user['Mail'] .
            '</p>
            <h6>Address</h6>
            <p>'
            . $user['Address'] .
            '</p>
        </div>
    </div>';
}


?>
