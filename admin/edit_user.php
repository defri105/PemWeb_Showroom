<?php
session_start();
include '../mahasiswa/db.php';
$id = $_GET['id'];

$message = ""; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $query = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $username, $password, $role, $id);
    if ($stmt->execute()) {
        $message = "<p class='success'>Pengguna berhasil diperbarui!</p>";
    } else {
        $message = "<p class='error'>Terjadi kesalahan: " . $conn->error . "</p>";
    }
}

$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengguna</title>
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

        input[type="text"], input[type="password"], select {
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
            background-color: #E1ACAC; /* Warna hover tombol */
        }

        a.button {
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit Pengguna</h2>

        <!-- Menampilkan pesan sukses atau error -->
        <?php if (!empty($message)): ?>
            <?php echo $message; ?>
        <?php endif; ?>

        <form method="POST">
            <input type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" placeholder="Username" required>
            <input type="password" name="password" value="<?php echo htmlspecialchars($user['password']); ?>" placeholder="Password" required>
            <label>Role</label>
            <select name="role" required>
                <option value="admin" <?php echo $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                <option value="member" <?php echo $user['role'] == 'member' ? 'selected' : ''; ?>>Member</option>
            </select>
            <div class="button-container">
                <button type="submit">Update Pengguna</button>
                <a class="button" href="dashboard.php">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>
