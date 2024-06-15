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
    <div id="page" class="site page-checkout">
        <?php include('./Page Items/nav bar.php') ?>
        <!--Main Section-->
        <main>
            <div class="single-cart">
                <div class="container">
                    <div class="wrapper">
                        <div class="checkout flexwrap1">
                            <div class="item left styled">
                                <h1>Complete purchase</h1>
                                <?php
                                include './system/db_connect.php';
                                $query = "SELECT quantity FROM cart;";
                                $result = mysqli_query($conn, $query);
                                $hasProducts = false;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $hasProducts = true;
                                }
                                if (session_status() == PHP_SESSION_NONE) {
                                    session_start();
                                }
                                if (isset($_SESSION["user_id"])) {
                                    $user_id = $_SESSION["user_id"];
                                } else {
                                    echo "Please log in before proceeding to checkout.";
                                    exit;
                                }
                                if (isset($_SESSION["user_id"]) && !$hasProducts) {
                                    echo "Please add products to your cart before proceeding to checkout.";
                                    exit;
                                }
                                $clientQuery = "SELECT * FROM clients WHERE user_id = $user_id";
                                $clientResult = mysqli_query($conn, $clientQuery);
                                $client = mysqli_fetch_assoc($clientResult);
                                // Access the Card Number value
                                $cardNumber = $client['card_number'];
                                $Cardholder_name = $client['Cardholder_name'];
                                $Cvv = $client['card_cvv'];
                                $card_expiry_date = $client['card_expiry_date'];
                                ?>
                                <form action="process_order.php" method="POST">
                                    <p>
                                        <label for="card_number">Card Number <span></span></label>
                                        <input type="text" name="" id="card_number" autocomplete="off" required
                                            maxlength="19"
                                            value="<?php echo str_pad(substr($cardNumber, -4), strlen($cardNumber), '*', STR_PAD_LEFT) ?>">
                                    </p>
                                    <p>
                                        <label for="Cardholder_name">Cardholder Name <span></span></label>
                                        <input type="text" id="Cardholder_name" name="Cardholder_name" required
                                            pattern="[A-Za-z\s]+" value="<?php echo $Cardholder_name ?>">
                                    </p>

                                    <p>
                                        <label for="card_expiry_date">Expiration Date (MM/YY) <span></span></label>
                                        <input type="text" id="card_expiry_date" name="" maxlength="5"
                                            oninput="formatExpirationDate(this)" required
                                            value="<?php echo $card_expiry_date ?>">
                                    </p>
                                    <p>
                                        <label for="card_cvv">CVV <span></span></label>
                                        <input type="password" class="form-control" id="card_cvv" placeholder="CVV"
                                            maxlength="3" name="" required value="<?php echo $Cvv ?>">
                                    </p>
                                    <div class="primary-checkout">
                                        <button type="submit" class="primary-button">Buy Now!</button>
                                    </div>
                                </form>
                            </div>
                            <div class="item right">
                                <h2>Order Summary</h2>
                                <div class="summary-order is_sticky">
                                    <div class="summary-totals">
                                        <ul>
                                            <?php
                                            $query = "SELECT SUM(c.`quantity`) AS total_quantity, SUM(c.`single_price` * c.`quantity`) AS total_price FROM `cart` AS c
                                            JOIN `products` AS p ON c.`product_id` = p.`id`;";
                                            $result = mysqli_query($conn, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $totalQuantity = $row['total_quantity'];
                                            $subtotal = $row['total_price'];
                                            $discount = 10;
                                            $Tax = 5;
                                            $totalPrice = $subtotal - $discount + $Tax;
                                            ?>
                                            <li>
                                                <span>Subtotal</span>
                                                <span>
                                                    <?php if (empty($subtotal)): ?>
                                                        $0.00
                                                    <?php else: ?>
                                                        $
                                                        <?= number_format($subtotal, 2) ?>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Discount</span>
                                                <span>-$
                                                    <?php if (empty($discount)): ?>
                                                        $0.00
                                                    <?php else: ?>
                                                        <?= number_format($discount, 2) ?>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Tax</span>
                                                <span>$
                                                    <?php if (empty($Tax)): ?>
                                                        $0.00
                                                    <?php else: ?>
                                                        <?= number_format($Tax, 2) ?>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Quantity</span>
                                                <span>
                                                    <?php if (empty($totalQuantity)): ?>
                                                        0
                                                    <?php else: ?>
                                                        <?= number_format($totalQuantity) ?>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                            <li>
                                                <span>Total</span>
                                                <span>
                                                    <?php if (empty($totalPrice)): ?>
                                                        $0.00
                                                    <?php else: ?>
                                                        $
                                                        <?= number_format($totalPrice, 2) ?>
                                                    <?php endif; ?>
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <ul class="products mini">
                                        <?php
                                        $query = "SELECT p.`id`, c.`quantity`, c.`products_Price`, c.`Products_Name`, c.`total_Price`, c.`Customer_Id`, c.`single_price`, p.`image` 
                                        FROM `cart` AS c JOIN `products` AS p ON c.`product_id` = p.`id`;";
                                        $result = mysqli_query($conn, $query);
                                        $totalPrice = 0;
                                        $itemCounter = 0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $productId = $row['id'];
                                            $productName = $row['Products_Name'];
                                            $price = $row['products_Price'];
                                            $quantity = $row['quantity'];
                                            $subtotal = $row['total_Price'];
                                            $single_price = $row['single_price'];
                                            $image = $row['image'];
                                            $path = "System/assets/image pro/";
                                            $fullImagePath = $path . $image;
                                            ?>
                                            <li class="item">
                                                <div class="thumbnail object-cover">
                                                    <img src="<?= $fullImagePath ?>" alt="">
                                                </div>
                                                <div class="item-content">
                                                    <p>
                                                        <?= $productName ?>
                                                    </p>
                                                    <span class="price">
                                                        $
                                                        <?= $price ?>
                                                        <span>X
                                                            <?= $quantity ?>
                                                        </span>
                                                    </span>
                                                </div>
                                            </li>
                                            <?php
                                            $itemCounter++;
                                            if ($itemCounter >= 4) {
                                                break;
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <script>
            function formatCardNumber(input) {
                var cardNumber = input.value.replace(/\D/g, '');
                if (cardNumber.length > 16) {
                    cardNumber = cardNumber.slice(0, 16);
                }
                var formattedCardNumber = '';
                for (var i = 0; i < cardNumber.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedCardNumber += '-';
                    }
                    formattedCardNumber += cardNumber[i];
                }
                input.value = formattedCardNumber;
                input.setAttribute('data-original-value', cardNumber); // Store the original value without slashes
            }

            // Example code to retrieve the value with slashes
            var inputElement = document.querySelector('input[name="card_number"]');
            var originalValue = inputElement.getAttribute('data-original-value');
            if (originalValue) {
                var formattedValue = '';
                for (var i = 0; i < originalValue.length; i++) {
                    if (i > 0 && i % 4 === 0) {
                        formattedValue += '-';
                    }
                    formattedValue += originalValue[i];
                }
                inputElement.value = formattedValue;
            };

            function formatExpirationDate(input) {
                let value = input.value.replace(/\D/g, ''); // Remove non-digit characters
                let formattedValue = '';

                if (value.length > 2) {
                    formattedValue = value.slice(0, 2) + '/' + value.slice(2, 4);
                } else {
                    formattedValue = value;
                }

                input.value = formattedValue;
            }
        </script>
        <!--End Main Section-->
        <?php include('./Page Items/footer.php'); ?>
    </div>
</body>

</html>