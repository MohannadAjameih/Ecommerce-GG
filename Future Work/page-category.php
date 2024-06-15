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
    <div id="page" class="site page-category">
        <?php include('./Page Items/nav bar.php') ?>
        <!--Main Section-->
        <main>
            <div class="single-category">
                <div class="container">
                    <div class="wrapper">
                        <div class="column">
                            <div class="holder">
                                <div class="row sidebar">
                                    <div class="filter">
                                        <div class="filter-block">
                                            <h4>Category</h4>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="bags">
                                                    <label for="bags">
                                                        <span class="checked"></span>
                                                        <span>Bags</span>
                                                    </label>
                                                    <span class="count">15</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="beauty">
                                                    <label for="beauty">
                                                        <span class="checked"></span>
                                                        <span>Beauty</span>
                                                    </label>
                                                    <span class="count">2</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="clothing">
                                                    <label for="clothing">
                                                        <span class="checked"></span>
                                                        <span>Clothing</span>
                                                    </label>
                                                    <span class="count">3</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="jewelry">
                                                    <label for="jewelry">
                                                        <span class="checked"></span>
                                                        <span>Jewelry</span>
                                                    </label>
                                                    <span class="count">1</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="shoes">
                                                    <label for="shoes">
                                                        <span class="checked"></span>
                                                        <span>Shoes</span>
                                                    </label>
                                                    <span class="count">7</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter-block">
                                            <h4>Activity</h4>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="athletic">
                                                    <label for="athletic">
                                                        <span class="checked"></span>
                                                        <span>Athletic</span>
                                                    </label>
                                                    <span class="count">11</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="lounge">
                                                    <label for="lounge">
                                                        <span class="checked"></span>
                                                        <span>Lounge</span>
                                                    </label>
                                                    <span class="count">13</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="outdoor">
                                                    <label for="outdoor">
                                                        <span class="checked"></span>
                                                        <span>Outdoor</span>
                                                    </label>
                                                    <span class="count">7</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="travel">
                                                    <label for="travel">
                                                        <span class="checked"></span>
                                                        <span>Travel</span>
                                                    </label>
                                                    <span class="count">3</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="urban">
                                                    <label for="urban">
                                                        <span class="checked"></span>
                                                        <span>Urban</span>
                                                    </label>
                                                    <span class="count">4</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter-block">
                                            <h4>Brands</h4>
                                            <ul>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="nike">
                                                    <label for="nike">
                                                        <span class="checked"></span>
                                                        <span>Nike</span>
                                                    </label>
                                                    <span class="count">9</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="louisvuitton">
                                                    <label for="louisvuitton">
                                                        <span class="checked"></span>
                                                        <span>Louis Vuitton</span>
                                                    </label>
                                                    <span class="count">7</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="hermes">
                                                    <label for="hermes">
                                                        <span class="checked"></span>
                                                        <span>Hermes</span>
                                                    </label>
                                                    <span class="count">2</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="gucci">
                                                    <label for="gucci">
                                                        <span class="checked"></span>
                                                        <span>Gucci</span>
                                                    </label>
                                                    <span class="count">6</span>
                                                </li>
                                                <li>
                                                    <input type="checkbox" name="chekbox" id="zara">
                                                    <label for="zara">
                                                        <span class="checked"></span>
                                                        <span>Zara</span>
                                                    </label>
                                                    <span class="count">5</span>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter-block products">
                                            <h4>Color</h4>

                                            <ul class="bycolor variant flexitem">
                                                <li>
                                                    <input type="radio" name="color" id="cogrey">
                                                    <label for="cogrey" class="circle"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="color" id="coblue">
                                                    <label for="coblue" class="circle"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="color" id="cogreen">
                                                    <label for="cogreen" class="circle"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="color" id="cored">
                                                    <label for="cored" class="circle"></label>
                                                </li>
                                                <li>
                                                    <input type="radio" name="color" id="colight">
                                                    <label for="colight" class="circle"></label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="filter-block pricing">
                                            <h4>Price</h4>
                                            <div class="byprice">
                                                <div class="range-track">
                                                    <input type="range" value="25000" min="0" max="100000">
                                                </div>
                                                <div class="price-range">
                                                    <span class="price-from">50$</span>
                                                    <span class="price-to">500$</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="section">
                                    <div class="row">
                                        <div class="cat-head">
                                            <div class="breadcrumb">
                                                <ul class="flexitem">
                                                    <li><a href="#">Home</a></li>
                                                    <li>Women</li>
                                                </ul>
                                            </div>
                                            <div class="page-title">
                                                <h1>Women</h1>
                                            </div>
                                            <div class="cat-description">
                                                <p>Lorem ipsum dolor sit. amet consectetur adipisicing elit. Desernut
                                                    sapoinet qui harum dignissimos. Lorem ipsum dolor sit. amet
                                                    consectetur adipisicing elit. Desernut sapoinet qui harum
                                                    dignissimos Lorem ipsum dolor sit. amet consectetur adipisicing
                                                    elit. Desernut sapoinet qui harum dignissimos. Lorem ipsum dolor
                                                    sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum
                                                    dignissimos Lorem ipsum dolor sit. amet consectetur adipisicing
                                                    elit. Desernut sapoinet qui harum dignissimos. Lorem ipsum dolor
                                                    sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum
                                                    dignissimos</p>
                                            </div>
                                            <div class="cat-navigation flexitem">
                                                <div class="item-filter desktop-hide">
                                                    <a href="#" class="filter-trigger label">
                                                        <i class="ri-menu-2-line ri-2x"></i>
                                                        <span>Filter</span>
                                                    </a>
                                                </div>
                                                <div class="item-sortir">
                                                    <div class="label">
                                                        <span class="mobile-hide">Sort by default</span>
                                                        <div class="desktop-hide">Default</div>
                                                        <i class="ri-arrow-down-s-line"></i>
                                                    </div>
                                                    <ul>
                                                        <li>Default</li>
                                                        <li>Product Name</li>
                                                        <li>Price</li>
                                                        <li>Brand</li>
                                                    </ul>
                                                </div>
                                                <div class="item-perpage mobile-hide">
                                                    <div class="label">Items 10 per page</div>
                                                    <div class="desktop-hide">10</div>
                                                </div>
                                                <div class="item-options">
                                                    <div class="label">
                                                        <span class="mobile-hide">Show 10 per page</span>
                                                        <div class="desktop-hide">10</div>
                                                        <i class="ri-arrow-down-s-line"></i>
                                                    </div>
                                                    <ul>
                                                        <li>10</li>
                                                        <li>20</li>
                                                        <li>30</li>
                                                        <li>ALL</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products main flexwrap1">
                                        <!-- product category structure, 
                                       you can copy from featured products 
                                       start with item-->
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/apparel1.jpg" alt="">
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
                                                    <span class="mini-text">(1,955)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Under Armour Men's Tech</a></h3>
                                                <div class="price">
                                                    <span class="current">$56.50</span>
                                                    <span class="normal mini-text">$75.50</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/apparel2.jpg" alt="">
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
                                                    <span class="mini-text">(994)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Women's Lightweight Knit Hoodie
                                                        Sweater Pullover</a></h3>
                                                <div class="price">
                                                    <span class="current">$37.50</span>
                                                    <span class="normal mini-text">$45.50</span>
                                                </div>
                                                <!-- additional structrue-->
                                                <div class="footer">
                                                    <ul class="mini-text">
                                                        <li>Poyster, Cotton</li>
                                                        <li>Pull On Closure
                                                        <li>
                                                        <li>Fashion Personality</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/apparel3.jpg" alt="">
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
                                                <div class="discount circle flexcenter"><span>31%</span></div>
                                            </div>
                                            <div class="content">
                                                <div class="rating">
                                                    <div class="stars"></div>
                                                    <span class="mini-text">(1,955)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Happy Sailed Women's Summer Boho
                                                        Floral</a></h3>
                                                <div class="price">
                                                    <span class="current">$129.99</span>
                                                    <span class="normal mini-text">$189.98</span>
                                                </div>

                                                <div class="footer">
                                                    <ul class="mini-text">
                                                        <li>65% Polyster, 35% Cotton</li>
                                                        <li>Imported</li>
                                                        <li>Machine Wash</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="bg-hover"></div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/apparel4.jpg" alt="">
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
                                                    <span class="mini-text">(10)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Women's Summer Boho Floral</a></h3>
                                                <div class="price">
                                                    <span class="current">$118.90</span>
                                                    <span class="normal mini-text">$189.90</span>
                                                </div>
                                                <div class="footer">
                                                    <ul class="mini-text">
                                                        <li>Corduroy</li>
                                                        <li>Imported</li>
                                                        <li>Button Closure Closure</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/shoe1.jpg" alt="">
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
                                                <div class="discount circle flexcenter"><span>32%</span></div>
                                            </div>
                                            <div class="content">
                                                <div class="rating">
                                                    <div class="stars"></div>
                                                    <span class="mini-text">(2,251)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Men Slip On shoes Casual With Arch
                                                        Support Insoles</a></h3>
                                                <div class="price">
                                                    <span class="current">$80.90</span>
                                                    <span class="normal mini-text">$119.00</span>
                                                </div>
                                                <div class="footer">
                                                    <ul class="mini-text">
                                                        <li>Made in USA</li>
                                                        <li>Rubber sole</li>
                                                        <li>Durable leather overlays</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/shoe2.jpg" alt="">
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
                                                <div class="discount circle flexcenter"><span>30%</span></div>
                                            </div>
                                            <div class="content">
                                                <div class="rating">
                                                    <div class="stars"></div>
                                                    <span class="mini-text">(1,237)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Skechers Women's Go Joy Walking Shoe
                                                        Sneaker</a></h3>
                                                <div class="price">
                                                    <span class="current">$45.95</span>
                                                    <span class="normal mini-text">$64.95</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/shoe3.jpg" alt="">
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
                                                    <span class="mini-text">(106)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Walking Shoe Sneaker Women's</a></h3>
                                                <div class="price">
                                                    <span class="current">$139.99</span>
                                                    <span class="normal mini-text">$189.98</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="media">
                                                <div class="thumbnail object-cover">
                                                    <a href="#">
                                                        <img src="assets/products/shoe4.jpg" alt="">
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
                                                <div class="discount circle flexcenter"><span>24%</span></div>
                                            </div>
                                            <div class="content">
                                                <div class="rating">
                                                    <div class="stars"></div>
                                                    <span class="mini-text">(25)</span>
                                                </div>
                                                <h3 class="main-links"><a href="#">Women's Summet Tasco Shoe</a></h3>
                                                <div class="price">
                                                    <span class="current">$104.90</span>
                                                    <span class="normal mini-text">$189.90</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="load-more flexcenter">
                                        <a href="#" class="secondary-button">Load more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- banners -->
            <div class="banners">
                <div class="container">
                    <div class="wrapper">
                        <div class="column">
                            <div class="banner flexwrap1">
                                <div class="row">
                                    <div class="item">
                                        <div class="image">
                                            <img src="assets/banner/banner1.jpg" alt="">
                                        </div>
                                        <div class="text-content flexcol">
                                            <h4>Brutal Sale!</h4>
                                            <h3><span>Get the deal in here</span><br>Living Room Chair</h3>
                                            <a href="#" class="primary-button">Shop Now</a>
                                        </div>
                                        <a href="#" class="over-link"></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item get-gray">
                                        <div class="image">
                                            <img src="assets/banner/banner2.jpg" alt="">
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
                            <!-- banners -->

                            <div class="product-categories flexwrap1">
                                <div class="row">
                                    <div class="item">
                                        <div class="image">
                                            <img src="assets/banner/procat1.jpg" alt="">
                                        </div>
                                        <div class="content mini-links">
                                            <h4>Beauty</h4>
                                            <ul class="flexcol">
                                                <li><a href="#">Makeup</a></li>
                                                <li><a href="#">Skin Care</a></li>
                                                <li><a href="#">Hair Care</a></li>
                                                <li><a href="#">Fragrance</a></li>
                                                <li><a href="#">Foot & Hand Care</a></li>
                                            </ul>
                                            <div class="second-links">
                                                <a href="#" class="view-all">View all<i
                                                        class="ri-arrow-right-line"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item">
                                        <div class="image">
                                            <img src="assets/banner/procat2.jpg" alt="">
                                        </div>
                                        <div class="content mini-links">
                                            <h4>Gatdets</h4>
                                            <ul class="flexcol">
                                                <li><a href="#">Camera</a></li>
                                                <li><a href="#">Cell Phones</a></li>
                                                <li><a href="#">Computers</a></li>
                                                <li><a href="#">GPS & Navigation</a></li>
                                                <li><a href="#">Headphones</a></li>
                                            </ul>
                                            <div class="second-links">
                                                <a href="#" class="view-all">View all<i
                                                        class="ri-arrow-right-line"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item">
                                        <div class="image">
                                            <img src="assets/banner/procat3.jpg" alt="">
                                        </div>
                                        <div class="content mini-links">
                                            <h4>Home Decor</h4>
                                            <ul class="flexcol">
                                                <li><a href="#">Kitchen</a></li>
                                                <li><a href="#">Dining Room</a></li>
                                                <li><a href="#">Pantry</a></li>
                                                <li><a href="#">Great Room</a></li>
                                                <li><a href="#">Breakfast</a></li>
                                            </ul>
                                            <div class="second-links">
                                                <a href="#" class="view-all">View all<i
                                                        class="ri-arrow-right-line"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End banners -->
        </main>
        <!--End Main Section-->
        <?php include('./Page Items/footer.php'); ?>
        <?php include('./Page Items/JS.php'); ?>
    </div>
</body>

</html>