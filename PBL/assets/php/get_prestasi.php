<?php
session_start();  // Start the session to access session variables
include('connection.php');

// Get the ID from session
$id_akun = $_SESSION['id'];

// Query to fetch data
$query = "SELECT p.id_prestasi, p.judul, p.tingkat, p.juara, p.kategori, p.jenis, p.lokasi, p.tanggal_mulai, p.status
          FROM Prestasi AS p
          JOIN Prestasi_Mahasiswa AS pm
          ON p.id_prestasi = pm.id_prestasi
          JOIN Mahasiswa AS m
          ON pm.id_mahasiswa = m.id_mahasiswa
          WHERE m.id_akun = ?";
$params = array($id_akun);

// Execute query
$stmt = sqlsrv_query($conn, $query, $params);

// Handle errors
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Prepare data for JSON response
$prestasiData = [];
while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    $row['tanggal_mulai'] = $row['tanggal_mulai']->format('Y-m-d');
    $prestasiData[] = $row;  // Add each row to the data array
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($prestasiData);
?>
