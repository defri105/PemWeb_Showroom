<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginpengguna.php");
    exit();
}
include '../mahasiswa/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            color: #333;
        }
        .section {
            margin-bottom: 40px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        a {
            text-decoration: none;
            color: blue;
        }
        .btn {
            display: inline-block;
            padding: 5px 10px;
            margin: 5px 0;
            color: white;
            background-color: green;
            text-decoration: none;
            border-radius: 4px;
        }
        .btn.delete {
            background-color: red;
        }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <!-- Manage Users -->
    <div class="section">
        <h2>Manage Users</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM users");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['username']}</td>
                    <td>{$row['role']}</td>
                    <td>
                        <a href='edit_user.php?id={$row['id']}' class='btn'>Edit</a>
                        <a href='delete_user.php?id={$row['id']}' class='btn delete'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <a href="add_user.php" class="btn">Add User</a>
    </div>

    <!-- Manage Car Stats -->
    <div class="section">
        <h2>Manage Car Stats</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Car Name</th>
                <th>Power (HP)</th>
                <th>Torque (NM)</th>
                <th>0-100 km/h (s)</th>
                <th>0-300 km/h (s)</th>
                <th>402m (s)</th>
                <th>Top Speed (km/h)</th>
                <th>Battery Capacity (kWh)</th>
                <th>Price (IDR)</th>
                <th>Actions</th>
            </tr>
            <?php
            $result = $conn->query("SELECT * FROM car_stats");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['car_name']}</td>
                    <td>{$row['power']}</td>
                    <td>{$row['torque']}</td>
                    <td>{$row['acceleration_0_100']}</td>
                    <td>{$row['acceleration_0_300']}</td>
                    <td>{$row['acceleration_402m']}</td>
                    <td>{$row['top_speed']}</td>
                    <td>{$row['battery_capacity']}</td>
                    <td>" . number_format($row['price'], 0, ',', '.') . "</td>
                    <td>
                        <a href='edit_car.php?id={$row['id']}' class='btn'>Edit</a>
                        <a href='delete_car.php?id={$row['id']}' class='btn delete'>Delete</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
        <a href="add_car.php" class="btn">Add Car</a>
    </div>
</body>
</html>