<?php
session_start();

if ($_SESSION['role'] !== 'Admin Jurusan') {
    header('Location: login-page.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MAHASISWA</h1>  
</body>
</html>
