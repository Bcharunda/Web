
<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

 if (isset($_GET['item_id'])) {
    $id=$_GET['item_id'];

    $sql="DELETE FROM items WHERE item_id ='$id'";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "deleted";
        header("location: viewAllProducts.php" );
    }else{
        die(mysqli_error($conn));
    }
}else{
    die(mysqli_error($conn));
}
    ?>