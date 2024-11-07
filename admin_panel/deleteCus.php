<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if (isset($_POST["cus_id"])) {
    $id = $_POST["cus_id"];
    $sql = "DELETE FROM `customers` WHERE `customer_id` = '$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('user deleted');</script>";
        header("location: viewCustomers.php" );
    }else{
        die(mysqli_error($conn));
        
    }
}else{
    
    echo"id not f";
}
?>
