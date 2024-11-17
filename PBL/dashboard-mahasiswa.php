<?php
session_start();

if ($_SESSION['role'] !== 'Mahasiswa') {
    header('Location: login-page.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
</head>
<body>
    <h1>MAHASISWA</h1>  
    <a href="assets/php/logout.php">LOGOUT</a>
</body>
</html>
