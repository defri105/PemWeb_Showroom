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
            <li><a href="index.php">Home</a></li>
            <li><a href="showroom.php">Showroom</a></li>
            <li><a href="loginpengguna.php">Login</a></li>
            <li><a href="register.php">Registrasi</a></li>
        </ul>
    </div>
</div>
<!-- Hero Section -->
<section class="hero">
    <div class="hero-slider">
        <div class="hero-slide" style="background-image: url('img/zigzag1.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag2.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag3.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag4.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag5.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag6.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag7.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag8.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag9.png');"></div>
        <div class="hero-slide" style="background-image: url('img/zigzag10.png');"></div>
    </div>
</section>

<!-- Car Grid Section -->
<div class="container">
    <div class="car-grid">
        <?php
        // Check if there are any results
        if ($result->num_rows > 0) {
            // Output data for each car
            while ($row = $result->fetch_assoc()) {
                $carId = $row['id'];
                $carName = htmlspecialchars($row['car_name']);
                $price = number_format($row['price'], 0, ',', '.');
                
                // Generate the image path based on the car name
                $imagePath = 'images/' . $carName . '.jpg';
                
                // Check if the image file exists
                if (!file_exists($imagePath)) {
                    $imagePath = 'images/stock.jpg'; // Fallback image
                }
                
                echo "
                    <a href='grafik_performance.php?id=$carId' style='text-decoration: none; color: inherit;'>
                        <div class='car-card'>
                            <img src='$imagePath' alt='$carName'>
                            <h3 style='margin: 15px 0; color: inherit;'>$carName</h3>
                            <p style='font-size: 18px; color: #666;'>Harga: Rp $price</p>
                        </div>
                    </a>
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
    <footer style="color: white; padding: 40px 20px; font-size: 14px;">
        <div style="text-align: center; margin-bottom: 20px;">
            <img src="images/logo rimac.png" alt="Rimac Logo" style="width: 200px;">
            <div style="margin-top: 10px;">
                <a href="#careers" style="color: white; text-decoration: none; margin: 0 15px; font-size: 16px;">Careers</a>
                <a href="#partners-map" style="color: white; text-decoration: none; margin: 0 15px; font-size: 16px;">Partners Map</a>
                <a href="#media" style="color: white; text-decoration: none; margin: 0 15px; font-size: 16px;">Media</a>
                <a href="#factory-tours" style="color: white; text-decoration: none; margin: 0 15px; font-size: 16px;">Factory Tours</a>
                <a href="#e-store" style="color: white; text-decoration: none; margin: 0 15px; font-size: 16px;">E_Store</a>
                <a href="#contact" style="color: white; text-decoration: none; margin: 0 15px; font-size: 16px;">Contact</a>
            </div>
        </div>
        <div style="display: flex; justify-content: space-around; flex-wrap: wrap;">
            <div style="text-align: center;">
                <h4>CONTACT</h4>
                <p>info@bugatti-rimac.com</p>
                <p>tel: +385 1 563 45 92</p>
                <p>Ljubljanska ulica 7, Brezje</p>
                <p>10431 Sveta Nedelja, Croatia</p>
            </div>
            <div style="text-align: center;">
                <h4>FIND US ON</h4>
                <a href="#" style="margin: 0 10px;"><img src="images/youtube.png" alt="Youtube" style="width: 24px;"></a>
                <a href="#" style="margin: 0 10px;"><img src="images/instagram.png" alt="Instagram" style="width: 24px;"></a>
                <a href="#" style="margin: 0 10px;"><img src="images/tweeter.png" alt="Twitter" style="width: 24px;"></a>
                <a href="#" style="margin: 0 10px;"><img src="images/email.png" alt="Email" style="width: 24px;"></a>
            </div>
            <div style="text-align: center;">
                <h4>POLICIES</h4>
                <div style="display: flex; justify-content: center; flex-wrap: wrap;">
                    <a href="#" style="color: white; text-decoration: none; margin: 0 5px;">Privacy Policy</a>
                    <a href="#" style="color: white; text-decoration: none; margin: 0 5px;">Legal Notice</a>
                    <a href="#" style="color: white; text-decoration: none; margin: 0 5px;">Cookie Policy</a>
                    <a href="#" style="color: white; text-decoration: none; margin: 0 5px;">Code of Conduct</a>
                    <a href="#" style="color: white; text-decoration: none; margin: 0 5px;">Whistleblowing System</a>
                </div>
            </div>
        </div>
        <div style="text-align: center; margin-top: 20px; font-size: 12px;">
            &copy; 2023 Bugatti Rimac d.o.o. All rights reserved.
        </div>
    </footer>
    <script type = "text/javascript" src="js/style.js"></script>
</body>
</html>
