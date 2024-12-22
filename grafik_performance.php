<?php
// Include the database connection
include_once 'mahasiswa/db.php';

// Get the car ID from the URL
$carId = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch car data from the database
$sql = "SELECT * FROM car_stats WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $carId);
$stmt->execute();
$result = $stmt->get_result();

// Check if the car exists
if ($result->num_rows > 0) {
    $car = $result->fetch_assoc();
} else {
    echo "Car not found!";
    exit;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($car['car_name']); ?> Performance</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Arial', sans-serif;
        }
        .hero {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }
        .hero video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
        }
        .content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        .stats {
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .stats div {
            text-align: center;
        }
    </style>
    <script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>
    <div class="hero">
        <video autoplay muted loop>
            <source src="images/video.mp4" type="video/mp4">
        </video>
        <div class="overlay"></div>
        <div class="content">
            <h1><?php echo htmlspecialchars($car['car_name']); ?></h1>
            <div class="stats">
                <div>
                    <h2><?php echo $car['power']; ?></h2>
                    <p>POWER (HP)</p>
                </div>
                <div>
                    <h2><?php echo $car['torque']; ?></h2>
                    <p>TORQUE (NM)</p>
                </div>
                <div>
                    <h2><?php echo $car['acceleration_0_100']; ?></h2>
                    <p>ACCELERATION (0-60 MPH)</p>
                </div>
                <div>
                    <h2><?php echo $car['acceleration_402m']; ?></h2>
                    <p>1/4 MILE TIME</p>
                </div>
                <div>
                    <h2><?php echo $car['top_speed']; ?></h2>
                    <p>TOP SPEED (MPH)</p>
                </div>
                <div>
                    <h2><?php echo $car['battery_capacity']; ?></h2>
                    <p>BATTERY (KWH)</p>
                </div>
            </div>
        </div>
    </div>
    <div id="container" style="width: 80%; margin: 50px auto; height: 400px;"></div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Highcharts.chart('container', {
                chart: {
                    type: 'bar'
                },
                title: {
                    text: '<?php echo htmlspecialchars($car['car_name']); ?> Performance Statistics'
                },
                xAxis: {
                    categories: ['POWER (HP)', 'TORQUE (NM)', 'ACCELERATION (0-60 MPH)', '1/4 MILE TIME', 'TOP SPEED (MPH)', 'BATTERY (KWH)'],
                    title: {
                        text: null
                    }
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Values',
                        align: 'high'
                    },
                    labels: {
                        overflow: 'justify'
                    }
                },
                tooltip: {
                    valueSuffix: ' '
                },
                plotOptions: {
                    bar: {
                        dataLabels: {
                            enabled: true
                        }
                    }
                },
                series: [{
                    name: '<?php echo htmlspecialchars($car['car_name']); ?>',
                    data: [
                        <?php echo $car['power']; ?>,
                        <?php echo $car['torque']; ?>,
                        <?php echo $car['acceleration_0_100']; ?>,
                        <?php echo $car['acceleration_402m']; ?>,
                        <?php echo $car['top_speed']; ?>,
                        <?php echo $car['battery_capacity']; ?>
                    ]
                }]
            });
        });
    </script>
    <footer style="background-color: #001f3f; color: white; padding: 40px 20px; font-size: 14px;">
        <!-- Footer content -->
    </footer>
</body>
</html>