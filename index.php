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
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <script src="https://kit.fontawesome.com/638033a549.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <script src="script.js"></script>
    </head>
    <body>
        <section id="header">
            <a href="index.php"><img src="Logo.png" class="logo" alt=""></a>
            <div class="elementor-widget-container" hidden>
                <form class="hfe-search-button-wrapper" role="search" action="" method="get">
                    <div class="hfe-search-form__container">
                        <input placeholder="Search" class="hfe-search-form__input" type="search" name="s" title="Search" value="">
                    </div>
                </form>
            </div>
            <div>
                <ul id="navbar">
                    <li><a class="active" href="index.php">HOME</a></li>
                    <li><a href="Men.php">MEN</a></li>
                    <li><a href="Women.php">WOMEN</a></li>
                    <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <?php
                    if (!isset($_SESSION['first_login_done'])) {
    
                        
                    echo'<li><a  href="LogoutPage.php"><i class="fas fa-user-circle"></i></a></li>';
                    
                    } else{
                        echo'<li><a  href="account.php"><i class="fas fa-user-alt"></i></a></li>';
                     } ?>
                    
                    
                </ul>
            </div>
        </section>
        <section id="hP">
            <h4>best-offer</h4>
            <h2>super value deals</h2>
            <h1>on all products</h1>
            <p>save more with your credit/debit card</p>
            <button onclick="location.href='Women.php'">shop now</button>
        </section>
        <section id="features" class="section-p1">
            <div class="fe-box">
                <img src="f1.png" alt="">
                <h5>Free Shipping</h5>
            </div>
            <div class="fe-box">
                <img src="f2.png" alt="">
                <h5>Online Order</h5>
            </div>
            <div class="fe-box">
                <img src="f3.png" alt="">
                <h5>Save Money</h5>
            </div>
            <div class="fe-box">
                <img src="f4.png" alt="">
                <h5>Promotions</h5>
            </div>
            <div class="fe-box">
                <img src="f5.png" alt="">
                <h5>Happy Sell</h5>
            </div>
            <div class="fe-box">
                <img src="f6.png" alt="">
                <h5>24/7 support</h5>
            </div>
        </section>
        <section id="prod1" class="section-p1">
            <h2>featured products</h2>
            <p>New collection modern design</p>
            
            <div class="products-container">
                
                <?php
                $sql = "SELECT * FROM items";
                $result = $conn->query($sql);
                
                if (!$result) {
                    die("Query failed: " . $conn->error);
                }

                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_IDD = $row["item_id"];
                        $product_Name = $row["item_name"];
                        $product_PRI = $row["item_price"];
                        $product_IMG = $row["item_img"];
                ?>
                <div class="product">
                <?php $row["item_id"]; ?>
                    <img src="<?php echo $row["item_img"]; ?>" alt="">
                    <div class="des">
                        <h5><?php echo $row["item_name"]; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4><?php echo $row["item_price"]; ?></h4>
                    </div>
                    
                    
                    <button><a href="cart.php?item_id=<?php echo $product_IDD; ?>">
                    <i class="fa fa-shopping-cart"></i> Order now</a>
                    </button> 
                    
                </div>
                <?php 
                    }
                ?>
            </div>
            
        </section>
        <section id="banner" class="section-m1">
            <h4>services</h4>
            <h2>Up to 70% off - All t-shirts & Accessories</h2>
            <button class="normal">Explore more</button>
        </section>
        <section id="sm-banner" class="section-p1">
            <div class="banner-box">
                <h4>crazy deals</h4>
                <h2>buy 1 get 1 free</h2>
                <span>the best classic dress is on sale at cart</span>
                <button class="normal">Learn more</button>
            </div>
            <div class="banner-box3">
                <h4>Save</h4>
                <h2>up to 20%</h2>
                <span>Mens wear | Womens wear </span>
                <button class="normal">collection</button>
                </div>
            <div class="banner-box2">
                <h4>New year season</h4>
                <h2>upcoming season</h2>
                <span>the best classic dress is on sale at cart</span>
                <button class="normal">collection</button>
            </div>
        </section>
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
