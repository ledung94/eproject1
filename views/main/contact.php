<?php
include '../../utilities/_main_header.php';
include '../../utilities/connectToDatabase.php';

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $to = $_POST['email']; // this is your Email address
//     // $from = "minh.tc.658@aptechlearning.edu.vn"; // this is the sender's Email address
//     $name = $_POST['name'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];
//     $body = $name . " wrote the following:" . "\n\n" . $message;
//     // $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];
//     $headers = "From: starorganicfarm@gmail.com";
//     // $headers2 = "From:" . $to;
//     $success = mail($to, $subject, $body, $headers);
//     if ($success) {
//         echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
//     }
//     // mail($from, $subject, $message2, $headers2); // sends a copy of the message to the sender
//     // echo "Mail Sent. Thank you " . $name . ", we will contact you shortly.";
//     // You can also use header('Location: thank_you.php'); to redirect to another page.
// }
?>

<!-- Slide -->
<div class="hero-wrap hero-bread" style="background-image: url('../../templates/main/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="./home.php">Home</a></span>  <span>Contact us</span></p>
                <h1 class="mb-0 bread">Contact us</h1>
            </div>
        </div>
    </div>
</div>

<!-- Contact section -->
<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="w-100"></div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Address:</span>54 Le Thanh Nghi street, Hai Ba Trung, Ha Noi, Viet Nam</p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Phone:</span> <a href="tel://+ 1235 2355 98">+ 1235 2355 98</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Email:</span> <a href="mailto:staroragnicfarm@gmail.com">staroragnicfarm@gmail.com</a></p>
                </div>
            </div>
            <div class="col-md-3 d-flex">
                <div class="info bg-white p-4">
                    <p><span>Website</span> <a href="../index.php">starorganicfarm.com</a></p>
                </div>
            </div>
        </div>
        <div class="row block-9">
            <!-- <div class="col-md-6 order-md-last d-flex">
                <form action="#" class="bg-white p-5 contact-form" action="" method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Name" name="name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Email" name='email'>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Subject" name="subject">
                    </div>
                    <div class="form-group"> -->
                        <!-- <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message" name="message"></textarea> -->
                        <!-- <input type="text" class="form-control" placeholder="Message" name="message">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                    </div>
                </form> -->

            <!-- </div> -->

            <div class="col-md-12 d-flex embed-responsive embed-responsive-16by9 bg-white">
                <iframe src="http://maps.google.com/maps?q=21.003293,105.849439&z=15&output=embed" class="embed-responsive-item"></iframe>
            </div>

        </div>
    </div>
</section>


<?php
include '../../utilities/_main_footer.php';
?>