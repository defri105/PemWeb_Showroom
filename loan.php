<?php
session_start();
include 'mahasiswa/db.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'member') {
    header("Location: loginpengguna.php"); 
    exit();
}

$message = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $book_id = $_POST['book_id'];
    $user_id = $_SESSION['user_id']; 
    $loan_date = date('Y-m-d'); 
    $return_date = date('Y-m-d', strtotime('+7 days')); 

    $sql = "INSERT INTO loans (user_id, book_id, loan_date, return_date) VALUES ('$user_id', '$book_id', '$loan_date', '$return_date')";

    if ($conn->query($sql) === TRUE) {
        $message = "Buku berhasil dipinjam! Harap kembalikan sebelum " . $return_date;
    } else {
        $message = "Terjadi kesalahan: " . $conn->error;
    }
}

$sql_books = "SELECT * FROM books";
$result_books = $conn->query($sql_books);

$sql_loans = "SELECT b.title, l.loan_date, l.return_date 
              FROM loans l 
              JOIN books b ON l.book_id = b.id 
              WHERE l.user_id = ?";
$stmt_loans = $conn->prepare($sql_loans);
$user_id = $_SESSION['user_id'];
$stmt_loans->bind_param('i', $user_id);
$stmt_loans->execute();
$result_loans = $stmt_loans->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peminjaman Buku</title>
    <style>
        body {
            font-family: 'Tahoma', sans-serif;
            background-color: #f5f5f5; /* Background color */
            margin: 0;
            padding: 20px;
            color: #333; /* Main text color */
        }

        h1 {
            color: #00a676; /* Green color for title */
            text-align: center;
            margin-bottom: 20px; /* Increased space */
        }

        h2 {
            color: #333; /* Color for subtitles */
            text-align: center;
            margin-bottom: 10px;
        }

        .container {
            background-color: white; 
            border-radius: 8px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            margin: 0 auto; 
            padding: 30px; /* Increased padding */
            width: 90%; 
            max-width: 800px; /* Maximum width */
        }

        form {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center; /* Center alignment */
        }

        label {
            margin-bottom: 10px; /* Spacing below label */
            font-weight: bold; /* Bold for labels */
        }

        select {
            padding: 10px;
            border-radius: 5px; 
            border: 1px solid #ccc; 
            width: 100%; /* Full width */
            max-width: 350px; /* Increased max-width */
            margin-bottom: 20px; /* Spacing below dropdown */
            font-size: 16px; /* Increased font size */
        }

        button {
            padding: 10px 20px; 
            background-color: #00a676; /* Button color */
            color: white; 
            border: none;
            border-radius: 5px;
            cursor: pointer; 
            transition: background-color 0.3s ease; /* Transition on hover */
            font-size: 16px; /* Increased font size */
        }

        button:hover {
            background-color: black; /* Hover button color */
        }

        table {
            width: 100%; 
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 15px; /* Increased padding */
            text-align: center; 
            border: 1px solid #ccc;
        }

        th {
            background-color: #00a676; /* Header color */
            color: white; 
        }

        tr {
            background-color: #f9f9f9; 
        }

        tr:hover {
            background-color: black; /* Row hover color */
            color: white; /* Text color on hover */
        }

        .button-container {
            text-align: center; /* Center alignment */
            margin-top: 20px; 
        }

        a {
            display: inline-block; 
            padding: 10px 20px; 
            background-color: #00a676; /* Button color */
            color: white; 
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Transition on hover */
        }

        a:hover {
            background-color: black; /* Hover button color */
        }

        .message {
            margin-top: 20px; 
            font-weight: bold; 
            color: #f2994a; /* Message color */
            text-align: center; /* Center alignment */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Peminjaman Buku</h1>
        <form method="post">
            <label for="book_id">Pilih Buku:</label>
            <select name="book_id" id="book_id" required>
                <?php
                if ($result_books->num_rows > 0) {
                    while ($row = $result_books->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</option>";
                    }
                } else {
                    echo "<option value=''>Tidak ada buku tersedia</option>";
                }
                ?>
            </select>
            <button type="submit">Pinjam Buku</button>
        </form>

        <?php if (!empty($message)): ?>
            <div class="message"><?php echo htmlspecialchars($message); ?></div>
        <?php endif; ?>

        <h2>Daftar Buku yang Dipinjam</h2>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Maksimal Pengembalian</th>
            </tr>
            <?php
            if ($result_loans->num_rows > 0) {
                while ($loan = $result_loans->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($loan['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($loan['loan_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($loan['return_date']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Anda belum meminjam buku.</td></tr>";
            }
            ?>
        </table>

        <div class="button-container">
            <a href="books.php">Kembali ke Daftar Buku</a>
        </div>
    </div>
</body>
</html>
