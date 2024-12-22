<?php
session_start();
include 'mahasiswa/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'] ?? null; // Assume the user is logged in
    $car_id = $_POST['car_id']; // Receive car_id
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $quantity = $_POST['quantity'];

    if ($user_id) {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO orders (user_id, car_id, name, email, phone, address, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
        // Correct the bind_param to match the placeholders
        $stmt->bind_param("iissssi", $user_id, $car_id, $name, $email, $phone, $address, $quantity);

        if ($stmt->execute()) {
            $success = "Pemesanan berhasil dilakukan!";
            $stmt->close();
            header("Location: showroom.php");
            exit;
        } else {
            $error = "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "Anda harus login untuk melakukan pemesanan.";
    }
}

if (!isset($_GET['car_name'])) {
    die("Akses tidak valid.");
}

$car_name = $_GET['car_name'];
$car_query = $conn->prepare("SELECT id, car_name, price FROM car_stats WHERE car_name = ?");
$car_query->bind_param("s", $car_name);
$car_query->execute();
$car_result = $car_query->get_result();
$car = $car_result->fetch_assoc();
$car_query->close();

if (!$car) {
    die("Mobil tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemesanan</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #001f3f, #0056b3);
            color: white;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            color: #001f3f;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input, select, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            width: 100%;
        }

        button {
            background-color: #001f3f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .success, .error {
            text-align: center;
            font-size: 1.1rem;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Form Pemesanan</h1>
        <?php if (isset($success)) { echo "<div class='success'>{$success}</div>"; } ?>
        <?php if (isset($error)) { echo "<div class='error'>{$error}</div>"; } ?>
        <form method="POST">
            <input type="hidden" name="car_id" value="<?php echo htmlspecialchars($car['id']); ?>">
            <p><strong>Mobil yang Dipesan:</strong> <?php echo htmlspecialchars($car['car_name']); ?></p>
            <p><strong>Harga:</strong> Rp <?php echo number_format($car['price'], 0, ',', '.'); ?></p>

            <label for="name">Nama Lengkap:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Nomor Telepon:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="address">Alamat:</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <label for="quantity">Jumlah Pemesanan:</label>
            <input type="number" id="quantity" name="quantity" min="1" required>

            <button type="submit">Pesan Sekarang</button>
        </form>
    </div>
</body>
</html>