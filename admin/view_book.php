<?php
include '../mahasiswa/db.php';
$id = $_GET['id'];
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
    <title>Detail Buku</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f5f5f5; /* Warna background halaman */
            margin: 0;
            padding: 20px; 
        }

        h1 {
            color: #00a676; /* Warna hijau untuk judul */
            text-align: center; 
        }

        table {
            width: 80%; 
            border-collapse: collapse; 
            margin: 20px auto; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
            background-color: white; 
            border-radius: 10px;
            overflow: hidden; 
        }

        th, td {
            padding: 12px; 
            text-align: center; 
            border: 1px solid #ccc; 
        }

        th {
            background-color: #00a676; /* Warna header tabel */
            color: white;
        }

        tr {
            background-color: #f2f2f2; 
        }

        tr:hover {
            background-color: #e1acac; /* Warna hover untuk baris tabel */
        }

        a {
            display: inline-block; 
            padding: 10px 20px;
            background-color: #00a676; /* Warna tombol */
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
        }

        a:hover {
            background-color: black; /* Warna hover tombol */
        }

        .button-container {
            text-align: left; 
            margin-left: 135px; /* Menyesuaikan margin kiri */
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <h1>Detail Buku</h1>

    <table>
        <tr>
            <th>Field</th>
            <th>Value</th>
        </tr>
        <tr>
            <td>ID</td>
            <td><?php echo htmlspecialchars($book['id']); ?></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td><?php echo htmlspecialchars($book['title']); ?></td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td><?php echo htmlspecialchars($book['author']); ?></td>
        </tr>
        <tr>
            <td>Tahun Terbit</td>
            <td><?php echo htmlspecialchars($book['published_year']); ?></td>
        </tr>
        <tr>
            <td>ID Rak Buku</td>
            <td><?php echo htmlspecialchars($book['shelf_id']); ?></td>
        </tr>
    </table>

    <div class="button-container">
        <a href="dashboard.php">Kembali ke Dashboard</a>
    </div>
</body>
</html>
