<?php include './system/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php"); // Replace "login.php" with the actual login page URL
    exit;
}
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
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
    <?php include './Page Items/countryJS.php' ?>
</head>

<body>
    <div id="page" class="site page-cart">
        <?php include('./Page Items/nav bar.php') ?>
        <!--Main Section-->
        <main>
            <div class="single-cart">
                <div class="container">
                    <div class="wrapper">
                        <div class="breadcrumb">
                            <ul class="flexitem">
                                <li><a href="#">Home</a></li>
                                <li>Cart</li>
                            </ul>
                        </div>
                        <div class="page-title">
                            <h1>Shopping Cart</h1>
                        </div>
                        <div class="products one cart">
                            <div class="flexwrap1">
                                <form class="form-cart">
                                    <div class="item">
                                        <table id="cart-table">
                                            <thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="updated-content">
                                                <?php
                                                $query = "SELECT p.`id`, c.`quantity`, c.`products_Price`, c.`Products_Name`, c.`total_Price`, c.`Customer_Id`, c.`single_price`, p.`image`,
                                                (c.`single_price` * c.`quantity`) AS total_product_price,
                                                (SELECT SUM(`single_price` * `quantity`) FROM `cart`) AS final_price                                                
                                                FROM `cart` AS c
                                                JOIN `products` AS p ON c.`product_id` = p.`id`;";
                                                $result = mysqli_query($conn, $query);
                                                $totalPrice = 0;
                                                $hasProducts = false;
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    $hasProducts = true;
                                                    $productId = $row['id'];
                                                    $productName = $row['Products_Name'];
                                                    $price = $row['single_price'];
                                                    $quantity = $row['quantity'];
                                                    $subtotal = $row['single_price'] * $quantity;
                                                    $mainSubtotal = $row['final_price'];
                                                    $single_price = $row['single_price'];
                                                    $image = $row['image'];
                                                    $path = "System/assets/image pro/";
                                                    $fullImagePath = $path . $image;
                                                    $discount = 10;
                                                    $Tax = 5;
                                                    $totalPrice = $mainSubtotal - $discount + $Tax;
                                                    ?>
                                                    <tr>
                                                        <td class="flexitem">
                                                            <div class="thumbnail object-cover">
                                                                <a href="#"><img src="<?= $fullImagePath ?>" alt=""></a>
                                                            </div>
                                                            <div class="content">
                                                                <strong><a href="#">
                                                                        <?= $productName ?>
                                                                    </a></strong>
                                                                <p>Version: GLOBAL</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <?= $price ?>
                                                        </td>
                                                        <td>
                                                            <div class='qty-control flexitem'>
                                                                <button class='minuss'
                                                                    onclick="removeFromCart(<?php echo $productId; ?>)"
                                                                    aria-label='Reduce quantity'
                                                                    data-product-id="<?= $productId ?>">-</button>
                                                                <input type='text' id='quantity-<?= $productId ?>'
                                                                    value='<?= $quantity ?>' min='1'>
                                                                <button class='pluss'
                                                                    onclick="addToCart(<?php echo $productId; ?>)"
                                                                    aria-label='Increase quantity'
                                                                    data-product-id="<?= $productId ?>">+</button>
                                                            </div>
                                                        </td>
                                                        <td>$
                                                            <?= $subtotal ?>
                                                        </td>
                                                        <td>
                                                            <a class="item-remove" data-product-id="<?= $productId ?>"><i
                                                                    class="ri-close-line"></i></a>
                                                            <script>
                                                                document.addEventListener('DOMContentLoaded', function () {
                                                                    var removeLinks = document.getElementsByClassName('item-remove');
                                                                    for (var i = 0; i < removeLinks.length; i++) {
                                                                        removeLinks[i].addEventListener('click', function (event) {
                                                                            event.preventDefault(); // Prevents the default link behavior
                                                                            var productId = this.getAttribute('data-product-id'); // Get the product ID
                                                                            // Perform any necessary operations here, such as deleting the item
                                                                            location.reload(true); // Refresh the page with a hard reload
                                                                        });
                                                                    }
                                                                });
                                                            </script>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                                <div class="cart-summary styled">
                                    <div class="item">
                                        <div class="coupon">
                                            <input type="text" placeholder="Enter coupon">
                                            <button>Apply</button>
                                        </div>
                                        <div class="shipping-rate collapse">
                                            <div class="has-child">
                                                <a href="#" class="icon-small">Estimate Total and Tax</a>
                                                <div class="content">
                                                    <div class="countried">
                                                        <form action="">
                                                            <label for="country">Country</label>
                                                            <select name="country" id="countrySelect"
                                                                value="<?php echo $country ?>">
                                                            </select>
                                                        </form>
                                                    </div>
                                                    <div class="states">
                                                    </div>
                                                    <div class="postal-code">
                                                        <form action="">
                                                            <label for="postal">Zip/Postal Code</label>
                                                            <input type="number" name="postal" id="postal">
                                                        </form>
                                                    </div>
                                                    <div class="rate-options variant">
                                                        <form action="">
                                                            <p>
                                                                <span>Flat: $10.00</span>
                                                                <input type="radio" name="rate-options" id="flat"
                                                                    checked>
                                                                <label for="flat" class="circle"></label>
                                                            </p>
                                                            <p>
                                                                <span>Best: $00.00</span>
                                                                <input type="radio" name="rate-options" id="best">
                                                                <label for="best" class="circle"></label>
                                                            </p>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-total">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <th>Subtotal</th>
                                                        <td>
                                                            <?php if (empty($mainSubtotal)): ?>
                                                                $0.00
                                                            <?php else: ?>
                                                                $
                                                                <?= number_format($mainSubtotal, 2) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Discount</th>
                                                        <td>
                                                            <?php if (empty($discount)): ?>
                                                                $0.00
                                                            <?php else: ?>
                                                                $-
                                                                <?= number_format($discount, 2) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th>Tax <span class="mini-text">(Flat)</span></th>
                                                        <td>
                                                            <?php if (empty($Tax)): ?>
                                                                $0.00
                                                            <?php else: ?>
                                                                $
                                                                <?= number_format($Tax, 2) ?>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <th class="grand-total">Total</th>
                                                        <td>
                                                            <strong>
                                                                $
                                                                <?php echo (empty($totalPrice)) ? '$0.00' : $totalPrice; ?>
                                                            </strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <?php if (isset($_SESSION["user_id"]) && $hasProducts): ?>
                                                <a href="checkout.php" class="secondary-button">Checkout</a>
                                            <?php else: ?>
                                                <a href="#" class="secondary-button disabled"
                                                    onclick="showAlert()">Checkout</a>
                                            <?php endif; ?>
                                            <script>
                                                function showAlert() {
                                                    alert("Please add products to your cart before proceeding to checkout.");
                                                    window.location.href = "index.php";
                                                }
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!--End Main Section-->
        <?php include('./Page Items/footer.php'); ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Quantity increment
            $('.qty-control .pluss').click(function (event) {
                var input = $(this).prev('input');
                var currentValue = parseInt(input.val());
                input.val(currentValue + 1);
            });
            // Quantity decrement
            $('.qty-control .minuss').click(function (event) {
                var input = $(this).next('input');
                var currentValue = parseInt(input.val());
                if (currentValue > 1) {
                    input.val(currentValue - 1);
                }
            });
        });
        function addToCart(productId) {
            var quantity = parseInt($('.qty-control input').val());
            // Send an AJAX request to the PHP script
            $.ajax({
                url: 'action.php',
                method: 'POST',
                data: { id: productId, quantity: quantity, action: 'add' },
                success: function (response) {
                    // Handle the response from the PHP script
                    alert(response); // Show a message or perform any other action
                    updateCartInfo();
                    resetQuantity(); // Reset the quantity to 1
                },
                error: function () {
                    // Handle errors, if any
                    alert('Error occurred. Please try again.');
                }
            });
        }
        function removeFromCart(productId) {
            var quantity = parseInt($('.qty-control input').val());
            if (quantity > 1) {
                // Decrement quantity by 1
                // Send an AJAX request to the PHP script
                $.ajax({
                    url: 'action.php',
                    method: 'POST',
                    data: { id: productId, quantity: quantity, action: 'remove' },
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
            } else {
                // Show an alert to the customer indicating that the quantity cannot be reduced further
                alert('Minimum quantity reached. Cannot reduce further.');
            }
        }
    </script>
    <script>
        $(document).ready(function () {
            // Function to delete the item and update the page
            function deleteItem(productId, currentRow) {
                // Send the AJAX request to action.php
                $.ajax({
                    url: 'action.php',
                    type: 'GET',
                    data: { id: productId },
                    success: function (response) {
                        // Handle the response from action.php
                        if (response === 'success') {
                            // Item deleted successfully
                            // Remove the corresponding row from the cart table
                            currentRow.remove();
                        } else {
                            // Handle the case when deletion fails
                            console.log('Error deleting item: ' + response);
                        }
                    },
                    error: function (xhr, status, error) {
                        // Handle any AJAX errors
                        console.log('AJAX request error:', status, error);
                    }
                });
            }
            // Listen for click events on the delete buttons
            $('.item-remove').on('click', function (e) {
                e.preventDefault();
                // Get the product ID from the data attribute
                var productId = $(this).data('product-id');
                // Store the reference to the current row
                var currentRow = $(this).closest('tr');
                // Call the deleteItem function
                deleteItem(productId, currentRow);
            });
        });
        $(document).ready(function () {
            // Event delegation for minus and plus buttons
            $(document).on('click', '.minus, .plus', function () {
                debugger
                var productId = $(this).data('product-id');
                var quantityInput = $('#quantity-' + productId);
                var quantity = parseInt(quantityInput.val());
                var price = <?= $price ?>; // Replace with the actual product price
                var subtotalElement = $('#subtotal-' + productId);
                // Increase or decrease quantity based on button clicked
                if ($(this).hasClass('minus')) {
                    quantity = Math.max(1, quantity - 1);
                } else {
                    quantity += 1;
                }
                // Update quantity input and subtotal
                quantityInput.val(quantity);
                subtotalElement.text('$ ' + (price * quantity));
                // TODO: Send an AJAX request to update the quantity in the database if needed
            });
        });
    </script>
</body>

</html>