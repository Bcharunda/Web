<?php

 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_fashion";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["namE"]) && isset($_POST["pasS"])){
    $Nam = $_POST["namE"];
    $Pas = $_POST["pasS"];
      if(($Nam == "admin") &&($Pas == "admin")){
          header("location: index.php" );
        }else{
          echo"<script>alert('wrong password or username');</script>";
          header("location: Login.php" );
          
    }
  }else{
    
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .navbar {
            position: absolute;
            top: 0;
            width: 100%;
            overflow: hidden;
            background: linear-gradient(to right, #333, #555);
            padding: 10px 0;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar a {
            float: left;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .navbar a.active {
            background-color: #777;
        }

        .navbar a:hover {
            background-color: #666;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.9); 
            padding: 40px 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        input[type="url"],
        select,
        textarea {
            width: calc(100% - 20px);
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #333;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: calc(50% - 10px);
            margin: 10px 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #555;
        }

        .form-login {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
   
    

    
    <script type="text/javascript" src="script.js">
        </script>
</head>
<body>
    
    

    <div class="form-container">
        <h2>Enter your login credintionals here </h2>
        
        <form name = "form-login"  method="POST" action="Login.php" onsubmit="return validateForm()" >
            <label>User Name</label>
            <input type="text" name="namE" id="userName" required>
            <span class="error" id = "userNameError"></span><br>

            <label>Password:</label>
            <input type="password" name="pasS" id="passWord" required>
            <span class="error" id = "passWordError"></span><br>

            <input type="submit"  value="Login now"><br>
            
        </form>
    </div>
</body>
</html>