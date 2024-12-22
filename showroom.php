<?php
// Include the database connection
include_once 'mahasiswa/db.php';

// Fetch car data from the database
$sql = "SELECT id, car_name, price FROM car_stats";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom - PEDINUS</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/showroom.css">
</head>
<body>

    <!-- Navbar -->
    <nav id="navbar">
        <div class="logo"><img src="img/logo.png" alt="PEDINUS Logo" style="height: 70px; max-height: 100%;"></div>
    </nav>

    <div class="navigation">
        <input type="checkbox" name="checkbox" id="menu-btn" class="menu-btn">
        <label for="menu-btn" class="menu-icon">
            <span class="bar"></span>
        </label>
        <div class="menu">            
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="showroom.php">Showroom</a></li>
                <li><a href="loginpengguna.php">Login</a></li>
                <li><a href="register.php">Registrasi</a></li>
            </ul>
        </div>
    </div>

    <div class="container">
        <h1>Showroom Mobil</h1>
        <div class="car-grid">
            <?php
            // Check if there are any results
            if ($result->num_rows > 0) {
                // Output data for each car
                while ($row = $result->fetch_assoc()) {
                    $carId = $row['id'];
                    $carName = htmlspecialchars($row['car_name']);
                    $price = number_format($row['price'], 0, ',', '.');
                    echo "
                        <div class='car-card'>
                            <img src='img/mobil.jpg' alt='$carName'>
                            <h3><a href='grafik_performance.php?id=$carId'>$carName</a></h3>
                            <p>Harga: Rp $price</p>
                        </div>
                    ";
                }
            } else {
                echo "<p>No cars available in the showroom.</p>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 PEDINUS. All rights reserved.
    </footer>

</body>
</html>