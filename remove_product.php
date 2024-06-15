<?php
include './system/db_connect.php';
// Check if the productId is provided
if (isset($_POST['productId'])) {
    $productId = $_POST['productId'];

    // Prepare and execute the SQL query to remove the product
    $sql = "DELETE FROM cart WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $productId);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->affected_rows > 0) {
        // Return a success response
        $response = array('status' => 'success', 'message' => 'Product removed successfully');
        echo json_encode($response);
    } else {
        // Return an error response if the product was not found or unable to delete
        $response = array('status' => 'error', 'message' => 'Product not found or unable to delete');
        echo json_encode($response);
    }
    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Return an error response if the productId is not provided
    $response = array('status' => 'error', 'message' => 'Product ID not specified');
    echo json_encode($response);
}
?>