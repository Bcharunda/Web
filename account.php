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



if (!isset($_SESSION['first_login_done'])) {
    if(isset($_POST['name']) && ($_POST['pass'])){
        $userName = $_POST['name'];
        $passWord = $_POST['pass'];
        $sql = "SELECT customer_id , Password FROM customers WHERE customer_id = '$userName' AND Password = '$passWord'";
         $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_array($result);
                if($row["customer_id"] === $userName &&$row["Password"] === $passWord){
                
                 $_SESSION['customer_id'] = $row['customer_id'];
                 $_SESSION['Password'] = $row['Password'];
                
               
            }else {
               echo "<script>alert('Incorrect Username or Password');</script>";
               header("Location: login.php");
               
               
            }
        }else {
        echo "<script>alert('Incorrect Username or Password');</script>";
        
        header("Location: login.php");
        }


        } else {
    
        echo "null";
    
        exit();
    }
    $_SESSION['first_login_done'] = true;
}

?>
<!doctype html>
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
    <?php
    
    ?>
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
                    <li><a  href="Men.php">MEN</a></li>
                    <li><a href="Women.php">WOMEN</a></li>
                    
                    <li><a  href="cart.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
                    <li><a class="active" href="account.php"><i class="fas fa-user-circle"></i></a></li>
                </ul>
            </div>
        </section>
        <div class="container">
            <i class="fas fa-user-circle" ></i>
            <h1>My Account</h1>
            <div class="section" id="password">
                <h2>Change Password</h2>
                <form>
                    <input type="password" placeholder="Current Password" required>
                    <input type="password" placeholder="New Password" required>
                    <input type="password" placeholder="Confirm New Password" required>
                    <button type="submit">Update Password</button>
                </form>
            </div>
            <div class="section" id="billing">
                <h2>Billing Address</h2>
                <form>
                    <input type="text" placeholder="Street Address" required>
                    <input type="text" placeholder="City" required>
                    <input type="text" placeholder="State" required>
                    <input type="text" placeholder="Zip Code" required>
                    <button type="submit">Update Address</button>
                </form>
            </div>
            <div class="section" id="Mobile">
                <h2>Mobile number</h2>
                <form>
                    <input type="number" placeholder="New phone number" required>
                    <button type="submit">Update Phone number</button>
                </form>
            </div>
            <div class="section" id="orders">
                <h2>My Orders</h2>
                <table width = 100%>
                    <thead>
                        <tr>
                        <td>Order no</td>
                        <td>Image</td>
                        <td>Price</td>
                        <td>Status</td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="section" id="logout_button">
        <form action="LogoutPage.php">
        <button type="submit">Log Out</button>
        </form>
        </div>
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