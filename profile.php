<?php
include 'db1_connect.php';

// Start the session
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header('Location: login.php');
    exit();
}

// Retrieve the user ID from the session
$user_id = $_SESSION['user_id'];

// Fetch user data from the database
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Ecommerce Responsive full Website</title>
    <link rel="stylesheet" href="style.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Jost:wght@100;200;300;400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
      integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .profile-container {
            max-width: 800px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-container h1 {
            font-size: 2.5em;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-details {
            display: flex;
            flex-direction: column;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }

        .profile-details h2 {
            font-size: 1.8em;
            color: #1d6042;
            margin: 5px 0;
        }

        .profile-details p {
            font-size: 1.1em;
            color: #555;
        }

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #ddd;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2em;
            color: #666;
        }

        .profile-actions {
            text-align: center;
        }

        .profile-actions a {
            background-color: #1d6042;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 1.1em;
            transition: background-color 0.3s ease;
        }

        .profile-actions a:hover {
            background-color: #145a32;
        }
        *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    scroll-behavior: smooth;
    font-family: 'Jost', sans-serif;
    list-style: none;
    text-decoration: none;
}

header{
    position: fixed;
    width: 100%;
    top: 0;
    right: 0;
    z-index: 1000;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 10%;
}

.logo img{
    max-width: 120px;
    height: auto;
}

.navmenu{
    display: flex;
}

.navmenu a{
    color: #2c2c2c;
    font-size: 16px;
    padding: 10px 20px;
    font-weight: 400;
    transition: all .42s ease;
}

.navmenu a:hover{
    color: #ee1c47;
}

.nav-icon{
    display: flex;
    align-items: center;
}

.nav-icon i{
    margin-right: 20px;
    color: #2c2c2c;
    font-size: 25px;
    font-weight: 400;
    transition: all .42s ease;
}

.nav-icon i:hover{
    transform: scale(1,1);
    color: #ee1c47;
}

#menu-icon{
    font-size: 35px;
    color: #1d6042;
    z-index: 10001;
    cursor: pointer;
}

section{
    padding: 5px 10%;
}

.main-home{
    width: 100%;
    height: 100vh;
    background-image: url(./images/banner.png);
    background-position: center;
    background-size: cover;
    display: grid;
    grid-template-columns: repeat(1, 1fr);
    align-items: center;
}

.main-text h5{
    color: #e0e0e0;
    font-size: 16px;
    text-transform: capitalize;
    font-weight: 500;
}

.main-text h1{
    color: #000;
    font-size: 65px;
    text-transform: capitalize;
    line-height: 1.1;
    font-weight: 600;
    margin: 6px 0 10px;
}

.main-text p{
    color: #333c56;
    font-size: 20px;
    font-style: italic;
    margin-bottom: 20px;
}

.main-btn{
    display: inline-block;
    color: #111;
    font-size: 16px;
    font-weight: 500;
    text-transform: capitalize;
    border: 2px solid #111;
    padding: 12px 25px;
    transition: all .42s ease;
}

.main-btn:hover{
    background-color: #000;
    color: #fff;
}

.main-btn i{
    vertical-align: middle;
}

.down-arrow{
    position: absolute;
    top: 85%;
    right: 11%;
}

.down i{
    font-size: 30px;
    color: #2c2c2c;
    border: 2px solid #2c2c2c;
    border-radius: 50px;
    padding: 12px 12px;
}

.down i:hover{
    background-color: #2c2c2c;
    color: #fff;
    transition: all .42s ease;
}

header.sticky{
    background: #fff;
    padding: 20px 10%;
    box-shadow: 0px 0px 10px rgb(0 0 0 / 10%);
}

/* trending-section-css */
.center-text h2{
    color: #111;
    font-size: 28px;
    text-transform: capitalize;
    text-align: center;
    margin-bottom: 30px;
}

.center-text span{
    color: #ee1c47;
}

.products{
    display: grid;
    grid-template-columns: auto auto auto auto;
    gap: 2rem;
}

/* mobile view */
@media only screen and (max-width: 600px) {
    .products{
        display: grid;
        grid-template-columns: auto auto;
        gap: 2rem;
    }
  }

.row{
    position: relative;
    transition: all .40s;
}

.row img{
    width: 20%;
    height: auto;
    transition: all .40s;
}

.row img:hover{
    transform: scale(0.9);
}

.product-text h5{
    position: absolute;
    top: 13px;
    left: 13px;
    color: #fff;
    font-size: 12px;
    font-weight: 500;
    text-transform: uppercase;
    background-color: #1d6042;
    padding: 3px 10px;
    border-radius: 2px;
}

.heart-icon{
    position: absolute;
    right: 0;
    font-size: 20px;
}

.heart-icon:hover{
    color: #ee1c47;
}

