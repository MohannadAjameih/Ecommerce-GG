<?php include './system/db_connect.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View All</title>
    <?php include './Page Items/header.php' ?>
</head>

<body>
    <div id="page" class="site page-single">

        <?php include('./Page Items/nav bar.php') ?>
        <!--Main Section-->
        <main>
            <!-- Trending -->
            <div class="trending">
                <div class="container">
                    <div class="wrapper">
                        <div class="sectop flexitem">
                            <h2><span class="circle"></span><span>All Products</span></h2>
                        </div>
                        <div class="column">
                            <div class="flexwrap1">
                                <div class="row products mini">
                                    <?php
                                    $query = "SELECT * FROM products;";
                                    $result = mysqli_query($conn, $query);
                                    $count = 0;
                                    $row_count = 0; // Counter for rows                                    
                                    while ($row = mysqli_fetch_array($result)):
                                        if ($count < 6) {
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
                                                    <h3 class="main-links">
                                                        <a href="product.php?id=<?= $row['id']; ?>">
                                                            <?= $row['product_name'] ?>
                                                        </a>
                                                    </h3>
                                                    <div class="rating">
                                                        <div class="stars"></div>
                                                        <span class="mini-text">
                                                            <?= $row['review_number'] ?>
                                                        </span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="current">$
                                                            <?= $row['new_price'] ?>
                                                        </span>
                                                        <span class="normal mini-text">$
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
                                        $count++; // Increment the item counter                            
                                        if ($count == 5) {
                                            // Start a new row after 4 items
                                            $row_count++;
                                            ?>
                                        </div> <!-- Close the previous row -->
                                        <div class="row products mini"> <!-- Start a new row -->
                                            <?php
                                            // Reset the item counter
                                            $count = 0;
                                        }

                                        if ($row_count == 5) {
                                            // If you want to stop after a certain number of rows (e.g., 3), you can break the loop
                                            break;
                                        }
                                    endwhile;
                                    // Close the final row if there are remaining items
                                    if ($count > 0) {
                                        ?>
                                    </div>
                                    <?php
                                    }
                                    ?>
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
                                                <h3 class="main-links"><a href="#"
                                                        e>Windows 8.1 OEM Standard</a></h3>
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
                </div>
                <!-- End Features -->
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
                debugger
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