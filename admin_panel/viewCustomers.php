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
  <title>Customers</title>
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
    <h2>All Customers</h2>
    <table>
      <thead>
        <tr>
          <th>Username</th>
          <th>Password</th>
          <th>Name</th>
          <th>Address</th>
          <th>Contact Number</th>
          <th>action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM customers";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
              <td><?php echo $row['customer_id']; ?></td>
              <td><?php echo $row['Password']; ?></td>
              <td><?php echo $row['Name']; ?></td>
              <td><?php echo $row['address']; ?></td>
              <td><?php echo $row['phone']; ?></td>
              <td><form action="deleteCus.php" method="POST">
                <input type="hidden" name="cus_id" value="<?php echo $row['customer_id']; ?>">
                <button>Delete</button></form></td>
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
