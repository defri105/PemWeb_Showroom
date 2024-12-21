<?php
include '../mahasiswa/db.php'; 
$id = $_POST['id'];

$query_delete_loans = "DELETE FROM loans WHERE book_id = ?";
$stmt_loans = $conn->prepare($query_delete_loans);
$stmt_loans->bind_param('i', $id);
$stmt_loans->execute();

$query_delete_book = "DELETE FROM books WHERE id = ?";
$stmt_book = $conn->prepare($query_delete_book);
$stmt_book->bind_param('i', $id);
$stmt_book->execute();

header('Location: dashboard.php');
?>
