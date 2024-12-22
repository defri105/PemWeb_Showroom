<?php
session_start();
include 'mahasiswa/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validasi input
    if (empty($username) || empty($password)) {
        $errorMessage = "Semua kolom harus diisi.";
    } else {
        // Gunakan prepared statements
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $role = 'user'; // Role default adalah 'user'

        $stmt->bind_param("sss", $username, $password, $role);

        if ($stmt->execute()) {
            $successMessage = "Pengguna berhasil didaftarkan!";
        } else {
            $errorMessage = "Terjadi kesalahan: " . $stmt->error;
        }
        $stmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pengguna</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh;
            background-color: #00a676;
        }

        .container {
            background-color: #fff; 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%; 
            max-width: 400px; 
        }

        h1 {
            color: #333;
            font-size: 24px; 
            text-align: center; 
            margin-bottom: 20px; 
        }

        .message {
            color: green;
            margin-bottom: 10px;
            text-align: center; 
        }

        .error {
            color: red; 
            margin-bottom: 10px;
            text-align: center; 
        }

        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background-color: #00a676;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 95%;
            font-size: 16px;
        }

        button:hover {
            background-color: black;
        }

        a {
            display: block; 
            text-align: center;
            margin-top: 15px; 
            text-decoration: none; 
            color: #00a676;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <?php if (isset($successMessage)) { ?>
            <div class="message"><?php echo $successMessage; ?></div>
        <?php } ?>
        <?php if (isset($errorMessage)) { ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php } ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <a href="loginpengguna.php">Sudah punya akun? Masuk di sini</a>
    </div>
</body>
</html>
