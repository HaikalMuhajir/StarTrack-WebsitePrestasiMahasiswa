<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = md5($_POST['password']);
    $remember = $_POST['remember'];

    $sql = "SELECT * FROM Info_Akun WHERE username = ?";
    $param = array($user);
    $stmt = sqlsrv_query($conn, $sql, $param);

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if ($pass === $row['password']) {
            $_SESSION['id'] = $row['id_akun'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if ($remember === 'true') {
                $token = bin2hex(random_bytes(16));
                $update_sql = "UPDATE Info_Akun SET token = ? WHERE id_akun = ?";
                $update_params = array($token, $row['id_akun']);
                sqlsrv_query($conn, $update_sql, $update_params);

                setcookie('token', $token, time() + (86400 * 30), "/", "", false, true);
            }

            echo $row['role'];
        } else {
            echo 'Input Salah';
        }
    } else {
        echo 'Input Salah';
    }

    if ($stmt) {
        sqlsrv_free_stmt($stmt);
    }
}
?>
