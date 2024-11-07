<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}
$sql = "select * from items";
$result = $conn->query($sql);
session_start(); 
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE-edge">
        <title>Men</title>
        <script src="https://kit.fontawesome.com/638033a549.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <script src="script.js">

        </script>
    </head>
    <body>
        <section id="header">
            <a href="index.php"><img src="Logo.png" class="logo" alt=""></a>
            <div class="elementor-widget-container" hidden>
                <form class="hfe-search-button-wrapper" role="search" action="" method="get">
                    <div class="hfe-search-form__container">
                        <input placeholder="Search" class="hfe-search-form__input" type="search" name="s"  title="Search" value>
                        
                    </div>
                    </form>
            </div>
            <div>
                <ul id="navbar">
                    <li><a href="index.php">HOME</a></li>
                    <li><a class="active" href="Men.html">MEN</a></li>
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
        <section id="Banner_men">
            <h2>Welcome to Men's Fashion</h2>
        </section>
        <section id="prod1" class="section-p1">
            <h2>Best Selling Men's Chino trousers</h2>
            <form action="cart.php" method="POST" >
            <div class="products-container">
            <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        $product_IDD = $row["item_id"];
                        $product_Name = $row["item_name"];
                        $product_PRI = $row["item_price"];
                        $product_IMG = $row["item_img"];
                        
                ?>
                <div class="product" data-name="p-12">
                    <?php $row["item_id"]; ?>
                    <img src="<?php echo $row["item_img"];  ?>" alt="">
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
        </form>
    </section>
        
        <section id="pageNv" class="section_m-p1">
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>
        </section><br>
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