<?php
session_start();
include('connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $rememberMe = isset($_POST['remember']); // Checkbox remember me

    $sql = "SELECT * FROM InfoAkun WHERE username = ?";
    $params = array($user);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

        if (md5($pass) === $row['password']) { // Validasi password dengan md5
            $_SESSION['id'] = $row['id_akun'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            if ($rememberMe) {
                // Membuat token untuk cookies
                $token = bin2hex(random_bytes(16));
                $update_sql = "UPDATE InfoAkun SET token = ? WHERE id_akun = ?";
                $update_params = array($token, $row['id_akun']);
                sqlsrv_query($conn, $update_sql, $update_params);

                // Set cookie dengan HttpOnly
                setcookie('token', $token, time() + (86400 * 30), "/", "", false, true);
            }

            // Redirect atau tampilkan role
            echo $row['role'];
        } else {
            echo 'Username atau password salah.';
        }
    } else {
        echo 'Username atau password salah.';
    }

    if ($stmt) {
        sqlsrv_free_stmt($stmt);
    }
}
?>
