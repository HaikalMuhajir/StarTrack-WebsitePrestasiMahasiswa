<?php
function getBarChartData($conn)
{
    $userId = $_SESSION['id'];
    $query = "SELECT FORMAT(p.tanggal_akhir, 'yyyy') AS tahun, COUNT(*) AS jumlah_prestasi 
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.id_akun = ? 
              GROUP BY FORMAT(p.tanggal_akhir, 'yyyy')";

    $params = array($userId);
    $stmt = sqlsrv_query($conn, $query, $params);
    
    $data = [
        'labels' => [],
        'values' => []
    ];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $data['labels'][] = $row['tahun'];
        $data['values'][] = $row['jumlah_prestasi'];
    }

    if (empty($data['labels'])) {
        $data['labels'] = ['No Data'];
        $data['values'] = [0];
    }

    return $data;
}

function getPieChartData($conn) {
    // Existing pie chart data fetch function
    $userId = $_SESSION['id'];
    $query = "SELECT p.jenis, COUNT(*) AS jumlah
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.id_akun = ?
              GROUP BY p.jenis";
    $params = array($userId);
    $stmt = sqlsrv_query($conn, $query, $params);

    $data = ['labels' => ['Akademik', 'Non Akademik'], 'values' => [0, 0]];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        if ($row['jenis'] === 'Akademik') {
            $data['values'][0] = $row['jumlah'];
        } elseif ($row['jenis'] === 'Non Akademik') {
            $data['values'][1] = $row['jumlah'];
        }
    }

    return empty($data['values']) || ($data['values'][0] === 0 && $data['values'][1] === 0) ? ['values' => [0, 0]] : $data;
}
?>