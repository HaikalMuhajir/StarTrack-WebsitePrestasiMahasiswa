<?php
include('connection.php');
header('Content-Type: application/json');

// Check for valid connection
if (!isset($conn)) {
    echo json_encode(['error' => 'Database connection not established']);
    exit;
}

$category = isset($_GET['category']) ? $_GET['category'] : 'Akademik';
$tableName = $category === 'Akademik' ? 'Poin_Akademik' : 'Poin_NonAkademik';

$sql = "SELECT 
            ROW_NUMBER() OVER (ORDER BY poin_akumulasi DESC) AS rank,
            nama, 
            poin_akumulasi,
            pas_foto
        FROM $tableName
        ORDER BY rank;";

$query = sqlsrv_query($conn, $sql);

// Check for query failure
if ($query === false) {
    echo json_encode(['error' => 'Query execution failed', 'details' => sqlsrv_errors()]);
    exit;
}

$data = [];
while ($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
    $data[] = $row;
}
 echo json_encode($data);
exit;
