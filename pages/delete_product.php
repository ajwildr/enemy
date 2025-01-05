<?php 
session_start(); 
require '../includes/db_connect.php';

// Check if the user is authorized (Manager only)
if ($_SESSION['role'] != 'Manager') {
    echo '<script>window.location.href = "error.php";</script>';
    exit;
}

// Check if product_id is provided
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    
    // Delete the product from the database
    $delete_query = "DELETE FROM products WHERE product_id = ?";
    $stmt = $conn->prepare($delete_query);
    if ($stmt) {
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $stmt->close();
    }
}

// Use JavaScript redirect with a small delay to ensure it runs last
echo '<script>
    setTimeout(function() {
        window.location.href = "manage_products.php";
    }, 100);
</script>';

?>