.rating i{
    color: #ff8c00;
    font-size: 18px;
}

.price h4{
    color: #111;
    font-size: 16px;
    text-transform: capitalize;
    font-weight: 400;
}

.price p{
    color: #151515;
    font-size: 14px;
    font-weight: 600;
}

.client-reviews{
    background-color: #f3f4f6;
}

.reviews{
    text-align: center;
}

.reviews h3{
    color: #111;
    font-size: 25px;
    text-transform: capitalize;
    text-align: center;
    font-weight: 700;
}

.reviews img{
    width: 100px;
    height: auto;
    border-radius: 50px;
    margin: 10px 0;
}

.reviews p{
    color: #707070;
    font-size: 16px;
    font-weight: 400;
    line-height: 25px;
    margin-bottom: 10px;
}

.reviews h2{
    font-size: 22px;
    color: #000;
    font-weight: 400;
    text-transform: capitalize;
    margin-bottom: 2px;
}
/* updare-section-css */
.up-center-text h2{
    text-align: center;
    color: #111;
    font-size: 25px;
    text-transform: capitalize;
    font-weight: 700;
    margin-bottom: 30px;
}

.cart img{
    width: 380px;
    height: auto;
    border-radius: 5px;
}

.update-cart{
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 2rem;
    padding: 15px auto;
}

.cart h5{
   color: #636872;
   font-size: 15px;
   text-transform: capitalize;
   font-weight: 500;
}

.cart h4{
    color: #111;
    font-size: 17px;
    font-weight: 600;
}

.cart p{
    color: #111;
    font-size: 15px;
    max-width: 380px;
    line-height: 25px;
    margin-bottom: 12px;
}

.cart h6{
    color:#151515;
    font-size: 13px;
    font-weight: 500;
}

/* contact-section */
.contact{
    background-color: #f3f4f6;
}

.contact-info{
    margin: 30px auto;
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    gap: 3rem;
}

.first-info img{
    width: 140px;
    height: auto;
}

.contact-info h4{
    color: #212529;
    font-size: 13px;
    text-transform: uppercase;
    margin-bottom: 10px;
}
#search-input {
    padding: 8px;
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-right: 10px;
    width: 300px;
}

#search-container { position: absolute;
    background-color: #fff;
    width:300px;
    border: 1px solid #ccc;
    border-radius: 4px;
   margin-bottom :-1px;  
 margin-left: 819px;
 margin-top: -60px;
    z-index: 1000;
    display: none;
}

#search-container a {
    display: block;
    padding: 20px;
    color: #333;
    text-decoration: none;
}

#search-container a:hover {
    background-color: #dfdfdf;
}


.contact-info p{
    color: #565656;
    font-size: 14px;
    font-weight: 400;
    line-height: 1.5;
    margin-bottom: 10px;
    cursor: pointer;
    transition: all .42s;
}

.contact-info p:hover{
    color: #ee1c47;    
}

.social-icon i{
    color: #565656;
    margin-right: 10px;
    font-size: 20px;
    transition: all .42s;
}

.social-icon i:hover{
    transform: scale(1.3);
}

.end-text{
    background-color: #edfff1;
    text-align: center;
    padding: 20px;
}

.end-text p{
    color: #111;
    text-transform: capitalize;
}

/* Responsive-css */
@media(max-width:890px){
    header{
        padding: 20px 3%;
        transition: .4s;
    }
}

@media(max-width:630px){
    .main-text h1{
        font-size: 50px;
        transition: .4s;
    }
    .main-text p{
        font-size: 18px;
        transition: .4s;
    }
    .main-btn{
        padding: 10px 20px;
        transition: .4s;
    }
}

