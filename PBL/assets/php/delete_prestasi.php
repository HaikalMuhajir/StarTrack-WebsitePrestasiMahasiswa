<?php
session_start();  // Start the session to access session variables
include('connection.php');

// Check if id_prestasi is passed from the frontend
if (!isset($_GET['id_prestasi']) || empty($_GET['id_prestasi'])) {
    die(json_encode(['error' => 'id_prestasi is required']));
}

$id_prestasi = $_GET['id_prestasi'];  // Get id_prestasi from GET request

// Query to delete the prestasi record
$query = "DELETE FROM Prestasi_Mahasiswa WHERE id_prestasi = ?";
$params = array($id_prestasi);

// Execute query
$stmt = sqlsrv_query($conn, $query, $params);

$query = "DELETE FROM Prestasi WHERE id_prestasi = ?";
$params = array($id_prestasi);

// Execute query
$stmt = sqlsrv_query($conn, $query, $params);

// Handle errors
if ($stmt === false) {
    die(json_encode(['error' => 'Database error', 'details' => sqlsrv_errors()]));
}

// Check if any rows were affected (i.e., deleted)
if (sqlsrv_rows_affected($stmt) > 0) {
    // Successfully deleted the record
    echo json_encode(['success' => true, 'message' => 'Prestasi deleted successfully']);
} else {
    // No record was deleted (either not found or already deleted)
    echo json_encode(['error' => 'Prestasi not found or already deleted']);
}

// Close the statement and connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);
?>
