<?php
$serverName = 'WORK';
$connectionInfo = array("Database" => 'PBL', 'UID' => '', 'PWD' => '');
$conn = sqlsrv_connect($serverName, $connectionInfo);

if (!$conn) {
    echo "Error connecting to database: <br>";
    die(print_r(sqlsrv_errors(), true));
}
?>