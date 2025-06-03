<?php
// Database connection
$conn = new mysqli("localhost", "root", "JoRe12345", "pangi_mart");

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $autoPayment = isset($_POST["auto_payment"]) ? "active" : "canceled";

    // Insert user into database
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $userId = $stmt->insert_id;
        $stmt->close();

        // Insert membership details
        $stmt = $conn->prepare("INSERT INTO membership (user_id, status) VALUES (?, ?)");
        $stmt->bind_param("is", $userId, $autoPayment);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Signup Successful!'); window.location.href='signup.php';</script>";
    } else {
        echo "<script>alert('Error: Email or username already exists.');</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
        }
        .container {
            width: 350px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h2, h3 {
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: black;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #333;
        }
        .membership {
            margin-top: 20px;
            padding: 15px;
            background: #f1f1f1;
            border-radius: 10px;
        }
        .membership ul {
            list-style: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>회원가입</h2>
        <form method="POST">
            <div class="form-group">
                <label>닉네임</label>
                <input type="text" name="username" required>
            </div>
            <div class="form-group">
                <label>아이디 (이메일)</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>비밀번호</label>
                <input type="password" name="password" required>
            </div>
            <button type="submit">가입하기</button>
        </form>

        <div class="membership">
            <h3>월 회원비</h3>
            <p>3,000원</p>
            <h3>혜택</h3>
            <ul>
                <li>전체 제품 무료 배송</li>
                <li>무료반품</li>
                <li>멤버십 커뮤니티 이용</li>
                <li>최저가 상품 구매</li>
            </ul>
            <label>
                <input type="checkbox" name="auto_payment">
                자동결제 등록
            </label>
        </div>
    </div>
</body>
</html>
