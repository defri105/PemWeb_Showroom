<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginpengguna.php");
    exit();
}
include '../mahasiswa/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $car_name = $_POST['car_name'];
    $power = $_POST['power'];
    $torque = $_POST['torque'];
    $acceleration_0_100 = $_POST['acceleration_0_100'];
    $acceleration_0_300 = $_POST['acceleration_0_300'];
    $acceleration_402m = $_POST['acceleration_402m'];
    $top_speed = $_POST['top_speed'];
    $battery_capacity = $_POST['battery_capacity'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("INSERT INTO car_stats (car_name, power, torque, acceleration_0_100, acceleration_0_300, acceleration_402m, top_speed, battery_capacity, price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiididid", $car_name, $power, $torque, $acceleration_0_100, $acceleration_0_300, $acceleration_402m, $top_speed, $battery_capacity, $price);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Car</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #001f3f, #0056b3);
            color: white;
        }
        .container {
            background-color: #f9fafb;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 600px;
        }
        h1 {
            text-align: center;
            color: #001f3f;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        label {
            display: flex;
            flex-direction: column;
            width: calc(50% - 10px);
            font-size: 14px;
            color: #001f3f;
        }
        input {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }
        input:focus {
            border-color: #0056b3;
        }
        button {
            background-color: #001f3f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add New Car</h1>
        <form method="post">
            <label>Car Name:
                <input type="text" name="car_name" required>
            </label>
            <label>Power (HP):
                <input type="number" name="power" required>
            </label>
            <label>Torque (NM):
                <input type="number" name="torque" required>
            </label>
            <label>0-100 km/h (s):
                <input type="text" name="acceleration_0_100" required>
            </label>
            <label>0-300 km/h (s):
                <input type="text" name="acceleration_0_300">
            </label>
            <label>402m (s):
                <input type="text" name="acceleration_402m" required>
            </label>
            <label>Top Speed (km/h):
                <input type="number" name="top_speed" required>
            </label>
            <label>Battery Capacity (kWh):
                <input type="text" name="battery_capacity" required>
            </label>
            <label>Price (IDR):
                <input type="text" name="price" required>
            </label>
            <button type="submit">Add Car</button>
        </form>
    </div>
</body>
</html>
