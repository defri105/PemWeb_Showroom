<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RIMAC</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assetts/images/Favicon.png">
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

    <!-- Hero section -->
    <section class="hero">
        <video autoplay muted loop>
            <source src="video/rimac_home.mp4" type="video/mp4">
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
            <img src="img/dev_hub_img_01_16-9.jpg" alt="Zigzag 1">
        </div>
    </div>

    <div class="zigzag-item zigzag2 reverse">
        <div class="zigzag-image">
            <img src="img/dev_hub_img_02_16-9.jpg" alt="Zigzag 2">
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
            <img src="img/dev_hub_img_03_16-9.jpg" alt="Zigzag 3">
        </div>
    </div>

    <div class="zigzag-item zigzag4 reverse">
        <div class="zigzag-image">
            <img src="img/dev_hub_img_04_16-9.jpg" alt="Zigzag 4">
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
            <img src="img/dev_hub_img_05_16-9.jpg" alt="Zigzag 5">
        </div>
    </div>

    <div class="zigzag-item zigzag6 reverse">
        <div class="zigzag-image">
            <img src="img/dev_hub_img_06_16-9.jpg" alt="Zigzag 6">
        </div>
        <div class="zigzag-text">
            <h3>Driver Coach</h3>
            <p>Our in-house developed Driver Coach is where advanced AI and real-world driving come together. Featured on the C_Two, Driver Coach is a personal in-car performance aid to help the driver utilize the car's full potential, optimise performance and create new levels of driving excitement.</p>
        </div>
    </div>

    <div class="zigzag-item zigzag7">
        <div class="zigzag-text">
            <h3>Inverter development</h3>
            <p>The inverter converts direct current (DC) from the battery to alternating current (AC) that's supplied to the motor. Rimac's BFI (Big Fabulous Inverter) is the world's most power-dense inverter. Our in-house team is designing all the hardware (electronic boards and the high-voltage components) and the software.</p>
        </div>
        <div class="zigzag-image">
            <img src="img/dev_hub_img_07_16-9.jpg" alt="Zigzag 7">
        </div>
    </div>

    <div class="zigzag-item zigzag8 reverse">
        <div class="zigzag-image">
            <img src="img/dev_hub_img_08_progressive.jpg" alt="Zigzag 8">
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
            <img src="img/dev_hub_img_09_16-9.jpg" alt="Zigzag 9">
        </div>
    </div>

    <div class="zigzag-item zigzag10 reverse">
        <div class="zigzag-image">
            <img src="img/dev_hub_img_10.jpg" alt="Zigzag 10">
        </div>
        <div class="zigzag-text">
            <h3>Infotainment and Connectivity Development</h3>
            <p>From graphically seductive in-vehicle user interfaces to vast amount of vehicle data handling in the cloud and specially tailored mobile apps for next generation hypercar is done in-house within Software Development Department.</p>
        </div>
    </div>

</section>


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
