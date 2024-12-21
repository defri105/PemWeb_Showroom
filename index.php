<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDINUS</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            color: white;
            text-align: center; /* Teks di tengah */
        }

        /* Navbar styling */
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: transparent;
            box-shadow: none;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 100;
            height: 70px; /* Tetap menjaga tinggi navbar */
            transition: background-color 0.5s ease;
        }

        nav.scrolled {
            background-color: transparent; /* Tetap transparan saat discroll */
        }

        nav.scrolled a {
            color: white;
        }

        nav.scrolled .logo {
            color: white; /* Ubah warna tulisan PEDINUS jadi putih saat discroll */
        }

        nav .logo {
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            align-items: center;
        }

        nav ul li {
            position: relative;
            display: inline-block;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            transition: color 0.3s, transform 0.3s;
        }

        nav ul li a:hover {
            color: gold;
            transform: scale(1.2);
        }

        nav ul li a:hover {
            color: gold;
            transform: scale(1.3);
        }

        nav ul li a:hover {
            color: gold;
            transform: scale(1.2);
        }

        nav ul li a:hover {
            color: gold;
        }

        /* Dropdown styling for login */
        nav ul li .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            min-width: 160px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        nav ul li .dropdown-content a {
            color: #333;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s;
        }

        nav ul li .dropdown-content a:hover {
            background-color: gold;
            color: black;
        }

        nav ul li:hover .dropdown-content {
            display: block;
        }

        .login-btn {
            background-color: #f2994a;
            color: white;
            padding: 10px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .login-btn:hover {
            background-color: gold;
            color: white;
        }

        /* Hero section styling */
        .hero {
            position: relative;
            display: flex;
            justify-content: center; /* Konten di tengah */
            align-items: center;
            padding: 370px 50px;
            height: 90vh;
            overflow: hidden;
            flex-direction: column; /* Elemen vertikal */
        }

        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        .hero-content {
            max-width: 50%;
            z-index: 2;
            color: white;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.7);
            text-align: center;
            margin: 0 auto;
        }

        .hero-content h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 40px;
        }

        .hero-content .buttons {
            display: flex;
            justify-content: center; /* Tombol di tengah */
        }

        .hero-content .explore-btn {
            background-color: transparent;
            color: white;
            padding: 15px 30px;
            border: 2px solid white;
            border-radius: 50px;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
            transition: background-color 0.3s, color 0.3s, transform 0.3s;
            display: block;
            text-align: center;
            margin: 0 auto;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.3);
        }

        .hero-content .explore-btn:hover {
            background-color: gold;
            color: white;
            transform: scale(1.1);
            box-shadow: 0 6px 15px rgba(255, 215, 0, 0.7);
        }

        .hero-image img {
            max-width: 500px;
            height: auto;
        }

        /* Courses section styling */
        .courses {
            padding: 50px;
            display: flex;
            justify-content: space-around;
            background-color: #fff;
        }

        .course-card {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            width: 300px;
            text-align: center;
            padding: 20px;
        }

        .course-card img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .course-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        .course-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .course-card .rating {
            color: #f2994a;
        }

        .course-card .students {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #00a676; /* Ubah warna footer jadi hijau */
            color: white;
        }
        /* Slider section styling */
    .slider {
        padding: 50px;
        background-color: #fff;
        text-align: center;
    }

    .slider-container {
        display: flex;
        overflow-x: auto;
        gap: 20px;
        scroll-snap-type: x mandatory;
    }

    .slide {
        flex: 0 0 auto;
        scroll-snap-align: start;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        width: 300px;
        text-align: center;
        padding: 20px;
        position: relative;
    }

    .slide img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        margin-bottom: 10px;
        transition: transform 0.3s ease;
    }

    .slide h3 {
        font-size: 20px;
        font-weight: bold;
        color: black;
        margin-top: 10px;
    }

    .slide p {
        font-size: 14px;
        color: #666;
        margin-top: 10px;
    }

    .slide img:hover {
        transform: scale(1.1);
    }

    .zigzag-text h3 {
        font-size: 20px;
        font-weight: bold;
        color: black;
    }

    .zigzag-text p {
        font-size: 14px;
        color: black;
    }

    .zigzag-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 30px;
    }

    .zigzag-item .zigzag-image {
        width: 40%;
    }

    .zigzag-item .zigzag-image img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .zigzag-item .zigzag-text {
        width: 40%;
        padding: 15px;
    }

            /* Footer Styling */
        .footer {
            background-color: #001F3F;
            color: white;
            padding: 50px 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
        }

        .footer .footer-logo {
            flex: 1;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: white;
        }

        .footer .footer-links {
            flex: 2;
            display: flex;
            justify-content: center;
            gap: 40px;
        }

        .footer .footer-links a {
            color: white;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s;
        }

        .footer .footer-links a:hover {
            color: gold;
        }

        .footer .footer-contact {
            flex: 1;
            text-align: center;
            font-size: 14px;
        }

        .footer .social-icons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .footer .social-icons img {
            width: 30px;
            height: 30px;
            transition: transform 0.3s ease;
        }

        .footer .social-icons img:hover {
            transform: scale(1.2);
        }
