<!-- Session cart -->
<?PHP 
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$cartCount = 0;

		if(isset($_SESSION['cart'])) {
			$cartCount = count($_SESSION['cart']);
		}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Vegefoods - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="/eproject1/templates/main/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/animate.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/magnific-popup.css">

    <link rel="stylesheet" href="/eproject1/templates/main/css/aos.css">

    <link rel="stylesheet" href="/eproject1/templates/main/css/ionicons.min.css">

    <link rel="stylesheet" href="/eproject1/templates/main/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="/eproject1/templates/main/css/flaticon.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/icomoon.css">
    <link rel="stylesheet" href="/eproject1/templates/main/css/style.css">
  </head>
  <body class="goto-here">
		<div class="py-1 bg-primary">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+ 1235 2355 98</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">starorganicfarm@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
							<?php if(!isset($_SESSION['UserInfo'])) { ?>
							<a class="text" href="/eproject1/views/main/login.php">Login</a>
							<?php } else { ?>
							<a class="text" href="/eproject1/views/main/profile.php"><?php echo $_SESSION['UserInfo']['UserName']; ?></a>
							<a class="text" href="/eproject1/views/main/logout.php" style="width: auto; margin-left: 15px;">Logout</a>
							<?php } ?>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="/eproject1/views/main/home.php">Star Organic Farm</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/eproject1/views/main/home.php" class="nav-link">Home</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/eproject1/views/main/shop.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
			  <a class="dropdown-item" href="/eproject1/views/main/shop.php?action=category&category=All">All</a>
              	<a class="dropdown-item" href="/eproject1/views/main/shop.php?action=category&category=Vegetables">Vegetables</a>
                <a class="dropdown-item" href="/eproject1/views/main/shop.php?action=category&category=Fruits">Fruits</a>
                <a class="dropdown-item" href="/eproject1/views/main/shop.php?action=category&category=Juice">Juice</a>
				<a class="dropdown-item" href="/eproject1/views/main/shop.php?action=category&category=Dried">Dried</a>
              </div>
            </li>
	          <li class="nav-item"><a href="/eproject1/views/main/about.php" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="/eproject1/views/main/contact.php" class="nav-link">Contact</a></li>
	          <li class="nav-item cta cta-colored"><a href="/eproject1/views/main/cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?PHP echo $cartCount ?>]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

  
    
  

 