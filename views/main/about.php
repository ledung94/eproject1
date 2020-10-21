<?php
include '../../utilities/_main_header.php';
include '../../utilities/connectToDatabase.php';
?>

<!-- Slide -->
<div class="hero-wrap hero-bread" style="background-image: url('../../templates/main/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="./home.php">Home</a></span> <span>About us</span></p>
                <h1 class="mb-0 bread">About us</h1>
            </div>
        </div>
    </div>
</div>

<!-- Intro -->
<section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(../../templates/main/images/about.jpg);">
                <a href="https://www.youtube.com/watch?v=u5l4cdUjau4" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                    <span class="icon-play"></span>
                </a>
            </div>
            <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
                <div class="heading-section-bold mb-4 mt-md-5">
                    <div class="ml-md-0">
                        <h2 class="mb-4">Welcome to Star Organic Farm an eCommerce website</h2>
                    </div>
                </div>
                <div class="pb-md-5">
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <p>But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their.</p>
                    <p><a href="./shop.php" class="btn btn-primary">Shop now</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimony -->
<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Testimony</span>
                <h2 class="mb-4">Our satisfied customer says</h2>
                <p>Star Organic farm is commenced in the year 1988. Company is involved in trading and manufacturing a wide range of Organic Products and spices to the consumers all around the global market.</p>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <?php for ($i = 0; $i < 5; $i++) { ?>
                        <div class="item">
                            <div class="testimony-wrap p-4 pb-5">
                                <div class="user-img mb-5" style="background-image: url(../../templates/main/images/person_1.jpg)">
                                    <span class="quote d-flex align-items-center justify-content-center">
                                        <i class="icon-quote-left"></i>
                                    </span>
                                </div>
                                <div class="text text-center">
                                    <p class="mb-5 pl-4 line">Star Organic farm is commenced in the year 1988. Company is involved in trading and manufacturing a wide range of Organic Products and spices to the consumers all around the global market.</p>
                                    <p class="name">Garreth Smith</p>
                                    <span class="position">Marketing Manager</span>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include '../../utilities/_main_footer.php';
?>