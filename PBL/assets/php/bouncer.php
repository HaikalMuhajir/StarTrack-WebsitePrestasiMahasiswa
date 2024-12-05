<?php
session_start();
    switch ($_SESSION['role']) {
        case 'Mahasiswa':
            header('Location: dashboard-mahasiswa.php');
            break;
        case 'Admin Jurusan':
            header('Location: dashboard-adminjurusan.php');
            break;
        case 'Admin Polinema':
            header('Location: dashboard-adminpolinema.php');
            break;
        default :
            header('Location: login-page.php');
            break;
    }
?>