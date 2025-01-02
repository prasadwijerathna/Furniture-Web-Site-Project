<?php
// Database connection
$servername = "localhost"; // Change this to your server name
$username = "root";        // Change this to your database username
$password = "";            // Change this to your database password
$dbname = "uni"; // Change this to your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $description = $_POST['Description'];
    $warranty = $_POST['Warrenty'];
    $dimension = $_POST['Dimension'];
    $price = $_POST['price'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $upload_dir = "uploads/"; // Folder to store images
        $image_path = $upload_dir . basename($image_name);

        // Create the uploads folder if it doesn't exist
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Move the uploaded file to the server
        if (move_uploaded_file($image_tmp_name, $image_path)) {
            // Prepare SQL to insert data into the database
            $sql = "INSERT INTO items (name, category, description, warranty, dimension, price, image_path) 
                    VALUES ('$name', '$category', '$description', '$warranty', '$dimension', '$price', '$image_path')";

            if ($conn->query($sql) === TRUE) {
                echo "Item added successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Failed to upload image.";
        }
    } else {
        echo "Image upload failed. Please try again.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Items</title>
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
    <h1>Add Items</h1>
  </header>
  <div class="container">
    
  <form method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name">
  </div>
  <div class="form-group">
    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image" accept="image/*">
  </div>
  <div class="form-group">
    <label for="category">Category:</label>
    <input type="text" id="category" name="category">
  </div>
  <div class="form-group">
    <label for="Description">Description:</label>
    <input type="text" id="Description" name="Description">
  </div>
  <div class="form-group">
    <label for="Warrenty">Warranty:</label>
    <textarea id="Warrenty" name="Warrenty"></textarea>
  </div>
  <div class="form-group">
    <label for="Dimension">Dimension:</label>
    <textarea id="Dimension" name="Dimension"></textarea>
  </div>
  <div class="form-group">
    <label for="price">Price:</label>
    <input type="text" id="price" name="price">
  </div>
  <div class="form-group">
    <button type="submit">send</button>
  </div>
</form>

 
  </div>
</body>
</html>
