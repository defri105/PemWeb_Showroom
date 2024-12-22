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
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #001f3f; /* Light gray background */
            color: #333;
        }
        h1 {
            text-align: center;
            margin: 20px 0;
            color: white;
            font-size: 2.5rem;
        }
        .section {
            margin: 20px auto;
            padding: 20px;
            max-width: 1200px;
            background-color: #001f3f; /* White section background */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .section h2 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
            font-size: 2rem;
        }
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: white; /* Soft gray for cards */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 280px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #001f3f;
        }
        .card p {
            font-size: 1rem;
            margin-bottom: 15px;
            color: #001f3f;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            color: white;
            background-color: #001f3f;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

      .btn1 {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            color: #001f3f;
            background-color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s;
        }
      
        .btn:hover { background-color: gold; }
        .btn.delete {
            background-color: #001f3f;
        }
        .btn.delete:hover { background-color: gold; }
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 20px;
            background-color: #001f3f; /* Dark gray for footer */
            color: white;
        }
    </style>
</head>
<body>
    <nav id="navbar">
        <div class="logo"><img src="../img/logo.png" alt="PEDINUS Logo" style="height: 70px; max-height: 100%;"></div>
    </nav>

    <div class="navigation">
        <input type="checkbox" name="checkbox" id="menu-btn" class="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="bar"></span>
        </label>
        <div class="menu">            
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="showroom.php">Showroom</a></li>
                <li><a href="loginpengguna.php">Login</a></li>
                <li><a href="register.php">Registrasi</a></li>
            </ul>
        </div>
    </div>

    <!-- Manage Users -->
    <div class="section">
        <h2>Manage Users</h2>
        <div class="cards">
            <?php
            $result = $conn->query("SELECT * FROM users");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>
                    <h3>{$row['username']}</h3>
                    <p>Role: {$row['role']}</p>
                    <a href='edit_user.php?id={$row['id']}' class='btn'>Edit</a>
                    <a href='delete_user.php?id={$row['id']}' class='btn delete'>Delete</a>
                </div>";
            }
            ?>
        </div>
        <div style="text-align: center;">
            <a href="add_user.php" class="btn1">Add User</a>
        </div>
    </div>

    <!-- Manage Car Stats -->
    <div class="section">
        <h2>Manage Car Stats</h2>
        <div class="cards">
            <?php
            $result = $conn->query("SELECT * FROM car_stats");
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>
                    <h3>{$row['car_name']}</h3>
                    <p>Power (HP): {$row['power']}</p>
                    <p>Torque (NM): {$row['torque']}</p>
                    <p>0-100 km/h: {$row['acceleration_0_100']} s</p>
                    <p>0-300 km/h: {$row['acceleration_0_300']} s</p>
                    <p>402m: {$row['acceleration_402m']} s</p>
                    <p>Top Speed: {$row['top_speed']} km/h</p>
                    <p>Battery: {$row['battery_capacity']} kWh</p>
                    <p>Price: Rp " . number_format($row['price'], 0, ',', '.') . "</p>
                    <a href='edit_car.php?id={$row['id']}' class='btn'>Edit</a>
                    <a href='delete_car.php?id={$row['id']}' class='btn delete'>Delete</a>
                </div>";
            }
            ?>
        </div>
        <div style="text-align: center;">
            <a href="add_car.php" class="btn1">Add Car</a>
        </div>
    </div>

    <footer>
        &copy; <?php echo date('Y'); ?> PEDINUS. All rights reserved.
    </footer>
</body>
</html>
