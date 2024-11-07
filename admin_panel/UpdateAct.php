<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_GET["submitUP"])){
    $productid = $_GET["item_id"];
    $productname = $_GET["item_name"];
    $productprice = $_GET["item_price"]; 

         if($productname != "" || $productprice !="" || $productid != ""){
            
   
             $sql = "UPDATE `items` SET `item_name`='$productname',
                            `item_price`='$productprice' WHERE `item_id` = `$productid`";
   
             if($conn->query($sql) === TRUE){
                 echo "<script>alert('your product updated successfully')</script>";
             }else{
                echo "not updated".$conn->error;
                 }        
        }else{
            echo "tag mistmatch";
        }
     }else {
        echo "tag not f";

}
?>