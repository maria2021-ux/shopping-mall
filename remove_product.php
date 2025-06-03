<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "JoRe12345";
$dbname = "eco_products";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get product ID from URL
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);

    // Delete product from the database
    $sql = "DELETE FROM products WHERE id = $product_id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Product removed successfully');
                window.location.href = 'view_products.php';
              </script>";
    } else {
        echo "<script>
                alert('Error: " . $sql . "<br>" . $conn->error . "');
                window.location.href = 'view_products.php';
              </script>";
    }
} else {
    echo "No product ID specified.";
}

$conn->close();
?>
