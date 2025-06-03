<?php
session_start(); // Start the session

header('Content-Type: application/json');
// Database connection details
$servername = "localhost";
$username = "root"; // Adjust based on your MySQL setup
$password = "JoRe12345";
$dbname = "eco_signup_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

// Get the JSON data sent from the front-end
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['email']) && isset($data['password'])) {
    $email = $conn->real_escape_string($data['email']);
    $password = $data['password'];

    // Check if the credentials are for the admin
    if ($email === 'admin@gmail.com' && $password === 'admin') {
        echo json_encode(['success' => true, 'redirect' => 'add_product.html']);
    } else {
        // Check if the user exists in the database
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                // Store user info in session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_email'] = $user['email'];
                
                echo json_encode(['success' => true, 'redirect' => 'titlebartest.html']); // Redirect to profile page
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid password']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'User not found']);
        }
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input data']);
}

$conn->close();
?>