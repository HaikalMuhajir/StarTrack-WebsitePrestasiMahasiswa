<?php
session_start();
if(isset($_COOKIE['token'])){
    include("assets/php/verify-token.php");

}

if ($_SESSION['role'] !== 'Admin Jurusan') {
    include('assets/php/bouncer.php');
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
    <h1>Admin Jursan</h1>  
    <a href="assets/php/logout.php">LOGOUT</a>
</body>
</html>
