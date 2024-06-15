<?php include('./System/db_connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["logout"])) {
    // Clear all session variables
    $_SESSION = array();
    // Destroy the session
    session_destroy();

    // Redirect to the login or home page
    header("Location: http://localhost/GG_WebSite"); // Replace with the appropriate URL
    exit;
}
?>
<aside class="site-off desktop-hide">
    <div class="off-canvas">
        <div class="canvas-head flexitem">
            <div class="logo"></div>
            <a href="#" class="t-close flexcenter"><i class="ri-close-line"></i></a>
        </div>
        <div class="departments"></div>
        <nav></nav>
        <div class="thetop-nav"></div>
    </div>
</aside>

<!-- Header Section-->
<header>
    <div class="header-top mobile-hide">
        <div class="container">
            <div class="wrapper flexitem">
                <div class="left">
                    <ul class="flexitem main-links">
                        <li><a href="Maintenance Page\Maintenance Page.html">Blog</a></li>
                        <li><a href="Maintenance Page\Maintenance Page.html">Featured Products</a></li>
                        <li><a href="Maintenance Page\Maintenance Page.html">Wishlist</a></li>
                    </ul>
                </div>
                <div class="right">
                    <style>
                        .button-like-link {
                            background: none;
                            border: none;
                            color: blue;
                            text-decoration: none;
                            cursor: pointer;
                            padding: 0;
                            font: inherit;
                            color: black;
                        }

                        .button-like-link:hover {
                            color: #794afa;
                        }

                        .button-like-link:focus {
                            outline: none;
                        }
                    </style>
                    <ul class="flexitem main-links"><!--Second-links-->
                        <?php
                        if (isset($_SESSION["email"])) {
                            // User is logged in, display "My Account" and "Logout" links
                            echo '<li><a href="MyAccount.php">My Account</a></li>';
                            echo '<li>
                                            <form method="POST" action="">
                                                <input class="button-like-link"  type="submit" name="logout" value="Logout">
                                            </form>
                                        </li>';
                        } else {
                            // User is not logged in, display "Sign Up" and "Login" links
                            echo '<li><a href="./SignUp.php">Sign Up</a></li>';
                            echo '<li><a href="./Login.php">Login</a></li>';
                        }
                        ?>
                        <li><a href="My orders.php">My Orders</a></li>
                        <li><a href="#">USD <span class="icon-small"></a></li>
                        <li><a href="#">English <span class="icon-small"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-top -->
    <div class="header-nav">
        <div class="container">
            <div class="wrapper flexitem">
                <a href="#" class="trigger desktop-hide"><span class="i ri-menu-2-line"></span></a>
                <div class="left flexitem">
                    <div class="logo">
                        <img src="gg_Logo1_NEW.png" alt="logo">
                        <a href="index.php">
                        </a>
                    </div>
                    <nav class="mobile-hide">
                        <ul class="flexitem second-links">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="view_all.php">Shop</a></li>
                            <li class="has-child">
                                <a href="#">Operating System
                                    <div class="icon-small"><i class="ri-arrow-down-s-line"></i></div>
                                </a>
                                <div class="mega">
                                    <div class="container">
                                        <div class="wrapper">
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4>Windows 10</h4>
                                                    <ul>
                                                        <li><a href="#">Microsoft Windows 10 Home</a></li>
                                                        <li><a href="#">Microsoft Windows 10 Pro</a></li>
                                                        <li><a href="#">Windows 10 OEM Home</a></li>
                                                        <li><a href="#">Windows 10 OEM Pro</a></li>
                                                        <li><a href="#">Microsoft Windows 10 Education</a></li>
                                                        <li><a href="#">Microsoft Windows 10 Pro
                                                                Workstations</a></li>
                                                        <li><a href="#">Windows 10 Workstations</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4>Windows 11</h4>
                                                    <ul>
                                                        <li><a href="#">Microsoft Windows 11 Home</a></li>
                                                        <li><a href="#">Microsoft Windows 11 Pro</a></li>
                                                        <li><a href="#">Microsoft Windows 11 Education</a></li>
                                                        <li><a href="#">Microsoft Windows 11 Pro
                                                                Workstations</a></li>
                                                        <li><a href="#">Microsoft Windows 11 Workstations</a>
                                                        </li>
                                                        <li><a href="#">Microsoft Windows 11 OEM Pro</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4>Top</h4>
                                                    <ul class="women-brands">
                                                        <li><a href="#">Microsoft Windows 11 Education</a></li>
                                                        <li><a href="#">Windows 10 Pro</a></li>
                                                        <li><a href="#">Windows 7</a></li>
                                                        <li><a href="#">Windows 8.1 OEM Pro</a></li>
                                                        <li><a href="#">Windows 10 Home</a></li>
                                                    </ul>
                                                    <a href="view_all.php" class="view-all">View All<i
                                                            class="ri-arrow-right-line"></i></a>
                                                </div>
                                            </div>
                                            <div class="flexcol products">
                                                <div class="row">
                                                    <div class="media">
                                                        <div class="thumbnail object-cover">
                                                            <a href="#">
                                                                <img src="assets/products/cover01.jpg" alt=""
                                                                    style="width:450px;height:600px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="has-child">
                                <a href="#">Software
                                    <div class="icon-small"><i class="ri-arrow-down-s-line"></i></div>
                                </a>
                                <div class="mega">
                                    <div class="container">
                                        <div class="wrapper">
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4>Programming</h4>
                                                    <ul>
                                                        <li><a href="#">GameMaker Studio 2 Creator</a></li>
                                                        <li><a href="#">AppGameKit Studio</a></li>
                                                        <li><a href="#">Intro to Game Development with Unity
                                                                Course</a></li>
                                                        <li><a href="#">RPG Maker VX Ace </a></li>
                                                        <li><a href="#">GameMaker Studio 2 Desktop</a></li>
                                                        <li><a href="#">3DMark</a></li>
                                                        <li><a href="#">AIDA64 Extreme</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4>Web Development</h4>
                                                    <ul>
                                                        <li><a href="#">Adobe Dreamweaver</a></li>
                                                        <li><a href="#">Bootstrap</a></li>
                                                        <li><a href="#">Bootstrap</a></li>
                                                        <li><a href="#">Ruby on Rails</a></li>
                                                        <li><a href="#">WordPress</a></li>
                                                        <li><a href="#">jQuery</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="flexcol">
                                                <div class="row">
                                                    <h4>Top</h4>
                                                    <ul class="women-brands">
                                                        <li><a href="#">WordPress</a></li>
                                                        <li><a href="#">GameMaker Studio 2 Creator</a></li>
                                                        <li><a href="#">Adobe Dreamweaver</a></li>
                                                        <li><a href="#">AIDA64 Extreme</a></li>
                                                    </ul>
                                                    <a href="view_all.php" class="view-all">View All<i
                                                            class="ri-arrow-right-line"></i></a>
                                                </div>
                                            </div>
                                            <div class="flexcol products">
                                                <div class="row">
                                                    <div class="media">
                                                        <div class="thumbnail object-cover">
                                                            <a href="#">
                                                                <img src="assets/products/Unity.png" alt=""
                                                                    style="width:500px;height:360px;">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- <li>
                                <a href="page-offer.php">Page Offer
                                    <div class="fly-item"><span>New!</span></div>
                                </a>
                            </li> -->
                        </ul>
                    </nav>
                </div>
                <div class="right">
                    <ul class="flexitem second-links">
                        <li class="mobile-hide"><a href="Maintenance Page\Maintenance Page.html">
                                <div class="icon-large"><i class="ri-heart-line"></i></div>
                                <div class="fly-item"><span>0</span></div>
                            </a>
                        </li>
                        <li class="iscart">
                            <a href="cart.php">
                                <div class="icon-large">
                                    <i class="ri-shopping-cart-line"></i>
                                    <div class="fly-item"><span class="item-number">0</span></div>
                                </div>
                                <div class="icon-text">
                                    <div class="mini-text">Total</div>
                                    <div class="cart-total">$0.00</div>
                                </div>
                            </a>
                            <div class="mini-cart">
                                <div class="content">
                                    <div class="cart-head">
                                        <span class="item-count">0</span> item(s) in cart
                                    </div>
                                    <div class="cart-body"> 
                                        <ul class="products mini"></ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header-main mobile-hide">
        <div class="container">
            <div class="wrapper flexitem">
                <div class="left">
                    <div class="dpt-cat">
                        <div class="dpt-head">
                            <div class="main-text">All Departments</div>
                            <div class="mini-text mobile-hide">Total 10859 Products</div><!--FOUCSE Please-->
                            <a href="#" class="dpt-trigger mobile-hide">
                                <i class="ri-menu-3-line ri-xl"></i>
                            </a>
                        </div>
                        <div class="dpt-menu">
                            <ul class="second-links"><!--somthing here -->
                                <li class="has-child windows">
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-bear-smile-line"></i></div>
                                        Microsoft Windows
                                        <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                    </a>
                                    <ul>
                                        <li><a href="#">Microsoft Windows 10 Pro</a></li>
                                        <li><a href="#">Windows 10 OEM Home</a></li>
                                        <li><a href="#">Windows 10 OEM Pro</a></li>
                                        <li><a href="#">Microsoft Windows 11 Home</a></li>
                                        <li><a href="#">Microsoft Windows 11 Pro</a></li>
                                        <li><a href="#">Windows 11 OEM Home</a></li>
                                        <li><a href="#">Windows 11 OEM Pro</a></li>
                                        <li><a href="#">Windows 8.1 OEM Standard</a></li>
                                        <li><a href="#">Windows 8.1 OEM Pro</a></li>
                                        <li><a href="#">Windows 8.1 OEM </a></li>
                                    </ul>
                                </li>
                                <li class="has-child office"><!--again-->
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-bluetooth-connect-line"></i></div>
                                        Microsoft Office
                                        <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                    </a>
                                    <ul>
                                        <li><a href="#">Professional Plus 2021</a></li>
                                        <li><a href="#">Home & Business 2021</a></li>
                                        <li><a href="#">365 Family</a></li>
                                        <li><a href="#">365 Home</a></li>
                                        <li><a href="#">Professional 2019 Plus</a></li>
                                        <li><a href="#">Professional 2016 Plus</a></li>
                                        <li><a href="#">Professional 2016</a></li>
                                        <li><a href="#">Business 2019 </a></li>
                                        <li><a href="#">Business 2016 Plus</a></li>
                                        <li><a href="#">Professional Plus 2016</a></li>
                                    </ul>
                                </li>
                                <li class="has-child antivirus">
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-t-shirt-air-line"></i></div>
                                        Antivirus
                                        <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                    </a>
                                    <ul>
                                        <li><a href="#">McAfee AntiVirus</a></li>
                                        <li><a href="#">AVG AntiVirus Pro</a></li>
                                        <li><a href="#">Avast Pro Antivirus</a></li>
                                        <li><a href="#">Bitdefender Antivirus</a></li>
                                        <li><a href="#">Bitdefender Antivirus Plus</a></li>
                                        <li><a href="#">Norton AntiVirus Basic</a></li>
                                        <li><a href="#">Kaspersky Internet Security</a></li>
                                        <li><a href="#">Kaspersky Anti-Virus</a></li>
                                        <li><a href="#">Kaspersky Total Security</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-shirt-line"></i></div>
                                        Programming
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-user-5-line"></i></div>
                                        Web Development
                                    </a>
                                </li>

                                <li class="has-child gift-cards">
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-home-8-line"></i></div>
                                        Social Gift Cards
                                        <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                    </a>
                                    <div class="mega">
                                        <div class="flexcol">
                                            <div class="row">
                                                <h4><a href="#">Amazon</a></h4>
                                                <ul>
                                                    <li><a href="#">Gift Card 40 EUR</a></li>
                                                    <li><a href="#">Gift Card 100 EUR</a></li>
                                                    <li><a href="#">Gift Card 25 USD</a></li>
                                                    <li><a href="#">Gift Card 100 USD</a></li>
                                                    <li><a href="#">Gift Card 20 GBP</a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <h4><a href="#">Google Play</a></h4>
                                                <ul>
                                                    <li><a href="#">Gift Card 75 USD</a></li>
                                                    <li><a href="#">Gift Card 100 TL</a></li>
                                                    <li><a href="#">Gift Card 300 TL</a></li>
                                                    <li><a href="#">Gift Card 500 TL</a></li>
                                                    <li><a href="#">Gift Card 20 EUR</a></li>
                                                    <li><a href="#">Gift Card 50 EUR</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </li>

                                <li class="has-child gift-cards-games">
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-home-8-line"></i></div>
                                        Gaming Gift Cards
                                        <div class="icon-small"><i class="ri-arrow-right-s-line"></i></div>
                                    </a>
                                    <div class="mega">
                                        <div class="flexcol">
                                            <div class="row">
                                                <h4><a href="#">PSN</a></h4>
                                                <ul>
                                                    <li><a href="#">Gift Card 40 EUR</a></li>
                                                    <li><a href="#">Gift Card 100 EUR</a></li>
                                                    <li><a href="#">Gift Card 25 USD</a></li>
                                                    <li><a href="#">Gift Card 100 USD</a></li>
                                                    <li><a href="#">Gift Card 20 GBP</a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <h4><a href="#">Steam</a></h4>
                                                <ul>
                                                    <li><a href="#">Gift Card 75 USD</a></li>
                                                    <li><a href="#">Gift Card 100 TL</a></li>
                                                    <li><a href="#">Gift Card 300 TL</a></li>
                                                    <li><a href="#">Gift Card 500 TL</a></li>
                                                    <li><a href="#">Gift Card 20 EUR</a></li>
                                                    <li><a href="#">Gift Card 50 EUR</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flexcol">
                                            <div class="row">
                                                <h4><a href="#">Xbox Live</a></h4>
                                                <ul>
                                                    <li><a href="#">Gift Card 10 GBP</a></li>
                                                    <li><a href="#">Gift Card 50 GBP</a></li>
                                                    <li><a href="#">Gift Card 20 EUR</a></li>
                                                    <li><a href="#">Gift Card 70 EUR</a></li>
                                                    <li><a href="#">Gift Card 25 USD</a></li>
                                                </ul>
                                            </div>
                                            <div class="row">
                                                <h4><a href="#">Battle.net</a></h4>
                                                <ul>
                                                    <li><a href="#">Blizzard GiftCard 50 USD</a></li>
                                                    <li><a href="#">Blizzard GiftCard 100 USD</a></li>
                                                    <li><a href="#">Blizzard GiftCard 60 EUR</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="flexcol">
                                            <div class="row">
                                                <h4><a href="#">Origin</a></h4>
                                                <ul>
                                                    <li><a href="#">EA Gift Card 15 USD</a></li>
                                                    <li><a href="#">EA Gift Card 50 USD</a></li>
                                                    <li><a href="#">EA Gift Card 100 USD</a></li>
                                                    <li><a href="#">EA Gift Card 20 EUR</a></li>
                                                    <li><a href="#">EA Gift Card 50 EUR</a></li>
                                                    <li><a href="#">EA Gift Card 80 EUR</a></li>
                                                    <li><a href="#">EA Gift Card 100 GBP</a></li>
                                                    <li><a href="#">EA Gift Card 50 GBP</a></li>
                                                    <li><a href="#">EA Gift Card 20 GBP</a></li>
                                                    <li><a href="#">EA Gift Card 200 TL</a></li>
                                                    <li><a href="#">EA Gift Card 300 TL</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-android-line"></i></div>
                                        Video
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <div class="icon-large"><i class="ri-basketball-line"></i></div>
                                        Tools
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <div class="search-box">
                        <form action="" class="search">
                            <span class="icon-large"><i class="ri-search-line"></i></span>
                            <input type="search" placeholder="Search for products" readonly>
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End Header Section-->