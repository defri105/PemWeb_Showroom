<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showroom - PEDINUS</title>
    <style>
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

        /* Navbar styling */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
        }

        nav .logo {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav ul li {
            display: inline-block;
        }

        nav ul li a {
            text-decoration: none;
            color: #333;
            font-size: 16px;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #00a676;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #00a676;
            color: white;
        }

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
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
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
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav>
        <div class="logo">PEDINUS</div>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="showroom.php">Showroom</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="register.php">Registrasi</a></li>
        </ul>
    </nav>

    <div class="container">
        <h1>Showroom Mobil</h1>
        <div class="car-grid">
            <div class="car-card">
                <img src="img/mobil1.jpg" alt="Mobil 1">
                <h3>Toyota Avanza</h3>
                <p>Harga: Rp 200.000.000</p>
            </div>
            <div class="car-card">
                <img src="img/mobil2.jpg" alt="Mobil 2">
                <h3>Honda Civic</h3>
                <p>Harga: Rp 400.000.000</p>
            </div>
            <div class="car-card">
                <img src="img/mobil3.jpg" alt="Mobil 3">
                <h3>Mitsubishi Pajero</h3>
                <p>Harga: Rp 500.000.000</p>
            </div>
            <div class="car-card">
                <img src="img/mobil4.jpg" alt="Mobil 4">
                <h3>Ford Mustang</h3>
                <p>Harga: Rp 1.500.000.000</p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2024 PEDINUS. All rights reserved.
    </footer>

</body>
</html>
