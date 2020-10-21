<?php
session_start();
include '../../../utilities/connectToDatabase.php';

$tempUser = $_SESSION['UserInfo']['UserID'];

$getUsersSql = "SELECT * FROM `users` WHERE UserID = '$tempUser' ";
$users = mysqli_query($conn, $getUsersSql);

echo '<h4 class="mb-3">Edit Profile</h4>';
while ($user = mysqli_fetch_assoc($users)) {

    echo '<div class="container">
        <form method="post" action="./profile/updateProfile.php" id="updateUser">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>First Name</label>
                    <input type="text" class="form-control" name="firstName" value="' . $user['FirstName'] . '" required>
                </div>
                <div class="form-group col-md-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="lastName" value="' . $user['LastName'] . '" required>
                </div>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" value="' . $user['Password'] . '" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="mail" class="form-control" name="email" value="' . $user['Mail'] . '" required>
            </div>
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" class="form-control" name="phone" value="' . $user['Phone'] . '" required>
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="' . $user['Address'] . '" required>
            </div>
            <button class="btn btn-primary btn-lg">Save</button>
        </form>
    </div>
';
}

// $userFirstName = '';
// $userLastName = '';
// $userPassword = '';
// $userEmail = '';
// $userPhone = '';
// $userAddress = '';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $userFirstName = $_POST['firstName'];
//     $userLastName = $_POST['lastName'];
//     $userPassword = $_POST['password'];
//     $userEmail = $_POST['email'];
//     $userPhone = $_POST['phone'];
//     $userAddress = $_POST['address'];

//     $updateUserSql = "UPDATE `users` 
//     SET `FirstName`='$userFirstName',`LastName`='$userLastName',`Password`='$userPassword',`Phone`= '$userPhone',
//     `Mail`= '$userEmail' ,`Address`= '$userAddress' WHERE `UserID`= '$tempUser'";

//     $updateUser = mysqli_query($conn, $updateUserSql);

//     if ($updateUser) {
//         echo "Updated Sucessfully";
//     }
// }
?>
