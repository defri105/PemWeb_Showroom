<?php
include '../mahasiswa/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Handle the form submission
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];

        if (!empty($password)) {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        } else {
            $hashed_password = null;
        }

        $sql = "UPDATE users SET username = ?, role = ?";
        if ($hashed_password) {
            $sql .= ", password = ?";
        }
        $sql .= " WHERE id = ?";

        $stmt = $conn->prepare($sql);
        if ($hashed_password) {
            $stmt->bind_param("sssi", $username, $role, $hashed_password, $id);
        } else {
            $stmt->bind_param("ssi", $username, $role, $id);
        }

        if ($stmt->execute()) {
            $successMessage = "User updated successfully!";
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

        $stmt->close();
    }

    // Fetch the user data for the form
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
} else {
    die("No user ID provided.");
}

// Close the connection at the end
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #001f3f, #0056b3);
            color: white;
        }
        .container {
            background-color: #f9fafb;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
        h2 {
            text-align: center;
            color: #001f3f;
            margin-bottom: 20px;
        }
        .message {
            color: green;
            text-align: center;
            margin-bottom: 15px;
        }
        .error {
            color: red;
            text-align: center;
            margin-bottom: 15px;
        }
        input[type="text"], input[type="password"], select {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
        }
        input[type="text"]:focus, input[type="password"]:focus, select:focus {
            border-color: #0056b3;
        }
        button {
            background-color: #001f3f;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #001f3f;
        }
        a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <?php if (isset($successMessage)) { ?>
            <div class="message"><?= $successMessage; ?></div>
        <?php } ?>
        <?php if (isset($errorMessage)) { ?>
            <div class="error"><?= $errorMessage; ?></div>
        <?php } ?>
        <form method="POST">
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?= htmlspecialchars($user['username']); ?>" required>
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="Leave blank to keep the current password">
            <label for="role">Role:</label>
            <select name="role">
                <option value="user" <?= $user['role'] === 'user' ? 'selected' : ''; ?>>User</option>
                <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
            </select>
            <button type="submit">Update User</button>
        </form>
    </div>
</body>
</html>
