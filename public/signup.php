<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 0;
    }
    .signup-container {
      max-width: 400px;
      margin: 50px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .signup-container h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .form-group button {
      width: 100%;
      padding: 10px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      font-size: 16px;
      cursor: pointer;
    }
    .form-group button:hover {
      background-color: #45a049;
    }
    .signup-container .login-link {
      text-align: center;
      margin-top: 10px;
    }
    .signup-container .login-link a {
      color: #4CAF50;
      text-decoration: none;
    }
    .signup-container .login-link a:hover {
      text-decoration: underline;
    }
  </style>

<body>
    <div class="signup-container">
    <h2>Create an Account</h2>
    <form action="signup.php" method ="POST">
    <div class="form-group">

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Enter your username" required>
      </div>

        <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>

         <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Enter your password" required>
      </div>

      <div class="form-group">
        <button type="submit">Sign Up</button>
      </div>

      <div class="login-link">
      Already have an account? <a href="../pages/Home Heaven Furniture.php">Login here</a>
    </div>

    </form>
    </div>
    <?php


    //require_once 'DB.php';
    require_once 'DBconnect.php';

    //insert data into students table
    function addData($connect,$username,$email,$password){
        try {
            $sql = "INSERT INTO customer (username,email,password) VALUES ('$username','$email','$password')  ";
    
        $result = mysqli_query($connect,$sql);
        if ($result) {
            //echo "New customer record created successfully!";
        }else{
            die("Error".mysqli_error($connect));
        }
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //echo "Get the post request from the client";
        //$customerid = $_POST['customerid'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        //echo "<p>".$name."</P>";
        addData($connect,$username,$email,$password);
       // printTableCol() ;
    }
?>
</body>
</html>