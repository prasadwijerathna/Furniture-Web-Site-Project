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
$sql1 = "SELECT * FROM items";
$result = $conn->query($sql1);

$sql2 = "SELECT * FROM customer";
$resultuser = $conn->query($sql2);

$sql = "SELECT * FROM Orders";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Shop Admin Panel</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #2c3e50;
            color: #ecf0f1;
            position: fixed;
            padding-top: 20px;
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar a {
            display: block;
            color: #ecf0f1;
            text-decoration: none;
            padding: 10px 20px;
            margin: 5px 0;
        }
        .sidebar a:hover {
            background-color: #34495e;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .header {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .card {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px 0;
        }
        .card h3 {
            margin-top: 0;
        }
        .button {
            display: inline-block;
            padding: 10px 15px;
            background-color: #3498db;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .button:hover {
            background-color: #2980b9;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .table th {
            background-color: #3498db;
            color: #fff;
        }
        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
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
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }
        table th {
            background-color: #f4f4f4;
            color: #333;
        }
        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        table tr:hover {
            background-color: #f1f1f1;
        }
        .no-data {
            text-align: center;
            margin: 20px auto;
            color: #666;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Admin Panel</h2>
    <a href="#products">Manage Products</a>
    <a href="#orders">Manage Orders</a>
    <a href="#users">Manage Users</a>
</div>

<div class="main-content">
    <div class="header">
        <h1>Home Heaven Furniture Shop Admin Panel</h1>
    </div>

    <div id="products" class=>
        <h3>Manage Products</h3>
        <a href="addNewProduct.php" class="button">Add New Product</a>
        <div class="cards-container">
            <?php
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card">';
                    echo '<div class="card-content">';
                  
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<p>No items found.</p>";
            }
           // $conn->close();
            ?>
            </div>
    </div>

    <div id="orders" class="card">
    <h1>Orders</h1>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Zip</th>
                    <th>Card Name</th>
                    <th>Card Number</th>
                    <th>Expiration Month</th>
                    <th>Expiration Year</th>
                    <th>CVV</th>
                    <th>Same Address</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['OrderID']); ?></td>
                        <td><?php echo htmlspecialchars($row['FullName']); ?></td>
                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                        <td><?php echo htmlspecialchars($row['Address']); ?></td>
                        <td><?php echo htmlspecialchars($row['City']); ?></td>
                        <td><?php echo htmlspecialchars($row['State']); ?></td>
                        <td><?php echo htmlspecialchars($row['Zip']); ?></td>
                        <td><?php echo htmlspecialchars($row['CardName']); ?></td>
                        <td><?php echo htmlspecialchars($row['CardNumber']); ?></td>
                        <td><?php echo htmlspecialchars($row['ExpMonth']); ?></td>
                        <td><?php echo htmlspecialchars($row['ExpYear']); ?></td>
                        <td><?php echo htmlspecialchars($row['CVV']); ?></td>
                        <td><?php echo htmlspecialchars($row['SameAddress']) ? 'Yes' : 'No'; ?></td>
                        <td><?php echo htmlspecialchars($row['CreatedAt']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No orders found.</p>
    <?php endif; ?>
    <?php $conn->close(); ?>
    </div>

    <div id="users" class="card">
        <h3>Manage Users</h3>
        <?php if ($resultuser->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $resultuser->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['customer_id']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['password']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="no-data">No customers found.</p>
    <?php endif; ?>
    <?php $conn->close(); ?>
    </div>
</div>

</body>
</html>
