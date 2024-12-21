<?php
session_start();
include '../mahasiswa/db.php';

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $published_year = $_POST['published_year'];
    $shelf_id = $_POST['shelf_id'];

    if (!is_numeric($published_year) || !is_numeric($shelf_id)) {
        $message = "<p class='error'>Masukkan input berupa angka untuk Tahun Terbit dan ID Rak.</p>";
    } else {
        $query = "SELECT * FROM shelves WHERE id_shelf = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $shelf_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {
            $message = "<p class='error'>ID Rak tidak ditemukan.</p>";
        } else {
            $stmt = $conn->prepare("INSERT INTO books (title, author, published_year, shelf_id) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssii", $title, $author, $published_year, $shelf_id);

            if ($stmt->execute() === TRUE) {
                $message = "<p class='success'>Buku berhasil ditambahkan!</p>";
            } else {
                $message = "<p class='error'>Terjadi kesalahan: " . $stmt->error . "</p>";
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f5f5f5; /* Warna background halaman */
        }
        .container {
            background-color: #fff; /* Warna background kontainer */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            color: #00a676; /* Warna hijau untuk judul */
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="number"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
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
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button, a.button {
            background-color: #00a676; /* Warna tombol */
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
        <h2>Tambah Buku</h2>
        
        <?php if (!empty($message)): ?>
            <?php echo $message; ?>
        <?php endif; ?>

        <form method="post">
            <input type="text" name="title" placeholder="Judul Buku" required>
            <input type="text" name="author" placeholder="Penulis" required>
            <input type="number" name="published_year" placeholder="Tahun Terbit" required min="1900" max="2099">
            <input type="number" name="shelf_id" placeholder="ID Rak" required>
            <div class="button-container">
                <button type="submit">Tambah Buku</button>
                <a class="button" href="dashboard.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
