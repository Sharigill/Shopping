<?php
session_start();

if (isset($_GET['ppid'])) {
    $ppaid = $_GET['ppid']; // Product ID passed via URL
    
    // Debugging: Print the session to verify
    echo '<pre>';
    print_r($_SESSION['cart']);
    echo '</pre>';
    
    // Flag to track if product is found
    $productFound = false;

    // Loop through the cart to find the product by ID
    foreach ($_SESSION['cart'] as $key => $product) {
        if ($product['pid'] == $ppaid) {
            unset($_SESSION['cart'][$key]); // Remove the product from the cart
            $productFound = true;
            echo "<script>alert('Product removed');</script>";
            break; // Exit loop once the product is found and removed
        }
    }

    if (!$productFound) {
        echo "<script>alert('Product not found in the cart');</script>";
    }

    // Redirect back to the cart page
    echo "<script>location.assign('cart.php');</script>";
} else {
    echo "<script>alert('No product ID provided');</script>";
}
?>
