<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #6e8efb, #a777e3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .signin-container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .signin-container h1 {
            margin-bottom: 20px;
            color: #555;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #6e8efb;
            outline: none;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #6e8efb;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn:hover {
            background-color: #567df4;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="signin-container">
        <h1>Sign In</h1>
        <form id="signinForm" method="post" action="signin.php">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="btn" name="submit">Sign In</button>
            <p class="error" id="errorMessage"></p>
        </form>
        <a href="../public/signup.php">don't have account?</a>
    </div>

    
<?php

require_once '../public/DBconnect.php';

function getData($connect,$email,$password){
    try {
        $sql = "select password from customer where email='$email'";

            
        $result = mysqli_query($connect,$sql);

        $row = mysqli_fetch_assoc($result);
        $data = $row['password'];

        if($password == $data){
            echo "<script>
               
                    window.open('payment.php ', '_blank');  
                    window.location.href = 'Home Heaven Furniture.php' 
                        </script>";
        }else{
            echo "<script>
                    alert('Password is incorrect! Try Again');
                    document.getElementById('loginForm').reset();
                </script>";
        }
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

try{if(isset($_POST['submit'])){
    $name = $_POST['email'];
    $password = $_POST['password'];

    getData($connect,$name,$password);

}
}catch(Exception $e)
{}
    
?> 
   
</body>
</html>
