<?php include './system/db_connect.php' ?>
<?php
// Retrieve the product ID from the URL parameter
$productId = isset($_GET['id']) ? $_GET['id'] : null;

$query = "SELECT products.*, categories.*, products_details.* FROM products JOIN categories 
ON products.id_category = categories.categories_id JOIN products_details ON products.id = products_details.product_id WHERE products.id = $productId;";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if ($row) {
    $productName = $row['product_name'];
    $image = $row['image'];
    $discount = $row['discount'];
    $reviewNumber = $row['review_number'];
    $newPrice = $row['new_price'];
    $oldPrice = $row['old_price'];
    $category = $row['category_name'];
    $path = "System/assets/image pro/";
} else {
    echo "Product does not available";
    echo "<script>alert('Product does not available');</script>";
    header("Location: view_all.php");
    exit;
    // Handle the case where the product with the provided ID is not found
}
?>
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
<div id="page" class="site page-single">
<?php include('./Page Items/nav bar.php') ?>
 <!--Main Section-->
 <main>
 
<div id="page" class="site single-product">
    <div class="container">
        <div class="wrapper">
            <div class="breadcrumb">
                <ul class="flexitem"> 
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#"></a><?= $row['category_name'] ?></li>
                    <li><?= $row['product_name'] ?></li>
                </ul>
            </div>
            <!-- breadcrumb-->

            <div class="column">
                <div class="products one">
                    <div class="flexwrap1">
                        <div class="row">
                            <div class="item is_sticky">
                                <div class="price">
                                    <span class="discount"><?= $row['discount'] ?>%<br>OFF</span>
                                </div>
                                <div class="big-image">                                   
                                <div class="big-image-wrapper swiper-wrapper">
                                    
                                    <?php
                                    // Check if the $image variable is not null
                                    if ($image !== null) {
                                        // Construct the full image path
                                        $fullImagePath = $path . $image;

                                        // Display the image
                                        echo '<div class="image-show swiper-slide">
                                        <a data-fslightbox href="' . $fullImagePath . '"><img src="' . $fullImagePath . '" alt=""></a>
                                        </div>';
                                    }
                                    ?>                                                                            
                                    </div>                                   
                                </div>                                
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            $expiryDate = date('Y-m-d H:i:s', strtotime($row['Offer_date']));
                            $currentTime = date('Y-m-d H:i:s');
                            $offerExpired = ($expiryDate <= $currentTime);
                            ?>
                            <div class="item">
                                <h1><?= $row['product_name'] ?></h1>
                                <div class="content">
                                    <div class="rating">
                                        <div class="stars"></div>
                                        <a href="#" class="mini-text"><?= $row['review_number'] ?></a>
                                        <a href="" class="add-review mini-text">Add Your Review</a>
                                    </div>
                                    <div class="stock-sku">
                                        <span class="available">In Stock</span>
                                    </div>                                  
                                        <?php if ($offerExpired): ?>
                                        <div class="price">
                                            <span class="current">$<?= $row['old_price'] ?></span>
                                        </div>                                    
                                        <?php else: ?>
                                    <div class="item">
                                        <div class="offer product" data-countdown="<?= $expiryDate ?>">
                                            <p>Offer Ends at</p>
                                            <ul class="flexcenter">
                                                <li class="day"></li>
                                                <li class="hour"></li>
                                                <li class="minute"></li>
                                                <li class="second"></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span class="current">$<?= $row['new_price'] ?></span>
                                        <span class="normal">$<?= $row['old_price'] ?></span>
                                    </div>
                                        <?php endif; ?>
                                    <div class="actions">
                                        <div class="qty-control flexitem">
                                            <button class="minus circle">-</button>
                                            <input type="text" value="1" readonly>
                                            <button class="plus circle">+</button>
                                        </div>
                                        <div class="button-cart">
                                            <input type="hidden" value="<?= $row['new_price'] ?>">
                                            <button class="primary-button" onclick="addToCart(<?php echo $productId; ?>)">Add to Cart</button>
                                        </div>
                                        <div class="wish-share">
                                            <ul class="flexitem second-links">
                                                <li><a href="#">
                                                        <span class="icon-large"><i class="ri-heart-line"></i></span>
                                                        <span>Wishlist</span>
                                                    </a></li>
                                                <li><a href="#">
                                                        <span class="icon-large"><i class="ri-share-line"></i></span>
                                                        <span>Share</span>
                                                    </a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="description collapse">
                                        <ul>
                                            <li class="has-child expand">
                                                <a href="#0" class="icon-small">Information</a>
                                                <ul class="content">
                                                    <li><span>Platform:</span> <span><?= $row['platform'] ?></span></li>
                                                    <li><span>Can activate in:</span> <span> <?= $row['can_activate_in'] ?></span></li>
                                                    <li><span>Type:</span> <span>Key</span></li>
                                                    <li><span>Version:</span> <span><?= $row['version'] ?></span></li>
                                                </ul>
                                            </li>
                                            <li class="has-child">
                                                <a href="#0" class="icon-small">Details</a>
                                                <div class="content">
                                                    <p>
                                                        <?= $row['details'] ?>
                                                    </p>
                                                    <h2>Key features</h2>
                                                    <p>
                                                    <?= $row['key_features'] ?>                               
                                                    </p>
                                                </div>
                                            </li>
                                            <li class="has-child">
                                                <a href="#0" class="icon-small">System Requirements<span class="mini-text">(Minimal)</span></a>
                                                <div class="content">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>iOS<span class="mini-text"></span></th>
                                                                <th>Windows <span class="mini-text"></span></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>Version</td>
                                                                <td>-</td>
                                                                <td>-</td>
                                                            </tr>
                                                            <tr>
                                                                <td>CPU</td>
                                                                <td><?= $row['system_requirements_cpu'] ?></td>
                                                                <td><?= $row['system_requirements_cpu'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>RAM<span class="mini-text">(GB)</span></td>
                                                                <td><?= $row['system_requirements_ram'] ?></td>
                                                                <td><?= $row['system_requirements_ram'] ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Storage<span class="mini-text">(GB)</span></td>
                                                                <td><?= $row['system_requirements_storage'] ?></td>
                                                                <td><?= $row['system_requirements_storage'] ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>GPU</td>
                                                                <td><?= $row['system_requirements_gpu'] ?></td>
                                                                <td><?= $row['system_requirements_gpu'] ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </li>
                                            <li class="has-child">
                                                <a href="#" class="icon-small">Reviews<span class="mini-text">2.2k</span></a>
                                                <div class="content">
                                                    <div class="reviews">
                                                        <h4>Customers Reviews</h4>
                                                        <div class="review-block">
                                                            <div class="review-block-head">
                                                                <div class="flextitem">
                                                                    <span class="rate-sum">4.9</span>
                                                                    <span>2,251 Reviews</span>
                                                                </div>
                                                                <a href="#review-from" class="secondary-button">Write review</a>
                                                            </div>
                                                            <div class="review-block-body">
                                                                <ul>
                                                                    <li class="item">
                                                                        <div class="review-form">
                                                                            <p class="person"><?= $row['reviews_name'] ?></p>
                                                                            <p class="mini-text">On <?= $row['reviews_date'] ?></p>
                                                                        </div>
                                                                        <div class="review-rating rating">
                                                                            <div class="stars"></div>
                                                                        </div>
                                                                        <div class="review-title">
                                                                            <p>Awsesome product!</p>
                                                                        </div>
                                                                        <div class="review-text">
                                                                            <p><?= $row['reviews_text'] ?></p>
                                                                        </div>
                                                                    </li>
                                                                    <li class="item">
                                                                        <div class="review-form">
                                                                            <p class="person">Review by Sarah</p>
                                                                            <p class="mini-text">On 7/7/22</p>
                                                                        </div>
                                                                        <div class="review-rating rating">
                                                                            <div class="stars"></div>
                                                                        </div>
                                                                        <div class="review-title">
                                                                            <p>Awsesome product!</p>
                                                                        </div>
                                                                        <div class="review-text">
                                                                            <p>Lorem ipsum dolor sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum dignissimos. Lorem ipsum dolor sit. amet consectetur adipisicing elit. Desernut sapoinet qui harum dignissimos
                                                                            </p>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                                <div class="second-links">
                                                                    <a href="#" class="view-all">View all reviews <i class="ri-arrow-right-line"></i></a>
                                                                </div>
                                                            </div>
                                                            <div id="review-from" class="review-form">
                                                                <h4>Write a review</h4>
                                                                <div class="rating">
                                                                    <p>Are you satisfied enough?</p>
                                                                    <div class="rate-this">
                                                                        <input type="radio" name="rating" id="star5">
                                                                        <label for="star5"><i class="ri-star-fill"></i></label>

                                                                        <input type="radio" name="rating" id="star4">
                                                                        <label for="star4"><i class="ri-star-fill"></i></label>

                                                                        <input type="radio" name="rating" id="star3">
                                                                        <label for="star3"><i class="ri-star-fill"></i></label>

                                                                        <input type="radio" name="rating" id="star2">
                                                                        <label for="star2"><i class="ri-star-fill"></i></label>

                                                                        <input type="radio" name="rating" id="star1">
                                                                        <label for="star1"><i class="ri-star-fill"></i></label>
                                                                    </div>
                                                                </div>
                                                                <form action="">
                                                                    <p>
                                                                        <label>Name</label>
                                                                        <input type="text">
                                                                    </p>
                                                                    <p>
                                                                        <label>Summary</label>
                                                                        <input type="text">
                                                                    </p>
                                                                    <p>
                                                                        <label>Review</label>
                                                                        <textarea cols="30" rows="10"></textarea>
                                                                    </p>
                                                                    <p><a href="#" class="primary-button">Submit Review</a></p>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </div>
</div>

<!-- End featured -->
<div class="features">
    <div class="container">
        <div class="wrapper">
            <div class="column">
                <div class="sectop flexitem">
                    <h2><span class="circle"></span><span>Related Products</span></h2>
                    <div class="second-links">                    
                        <a href="view_all.php" class="view-all">View all<i class="ri-arrow-right-line"></i></a>
                    </div>
                </div>
                <div class="products main flexwrap1">
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="#">
                                    <img src="assets/products/Office 2021 Professional plus.png" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Office 2021 Professional plus</a></h3>
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
                                    <img src="assets/products/Windows-11-Professional-Office-2021-Professional-Plus-Bundle.png" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Windows 11 Professional & Office 2021 Professional Plus</a></h3>
                            <div class="price">
                                <span class="current">$37.50</span>
                                <span class="normal mini-text">$45.50</span>
                            </div>            
                            <!-- additional structrue-->                            
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="#">
                                    <img src="assets/products/Microsoft Windows 11 Home.png" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Microsoft Windows 11 Home</a></h3>
                            <div class="price">
                                <span class="current">$129.99</span>
                                <span class="normal mini-text">$189.98</span>
                            </div>
                           
                        </div>
                        <div class="bg-hover"></div>
                    </div>
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="#">
                                    <img src="assets/products/Windows 7 OEM Home.png" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Windows 7 OEM Home</a></h3>
                            <div class="price">
                                <span class="current">$118.90</span>
                                <span class="normal mini-text">$189.90</span>
                            </div>                                        
                           
                        </div>
                    </div>
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="#">
                                    <img src="assets/products/Windows 7 OEM Ultimate.png" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Windows 7 OEM Ultimate</a></h3>
                            <div class="price">
                                <span class="current">$80.90</span>
                                <span class="normal mini-text">$119.00</span>
                            </div>
                            
                        </div>
                    </div>
                    <div class="item">
                        <div class="media">
                            <div class="thumbnail object-cover">
                                <a href="#">
                                    <img src="assets/products/Microsoft Windows 10 Professional & Microsoft Office 2021 Professional Plus Bundle.png" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Microsoft Windows 10 Professional & Microsoft Office 2021 Professional Plus Bundle</a></h3>
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
                                    <img src="assets/products/office microsoft 365 family4.jpg" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Office Microsoft 365 Family - 5 Devices, 1 Years</a></h3>
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
                                    <img src="assets/products/office microsoft 365 family4.jpg" alt="">
                                </a>
                            </div>
                            <div class="hoverable">
                                <ul>
                                    <li class="active"><a href="#"><i class="ri-heart-line"></i></a></li>
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
                            <h3 class="main-links"><a href="#">Office Microsoft 365 Family - 3 Devices, 2 Years</a></h3>
                            <div class="price">
                                <span class="current">$104.90</span>
                                <span class="normal mini-text">$189.90</span>
                            </div>
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
                                <img src="assets/banner/banner10.png" alt="">
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

</main>

<!--End Main Section-->
<!--End Main Section-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
function addToCart(productId) {
  var quantity = parseInt($('.qty-control input').val());

  // Send an AJAX request to the PHP script
  $.ajax({
    url: 'action.php',
    method: 'POST',
    data: { id: productId , quantity: quantity,action: 'add'},
    success: function(response) {
      // Handle the response from the PHP script
      alert(response); // Show a message or perform any other action
      updateCartInfo();
      resetQuantity(); // Reset the quantity to 1
    },
    error: function() {
      // Handle errors, if any
      alert('Error occurred. Please try again.');
    }
  });
}
// Quantity increment
$('.qty-control .plus').click(function() {
  var input = $(this).prev('input');
  var currentValue = parseInt(input.val());
  input.val(currentValue + 1);
});
// Quantity decrement
$('.qty-control .minus').click(function() {
  var input = $(this).next('input');
  var currentValue = parseInt(input.val());
  if (currentValue > 1) {
    input.val(currentValue - 1 );
  }
});
// Function to reset the quantity to 1
function resetQuantity() {
  $('.qty-control input').val(1);
}
// Function to remove a product from the cart
function removeProductFromCart(productId) {
  // Perform an AJAX request to remove the product from the cart
  $.ajax({
    url: 'remove_product.php',
    method: 'POST',
    data: { productId: productId },
    success: function(response) {
      // If removal is successful, update the cart information
      updateCartInfo();
    },
    error: function() {
      // Handle errors, if any
      alert('Error occurred while removing the product from the cart.');
    }
  });
}
// Update cart information
function updateCartInfo() {
  // Fetch the cart information from the PHP script
  $.ajax({
    url: 'cart_info.php',
    method: 'GET',
    success: function(response) {
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
      $.each(cartData.products, function(index, product) {
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
      $('.item-remove').on('click', function(e) {
        e.preventDefault();
        var productId = $(this).data('product');
        // Call a function to remove the selected product from the cart
        removeProductFromCart(productId);
      });

      // Show the mini-cart
      $('.mini-cart').show();
    },
    error: function() {
      // Handle errors, if any
      alert('Error occurred while fetching cart information.');
    }
  });
}

// Click event handler for item-remove elements
$(document).on('click', '.item-remove', function(e) {
    e.preventDefault();
    var productId = $(this).data('product');
  // Call a function to remove the selected product from the cart
    removeProductFromCart(productId);
});

// Update the cart information when the page loads
updateCartInfo();
</script>
<?php include('./Page Items/footer.php'); ?>
<?php # include('./Page Items/quantityJS.php') ?>
</div>
</body>

</html>