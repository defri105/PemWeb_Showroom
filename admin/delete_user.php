<?php
include '../mahasiswa/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    
    $deleteLoansQuery = "DELETE FROM loans WHERE user_id = ?";
    $deleteStmt = $conn->prepare($deleteLoansQuery);
    $deleteStmt->bind_param('i', $id);
    $deleteStmt->execute();

    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();

    header('Location: dashboard.php');
}
?>
