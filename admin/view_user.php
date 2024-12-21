<?php
include '../mahasiswa/db.php';
$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$queryLoans = "SELECT l.id, b.title, l.loan_date, l.return_date 
                FROM loans l 
                JOIN books b ON l.book_id = b.id 
                WHERE l.user_id = ?";
$stmtLoans = $conn->prepare($queryLoans);
$stmtLoans->bind_param('i', $id);
$stmtLoans->execute();
$resultLoans = $stmtLoans->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengguna</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f5f5f5; /* Warna background halaman */
            margin: 0;
            padding: 20px; 
            text-align: center;
        }

        h1 {
            color: #00a676; /* Warna hijau untuk judul */
        }

        h2 {
            color: #333; /* Warna untuk subjudul */
        }

        .container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto; 
            padding: 20px; 
            width: 80%; 
        }

        table {
            width: 100%; 
            border-collapse: collapse; 
            margin: 20px 0; 
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

        tr:nth-child(even) {
            background-color: #f2f2f2; 
        }

        a {
            display: inline-block; 
            margin: 20px auto; 
            padding: 10px 20px; 
            background-color: #00a676; /* Warna tombol */
            color: white; 
            text-decoration: none; 
            border-radius: 5px; 
            text-align: center; 
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: black; /* Warna hover tombol */
        }

        .button-container {
            text-align: left; 
            margin-left: 5px;
            margin-top: 20px; 
        }
    </style>
</head>
<body>
    <h1>Detail Pengguna</h1>

    <div class="container">
        <h2>Informasi Pengguna</h2>
        <table>
            <tr>
                <th>Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>ID</td>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><?php echo htmlspecialchars($user['username']); ?></td>
            </tr>
            <tr>
                <td>Role</td>
                <td><?php echo htmlspecialchars($user['role']); ?></td>
            </tr>
        </table>

        <h2>Buku yang Dipinjam</h2>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Maksimal Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
            <?php
            if ($resultLoans->num_rows > 0) {
                while ($loan = $resultLoans->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($loan['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($loan['loan_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($loan['return_date']) . "</td>";
                    echo "<td><a href='return_loan.php?id=" . htmlspecialchars($loan['id']) . "&user_id=" . htmlspecialchars($user['id']) . "' onclick=\"return confirm('Apakah buku ini sudah di kembalikan?');\">Pengembalian Buku</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada buku yang dipinjam.</td></tr>";
            }
            ?>
        </table>

        <div class="button-container">
            <a href="dashboard.php">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
