<?php
include './system/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user_id"])) {
    $user_id = $_SESSION["user_id"];
}
// Fetch cart information from the database
$cartQuery = "SELECT c.*, p.image FROM cart c JOIN products p ON c.product_id = p.id;";
$cartResult = mysqli_query($conn, $cartQuery);

$cartData = [
    'itemCount' => mysqli_num_rows($cartResult),
    'cartTotal' => 0,
    'products' => [],
    'ids' => [] // Create an empty array to store the IDs
];

while ($cartRow = mysqli_fetch_assoc($cartResult)) {
    $cartData['cartTotal'] += $cartRow['total_Price'];
    $cartData['ids'][] = $cartRow['id']; // Add the ID to the 'ids' array
    $productData = [
        'id' => $cartRow['id'],
        'name' => $cartRow['Products_Name'],
        'price' => $cartRow['products_Price'],
        'image' => $cartRow['image']
    ];
    $cartData['products'][] = $productData;
}
echo json_encode($cartData);
mysqli_close($conn);
?>