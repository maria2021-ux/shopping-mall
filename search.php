<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', 'JoRe12345', 'eco_products');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = isset($_GET['q']) ? $_GET['q'] : '';
$query = $conn->real_escape_string($query);

$sql = "SELECT id, name FROM products WHERE name LIKE '$query%' LIMIT 5";
$result = $conn->query($sql);

$products = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($products);

$conn->close();
?>