@media(max-width:750px){
    .navmenu{
        position: absolute;
        top: 100%;
        right: -100%;
        width: 300px;
        height: 130vh;
        background: #edfff1;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 120px 30px;
        transition: all .42s;
    }
    .navmenu a{
        display: block;
        margin: 18px 0;
    }
    .navmenu.open{
        right: 0;
    }


}

        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .product-details {
            max-width: 800px;
            margin-top: 70px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            
        }
        .product-details h1 {
            font-size: 20px;
            color: #333; /* Eco green color */
            margin-left: 3px;
            margin-top: 30px;
            margin-bottom: 10px;
            
        }
        .product-images {
            display: flex;
            gap: 1px;
        }
        .main-image-container {
            flex: 3;
            position: relative;
        }
        .main-image {
            width: 40%;
            margin-right: 444px;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .thumbnail-container {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 1%;
        }
        .thumbnail {
            cursor: pointer;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s ease;
            width: 30%;
        }
        .thumbnail:hover {
            transform: scale(1.05);
        }
        .product-description {
            margin-top: 20px;
        }
        .product-description p {
            font-size: 20px;
            line-height: 1.6;
        }
        .product-price {
            font-size: 1.5em;
            font-weight: bold;
            margin: 20px 20px;
        }
        .add-to-cart-btn {
  background-color: #1e5339; /* Dark green color */
  color: white;
  padding: 15px 25px;
  border: none;
  border-radius: 10px;
  margin-top: 12px;
  cursor: pointer;
  grid-area: 10%;
  font-size: 1.1em;
  text-align: center;
  display: inline-block;
  text-decoration: none;
  margin-right: 30px; /* Add this line to add space between the buttons */
}

.add-to-cart-btn:hover {
  background-color: #1d6042; /* Darker green */
}

.back-btn {
  background-color: #1d6042; /* Orange color */
  color: white;
  padding: 20px 30px;
  border: none;
  border-radius: 10px;
  gap: 50px;
  cursor: pointer;
  font-size: 1.1em;
  text-align: center;
  display: inline-block;
  text-decoration: none;
}
.back-btn:hover {
  background-color: #1d6042; /* Darker orange */
}
        .suggested-products {
            margin-top: 40px;
            align-items: center;
        }
        .suggested-products h2 {
            font-size: 1.8em;
            align-items: center;
            color: #2c6b2f;
            margin-bottom: 20px;
        }
        .suggested-products .product-item {
            display: flex;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
        }
        .suggested-products .product-item img {
            width: 100px;
            border-radius: 8px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .suggested-products .product-item .details {
            margin-left: 20px;
        }
        .suggested-products .product-item .details h3 {
            font-size: 1.2em;
            margin: 0;
            color: #333;
        }
        .suggested-products .product-item .details p {
            margin: 5px 0;
            color: #555;
        }
        .suggested-products .product-item .details a {
            color: #1e5339;
            text-decoration: none;
            font-weight: bold;
        }
        .suggested-products .product-item .details a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<header>
      
      </div>
          <a href="titlebartest.html" class="logo"><img src="images/logosss.avif" alt="" /></a>
          <ul class="navmenu">
              <li><a href="titlebartest.html">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="Shipping&Return.html">Shipping & Return Policy</a></li>
              <li><a href="about.html">About Us</a></li>
          </ul>
      
          <div class="nav-icon">
            <input type="text" id="search-input" placeholder="Search products...">
            <a href="sear.php" id="search-icon"><i class="bx bx-search"></i></a>
            <a href="profile.php"><i class="bx bx-user"></i></a>
            <a href="cart.php"><i class="bx bx-cart"></i></a>
        </div>
        
      </header>
      
      <!-- Search Result Container -->
      <div id="search-container"></div>

      <script>  function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
    }
    document.getElementById('search-input').addEventListener('input', function() {
        var query = this.value.trim().toLowerCase();
        if (query) {
            fetch(`search.php?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    var searchContainer = document.getElementById('search-container');
                    searchContainer.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(product => {
                            var a = document.createElement('a');
                            a.href = `product_details.php?id=${product.id}`;
                            a.textContent = product.name;
                            searchContainer.appendChild(a);
                        });
                        searchContainer.style.display = 'block';
                    } else {
                        searchContainer.style.display = 'none';
                    }
                });
        } else {
            document.getElementById('search-container').style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('#search-container') && !event.target.closest('#search-input')) {
            document.getElementById('search-container').style.display = 'none';
        }
    });

      </script>
       <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features Section</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            align-content: center;
            padding: 100px;
            margin-right: 80px;
        }
        .image-link {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            max-width: 1200px;
            align-items: center;
            margin: 20px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .feature {
            width: 23%;
            text-align: center;
            margin: 10px 0;
        }
        .feature img {
            max-width: 60px;
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .feature {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
<header>
      
      </div>
          <a href="titlebartest.html" class="logo"><img src="images/logosss.avif" alt="" /></a>
          <ul class="navmenu">
              <li><a href="titlebartest.html">Home</a></li>
              <li><a href="products.php">Products</a></li>
              <li><a href="Shipping&Return.html">Shipping & Return Policy</a></li>
              <li><a href="about.html">About Us</a></li>
          </ul>
      
          <div class="nav-icon">
            <input type="text" id="search-input" placeholder="Search products...">
            <a href="sear.php" id="search-icon"><i class="bx bx-search"></i></a>
            <a href="profile.php"><i class="bx bx-user"></i></a>
            <a href="cart.php"><i class="bx bx-cart"></i></a>
        </div>
        
      </header>
      
      <!-- Search Result Container -->
      <div id="search-container"></div>

      <script>  function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
    }
    document.getElementById('search-input').addEventListener('input', function() {
        var query = this.value.trim().toLowerCase();
        if (query) {
            fetch(`search.php?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    var searchContainer = document.getElementById('search-container');
                    searchContainer.innerHTML = '';
                    if (data.length > 0) {
                        data.forEach(product => {
                            var a = document.createElement('a');
                            a.href = `product_details.php?id=${product.id}`;
                            a.textContent = product.name;
                            searchContainer.appendChild(a);
                        });
                        searchContainer.style.display = 'block';
                    } else {
                        searchContainer.style.display = 'none';
                    }
                });
        } else {
            document.getElementById('search-container').style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (!event.target.closest('#search-container') && !event.target.closest('#search-input')) {
            document.getElementById('search-container').style.display = 'none';
        }
    });

      </script>

    <div class="profile-container">
        <h1>My Profile</h1>

        <!-- Profile Picture -->
        <div class="profile-picture">
            <!-- Display user initial or profile image -->
            <?php echo strtoupper(substr($user['first_name'], 0, 1) . substr($user['last_name'], 0, 1)); ?>
        </div>

        <div class="profile-details">
            <h2><?php echo htmlspecialchars($user['first_name']); ?></h2>
            <h2><?php echo htmlspecialchars($user['last_name']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
        </div>

        <div class="profile-actions">
            <a href="edit_profile.php">Edit Profile</a>
        </div>
    </div>
</body>
</html>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features Section</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 20px;
            align-content: center;
            padding: 100px;
            margin-right: 80px;
        }
        .image-link {
            display: block;
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            max-width: 1200px;
            align-items: center;
            margin: 20px;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .feature {
            width: 23%;
            text-align: center;
            margin: 10px 0;
        }
        .feature img {
            max-width: 60px;
            margin-bottom: 10px;
        }
        @media (max-width: 768px) {
            .feature {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

    

    <div class="content">
        <div class="feature">
            <img src="images\Untitled design (9).png" alt="Time Well Spent">
            <h3>Time Well-Spent</h3>
            <p>Everything on our site is vetted through our 5-Pillar Sourcing Methodology, and our Community Experience team is always here to help through chat, call, or email.</p>
        </div>
        
        <div class="feature">
            <img src="images\Untitled design (10).png" alt="Free Shipping">
            <h3>Free Shipping for $75+</h3>
            <p>We want sustainability to be more accessible. That’s why every order over $75 ships free, and all orders always ship carbon-neutral.</p>
        </div>

        <div class="feature">
            <img src="images\Untitled design (11).png" alt="Best-In-Class Brands">
            <h3>Best-In-Class Brands</h3>
            <p>We've built a community of truly earth-conscious brands, dedicated to offering sustainable, quality products without compromises to our planet.</p>
        </div>

        <div class="feature">
            <img src="images\Untitled design (12).png" alt="Furthering Your Impact">
            <h3>Furthering Your Impact</h3>
            <p>Every order you make directly benefits our communities and environment through our Certified B Corp and 1% for the Planet membership.</p>
        </div>
    </div>
 <!--contact-section-->

 <section class="contact">
    <div class="contact-info">
      <div class="first-info">
        <img src="images\logosss.avif" alt="">

        <p>Nana Kwando 1 Road, <br>Bibiani-Ghana</p>
        <p>+233 543 02 8885</p>
        <p>alhassanaminatu12@gmail.com</p>
        <div class="social-icon">
          <a href="#"><i class='bx bxl-facebook'></i></a>
          <a href="#"><i class='bx bxl-twitter' ></i></a>
          <a href="#"><i class='bx bxl-instagram'></i></a>
          <a href="#"><i class='bx bxl-youtube'></i></a>
          <a href="#"><i class='bx bxl-linkedin' ></i></a>
        </div>
      </div>

        <div class="second-info">
          <h4>Support</h4>
          <p>If you have any questions or need assistance, please <a href="customer_service.php">contact us</a>.</p>
          <p>About Page</p>
          <p>Site Guide</p>
          <p>Shopping and Returns</p>
          <p>Privacy</p>
        </div>

        <div class="third-info">
          <h4>Shop</h4>
          <p>Men's Shopping</p>
          <p>Women's Shopping</p>
          <p>Kid's Shopping</p>
          <p>Furniture</p>
          <p>Discount</p>
        </div>

        <div class="fourth-info">
          <h4>Company</h4>
          <p>About</p>
          <p>Blog</p>
          <p>Affiliate</p>
          <p>Login</p>
        </div>
        <div class="five">
          <h4>Subscribe</h4>
          <p>Receive Updates, Hot Deals, Discounts Sent Straight In Your Inbox Daily</p>
          <p>Lorem ipsum dolor sit amet consectetur adipisi hytre ame dolor Debilis</p>
          <p>Receive Updates, Hot Deals, Discounts Sent Straight In Your Inbox Daily</p>
        </div>

     </div> 
    
  </section>

  <div class="end-text">
  <p>Copyright © @2023. All Rights Reserved. Designed by maria</p>
  
  </div>
</body>
</html>