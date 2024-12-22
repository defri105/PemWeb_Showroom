<?php
include '../mahasiswa/db.php'; // Include your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $hashed_password, $role, $id);

        if ($stmt->execute()) {
            echo "User updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
        exit;
    }

    // Fetch the user details
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
} else {
    die("No user ID provided.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form action="" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Leave blank to keep the current password"><br>
        <label for="role">Role:</label>
        <select name="role">
            <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
            <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
        </select><br>
        <button type="submit">Update User</button>
    </form>
</body>
</html>