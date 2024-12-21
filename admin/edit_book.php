<?php
session_start();
include '../mahasiswa/db.php';
$id = $_GET['id'];

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $published_year = $_POST['published_year'];
    $author = $_POST['author'];
    $shelf_id = $_POST['shelf_id'];

    if (!is_numeric($published_year) || strlen($published_year) != 4 || $published_year < 1900 || $published_year > 2099) {
        $message = "<p class='error'>Masukkan tahun yang valid (4 digit, antara 1900 dan 2099).</p>";
    } else {
        $query = "UPDATE books SET title = ?, published_year = ?, author = ?, shelf_id = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sisii', $title, $published_year, $author, $shelf_id, $id);
        
        if ($stmt->execute()) {
            $message = "<p class='success'>Buku berhasil diperbarui!</p>";
        } else {
            $message = "<p class='error'>Terjadi kesalahan: " . $stmt->error . "</p>";
        }
    }
}

$query = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$book = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
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
            background-color: #fff;
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
        <h2>Edit Buku</h2>
        <?php if (!empty($message)): ?>
            <?php echo $message; ?>
        <?php endif; ?>

        <form method="POST">
            <label>Judul Buku</label>
            <input type="text" name="title" value="<?php echo $book['title']; ?>" required>
            <label>Penulis</label>
            <input type="text" name="author" value="<?php echo $book['author']; ?>" required>
            <label>Tahun Terbit</label>
            <input type="number" name="published_year" value="<?php echo $book['published_year']; ?>" required min="1900" max="2099" oninput="this.setCustomValidity(this.validity.rangeUnderflow ? 'Tahun tidak boleh kurang dari 1900.' : this.validity.rangeOverflow ? 'Tahun tidak boleh lebih dari 2099.' : '');">
            <label>ID Rak</label>
            <input type="number" name="shelf_id" value="<?php echo $book['shelf_id']; ?>" required min="1">
            <div class="button-container">
                <button type="submit">Update</button>
                <a class="button" href="dashboard.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