</style>
</head>
<body>

    <!-- Navbar -->
    <nav id="navbar">
        <div class="logo"><img src="img/logo.png" alt="PEDINUS Logo" style="height: 70px; max-height: 100%;"></div>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="showroom.php">Showroom</a></li>
            <li>
                <a href="#">Login</a>
                <div class="dropdown-content">
                    <a href="login.php">Login Admin</a>
                    <a href="loginpengguna.php">Login Pengguna</a>
                </div>
            </li>
            <li><a href="register.php">Registrasi</a></li>
        </ul>
    </nav>

    <!-- Hero section -->
    <section class="hero">
        <video autoplay muted loop>
            <source src="video/background.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
        <div class="hero-content">
            <h1>Nevera and Nevera R</h1>
            <p>Capable of exceptional speeds, swift and powerful beyond comprehension, Nevera is a force like no other. Designed, engineered and handcrafted in Croatia, defined by function and forged from a love for automotive.</p>
            <div class="buttons">
                <a href="showroom.php" class="explore-btn">Showroom</a>
            </div>
        </div>
    </section>



    <section class="slider">
        <div class="slider-container">
            <div class="slide">
                <img src="img/slide1.png" alt="Slide 1">
                <h3>Battery</h3>
                <p>A fully industrialized battery solution offering the highest power and energy density for medium and high-volume applications at a competitive cost.</p>
            </div>
            <div class="slide">
                <img src="img/slide2.png" alt="Slide 2">
                <h3>Powertrain</h3>
                <p>Innovative drive system solutions featuring configurable high-performance through a scalable platform, engineered for efficiency.</p>
            </div>
            <div class="slide">
                <img src="img/slide3.png" alt="Slide 3">
                <h3>BMS</h3>
                <p>Scalable BMS solutions, enhancing performance and efficiency while reducing costs for any application.</p>
            </div>
            <div class="slide">
                <img src="img/slide4.png" alt="Slide 4">
                <h3>ECU</h3>
                <p>Advanced ECUs powering a centralized electrical architecture designed for interconnected and integrated on-board systems.</p>
            </div>
            <div class="slide">
                <img src="img/slide5.png" alt="Slide 5">
                <h3>Software</h3>
                <p>Cutting-edge software modules unlocking peak performance and precise control.</p>
            </div>
            <div class="slide">
                <img src="img/slide6.png" alt="Slide 6">
                <h3>Energy</h3>
                <p>Class-leading BESS delivering the lowest Levelized Cost of Storage and extended lifespan, all within a compact design.</p>
            </div>
        </div>
    </section>


        <!-- Zigzag Section -->
