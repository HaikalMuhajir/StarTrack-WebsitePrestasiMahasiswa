<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');

$token = $_COOKIE['token'];

$sql = "SELECT * FROM Info_Akun WHERE token = ?";
$params = array($token);
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt && sqlsrv_has_rows($stmt)) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    $_SESSION['id'] = $row['id_akun'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['role'] = $row['role'];
;
} else {
    setcookie('token', '', time() - 3600, "/", "", false, true);
    unset($_COOKIE['token']);
    header('Location: login-page.php');
    exit;
}

if ($stmt) {
    sqlsrv_free_stmt($stmt);
}
?>