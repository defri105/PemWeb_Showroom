<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../loginpengguna.php");
    exit();
}
include '../mahasiswa/db.php';

$id = $_GET['id'];
$conn->query("DELETE FROM car_stats WHERE id=$id");

header("Location: dashboard.php");
exit();
?>