<section class="zigzag-section">
    <div class="zigzag-item zigzag1">
        <div class="zigzag-text">
            <h3>Vehicle Engineering: Structural Analysis</h3>
            <p>Very few hypercars go through the fully-fledged homologation process. Taking up to four years to complete - from initial concept to cars on the road - there are no short cuts, just hard work, thousands upon thousands of hours of analysis and rigorous crash testing. elit.</p>
        </div>
        <div class="zigzag-image">
            <img src="img/zigzag1.png" alt="Zigzag 1">
        </div>
    </div>
    <div class="zigzag-item zigzag2 reverse">
        <div class="zigzag-image">
            <img src="img/zigzag2.png" alt="Zigzag 2">
        </div>
        <div class="zigzag-text">
            <h3>Aerodynamics</h3>
            <p>Featuring some of the most advanced aerodynamics on a road-legal production car, the C_Two showcases our unparalleled understanding of automotive airflow and active aerodynamic elements control. The aerodynamic concept is designed with different requirements in mind: cooling of the battery and powertrain systems, efficiency, downforce, aerodynamic balance and more. Discover how we achieved our targets.</p>
        </div>
    </div>
    <div class="zigzag-item zigzag3">
        <div class="zigzag-text">
            <h3>Vehicle dynamics</h3>
            <p>Our team of vehicle dynamic specialists and simulation engineers combines inputs from all vehicle systems - torque vectoring, steering, brakes, battery, powertrain, aerodynamics, and others - to create a new level of driving dynamics enabled by the capabilities of a 4-motor electric hypercar architecture. Countless virtual iterations and thousands of simulations have been performed before we put our designs into metal and carbon. Then, we perform countless tests on tracks, roads, and testing equipment around the world. By repeating the process exhaustively, we produce efficient vehicles with unmatched performance, ride, and agility.</p>
        </div>
        <div class="zigzag-image">
            <img src="img/zigzag3.png" alt="Zigzag 3">
        </div>
    </div>
    <div class="zigzag-item zigzag4 reverse">
        <div class="zigzag-image">
            <img src="img/zigzag4.png" alt="Zigzag 4">
        </div>
        <div class="zigzag-text">
            <h3>Tires</h3>
            <p>Tires are a critical component of every car. Forming the only physical link between the road surface and the vehicle, it is essential to equip our vehicles with the best performing tires available. Tested and developed through our own rigorous programme, we design bespoke tires in partnership with Pirelli to handle the most extreme performance in all conditions.</p>
        </div>
    </div>
    <div class="zigzag-item zigzag5">
        <div class="zigzag-text">
            <h3>Torque Vectoring</h3>
            <p>Torque vectoring is a unique method of power distribution, which splits torque between each of a vehicle's wheels. Rimac's All-wheel Torque Vectoring (R-AWTV) is the centrepiece of our suite of homegrown technologies, giving our cars greater agility, stability and control.</p>
        </div>
        <div class="zigzag-image">
            <img src="img/zigzag5.png" alt="Zigzag 5">
        </div>
    </div>
    <div class="zigzag-item zigzag6 reverse">
        <div class="zigzag-image">
            <img src="img/zigzag6.png" alt="Zigzag 6">
        </div>
        <div class="zigzag-text">
            <h3>Driver Coach</h3>
            <p>Our in-house developed Driver Coach is where advanced AI and real-world driving come together. Featured on the C_Two, Driver Coach is a personal in-car performance aid to help the driver utilize the car's full potential, optimise performance and create new levels of driving excitement.</p>
        </div>
    </div>
    <div class="zigzag-item zigzag7">
        <div class="zigzag-text">
            <h3>Inverter development</h3>
            <p>The inverter converts direct current (DC) from the battery to alternating current (AC) that's supplied to the motor. Rimac's BFI (Big Fabulous Inverter) is the world's most power-dense inverter.
Our in-house team is designing all the hardware (electronic boards and the high-voltage components) and the software.</p>
        </div>
        <div class="zigzag-image">
            <img src="img/zigzag7.png" alt="Zigzag 7">
        </div>
    </div>
    <div class="zigzag-item zigzag8 reverse">
        <div class="zigzag-image">
            <img src="img/zigzag8.png" alt="Zigzag 8">
        </div>
        <div class="zigzag-text">
            <h3>Gearbox development</h3>
            <p>The performance, mass and dimensional requirements could only be met by developing the components from scratch.</p>
        </div>
    </div>
    <div class="zigzag-item zigzag9">
        <div class="zigzag-text">
            <h3>Components development: Structural Analysis</h3>
            <p>C_Two powertrain and battery development are supported with numerous thermal, mechanical, electrical, and system-level simulations. C_Two battery pack, inverters, gearboxes, and motors were modeled and developed to ensure the maximal performance of the car.</p>
        </div>
        <div class="zigzag-image">
            <img src="img/zigzag9.png" alt="Zigzag 9">
        </div>
    </div>
    <div class="zigzag-item zigzag10 reverse">
        <div class="zigzag-image">
            <img src="img/zigzag10.png" alt="Zigzag 10">
        </div>
        <div class="zigzag-text">
            <h3>Infotainment and Connectivity Development</h3>
            <p>From graphically seductive in-vehicle user interfaces to vast amount of vehicle data handling in the cloud and specially tailored mobile apps for next generation hypercar is done in-house within Software Development Department.</p>
        </div>
    </div>
    <!-- Repeat similar structure for 8 more items -->
</section>


    <footer>
        &copy; 2024 PEDINUS. All rights reserved.
    </footer>

    <script>
        // Change navbar color on scroll
        window.onscroll = function() {
            const navbar = document.getElementById("navbar");
            if (window.pageYOffset > 100) {
                navbar.classList.add("scrolled");
            } else {
                navbar.classList.remove("scrolled");
            }
        };
    </script>

</body>
</html>