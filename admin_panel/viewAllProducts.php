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
  <title>Products</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <h2>Product Items</h2>
    <table>
      <thead>
        <tr>
          <th>Item ID</th>
          <th>Item Name</th>
          <th>Item Price</th>
          <th>Item Image</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM items";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
          echo "Error: " . mysqli_error($conn);
        } else {
          while ($row = mysqli_fetch_array($result)) {
            ?>
            <tr>
              <td><?php echo $row['item_id']; ?></td>
              <td><?php echo $row['item_name']; ?></td>
              <td><?php echo $row['item_price']; ?></td>
              <td><img src="<?php echo $row['item_img']; ?>"  style="width: 100px; height: 100px;" alt="<?php echo $row['item_name']; ?>" ></td>
              <td>
                <a href="update.php?item_id=<?php echo $row['item_id']; ?>" class="btn update">Update</a>
                <a href="delete.php?item_id=<?php echo $row['item_id']; ?>" class="btn delete">Delete</a>
              </td>
            </tr>
            <?php
          }
        }
        ?>
      </tbody>
    </table>
    <button class="add-btn"><a href="upload.php">Add Product</a></button>
  </div>
</body>
</html>
