<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../index.php");
    exit();
}
include '../mahasiswa/db.php'; 

$query_users = "SELECT * FROM users";
$result_users = $conn->query($query_users);

$query_books = "SELECT * FROM books"; // Ensure this query retrieves the 'bookshelf' column as well
$result_books = $conn->query($query_books);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Warna background halaman */
        }

        .container {
            max-width: 1200px;
            margin: 20px auto; 
            padding: 20px;
            background-color: white; /* Warna background container */
            border-radius: 10px; /* Sudut membulat */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan */
        }

        h1 {
            text-align: center;
            color: #00a676; /* Warna hijau untuk judul */
        }

        h2 {
            color: #333; /* Warna untuk subjudul */
        }

        a {
            display: inline-block; 
            margin: 10px;
            padding: 10px;
            color: #fff;
            background-color: #00a676; /* Warna tombol */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: black; /* Warna hover tombol */
        }

        table {
            width: 100%;
            border-collapse: collapse; 
            margin-top: 20px;
            background-color: #fff; /* Warna background tabel */
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #00a676; /* Warna header tabel */
            color: white;
            text-align: center; 
        }

        .user-id, .book-id { width: 10%; }
        .user-username, .book-title { width: 20%; }
        .user-password { width: 20%; }
        .user-role { width: 20%; }
        .user-action, .book-action { width: 30%; }
        .book-shelf { width: 10%; } /* Kolom rak buku diubah menjadi lebih kecil */

        .button {
            background-color: #00a676; /* Warna tombol */
            color: white;
            border: none;
            padding: 8px 12px; 
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            text-align: center; 
            display: inline-block; 
        }

        .button:hover {
            background-color: black; /* Warna hover tombol */
        }

        form {
            display: inline; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <a href="add_user.php">Tambah Pengguna Baru</a>
        <a href="add_book.php">Tambah Buku Baru</a>
        <a href="add_shelf.php">Tambah Rak Buku</a>
        <a href="../index.php">Kembali</a>

        <h2>Daftar Pengguna</h2>
        <table>
            <thead>
                <tr>
                    <th class="user-id">ID</th>
                    <th class="user-username">Username</th>
                    <th class="user-password">Password</th>
                    <th class="user-role">Role</th>
                    <th class="user-action">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result_users->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo htmlspecialchars($user['username']); ?></td>
                    <td><?php echo htmlspecialchars($user['password']); ?></td>
                    <td><?php echo htmlspecialchars($user['role']); ?></td>
                    <td>
                        <a class="button" href="view_user.php?id=<?php echo $user['id']; ?>">Lihat Detail</a>
                        <a class="button" href="edit_user.php?id=<?php echo $user['id']; ?>">Edit</a>
                        <a class="button" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus pengguna ini?')) { document.getElementById('delete-form-<?php echo $user['id']; ?>').submit(); }">Hapus</a>

                        <form id="delete-form-<?php echo $user['id']; ?>" action="delete_user.php" method="POST" style="display: none;">
                            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <h2>Daftar Buku</h2>
        <table>
            <thead>
                <tr>
                    <th class="book-id">ID</th>
                    <th class="book-title">Judul</th>
                    <th class="book-author">Penulis</th>
                    <th class="book-year">Tahun Terbit</th>
                    <th class="book-shelf">Rak Buku</th> <!-- Kolom rak buku -->
                    <th class="book-action">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($book = $result_books->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $book['id']; ?></td>
                    <td><?php echo htmlspecialchars($book['title']); ?></td>
                    <td><?php echo htmlspecialchars($book['author']); ?></td>
                    <td><?php echo htmlspecialchars($book['published_year']); ?></td>
                    <td><?php echo htmlspecialchars($book['shelf_id']); ?></td> <!-- Menampilkan rak buku -->
                    <td>
                        <a class="button" href="view_book.php?id=<?php echo $book['id']; ?>">Lihat Detail</a>
                        <a class="button" href="edit_book.php?id=<?php echo $book['id']; ?>">Edit</a>
                        <a class="button" href="#" onclick="event.preventDefault(); if(confirm('Apakah Anda yakin ingin menghapus buku ini?')) { document.getElementById('delete-form-<?php echo $book['id']; ?>').submit(); }">Hapus</a>

                        <form id="delete-form-<?php echo $book['id']; ?>" action="delete_book.php" method="POST" style="display: none;">
                            <input type="hidden" name="id" value="<?php echo $book['id']; ?>">
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
