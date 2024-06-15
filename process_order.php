<?php
include './system/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
    // $orderNotes = $_POST['order_notes'];
    // Calculate the total price from the cart table
    $totalPriceQuery = "SELECT SUM(total_Price) AS total FROM cart WHERE Customer_Id = $user_id";
    $result = mysqli_query($conn, $totalPriceQuery);
    $row = mysqli_fetch_assoc($result);
    $totalPrice = $row['total'];

    // Retrieve client information
    $clientQuery = "SELECT * FROM clients WHERE user_id = $user_id";
    $clientResult = mysqli_query($conn, $clientQuery);
    $client = mysqli_fetch_assoc($clientResult);

    if ($client) {
        $clientName = $client['first_name'] . ' ' . $client['last_name'];
        $clientEmail = $client['email'];
        $clientPhone = $client['phone'];
        $clientAddress = $client['Address'];

        // Insert data into the database

        $insertQuery = "INSERT INTO orders (Name, Email, Phone, Address, Products, Amount_Paid, customer_id, product_id, quantity) 
        SELECT '$clientName', '$clientEmail', '$clientPhone', '$clientAddress',
        CONCAT(c.Products_Name, ' (', c.product_id, ' ', c.quantity, ')'), $totalPrice, c.Customer_Id, c.product_id, c.quantity
        FROM cart AS c 
        WHERE c.Customer_Id = $user_id";

        // Execute the query
        if (mysqli_query($conn, $insertQuery)) {
            // Order inserted successfully
            echo "<script>
            alert('Order placed successfully!');
            window.location.href = 'index.php'; // Redirect to index.php
            </script>";
            // Clear the cart for the current user
            $clearCartQuery = "DELETE FROM cart WHERE Customer_Id = $user_id";
            mysqli_query($conn, $clearCartQuery);
        } else {
            // Error occurred while inserting order
            echo "<script>alert('Failed to place the order. Please try again later.'); window.location.href = 'index.php';</script>";
        }
    } else {
        // Client not found
        echo "<script>alert('Client not found.'); window.location.href = 'index.php';</script>";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
