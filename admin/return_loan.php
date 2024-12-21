<?php
include '../mahasiswa/db.php';
$id = $_GET['id']; 

$query = "DELETE FROM loans WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: view_user.php?id=" . $_GET['user_id']);
    exit();
} else {
    echo "Gagal mengembalikan buku.";
}
?>
