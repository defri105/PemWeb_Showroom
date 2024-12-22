<?php
include 'mahasiswa/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo json_encode([
            'success' => false,
            'message' => 'Semua kolom harus diisi.',
        ]);
    } else {
        $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $role = 'user';
        $stmt->bind_param("sss", $username, $password, $role);

        if ($stmt->execute()) {
            echo json_encode([
                'success' => true,
                'message' => 'Pengguna berhasil didaftarkan!',
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $stmt->error,
            ]);
        }
        $stmt->close();
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pengguna</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #001f3f, #0056b3);
            color: white;
        }
        .container {
            background-color: #f9fafb;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
            animation: fadeIn 0.8s ease;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.9); }
            to { opacity: 1; transform: scale(1); }
        }
        h1 {
            text-align: center;
            color: #001f3f;
            margin-bottom: 30px;
            font-size: 28px;
        }
        .message {
            color: green;
            margin-bottom: 20px;
            text-align: center;
        }
        .error {
            color: red;
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #0056b3;
        }
        button {
            background-color: #001f3f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            font-size: 16px;
            margin-top: 10px;
        }
        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #001f3f;
            font-size: 14px;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Pengguna</h1>
        <div class="message" style="color: green;"></div>
        <div class="error" style="color: red;"></div>
        <form>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Daftar</button>
        </form>
        <a href="loginpengguna.php">Sudah punya akun? Masuk di sini</a>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault();

            const formData = new FormData(this);
            fetch('register.php', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.querySelector('.message').textContent = data.message;
                    document.querySelector('.error').textContent = '';
                } else {
                    document.querySelector('.error').textContent = data.message;
                    document.querySelector('.message').textContent = '';
                }
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
</body>
</html>
