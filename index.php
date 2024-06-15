<?php include './system/db_connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GG Site</title>
    <?php include './Page Items/header.php' ?>
</head>

<body>
    <div id="page" class="site page-home">

        <?php include('./Page Items/nav bar.php') ?>
        <!--Main Section-->
        <main>
            <div class="slider">
                <div class="container">
                    <div class="wrapper">
                        <div class="myslider swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image object-cover">
                                            <img src="assets/slider/slider01.jpg" alt="slider here">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Quick Offer</h4>
                                            <h2><span>Windows 10 Pro</span><br><span>EXTRA 50% OFF</span></h2>
                                            <a href="view_all.php" class="primary-button">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image object-cover">
                                            <img src="assets/slider/slider0.jpg" alt="slider here">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Windows</h4>
                                            <h2><span>Come and get it! </span><br><span>Windows 11 Pro</span></h2>
                                            <a href="view_all.php" class="primary-button">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image object-cover">
                                            <img src="assets/slider/slider02.png" alt="slider here">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Quick Offer</h4>
                                            <h2><span>Gift Cards</span></h2>
                                            <a href="view_all.php" class="primary-button">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image object-cover">
                                            <img src="assets/slider/slider03.jpeg" alt="slider here">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Quick Offer</h4>
                                            <h2><span>EXTRA 50% OFF</span></h2>
                                            <a href="view_all.php" class="primary-button">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="item">
                                        <div class="image object-cover">
                                            <img src="assets/slider/slider05.jpg" alt="slider here">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Quick Offer</h4>
                                            <h2><span>EXTRA 50% OFF</span></h2>
                                            <a href="view_all.php" class="primary-button">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Here we will put the brands-->
            <div class="brands">
                <div class="container">
                    <div class="wrapper flexitem">
                        <div class="item">
                            <a href="#">
                                <img src="assets/brands/Windows_11_logo.svg.png" alt=""
                                    style="width:160px;height:50px;">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/brands/steam-logo.png" alt="" style="width:160px;height:50px;">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/brands/Microsoft_Office-Logo.wine.png" alt=""
                                    style="width:160px;height:50px;">
                            </a>
                        </div>
                        <div class="item">
                            <a href="#">
                                <img src="assets/brands/PlayStation.svg.png" alt="" style="width:160px;height:50px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Brands -->
            <!-- Trending -->
            <div class="trending">
                <div class="container">
                    <div class="wrapper">
                        <div class="sectop flexitem">
                            <h2><span class="circle"></span><span>Trending Products</span></h2>
                        </div>
                        <div class="column">
                            <div class="flexwrap1">
                                <div class="row products big">
                                    <?php
                                    $query = "SELECT * FROM products where id='14'";
                                    $result = mysqli_query($conn, $query);
                                    while ($row = mysqli_fetch_array($result)):
                                        $expiryDate = date('Y-m-d H:i:s', strtotime($row['Offer_date']));
                                        $currentTime = date('Y-m-d H:i:s');
                                        $offerExpired = ($expiryDate <= $currentTime);
                                        ?>
                                        <div class="item">
                                            <?php if (!$offerExpired): ?>
                                                <div class="offer product" data-countdown="<?= $expiryDate ?>">
                                                    <p>Offer Ends at</p>
                                                    <ul class="flexcenter">
                                                        <li class="day"></li>
                                                        <li class="hour"></li>
                                                        <li class="minute"></li>
                                                        <li class="second"></li>
                                                    </ul>
                                                </div>
                                            <?php endif; ?>
                                            <div class="media">
                                                <div class="image">
                                                    <a href="">
                                                        <img src="./System/assets/image pro/<?= $row['image']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="hoverable">
                                                    <ul>
                                                        <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                        </li>
                                                        <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                        <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="discount circle flexcenter"><span>
                                                        <?= $row['discount'] ?>%
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="rating">
                                                    <div class="stars"></div>
                                                    <span class="mini-text">
                                                        <?= $row['review_number'] ?>
                                                    </span>
                                                </div>
                                                <h3 class="main-links"><a href="product.php?id=<?= $row['id']; ?>">
                                                        <?= $row['product_name'] ?>
                                                    </a></h3>
                                                <div class="price">
                                                    <?php if ($offerExpired): ?>
                                                        <span class="current">
                                                            $
                                                            <?= $row['old_price'] ?>
                                                        </span>
                                                    <?php else: ?>
                                                        <span class="current">
                                                            $
                                                            <?= $row['new_price'] ?>
                                                        </span>
                                                        <span class="normal mini-text">
                                                            $
                                                            <?= $row['old_price'] ?>
                                                        </span>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="stock mini-text">
                                                    <div class="qty">
                                                        <span>Stock: <strong class="qty-available">107</strong></span>
                                                        <span>Sold: <strong class="qty-sold">3,459</strong></span>
                                                    </div>
                                                    <div class="bar">
                                                        <div class="available"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>

                                <div class="row products mini">
                                    <?php
                                    $query = "SELECT * FROM products WHERE id != '14' LIMIT 4;";
                                    $result = mysqli_query($conn, $query);
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($result)):
                                        if ($count < 4) {
                                            ?>
                                            <div class="item">
                                                <div class="media">
                                                    <div class="thumbnail object-cover">
                                                        <a href="product.php?id=<?= $row['id']; ?>">
                                                            <img src="./System/assets/image pro/<?= $row['image']; ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="hoverable">
                                                        <ul>
                                                            <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                            </li>
                                                            <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                            <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="discount circle flexcenter"><span>
                                                            <?= $row['discount'] ?>%
                                                        </span></div>
                                                </div>
                                                <div class="content">
                                                    <h3 class="main-links"><a href="product.php?id=<?= $row['id']; ?>">
                                                            <?= $row['product_name'] ?>
                                                        </a></h3>
                                                    <div class="rating">
                                                        <div class="stars"></div>
                                                        <span class="mini-text">
                                                            <?= $row['review_number'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="current">
                                                            $
                                                            <?= $row['new_price'] ?>
                                                        </span>
                                                        <span class="normal mini-text">
                                                            $
                                                            <?= $row['old_price'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="mini-text">
                                                        <p>2975 sold</p>
                                                        <p>Free Shipping</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        $count++; // Increment the counter
                                    endwhile;
                                    ?>
                                </div>
                                <div class="row products mini">
                                    <?php
                                    $query = "SELECT * FROM products WHERE id != '14' LIMIT 4, 18446744073709551615;";
                                    $result = mysqli_query($conn, $query);
                                    $count = 0;
                                    while ($row = mysqli_fetch_array($result)):
                                        if ($count < 4) {
                                        ?>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="product.php?id=<?= $row['id']; ?>">
                                                        <img src="./System/assets/image pro/<?= $row['image']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="hoverable">
                                                    <ul>
                                                        <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                        </li>
                                                        <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                        <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                    </ul>
                                                </div>
                                                <div class="discount circle flexcenter"><span>
                                                        <?= $row['discount'] ?>%
                                                    </span></div>
                                            </div>
                                            <div class="content">
                                                <h3 class="main-links"><a href="product.php?id=<?= $row['id']; ?>">
                                                        <?= $row['product_name'] ?>
                                                    </a></h3>
                                                <div class="rating">
                                                    <div class="stars"></div>
                                                    <span class="mini-text">
                                                        <?= $row['review_number'] ?>
                                                    </span>
                                                </div>
                                                <div class="price">
                                                    <span class="current">
                                                        $
                                                        <?= $row['new_price'] ?>
                                                    </span>
                                                    <span class="normal mini-text">
                                                        $
                                                        <?= $row['old_price'] ?>
                                                    </span>
                                                </div>
                                                <div class="mini-text">
                                                    <p>2975 sold</p>
                                                    <p>Free Shipping</p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php 
                                        }
                                        $count++; // Increment the counter
                                        endwhile; 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Trending -->
                <!-- Features -->
                <div class="features">
                    <div class="container">
                        <div class="wrapper">
                            <div class="sectop flexitem">
                                <h2><span class="circle"></span><span>Featured Products</span></h2>
                                <div class="second-links">
                                    <a href="view_all.php" class="view-all">View all<i
                                            class="ri-arrow-right-line"></i></a>
                                </div>
                            </div>
                            <div class="column">
                                <div class="products main flexwrap1">
                                <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets\products\The Last of Us .png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>17%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(89)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">The Last of Us Part I (PC) - Steam Key - TURKEY</a></h3>
                                            <div class="price">
                                                <span class="current">$57.14</span>
                                                <span class="normal mini-text">$68.89</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets\products\Amazon.png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span></span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(994)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">Amazon Gift Card 100 EUR Amazon GERMANY</a></h3>
                                            <div class="price">
                                                <span class="current">$107.89</span>
                                                <span class="normal mini-text"></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets/products/Microsoft Windows 10 Professional & Microsoft Office 2021 Professional Plus Bundle.png"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>46%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(1,495)</span>
                                            </div>
                                            <h3 class="main-links"><a
                                                    href="#">Microsoft Windows 10
                                                    Professional & Microsoft Office 2021 Professional Plus Bundle</a></h3>
                                            <div class="price">
                                                <span class="current">$58.10</span>
                                                <span class="normal mini-text">107.59</span>
                                            </div>                                           
                                        </div>
                                        <div class="bg-hover"></div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets\products\Call of Duty Modern Warfare.png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>35%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(128)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">Call of Duty: Modern Warfare II (PC) - Steam</a></h3>
                                            <div class="price">
                                                <span class="current">$49.40</span>
                                                <span class="normal mini-text">$76.00</span>
                                            </div>                                           
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets\products\Office 2021 Professional plus.png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>37%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(157)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">Office 2021 Professional Plus</a>
                                            </h3>
                                            <div class="price">
                                                <span class="current">$80.90</span>
                                                <span class="normal mini-text">$50.95</span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="product.php?id=<?= $row['id']; ?>">
                                                    <img src="assets\products\Dying Light 2.png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>25%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(258)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">Dying Light 2 (PC) - Steam Key - GLOBAL</a>
                                            </h3>
                                            <div class="price">
                                                <span class="current">$56.65</span>
                                                <span class="normal mini-text">$75.50</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets\products\Windows 8.1 Standard.png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>43%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(306)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">Windows 8.1 OEM Standard</a></h3>
                                            <div class="price">
                                                <span class="current">$32.48</span>
                                                <span class="normal mini-text">$56.98</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="media">
                                            <div class="thumbnail object-cover">
                                                <a href="#">
                                                    <img src="assets\products\Kaspersky Internet Security.png" alt="">
                                                </a>
                                            </div>
                                            <div class="hoverable">
                                                <ul>
                                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a>
                                                    </li>
                                                    <li><a href=""><i class="ri-eye-line"></i></a></li>
                                                    <li><a href=""><i class="ri-shuffle-line"></i></a></li>
                                                </ul>
                                            </div>
                                            <div class="discount circle flexcenter"><span>23%</span></div>
                                        </div>
                                        <div class="content">
                                            <div class="rating">
                                                <div class="stars"></div>
                                                <span class="mini-text">(3,598)</span>
                                            </div>
                                            <h3 class="main-links"><a href="#">Kaspersky Internet Security 2021 1 Device 1 Year GLOBAL</a></h3>
                                            <div class="price">
                                                <span class="current">$20.79</span>
                                                <span class="normal mini-text">$27</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Features -->
                <!-- featured Product -->
                <div class="banners">
                    <div class="container">
                        <div class="wrapper">
                            <div class="column">
                                <div class="banner flexwrap1">
                                    <div class="row">
                                        <div class="item">
                                            <div class="image">
                                                <img src="assets/banner/banner10.png" alt="">
                                            </div>
                                            <div class="text-content flexcol">
                                                <h4>Brutal Sale!</h4>
                                                <h3><span>Get the deal in here</span><br>Windows 10 Pro</h3>
                                                <a href="#" class="primary-button">Shop Now</a>
                                            </div>
                                            <a href="#" class="over-link"></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="item get-gray">
                                            <div class="image">
                                                <img src="assets/banner/banner11.png" alt="">
                                            </div>
                                            <div class="text-content flexcol">
                                                <h4>Brutal Sale!</h4>
                                                <h3><span>Discount everyday</span><br>Office Outfit</h3>
                                                <a href="#" class="primary-button">Shop Now</a>
                                            </div>
                                            <a href="#" class="over-link"></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End featured Product -->
        </main>
        <!--End Main Section-->
        <?php include('./Page Items/footer.php'); ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function addToCart(productId) {
                var quantity = parseInt($('.qty-control input').val());
                // Send an AJAX request to the PHP script
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: { id: productId, quantity: quantity },
                    success: function (response) {
                        // Handle the response from the PHP script
                        alert(response); // Show a message or perform any other action
                        updateCartInfo();
                    },
                    error: function () {
                        // Handle errors, if any
                        alert('Error occurred. Please try again.');
                    }
                });
            }
            // Quantity increment
            $('.qty-control .plus').click(function () {
                var input = $(this).prev('input');
                var currentValue = parseInt(input.val());
                input.val(currentValue + 1);
            });
            // Quantity decrement
            $('.qty-control .minus').click(function () {
                var input = $(this).next('input');
                var currentValue = parseInt(input.val());
                if (currentValue > 1) {
                    input.val(currentValue - 1);
                }
            });
            function updateCartInfo() {
                // Fetch the cart information from the PHP script
                $.ajax({
                    url: 'cart_info.php',
                    method: 'GET',
                    success: function (response) {
                        // Update the cart information in the navbar
                        var cartData = JSON.parse(response);
                        console.log(cartData);
                        $('.item-number').text(cartData.itemCount);
                        $('.cart-total').text('$' + cartData.cartTotal.toFixed(2));
                        $('.item-count').text(cartData.itemCount);
                        // Update the mini-cart products
                        var miniCartProducts = $('.mini-cart .products');
                        miniCartProducts.empty();
                        // Loop through the products in the cartData
                        $.each(cartData.products, function (index, product) {
                            var productHtml = `
                        <li class="item">
                            <div class="thumbnail object-cover">
                            <a href="#"><img src="System/assets/image pro/${product.image}" alt=""></a>
                            </div>
                            <div class="item-content">
                            <p><a href="#">${product.name}</a></p>
                            <span class="price">
                                <span>$${product.price}</span>
                            </span>
                            </div>
                            <a href="#" class="item-remove" data-product="${product.id}"><i class="ri-close-line"></i></a>
                        </li>
                        `;
                            miniCartProducts.append(productHtml);
                        });
                        // Add click event handler for item-remove elements
                        $('.item-remove').on('click', function (e) {
                            e.preventDefault();
                            var productId = $(this).data('product');
                            // Call a function to remove the selected product from the cart
                            removeProductFromCart(productId);
                        });
                        // Show the mini-cart
                        $('.mini-cart').show();
                    },
                    error: function () {
                        // Handle errors, if any
                        alert('Error occurred while fetching cart information.');
                    }
                });
            }
            // Function to remove a product from the cart
            function removeProductFromCart(productId) {
                // Perform an AJAX request to remove the product from the cart
                $.ajax({
                    url: 'remove_product.php',
                    method: 'POST',
                    data: { productId: productId },
                    success: function (response) {
                        // If removal is successful, update the cart information
                        updateCartInfo();
                    },
                    error: function () {
                        // Handle errors, if any
                        alert('Error occurred while removing the product from the cart.');
                    }
                });
            }
            // Update the cart information when the page loads
            updateCartInfo();
        </script>
    </div>
</body>

</html>