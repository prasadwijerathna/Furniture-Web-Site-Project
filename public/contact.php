<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Us</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }
    header {
      background-color: #4CAF50;
      color: white;
      text-align: center;
      padding: 20px 0;
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    h2 {
      margin-bottom: 20px;
      color: #4CAF50;
    }
    
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    .form-group input, .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }
    .form-group textarea {
      height: 100px;
      resize: none;
    }
    .form-group button {
      background-color: #4CAF50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    .form-group button:hover {
      background-color: #45a049;
    }
    .social-links {
      text-align: center;
      margin-top: 20px;
    }
    .social-links img {
      width: 30px;
      height: 30px;
      margin: 0 10px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <header>
    <h1>Contact Us</h1>
  </header>
  <div class="container">
    <h2>We'd love to hear from you!</h2>
    <form action="contact.php" method="post">
      <div class="form-group">
        <label for="name">User Name:</label>
        <input type="text" name="username" placeholder="Enter your name" >
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="message">Message:</label>
        <textarea id="message" name="message" placeholder="Your message" required></textarea>
      </div>
      <div class="form-group">
        <button type="submit">Send Message</button>
      </div>
    </form>
    <div class="social-links">
      <p>Follow us on:</p>
      <a href="https://facebook.com" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
      </a>
      <a href="https://twitter.com" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter">
      </a>
      <a href="https://instagram.com" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733558.png" alt="Instagram">
      </a>
      <a href="https://linkedin.com" target="_blank">
        <img src="https://cdn-icons-png.flaticon.com/512/733/733561.png" alt="LinkedIn">
      </a>
    </div>
  </div>

  <div>
  <?php


//require_once 'DB.php';
require_once 'public/DBConnect.php';

//insert data into students table
function addData($connect,$username,$email,$message){
    try {
        $sql = "INSERT INTO contactus VALUES ('$username','$email','$message')  ";

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
    $name = $_POST['username'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    //echo "<p>".$name."</P>";
    addData($connect,$name,$email,$message);
   // printTableCol() ;
}
?>
  </div>
</body>
</html>
