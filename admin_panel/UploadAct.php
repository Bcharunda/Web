<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["submit"])){
    $productid = $_POST["itemID"];
    $productname = $_POST["itemName"];
    $productprice = $_POST["itemPrice"]; 
    
    $upload_dir = "";
    $upload_dir.$_FILES["imageUpload"]["name"];
    $product_image = $upload_dir.$_FILES["imageUpload"]["name"];
    $upload_file= $upload_dir.basename($_FILES["imageUpload"]["name"]);
    $imageType = strtolower(pathinfo($upload_file,PATHINFO_EXTENSION));
    $check = $_FILES["imageUpload"]["size"];
    $upload_ok = 1;
    
  
    if($upload_ok == 0){
        echo "stucks";
     }else{
         if($productname != "" && $productprice !=""){
             move_uploaded_file($_FILES["imageUpload"]["tmp_name"],$upload_file);
   
             $sql = "INSERT INTO `items`(`item_id`, `item_name`, `item_price`, `item_img`) 
                            VALUES ('$productid','$productname','$productprice','$product_image')";
   
             if($conn->query($sql) === TRUE){
                 echo "<script>alert('your product uploaded successfully')</script>";
                 header("location: viewAllProducts.php" );
             }else{
                echo "not upload";
                 }        
        }else{
            echo "tag mistmatch";
        }
     }
} else {
    echo "tag not f";
}
?>