<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(isset($_POST['usernamE'])&& ($_POST['passworD']) && ($_POST['address']) && ($_POST['contactNo']) ){
    $useRname = $_POST['usernamE'];
    $pasSword = $_POST['passworD'];
    $Address = $_POST['address'];
    $ConTact = $_POST['contactNo'];

    $CheckUsername = "SELECT customer_id FROM customers WHERE customer_id = '$useRname'";
    $result=$conn->query("$CheckUsername");
    if($result->num_rows>0){
        echo "<script>alert('User Name already Taken');</script>";
        header("location: registor.php");
        exit();
    }
    else {
        $insertQuery = "INSERT INTO customers (customer_id, Password, Name, address, phone) VALUES ('$useRname','$pasSword','$Address','$Address','$ConTact')";
        if($result=$conn->query($insertQuery) == TRUE){
            echo "<script>alert('Inserted');</script>";
            header("location: login.php");
        exit();
    }
            else {
            echo "Errord:".$conn->error;
            echo "<script>alert('Not');</script>";
            header("location: registor.php");
            exit();
        }
}
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    
    <style>
        body {
            background-image: url('Login.jpg');
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            overflow: hidden;
            background: linear-gradient(to right, #333, #555);
        }

        .navbar a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .navbar a.active {
            background-color: #777;
        }

        .navbar a:hover {
            background-color: #666;
        }

        .form-container {
            width: 50%;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            text-align: center;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        input[type="url"],
        select,
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            margin: 0;
            
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #555;
        }
        .form-container {
            
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
    width: 500px;
    height: 400px;
    margin-top: 200px;
    margin-left: 650px;
    margin-right: 650px;
}
.form-login {
    
    display: flex;
    flex-direction: column;
    align-items: center;
}
label, input, .error {
    margin: 5px;
}
    

    </style>
    <script type="text/javascript" src="script.js">
        </script>
</head>
<body>
    
    <div class="navbar">
        <a class="active" href="index.php">Home</a>
    </div>

    <div class="form-container">
        <h2>Enter your login credintionals here </h2>
        
        <form name = "form-login"  method="POST" action="account.php" onsubmit="return validateForm()" >
            <label>User Name</label>
            <input type="text" name="name" id="userName" required>
            <span class="error" id = "userNameError"></span><br>

            <label>Password:</label>
            <input type="password" name="pass" id="passWord" required>
            <span class="error" id = "passWordError"></span><br>

            <input type="submit"  value="Submit"><br>
            Not a member?<br>
            <a href="registor.php">click here to registor</a>
        </form>
    </div>
</body>
</html>