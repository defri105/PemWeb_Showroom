<?php
session_start();
session_destroy();
header("Location: ../loginpengguna.php");
exit();
?>