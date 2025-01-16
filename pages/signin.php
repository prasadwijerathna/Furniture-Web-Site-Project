<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .sign-in-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .sign-in-container h1 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #555;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4a90e2;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
        }

        .sign-in-button {
            width: 100%;
            padding: 0.75rem;
            background-color: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .sign-in-button:hover {
            background-color: #357abd;
        }

        .additional-links {
            margin-top: 1rem;
            text-align: center;
        }

        .additional-links a {
            color: #4a90e2;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .additional-links a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="sign-in-container">
        <h1>Sign In</h1>
        <form id="signinForm" method="post" action="signin.php">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>
            <button type="submit" class="sign-in-button" name="submit">Sign In</button>
        </form>
        <div class="additional-links">
            <p><a href="#">Forgot your password?</a></p>
            <p><a href="../public/signup.php">Create an account</a></p>
        </div>
    </div>

    
<?php

require_once '../public/DBconnect.php';

function getData($connect,$email,$password){
    try {
        $sql = "select email,password from customer where email='$email'";

            
        $result = mysqli_query($connect,$sql);

        $row = mysqli_fetch_assoc($result);
        $countrec = mysqli_num_rows($result);
        $uname=$row['email'];
        $pword=$row['password'];
        
        if($countrec == 1){
            if($uname == 'admin@gmail.com' && $password == $pword){
                echo "<script>
               
                            window.open('../public/admin.php ', '_blank');  
                            window.location.href = 'Home Heaven Furniture.php' 
                                </script>";

            }
            else if($password == $pword){
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
            
        }
        
        
        


     
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

try{
    if(isset($_POST['submit'])){
    $name = $_POST['email'];
    $password = $_POST['password'];

    getData($connect,$name,$password);

}
}catch(Exception $e)
{}
    
?> 
   
</body>
</html>
