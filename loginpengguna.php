<?php
session_start();
include 'mahasiswa/db.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); 
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = 'member';
        $_SESSION['user_id'] = $user['id']; 
        header("Location: index.php"); 
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
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
            background-color: #00a676 ; /* Warna tombol login PEDINUS */
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
        <h1>Login Pengguna</h1>
        <?php if (isset($error)) { ?>
            <div class="error"><?php echo $error; ?></div>
        <?php } ?>
        <form method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <a href="register.php">Daftar sebagai Pengguna</a>
    </div>
</body>
</html>
