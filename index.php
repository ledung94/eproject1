<?php
    include 'utilities/_main_header.php';
    include 'utilities/connectToDatabase.php';
	
	$getProductsSql = 'SELECT * FROM `products` 
                        ORDER BY RAND()
                        LIMIT 8';
    $products = mysqli_query($conn, $getProductsSql);

?>


<!-- Image slides -->
<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(templates/main/images/bg_1.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">We serve Organic Products</h1>
                        <h2 class="subheading mb-4">We deliver organic products &amp; fruits</h2>
                        <p><a href="about.php" class="btn btn-primary">View Details</a></p>
                    </div>

                </div>
            </div>
        </div>

        <div class="slider-item" style="background-image: url(templates/main/images/bg_2.jpg);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">
                    <div class="col-sm-12 ftco-animate text-center">
                        <h1 class="mb-2">100% Fresh &amp; Organic Foods</h1>
                        <h2 class="subheading mb-4">We deliver organic vegetables &amp; fruits</h2>
                        <p><a href="about.php" class="btn btn-primary">View Details</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Commition -->
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-diet"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Always Fresh</h3>
                        <span>Product well package</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Superior Quality</h3>
                        <span>Quality Products</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Support</h3>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Categories -->
<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(utilities/media/categories-images/category.jpg);">
                            <div class="text text-center">
                                <h2>Organic Food</h2>
                                <p>Protect the health of every home</p>
                                <p><a href="shop.php" class="btn btn-primary">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(utilities/media/categories-images/category-1.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="shop.php">Nutritious cereals</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(utilities/media/categories-images/category-2.jpg);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="shop.php">Cooking Oils</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(utilities/media/categories-images/category-3.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="shop.php">Fruit Pulps</a></h2>
                    </div>
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(utilities/media/categories-images/category-4.jpg);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="shop.php">Pulses</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products -->
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Featured Products</span>
                <h2 class="mb-4">Our Products</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?PHP while ($product = mysqli_fetch_array($products)) { ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <span class="img-prod"><img class="img-fluid img-prod" src="templates/main/<?PHP echo $product['Image']; ?>" alt="Colorlib Template">
                            <div class="overlay"></div>
                        </span>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><span><?PHP echo $product['ProductName']; ?></span></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    
                                </div>
                            </div>

                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">

                                <a href="shop.php?action=add&id=<?php echo $product['ProductID'] ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>

                                <a href="/eproject1/views/main/cart.php?action=buynow&id=<?php echo $product['ProductID'] ?>" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                
                                <a href="/eproject1/views/main/single-product.php?action=viewProductDetail&id=<?php echo $product['ProductID'] ?>" class="heart d-flex justify-content-center align-items-center ">
                                <span><i class="ion-ios-add-circle-outline"></i></span>
                                </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?PHP } ?>

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
                                <div class="user-img mb-5" style="background-image: url(templates/main/images/person_1.jpg)">
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
    include 'utilities/_main_footer.php';
?>