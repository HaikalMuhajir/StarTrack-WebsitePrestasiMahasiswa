<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];

    $sql = "UPDATE Info_Akun SET token = NULL WHERE token = ?";
    $params = array($token);

    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    setcookie('token', '', time() - 3600, "/");
}

session_unset();
session_destroy();

header('Location: /PBL/login-page.php');
exit;
?>
