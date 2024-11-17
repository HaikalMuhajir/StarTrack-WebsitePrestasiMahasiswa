<?php
session_start();
include('connection.php');

if (isset($_COOKIE['token'])) {
    $token = $_COOKIE['token'];

    $sql = "UPDATE InfoAkun SET token = NULL WHERE token = ?";
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
