<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Check if item_id is set in the query string
if (isset($_GET['item_id'])) {
    $productiD = $_GET['item_id'];
    $productiD = mysqli_real_escape_string($conn, $productiD);
    
    $sql = "SELECT * FROM items WHERE item_id = '$productiD'";
    $result = mysqli_query($conn, $sql);
    
    if ($row = mysqli_fetch_assoc($result)) {
        $pro_name = htmlspecialchars($row["item_name"]);
        $pro_price = htmlspecialchars($row["item_price"]);
        
        echo '
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }
            .form-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 300px;
            }
            .form-container h2 {
                margin-bottom: 20px;
                font-size: 24px;
                color: #333;
                text-align: center;
            }
            .form-container label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
                color: #333;
            }
            .form-container input[type="text"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }
            .form-container button {
                width: 100%;
                padding: 10px;
                background-color: #4CAF50;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                font-size: 16px;
            }
            .form-container button:hover {
                background-color: #45a049;
            }
        </style>
        
        <div class="form-container">
            <h2>Update Item</h2>
            <form action="update.php" method="POST">
                <label>Item ID</label>
                <input type="text" name="itemID" value="' . $productiD . '" readonly>
                <label>Item Name</label>
                <input type="text" name="itemName" value="' . $pro_name . '">
                <label>Item Price</label>
                <input type="text" name="itemPrice" value="' . $pro_price . '">
                <button type="submit" name="submitUP">Update</button>
            </form>
        </div>
        ';
    } else {
        echo "No item found with the given ID.";
    }
}


if (isset($_POST["submitUP"])) {
    $productid = mysqli_real_escape_string($conn, $_POST["itemID"]);
    $productname = mysqli_real_escape_string($conn, $_POST["itemName"]);
    $productprice = mysqli_real_escape_string($conn, $_POST["itemPrice"]);
    
    if ($productname != "" && $productprice != "" && $productid != "") {
        $sql = "UPDATE items SET item_name='$productname', item_price='$productprice' WHERE item_id='$productid'";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Your product updated successfully')</script>";
            header('Location: viewAllProducts.php');
        } else {
            echo "Not updated: " . mysqli_error($conn);
        }
    } else {
        echo "Tag mismatch";
    }
}

$conn->close();
?>

