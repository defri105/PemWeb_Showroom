<?php
session_start();
include '../mahasiswa/db.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shelf_name = $_POST['shelf_name'];

    if (empty($shelf_name)) {
        $error = "Nama rak tidak boleh kosong!";
    } else {
        $stmt = $conn->prepare("INSERT INTO shelves (shelf_name) VALUES (?)");
        $stmt->bind_param("s", $shelf_name);

        if ($stmt->execute()) {
            $new_shelf_id = $stmt->insert_id;
            $success_message = "Rak dengan ID $new_shelf_id dan nama '$shelf_name' berhasil ditambahkan!";
        } else {
            $error = "Terjadi kesalahan: " . $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Rak Buku</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center; 
            align-items: center; 
            height: 100vh; 
            background-color: #f5f5f5; /* Background sesuai tema */
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
            color: #00a676; /* Judul sesuai tema */
            font-size: 24px; 
            text-align: center; 
            margin-bottom: 20px; 
        }

        .error {
            color: red; 
            margin-bottom: 10px;
            text-align: center;
        }

        .success {
            color: green; 
            margin-bottom: 10px;
            text-align: center; 
        }

        input[type="text"], input[type="number"] {
            width: 90%; 
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px; 
        }

        .button-container {
            display: flex; 
            justify-content: space-between; 
            margin-top: 20px; 
        }

        button, a.button {
            background-color: #00a676; /* Warna tombol sesuai tema */
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            flex: 1; 
            margin: 0 5px; 
            text-align: center; 
            font-size: 16px; 
        }

        button:hover, a.button:hover {
            background-color: black; /* Warna hover tombol */
        }

        a.button {
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Rak Buku</h1>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <?php if (isset($success_message)): ?>
            <p class="success"><?php echo $success_message; ?></p>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="shelf_name" placeholder="Masukkan Nama Rak" required>
            <div class="button-container">
                <button type="submit">Tambah Rak</button>
                <a class="button" href="dashboard.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
