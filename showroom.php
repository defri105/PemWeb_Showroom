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
    <style>
        /* General Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9fafb;
            color: #333;
        }

        .menu-icon{
    background-color: transparent;
    position: fixed;
    top: 15px;
    right: 30px;
    cursor: pointer;
    padding: 20px 10px;
    z-index: 6;
}

.navigation input{
    display: none;
}

.menu-icon .bar{
    width: 28px;
    height: 3px;
    background-color: white;
    display: block;
    position: relative;
    transition: all 0.3s ease-out;
}

.menu-icon .bar::before{
    content: "";
    width: 28px;
    height: 3px;
    background-color: white;
    position: absolute;
    top: -8px;
    left: 0;
    transition: all 0.3s;
}

.menu-icon .bar::after{
    content: "";
    width: 28px;
    height: 3px;
    background-color: white;
    position: absolute;
    top: 8px;
    left: 0;
    transition: all 0.3s;
}

.navigation input:checked~ .menu-icon .bar{
    background-color: transparent;
}

.navigation input:checked~ .menu-icon .bar::before{
    top: 0;
    transform: rotate(45deg);
}

.navigation input:checked~ .menu-icon .bar::after{
    top: 0;
    transform: rotate(-45deg);
}

.navigation .menu{
    width: 100%;
    height: 100%;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgb(0, 25, 35);
    z-index: -100;
    opacity: 0;
    transition: 0.3s ease-in-out;
    display: flex;
    align-items: center;
    justify-content: center;
}

.navigation .menu ul{
    opacity: 1;
    transform: scale(1);
    transition: all 0.3 ease-in-out;
    z-index: 5;
}

.navigation .menu ul li{
    list-style: none;
}

.navigation .menu ul li a{
    color: white;
    display: block;
    font-size: 40px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    text-align: left;
    padding: 20px 5px;
    position: relative;
}

.navigation .menu ul li a:hover{
    transform: scale(1.2);
    transition: all 0.3 ease-in-out;
}

.navigation input:checked~ .menu{
    opacity: 1;
    z-index: 3;
}


        /* Navbar Styling */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: transparent;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 3;
            height: 70px;
            transition: background-color 0.5s ease;
        }

        nav.scrolled {
            background-color: #001f3f; /* Blue when scrolled */
        }

        /* Hero Section Styling */
        .hero {
            position: relative;
            padding: 370px 50px;
            width: 100%;
            height: 90vh;
            overflow: hidden;
        }

        .hero-slider {
            display: flex;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }

        .hero-slide {
            flex: 0 0 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            transition: transform 1s ease-in-out;
        }

        .hero-slider {
            animation: slide 100s infinite;
        }

        @keyframes slide {
            0% { transform: translateX(0%); }
            10% { transform: translateX(-100%); }
            20% { transform: translateX(-200%); }
            30% { transform: translateX(-300%); }
            40% { transform: translateX(-400%); }
            50% { transform: translateX(-500%); }
            60% { transform: translateX(-600%); }
            70% { transform: translateX(-700%); }
            80% { transform: translateX(-800%); }
            90% { transform: translateX(-900%); }
            100% { transform: translateX(-1000%); }
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #001f3f;
            color: white;
        }

        /* Car Grid Styling */
        .container {
            padding: 100px 50px;
            max-width: 1200px;
            margin: auto;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #00a676;
        }

        .car-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .car-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            padding: 20px;
        }

        .car-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .car-card h3 {
            font-size: 20px;
            margin: 15px 0;
        }

        .car-card p {
            font-size: 18px;
            color: #666;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #001f3f;
            color: white;
        }
    </style>
</head>
<body>

<script>
    /* Add scroll event listener to change navbar background on scroll */
    window.addEventListener("scroll", function() {
        const navbar = document.getElementById("navbar");
        if (window.scrollY > 50) {
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    });
</script>

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
<footer style="background-color: #001f3f; color: white; padding: 40px 20px; font-size: 14px;">
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


</body>
</html>
