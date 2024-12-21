<?php
session_start();
include 'mahasiswa/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', 'member')";
    if ($conn->query($sql) === TRUE) {
        $successMessage = "Pengguna berhasil didaftarkan!";
    } else {
        $errorMessage = "Terjadi kesalahan: " . $conn->error;
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
            background-color: #00a676; /* Background umum PEDINUS */
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
            color: #333; /* Warna teks utama PEDINUS */
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
            background-color: #00a676; /* Warna tombol login PEDINUS */
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
            background-color: black; /* Warna hover tombol login */
        }

        a {
            display: block; 
            text-align: center;
            margin-top: 15px; 
            text-decoration: none; 
            color: #00a676; /* Warna tombol explore PEDINUS */
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
