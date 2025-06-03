<?php
// db_connect.php
$host = 'localhost';
$user = 'root';
$password = 'JoRe12345';
$database = 'eco_products';

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
