<?php
include './system/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
} else {
    echo "Please log in before adding items to the cart.";
    exit;
}
if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Construct the SQL query
    $query = "DELETE FROM `cart` WHERE `product_id` = $productId";
    // Execute the SQL query
    if (mysqli_query($conn, $query)) {
        // Item deleted successfully, you can redirect the user back to the cart page or any other desired location
        header("Location: cart.php"); // Replace "cart.php" with the appropriate page URL
        exit;
    } else {
        // Handle the case when deletion fails
        echo "Error deleting item: " . mysqli_error($conn);
    }
}
// Retrieve the product ID from the AJAX request
$productId = $_POST['id'];
$quantity = $_POST['quantity'];
$action = $_POST['action'];
// Query the database to fetch the product details based on the ID
$query = "SELECT * FROM products WHERE id = '$productId'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
// Check if the product exists
if ($row) {
    // Product details exist, you can access them using $row['column_name']
    $productName = $row['product_name'];
    $productPrice = $row['new_price'];
    $single_price = $row['new_price'];
    $totalPrice = $productPrice * $quantity;
    // Check if the product already exists in the cart
    $checkQuery = "SELECT * FROM cart WHERE Products_Name = '$productName'";
    $checkResult = mysqli_query($conn, $checkQuery);
    if (mysqli_num_rows($checkResult) > 0) {
        if ($action === 'remove') {
            // Product already exists in the cart, update the quantity
            $updateQuery = "UPDATE cart SET quantity = quantity - 1 WHERE Products_Name = '$productName'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Quantity Reduced in cart";
            } else {
                echo "Error occurred while updating the quantity in cart";
            }
        } else if ($action === 'add') {
            
            $updateQuery = "UPDATE cart SET quantity = quantity + 1 WHERE Products_Name = '$productName'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Quantity increment in cart";
            } else {
                echo "Error occurred while updating the quantity in cart";
            }
        }

    } else {
        // Insert the product details into the cart table
        $insertQuery = "INSERT INTO cart (quantity, products_Price, Products_Name, total_Price,Customer_Id,single_price,product_id)
                    VALUES ($quantity, '$productPrice', '$productName', '$totalPrice',$user_id,$single_price,$productId)";
        if (mysqli_query($conn, $insertQuery)) {
            echo "Product added to cart successfully";
        } else {
            echo "Error occurred while adding the product to cart";
        }
    }
} else {
    echo "Product does not exist";
}
mysqli_close($conn);
?>