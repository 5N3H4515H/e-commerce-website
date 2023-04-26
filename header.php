<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AQUAStore</title>

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Owl-carousel CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

    <!-- font awesome icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />

    <!-- Custom CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <?php
    // require functions.php file
    require('functions.php');
    ?>
</head>

<body>
    <!--start #header-->
    <header id="header">
        <div class="strip d-flex justify-content-between px-3 py-1 bg-light">
            <p class="font-rale font-size-12 text-black-50 m-0">162/B/4, Lake Gardens, Kolkata 700045 (91)
                87775-12334</p>
            <div class="font-rale font-size-14">
                <?php
                if (isset($_SESSION['userId'])) {
                    $user = $User->getUser($_SESSION['userId']); // get the login user
                    echo $user['user_name'];
                    echo '<a href="logout.inc.php" class="px-3 border-right border-left text-dark">Logout</a>';
                } else {
                    echo '<a href="login.php" class="px-3 border-right border-left text-dark">Login</a>';
                }

                ?>
                <a href="cart.php" class="px-3 border-right text-dark">Wishlist (<?php echo count($product->getData('wishlist')); ?>)</a>
            </div>
        </div>
        <!-- Primary Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark color-second-bg" style="justify-content:space-between;">
            <a class="navbar-brand" href="index.php">AQUAStore</a>
            <div class="font-rale font-size-14 ">
                <form action="#" class="font-size-14 font-rale">
                    <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                        <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
                        <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData('cart')); ?></span>
                    </a>
                </form>
            </div>
        </nav>
        <!-- !Primary Navigation -->
    </header>
    <!-- !start #header-->

    <!--start #main-site-->
    <main id="main-site">