<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_GET['Order_no'])){
    $id = $_GET['Order_no'];
    $sql = "DELETE FROM orders WHERE Order_no = '$id'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die(mysqli_error($conn));
        
        }else{
            echo"<script>alert('order canceled');</script>";
            header("location: viewAllOrders.php" );  
        }
}else{
    echo'Order_no not found';
}
?>