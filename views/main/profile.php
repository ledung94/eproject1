<?php
include '../../utilities/_main_header.php';
include '../../utilities/connectToDatabase.php';
include './profile/showSessionUser.php';
?>

<link rel="stylesheet" href="/eproject1/templates/profile/profile.css">

<style>
    .container-profile {
        margin-bottom: 40px;
    }

    .link-ajax {
        color: lightcoral;
        font-size: 20px;

    }

    .link-ajax:hover {
        text-decoration: underline;
    }
</style>

<div class="container container-profile">
    <div class="row">
        <div class="col-lg-4">
            <div class="profile-card-4 z-depth-3">
                <div class="card">
                    <div class="card-body text-center bg-primary rounded-top">
                        <div class="user-box">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user avatar">
                        </div>
                        <h5 class="mb-1 text-white"><?php echo $userName; ?></h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group shadow-none">
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-phone-square"></i>
                                </div>
                                <div class="list-details">
                                    <span><?php echo $_SESSION['UserInfo']['Phone']; ?></span>
                                    <small>Mobile Number</small>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="list-icon">
                                    <i class="fa fa-envelope"></i>
                                </div>
                                <div class="list-details">
                                    <span><?php echo $_SESSION['UserInfo']['Mail']; ?></span>
                                    <small>Email Address</small>
                                </div>
                            </li>
                        </ul>
                        <div class="row text-center mt-4">
                            <div class="col p-2">
                                <h4 class="mb-1 line-height-5"><a href="#" id="showProfile" class="link-ajax">Profile</a></h4>
                            </div>
                            <div class="col p-2">
                                <h4 class="mb-1 line-height-5"><a href="#" id="showOrders" class="link-ajax">Orders</a></h4>
                            </div>
                            <div class="col p-2">
                                <h4 class="mb-1 line-height-5"><a href="#" id="editProfile" class="link-ajax">Edit</a></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card z-depth-3">
                <div class="card-body">
                    <div class="tab-content p-3">
                        <div class="tab-pane active show" id="profile">
                            <!-- Content -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include '../../utilities/_main_footer.php';
?>

<script src="./profile/ajax.js"></script>
<script>
    $(document).ready(function() {

        showProfile();

        $("#showProfile").click(function() {
            showProfile();
        });

        $("#showOrders").click(function() {
            showOrders();
        });

        $("#editProfile").click(function() {
            editProfile();
        });

        $('#updateUser').on('submit', function(e) {
            updateProfile(e);
        });

    });
</script>