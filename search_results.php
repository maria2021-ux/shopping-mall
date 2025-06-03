<?php
// search_results.php
include 'db_connect.php';

if (isset($_POST['query'])) {
    $query = $conn->real_escape_string($_POST['query']);
    
    $sql = "SELECT id, name FROM products WHERE name LIKE '%$query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="search-item"><a href="product_details.php?id=' . $row['id'] . '">' . $row['name'] . '</a></div>';
        }
    } else {
        echo '<div class="search-item">No products found</div>';
    }
}
?>
