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
        /* General Styling */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #001f3f, #0056b3);
            color: white;
            min-height: 100vh;
        }

        /* Header Section */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 30px;
            background: linear-gradient(135deg, #001f3f, #0056b3); /* Matches body background */
            color: white;
            position: relative;
        }

        /* Logout Button Styling */
        .header-section .logout-btn {
            background-color: #f44336;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 16px;
        }
        .header-section .logout-btn:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }

        /* Admin Name */
        .header-section .admin-name {
            font-size: 16px;
            font-weight: bold;
        }

        /* Dashboard Title */
        .header-section .dashboard-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-size: 24px;
            font-weight: bold;
        }

        /* Main Section Styling */
        .main-section {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            padding: 20px 40px;
        }

        .section {
            flex: 1;
            margin: 0;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            color: #001f3f;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        }

        /* Section Header */
        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .section-header h2 {
            margin: 0;
            color: #001f3f;
            font-size: 2rem;
        }

        /* Cards Styling */
        .cards {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .card {
            background-color: white;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
            width: 100%;
            max-width: 280px;
            text-align: center;
            padding: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }
        .card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            color: #001f3f;
        }
        .card p {
            font-size: 1rem;
            margin-bottom: 15px;
            color: #333;
        }

        /* Button Styling for Cards and Add Buttons */
        .btn {
            background-color: #001f3f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 16px;
            width: 100%;
            max-width: 250px;
            margin: 10px auto;
            display: block;
        }
        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Add Button Styling */
        .add-btn {
            margin: 0;
            font-size: 16px;
            padding: 10px 20px;
            background-color: #001f3f;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .add-btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-section {
                flex-direction: column;
            }
            .section {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <section class="header-section">
        <button class="logout-btn" onclick="window.location.href='../index.php'">Logout</button>
        <div class="dashboard-title">Admin Dashboard</div>
        <div class="admin-name">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></div>
    </section>

    <!-- Main Section -->
    <div class="main-section">
        <!-- Manage Users -->
        <div class="section">
            <div class="section-header">
                <h2>Manage Users</h2>
                <button class="add-btn" onclick="window.location.href='add_user.php'">Add User</button>
            </div>
            <div class="cards">
                <?php
                $result = $conn->query("SELECT * FROM users");
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>
                        <h3>{$row['username']}</h3>
                        <p>Role: {$row['role']}</p>
                        <button class='btn' onclick=\"location.href='edit_user.php?id={$row['id']}'\">Edit</button>
                        <button class='btn delete' onclick=\"location.href='delete_user.php?id={$row['id']}'\">Delete</button>
                    </div>";
                }
                ?>
            </div>
        </div>

        <!-- Manage Car Stats -->
        <div class="section">
            <div class="section-header">
                <h2>Manage Car Stats</h2>
                <button class="add-btn" onclick="window.location.href='add_car.php'">Add Car</button>
            </div>
            <div class="cards">
                <?php
                $result = $conn->query("SELECT * FROM car_stats");
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='card'>
                        <h3>{$row['car_name']}</h3>
                        <p>Power (HP): {$row['power']}</p>
                        <p>Torque (NM): {$row['torque']}</p>
                        <p>0-100 km/h: {$row['acceleration_0_100']} s</p>
                        <p>Battery: {$row['battery_capacity']} kWh</p>
                        <p>Price: Rp " . number_format($row['price'], 0, ',', '.') . "</p>
                        <button class='btn' onclick=\"location.href='edit_car.php?id={$row['id']}'\">Edit</button>
                        <button class='btn delete' onclick=\"location.href='delete_car.php?id={$row['id']}'\">Delete</button>
                    </div>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
