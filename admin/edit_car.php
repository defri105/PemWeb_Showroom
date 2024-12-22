<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginpengguna.php");
    exit();
}
include '../mahasiswa/db.php';

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM car_stats WHERE id=$id");
$car = $result->fetch_assoc();

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

    $stmt = $conn->prepare("UPDATE car_stats SET car_name=?, power=?, torque=?, acceleration_0_100=?, acceleration_0_300=?, acceleration_402m=?, top_speed=?, battery_capacity=?, price=? WHERE id=?");
    $stmt->bind_param("siiidididi", $car_name, $power, $torque, $acceleration_0_100, $acceleration_0_300, $acceleration_402m, $top_speed, $battery_capacity, $price, $id);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car</title>
</head>
<body>
    <h1>Edit Car</h1>
    <form method="post">
        <label>Car Name: <input type="text" name="car_name" value="<?php echo $car['car_name']; ?>" required></label><br>
        <label>Power (HP): <input type="number" name="power" value="<?php echo $car['power']; ?>" required></label><br>
        <label>Torque (NM): <input type="number" name="torque" value="<?php echo $car['torque']; ?>" required></label><br>
        <label>0-100 km/h (s): <input type="text" name="acceleration_0_100" value="<?php echo $car['acceleration_0_100']; ?>" required></label><br>
        <label>0-300 km/h (s): <input type="text" name="acceleration_0_300" value="<?php echo $car['acceleration_0_300']; ?>"></label><br>
        <label>402m (s): <input type="text" name="acceleration_402m" value="<?php echo $car['acceleration_402m']; ?>" required></label><br>
        <label>Top Speed (km/h): <input type="number" name="top_speed" value="<?php echo $car['top_speed']; ?>" required></label><br>
        <label>Battery Capacity (kWh): <input type="text" name="battery_capacity" value="<?php echo $car['battery_capacity']; ?>" required></label><br>
        <label>Price (IDR): <input type="text" name="price" value="<?php echo $car['price']; ?>" required></label><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>