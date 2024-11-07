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
    <title>Upload Product</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="new.css">
</head>
<body>
    <div class="form-container">
        <form method="POST" action="UploadAct.php" enctype="multipart/form-data">
            <label for="itemID">Item ID</label>
            <input type="text" name="itemID" id="itemID" required>

            <label for="itemName">Item Name</label>
            <input type="text" name="itemName" id="itemName" required>

            <label for="itemPrice">Item Price</label>
            <input type="text" name="itemPrice" id="itemPrice" required>

            <label for="imageUpload">Item Image</label>
            <input type="file" name="imageUpload" id="imageUpload" required hidden>
            <button type="button" id="choose" onclick="upload()">Choose Image</button>

            <input type="submit" value="Upload" name="submit">
        </form>
    </div>
    <script>
        var productid = document.getElementById("itemID");
        var name = document.getElementById("itemName");
        var price = document.getElementById("itemPrice");
        var choose = document.getElementById("choose");
        var uploadImage = document.getElementById("imageUpload");

        function upload(){
            uploadImage.click();
        }

        uploadImage.addEventListener("change", function() {
            var file = this.files[0];
            if (productid.value == "") {
                name.value = file.name;
            }
            choose.innerHTML = "You can change (" + file.name + ") picture";
        });
    </script>
</body>
</html>
