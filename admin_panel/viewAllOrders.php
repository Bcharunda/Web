<?php
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
  <title>Orders</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="new.css">
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
    <h2>Order Details</h2>
    <table>
      <thead>
        <tr>
          <th>Order No</th>
          <th>Amount</th>
          <th>Item ID</th>
          <th>Quantity</th>
          <th>Customer ID</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM orders";
        $result = mysqli_query($conn, $sql);
        
        if (!$result) {
          echo "Error: " . mysqli_error($conn);
        } else {
          while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
              <td><?php echo $row['Order_no']; ?></td>
              <td><?php echo $row['Amount']; ?></td>
              <td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['QTY']; ?></td>
              <td><?php echo $row['customer_id']; ?></td>
              <td><a href="cancelorder.php?Order_no=<?php echo $row['Order_no']; ?>" class="btn delete">Cancel Order</a></td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
