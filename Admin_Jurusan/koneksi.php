<?php
$host     = "DESKTOP-UN63EH7"; // Server\nama_instance
$connInfo = array("Database" => "pbl", "UID" => "", "PWD" => ""); // Sesuaikan dengan nama database, username, dan password Anda
$conn     = sqlsrv_connect($host, $connInfo);

if ($conn) {
    echo "Koneksi berhasil.<br/>";
} else {
    echo "Koneksi Gagal";
    die(print_r(sqlsrv_errors(), true));
}
?>
