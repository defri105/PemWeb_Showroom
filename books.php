<?php
include 'mahasiswa/db.php';

$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f5f5f5; /* Lebih netral dan nyaman untuk dibaca */
            margin: 0;
            padding: 20px;
            text-align: center;
            color: #333; /* Warna teks utama */
        }

        h1 {
            color: #00a676; /* Membuat judul lebih menarik dengan warna hijau */
            margin-bottom: 20px;
            font-size: 2.5rem;
        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan */
            border-radius: 10px; /* Membulatkan sudut */
            overflow: hidden;
        }

        th, td {
            padding: 15px;
            text-align: center;
            border-bottom: 1px solid #ccc;
        }

        th {
            background-color: #00a676; /* Warna header tabel */
            color: white;
            font-size: 1.2rem;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* Menggunakan dua warna berbeda untuk setiap baris */
        }

        tr:hover {
            background-color: black; /* Warna hover pada baris */
            color: white; /* Ubah warna teks saat hover */
            transition: background-color 0.3s ease; /* Menambahkan transisi untuk hover */
        }

        td {
            font-size: 1rem;
        }

        a {
            display: inline-block;
            margin: 20px auto;
            padding: 10px 25px;
            background-color: #00a676; /* Warna tombol */
            color: white;
            text-decoration: none;
            border-radius: 30px; /* Membulatkan tombol */
            text-align: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Menambahkan bayangan pada tombol */
            transition: background-color 0.3s ease, transform 0.2s ease; /* Transisi saat hover */
        }

        a:hover {
            background-color: #f2994a; /* Warna hover tombol */
            transform: scale(1.05); /* Efek memperbesar sedikit saat hover */
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 90%;
            margin: 30px auto;
        }

        .button-container a {
            padding: 12px 30px;
            background-color: #00a676; /* Warna tombol */
            color: white;
            text-decoration: none;
            border-radius: 30px; /* Membulatkan tombol */
            margin: 0 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Bayangan pada tombol */
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button-container a:hover {
            background-color: black; /* Warna hover tombol */
            transform: scale(1.05); /* Efek memperbesar sedikit saat hover */
        }

        /* Responsif untuk tampilan mobile */
        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            .button-container {
                flex-direction: column;
                align-items: center;
            }

            .button-container a {
                margin-bottom: 15px;
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <h1>Daftar Buku</h1>

    <table>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Penulis</th>
            <th>Tahun Terbit</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['published_year']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <div class="button-container">
        <a href="index.php">Kembali</a>
        <a href="loan.php">Pinjam</a>
    </div>

</body>
</html>
