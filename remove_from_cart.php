<?php
session_start();

// Check if cart is set
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit();
}

// Get the product ID and quantity to remove
$product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
$quantity_to_remove = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

// Check if product ID and quantity are valid
if ($product_id <= 0 || $quantity_to_remove <= 0) {
    header('Location: cart.php');
    exit();
}

// Update the cart
if (isset($_SESSION['cart'][$product_id])) {
    // Get the current quantity
    $current_quantity = $_SESSION['cart'][$product_id]['quantity'];
    
    // Check if the quantity to remove is less than or equal to the current quantity
    if ($quantity_to_remove >= $current_quantity) {
        // Remove the product completely if the quantity to remove is equal to or more than the current quantity
        unset($_SESSION['cart'][$product_id]);
    } else {
        // Otherwise, reduce the quantity
        $_SESSION['cart'][$product_id]['quantity'] -= $quantity_to_remove;
    }
}

// Redirect back to the cart page
header('Location: cart.php');
exit();
?>
