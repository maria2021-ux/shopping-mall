<?php
session_start();

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

// Fetch all products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 90%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #ffffff;
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }
        header h1 {
            margin: 0;
            font-size: 2em;
        }
        .search-bar {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .search-bar input[type="text"] {
            padding: 10px;
            border: 2px solid #004d40;
            border-radius: 4px;
            width: 300px;
        }
        .search-bar button {
            padding: 10px 20px;
            border: none;
            background-color: #004d40;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            margin-left: 10px;
        }
        .search-bar button:hover {
            background-color: #00332e;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .product-item {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
        }
        .product-images {
            position: relative;
            width: 100%;
            height: 200px;
            overflow: hidden;
        }
        .carousel {
            display: flex;
            height: 100%;
        }
        .carousel-images {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .carousel-images img {
            width: 100%;
            height: auto;
        }
        .product-details {
            padding: 15px;
        }
        .product-name {
            font-size: 1.25em;
            color: #004d40;
            margin: 10px 0;
        }
        .product-price {
            font-size: 1.1em;
            color: #004d40;
            margin-bottom: 15px;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 4px;
            color: #fff;
            text-decoration: none;
            font-size: 14px;
            margin: 5px;
        }
        .btn-add-to-cart {
            background-color: #1d6042;
        }
        .btn-add-to-cart:hover {
            background-color: #1d6042;
        }
        .btn-see-more {
            background-color: #1d6042;
        }
        .btn-see-more:hover {
            background-color: #1d6042;
        }
    </style>
</head>
<body>

<header>
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
  </head>
  <style>
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
.title-bar {
            background-color: #ffffff; /* Dark green background */
            color: #ffffff;
            padding: 10px 20px;
            text-align: center;
            font-size: 20px;
            position: relative;
        }

        .title-bar .logo img {
            max-width: 100%; /* Responsive scaling */
            height: auto; /* Maintain aspect ratio */
        }

  </style>
<body>
    <header>
   
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
          <a href="cart.php"><i class="bx bx-cart"></i></a>
          <a href="profile.php"><i class="bx bx-user"></i></a>
  
      </div>
    </header>
     
  <!-- Search Result Container -->
  <div id="search-container"></div>
  
<script>
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
    
</body>
</html>
</header>

<div class="container">
    

    <div class="product-grid">
        <?php
        // Check if there are any products and display them
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="product-item">';
                echo '<div class="product-images">';
                echo '<div class="carousel">';
                echo '<div class="carousel-images">';
                if (!empty($row['image'])) {
                    echo '<img src="uploads/' . htmlspecialchars($row['image']) . '" alt="Product Image 1">';
                }
                if (!empty($row['image2'])) {
                    echo '<img src="uploads/' . htmlspecialchars($row['image2']) . '" alt="Product Image 2">';
                }
                if (!empty($row['image3'])) {
                    echo '<img src="uploads/' . htmlspecialchars($row['image3']) . '" alt="Product Image 3">';
                }
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="product-details">';
                echo '<div class="product-name">' . htmlspecialchars($row['name']) . '</div>';
                echo '<div class="product-price">Price: ₩' . htmlspecialchars($row['price']) . '</div>';
                echo '<form action="add_to_cart.php" method="POST" style="display:inline;">';
                echo '<input type="hidden" name="product_id" value="' . htmlspecialchars($row['id']) . '">';
                echo '<button type="submit" class="btn btn-add-to-cart">Add to Cart</button>';
                echo '</form>';
                echo '<a href="product_details.php?id=' . $row['id'] . '" class="btn btn-see-more">See More</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>No products found.</p>';
        }

        $conn->close();
        ?>
    </div>
</div>

<script>
    function nextSlide(button) {
        const carousel = button.parentElement.parentElement.querySelector('.carousel-images');
        const width = carousel.offsetWidth;
        carousel.style.transform = 'translateX(-' + width + 'px)';
    }

    function prevSlide(button) {
        const carousel = button.parentElement.parentElement.querySelector('.carousel-images');
        carousel.style.transform = 'translateX(0)';
    }
</script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
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
    <title>Product Details</title>
    <style>
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

#search-container {
    position: absolute;
    background-color: #fff;
    width:300px;
    border: 1px solid #ccc;
    border-radius: 4px;
   margin-bottom :-260px;  
   margin-left: 914px;
   margin-top: -110px;
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

      <script>  function changeMainImage(src) {
        document.getElementById('mainImage').src = src;
    }
    const header = document.querySelector("header");

window.addEventListener ("scroll", function(){
    header.classList.toggle ("sticky", this.window.scrollY > 0);
})

let menu = document.querySelector('#menu-icon');
let navmenu = document.querySelector('.navmenu');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navmenu.classList.toggle('open');
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