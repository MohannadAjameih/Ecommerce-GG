<?php include('./System/db_connect.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Replace "login.php" with the actual login page URL
    exit;
}
// Check if the "user_id" key exists in the $_SESSION array
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"]; // Replace "user_id" with the actual column name in the users table
    $sql = "SELECT p.* FROM products AS p INNER JOIN orders AS o ON p.id = o.product_id WHERE o.customer_id = $user_id;";

    ;
    $result = $conn->query($sql);

<ctrl name='● page-offer.html - GG_WebSite-master - Visual Studio Code' role='document' />
<ctrl name='page-offer.html' role='grouping' />

    echo "User ID is not set in the session.";
}

?>
<!DOCTYPE html>
<html lang="en">
<ctrl name='● page-offer.html - GG_WebSite-master - Visual Studio Code' role='document' />
<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />

<ctrl name='page-offer.html' role='grouping' />
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
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
                            <h2><span class="circle"></span><span>Your Orders</span></h2>
                        </div>
                        <div class="column">
                            <div class="flexwrap1">
                                <div class="row products mini">
                                    <?php
                                    $query = "SELECT p.*, o.Amount_Paid, o.quantity
                                    FROM products AS p
                                    INNER JOIN orders AS o ON p.id = o.product_id
                                    WHERE o.customer_id = $user_id;
                                    ";
                                    $result = mysqli_query($conn, $query);
                                    $count = 0;
                                    $row_count = 0; // Counter for rows                                    
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
                                                    </div>
                                                    <span>
                                                        <h5>
                                                            X
                                                            <?= $row['quantity'] ?>
                                                        </h5>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        $count++; // Increment the item counter                            
                                        if ($count == 4) {
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
            </div>
            <!--End Trending -->
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