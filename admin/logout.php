<?php
session_start();
session_destroy(); // Destroy all sessions
header("Location: ../loginpengguna.php"); // Redirect to the login page
exit();
?>