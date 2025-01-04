<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "uni";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders from the database
$sql = "SELECT * FROM Orders";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
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
            margin: 20px 0;
            color: #666;
        }
    </style>
</head>
<body>
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
</body>
</html>
