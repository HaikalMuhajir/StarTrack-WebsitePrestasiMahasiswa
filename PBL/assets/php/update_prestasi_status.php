<?php
include('connection.php'); // Database connection

// Check if POST parameters are set
if (!isset($_POST['id_prestasi']) || !isset($_POST['status'])) {
    die(json_encode(['success' => false, 'message' => 'Missing parameters']));
}

$id_prestasi = $_POST['id_prestasi'];
$status = $_POST['status'];

// Validate status (only allow 'Verified' or 'Rejected')
if (!in_array($status, ['Verified', 'Rejected'])) {
    die(json_encode(['success' => false, 'message' => 'Invalid status']));
}

// Update query
$query = "UPDATE Prestasi SET status = ? WHERE id_prestasi = ?";
$params = array($status, $id_prestasi);

// Execute query
$stmt = sqlsrv_query($conn, $query, $params);

// Check for SQL execution errors
if ($stmt === false) {
    $errors = sqlsrv_errors();
    die(json_encode(['success' => false, 'message' => 'Database error', 'details' => $errors]));
}

// Return success
echo json_encode(['success' => true]);
?>
