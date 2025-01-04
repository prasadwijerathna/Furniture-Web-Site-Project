<?php
// Database connection
$servername = "127.0.0.1";
$username = "root";
$password = "mariadb";
$dbname = "homeheaven";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch items from the database
$sql = "SELECT * FROM items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New arrival </title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }
        .card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .card-content {
            padding: 15px;
        }
        .card-content h3 {
            margin: 0 0 10px;
            color: #555;
            font-size: 20px;
        }
        .card-content p {
            margin: 5px 0;
            font-size: 14px;
            color: #666;
        }
        .card-content .price {
            font-weight: bold;
            font-size: 16px;
            color: #333;
        }
        @media (max-width: 768px) {
            .card {
                width: 100%;
                max-width: 400px;
            }
        }
    </style>
</head>
<body>
    <h1>Items</h1>
    <div class="cards-container">
    <?php
    if ($result->num_rows > 0) {
        // Output data for each row
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card">';
            echo '<img src="' . htmlspecialchars($row["image_path"]) . '" alt="Item Image">';
            echo '<div class="card-content">';
            echo '<h3>' . htmlspecialchars($row["name"]) . '</h3>';
            echo '<p><strong>Category:</strong> ' . htmlspecialchars($row["category"]) . '</p>';
            echo '<p><strong>Description:</strong> ' . htmlspecialchars($row["description"]) . '</p>';
            echo '<p><strong>Warranty:</strong> ' . htmlspecialchars($row["warranty"]) . '</p>';
            echo '<p><strong>Dimension:</strong> ' . htmlspecialchars($row["dimension"]) . '</p>';
            echo '<p class="price"><strong>Price:</strong> $' . htmlspecialchars($row["price"]) . '</p>';
            echo '</div>';
            echo '</div>';
        }
    } else {
        echo "<p>No items found.</p>";
    }
    $conn->close();
    ?>
    </div>
</body>
</html>
