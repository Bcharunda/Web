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

if(isset($_GET["item_id"])){
    $product_id = $_GET["item_id"];   
    $product_NAME = $_GET["item_name"];
    $product_PRICE = $_GET["item_price"];
    $order_nuber = $_GET[$order_nub];
    $sql = "INSERT INTO `orders`(`Order_no`, `Amount`, `item_id`, `QTY`) 
    VALUES ('$order_nuber','$product_PRICE','$product_id','1')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
       
        header('Location: index.php');
        
    } else {
        
        echo "<script>alert('Error in placing order');</script>";
        
    }
}
?>