<?php
session_start();
 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);

}



?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA_Compatible" content="IE-edge">
        <title>Cart</title>
        <script src="https://kit.fontawesome.com/638033a549.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="style.css">
        <script>
            
        </script>
    </head>
    <body>
        <section id="header">
            <a href="index.php"><img src="Logo.png" class="logo" alt=""></a>
            <div class="elementor-widget-container" hidden>
                <form class="hfe-search-button-wrapper" role="search" action="" method="get" hidden>
                    <div class="hfe-search-form__container" hidden>
                        <input placeholder="Search" class="hfe-search-form__input" type="search" name="s"  title="Search" hidden>
                        
                    </div>
                    </form>
            </div>
            <div>
                <ul id="navbar">
                    <li><a href="index.php">HOME</a></li>
                    <li><a  href="Men.php">MEN</a></li>
                    <li><a href="Women.php">WOMEN</a></li>
                    <li><a class="active" href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><a href="LogoutPage.php"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </div>
        </section>
        <section id="Banner_cart">
        </section>
        <section>
        <?php
echo '<section>';
if (isset($_GET["item_id"])) {
    $product_id = $_GET["item_id"];
    $sql = "SELECT item_name, item_price, item_img FROM items WHERE item_id = '$product_id'";
    $result = $conn->query($sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $product_image = $row["item_img"];
        $product_NAME = $row["item_name"];
        $product_PRICE = $row["item_price"];
        $order_nub = uniqid('order_', true);

        echo '<style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 18px;
            text-align: left;
        }
        th, td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>';
        echo '<table border="1">';
        echo '<tr><th>Order NO</th><td>' . $order_nub . '</td></tr>';
        echo '<tr><th>Item Name</th><td>' . $product_NAME . '</td></tr>';
        echo '<tr><th>Amount</th><td>' . $product_PRICE . '</td></tr>';
        echo '<tr><th>QTY</th><td>1</td></tr>';
        echo '</table>';

        echo '<form action="cart.php" method="GET">';
        echo '<input type="hidden" name="item_id" value="' . $product_id . '">';
        echo '<input type="hidden" name="item_name" value="' . $product_NAME . '">';
        echo '<input type="hidden" name="item_price" value="' . $product_PRICE . '">';
        echo '<input type="hidden" name="order_no" value="' . $order_nub . '">';
        echo '<button type="submit" style="background: #088178; border: 1px solid #088178; color: white; padding: 10px 20px; font-size: 16px; cursor: pointer;">Place Order</button>';
        echo '</form>';

        if (isset($_GET["order_no"])) {
            $order_nuber = $_GET["order_no"];
            $product_id = $_GET["item_id"];
            $product_NAME = $_GET["item_name"];
            $product_PRICE = $_GET["item_price"];
            
            $sql = "INSERT INTO `orders`(`Order_no`, `Amount`, `item_id`, `QTY` ) 
            VALUES ('$order_nuber',' $product_PRICE','$product_id','1')";
            $result = mysqli_query($conn, $sql);
        
            if ($result) {
                header('Location: index.php');
                exit;
            } else {
                echo "<script>alert('Error in placing order');</script>";
            }
    }
}



}
echo '</section>';
?>

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
