<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start(); 


$_SESSION['first_login_done'] = array();


session_destroy();


header("Location: login.php");

?>
<html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE-edge">
        <title>Acoount</title>
        <script src="https://kit.fontawesome.com/638033a549.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
<script src="script.js">

        </script>
    </head>
    <body>
        <section id="header">
            <a href="#"><img src="Logo.png" class="logo" alt=""></a>
            <div class="elementor-widget-container" hidden>
                <form class="hfe-search-button-wrapper" role="search" action="" method="get">
                    <div class="hfe-search-form__container">
                        <input placeholder="Search" class="hfe-search-form__input" type="search" name="s"  title="Search" value>   
                    </div>
                    </form>
            </div>
            <div>
                <ul id="navbar">
                    <li><a href="index.php">Home</a></li>
                    <li><a  href="Men.php">Men</a></li>
                    <li><a href="Women.php">Women</a></li>
                    <li><a  href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><a class="active" href="LogoutPage.php"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </div>
        </section>
        <div class="image-button-container">
    
        <img src="login.jpg" alt="Login Background" >
        <a href="login.php">
        <button type="button">Log in to order!</button>
        </a>
    
</div>

        <section id="newltr"class="sec1-p1-sec1-m1">
            <div class="newTxt">
                <h4>Sign Up Now</h4>
                <p>Get amazing offers best suits for you</p>
            </div>
            <div class="abt">
                <h4>contact Us</h4>
                <p>Dhammika Textile (pvt) Ltd<br>
                    Main street <br>
                    Baddegama<br>
                   </p><br>
                   <p>phone: 091 22 568 12</p>
                   <p>opening hours: 09:00 AM to 6:00 PM every day</p>
            </div>
            <div class="abt">
                <h4>About</h4>
                <p>
    
                    Our journey is all about celebrating your free<br>
                    -spirited personality with versatile clothing that’s<br>
                     meant to work, dance and play</p>
            </div>
            </section>
        </body>
        </html>