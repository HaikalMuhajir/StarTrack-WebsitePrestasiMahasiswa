<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pass = strtoupper(md5($_POST['oldPassword']));
    $newPass = strtoupper(md5($_POST['newPassword']));

    $sql = "SELECT password FROM Info_Akun WHERE id_akun = ?";
    $param = array($_SESSION['id']);
    $stmt = sqlsrv_query($conn, $sql, $param);

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if ($pass == $row['password']) {
            if($pass == $newPass){
                echo "Password Sama";
            } else {
            $sql = "UPDATE Info_Akun SET password = ? WHERE id_akun = ?";
            $params = array($newPass, $_SESSION['id']);
            $stmt = sqlsrv_query($conn, $sql, $params);
            echo 'Success';
            }
        } else {
            echo 'Password Salah';
        }
    } else {
        echo 'Terjadi Kesalahan';
    }

    if ($stmt) {
        sqlsrv_free_stmt($stmt);
    }
}
?>