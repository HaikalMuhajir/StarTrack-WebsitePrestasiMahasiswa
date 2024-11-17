<?php
session_start();
include('connection.php');


    $token = $_COOKIE['token'];

    $sql = "SELECT * FROM InfoAkun WHERE token = ?";
    $params = array($token);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        $_SESSION['id'] = $row['id_akun'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        switch ($row['role']) {
            case 'Mahasiswa':
                header('Location: dashboard-mahasiswa.php');
                break;
            case 'Admin Jurusan':
                header('Location: dashboard-adminjurusan.php');
                break;
            case 'Admin Polinema':
                header('Location: dashboard-adminpolinema.php');
                break;
        }
        exit;
    } else {
        setcookie('token', '', time() - 3600, "/", "", false, true);
        header('Location: login-page.php');
        exit;
    }

    if ($stmt) {
        sqlsrv_free_stmt($stmt);
    }
?>
