<?php
include '../mahasiswa/db.php'; // Include your database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            header("Location: dashboard.php");
            exit();
        } else {
            $errorMessage = "Error: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    // Fetch user information
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
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
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #001f3f;
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            color: #333;
            margin-bottom: 30px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }
        .btn.confirm {
            background-color: #001f3f;
            color: white;
            border: none;
        }
        .btn.confirm:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .btn.cancel {
            background-color: #f44336;
            color: white;
            border: none;
        }
        .btn.cancel:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Delete User</h1>
        <?php if (isset($errorMessage)) { ?>
            <p style="color: red;"><?= htmlspecialchars($errorMessage); ?></p>
        <?php } ?>
        <p>Are you sure you want to delete the user <strong><?= htmlspecialchars($user['username']); ?></strong>?</p>
        <form method="POST">
            <button type="submit" class="btn confirm">Yes, Delete</button>
            <a href="dashboard.php" class="btn cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
