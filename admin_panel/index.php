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
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="new.css">
  <script type="text/javascript" src="script.js"></script>
</head>
<body>
  <div class="sidebar">
    <h3><a href="index.php">Home</a></h3>   
    <h3><a href="viewAllProducts.php">Products</a></h3>   
    <h3><a href="viewAllOrders.php">Orders</a></h3>   
    <h3><a href="viewCustomers.php">Customers</a></h3>   
    <button class="btn logout-btn"><a href="Login.php">Logout</a></button>
  </div>
  <div class="content">
    <div class="stats">
      <h4>Total Products</h4>
      <h5>
      <?php
         $sql = "SELECT * FROM items";
         $result = $conn->query($sql);
         $count = $result->num_rows;
         echo $count;
      ?>
      </h5>
    </div>
    <div class="stats">
      <h4>Total Orders</h4>
      <h5>
      <?php
         $sql = "SELECT * FROM orders";
         $result = $conn->query($sql);
         $count = $result->num_rows;
         echo $count;
      ?>
      </h5>
    </div>
  </div>
</body>
</html>
