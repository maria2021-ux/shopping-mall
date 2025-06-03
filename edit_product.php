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
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the product details from the database
$sql = "SELECT * FROM products WHERE id = $product_id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

// Check if the product exists
if (!$product) {
    die("Product not found.");
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $conn->real_escape_string($_POST['product_name']);
    $product_description = $conn->real_escape_string($_POST['product_description']);
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

   // Handle image upload
   $target_dir = "uploads/";
   $image1 = basename($_FILES["product_image1"]["name"]);
   $image2 = basename($_FILES["product_image2"]["name"]);
   $image3 = basename($_FILES["product_image3"]["name"]);

   move_uploaded_file($_FILES["product_image1"]["tmp_name"], $target_dir . $image1);
   move_uploaded_file($_FILES["product_image2"]["tmp_name"], $target_dir . $image2);
   move_uploaded_file($_FILES["product_image3"]["tmp_name"], $target_dir . $image3);


    // Update the product in the database
    $sql = "UPDATE products SET
            name = '$product_name',
            description = '$product_description',
            image = '$image1',
            image2 = '$image2',
            image3 = '$image3',
            price = '$price',
            quantity = '$quantity'
            WHERE id = $product_id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
            alert('Product updated successfully');
            window.location.href = 'view_products.php';
          </script>";
} else {
    echo "<script>
            alert('Error: " . $sql . "<br>" . $conn->error . "');
            window.location.href = 'view_products.php';
          </script>";
}
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .submit-btn {
            background-color: #1e5339;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #16472b;
        }
        .back-btn {
            background-color: #1e5339;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }
        .back-btn:hover {
            background-color: #16472b;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Edit Product</h2>
    <form action="edit_product.php?id=<?php echo $product_id; ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>" required>
        </div>
        <div class="form-group">
            <label for="product_description">Product Description</label>
            <textarea id="product_description" name="product_description" rows="4" required><?php echo htmlspecialchars($product['description']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="product_image1">Product Image 1</label>
            <input type="file" id="product_image1" name="product_image1">
            <?php if ($product['image']): ?>
                <img src="<?php echo 'uploads/' . htmlspecialchars(basename($product['image'])); ?>" alt="Product Image 1" style="max-width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="product_image2">Product Image 2</label>
            <input type="file" id="product_image2" name="product_image2">
            <?php if ($product['image2']): ?>
                <img src="<?php echo 'uploads/' . htmlspecialchars(basename($product['image2'])); ?>" alt="Product Image 2" style="max-width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="product_image3">Product Image 3</label>
            <input type="file" id="product_image3" name="product_image3">
            <?php if ($product['image3']): ?>
                <img src="<?php echo 'uploads/' . htmlspecialchars(basename($product['image3'])); ?>" alt="Product Image 3" style="max-width: 100px; margin-top: 10px;">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($product['price']); ?>" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($product['quantity']); ?>" required>
        </div>
        <button type="submit" class="submit-btn">Update Product</button>
        <a href="view_products.php" class="back-btn">Back to view Product</a>

    </form>
</div>

</body>
</html>
