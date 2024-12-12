<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');
function getBarChartDataAllTime($conn)
{
    $userId = $_SESSION['id'];
    $query = "SELECT FORMAT(p.tanggal_akhir, 'yyyy') AS tahun, COUNT(*) AS jumlah_prestasi 
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.id_akun = ? AND p.status = 'Verified'
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


function getPieChartDataAllTime($conn)
{
    $userId = $_SESSION['id'];
    $query = "SELECT p.jenis, COUNT(*) AS jumlah
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.id_akun = ? AND p.status = 'Verified'
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

    return empty($data['values']) || ($data['values'][0] === 0 && $data['values'][1] === 0)
        ? ['labels' => ['Akademik', 'Non Akademik'], 'values' => [0, 0]]
        : $data;

}



function getTotalPrestasi($conn)
{
    if (!isset($_SESSION['id'])) {
        return 0;
    }

    $userId = $_SESSION['id'];

    $query = "SELECT COUNT(*) AS total_prestasi 
              FROM Prestasi_Mahasiswa AS pm
              JOIN Mahasiswa AS m
              ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.id_akun = ? AND p.status = 'Verified' " ;

    $params = array($userId);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 0;
    }

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return (int) $row['total_prestasi'];
    }

    return 0;
}

function getTotalPoinAkademik($conn)
{
    if (!isset($_SESSION['id'])) {
        return 0;
    }

    $userId = $_SESSION['id'];

    $query = "SELECT poin_akumulasi 
              FROM Poin_Akademik
              WHERE id_akun = ?";

    $params = array($userId);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 0;
    }

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return (int) $row['poin_akumulasi'];
    }

    return 0;
}
function getTotalPoinNonAkademik($conn)
{
    if (!isset($_SESSION['id'])) {
        return 0;
    }

    $userId = $_SESSION['id'];

    $query = "SELECT poin_akumulasi 
              FROM Poin_NonAkademik
              WHERE id_akun = ?";

    $params = array($userId);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 0;
    }

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return (int) $row['poin_akumulasi'];
    }

    return 0;
}

function getDataMahasiswa($conn)
{
    if (!isset($_SESSION['id'])) {
        return null;
    }

    $userId = $_SESSION['id'];

    $query = "SELECT *
              FROM Mahasiswa
              WHERE id_akun = ?";

    $params = array($userId);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return null;
    }

    if ($stmt && sqlsrv_has_rows($stmt)) {
        return sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    }

    return null;
}


if (isset($_POST['year'])) {
    $year = $_POST['year'];

    $data = getBarChartDataByYear($conn, $year);
    echo json_encode($data);
}

function getBarChartDataByYear($conn, $year)
{
    $userId = $_SESSION['id'];

    $query = "SELECT MONTH(p.tanggal_akhir) AS month_number, COUNT(*) AS jumlah_prestasi
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.id_akun = ? 
              AND YEAR(p.tanggal_akhir) = ? AND p.status = 'Verified'
              GROUP BY MONTH(p.tanggal_akhir)
              ORDER BY MONTH(p.tanggal_akhir)";

    $params = array($userId, $year);
    $stmt = sqlsrv_query($conn, $query, $params);

    $monthNames = [
        1 => 'Jan',
        2 => 'Feb',
        3 => 'Mar',
        4 => 'Apr',
        5 => 'Mei',
        6 => 'Jun',
        7 => 'Jul',
        8 => 'Agu',
        9 => 'Sep',
        10 => 'Okt',
        11 => 'Nov',
        12 => 'Des'
    ];


    $data = [
        'labels' => array_values($monthNames),
        'values' => array_fill(0, 12, 0)
    ];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $monthNumber = $row['month_number'];
        $data['values'][$monthNumber - 1] = $row['jumlah_prestasi'];
    }

    return $data;
}

function getRangking($conn)
{
    // Assuming getDataMahasiswa() is being used to set up necessary session or data.

    // SQL query to calculate the ranking of students within the same jurusan
    $query = "
    SELECT 
        ROW_NUMBER() OVER (ORDER BY poin_akumulasi DESC) AS rank,
        id_akun
    FROM 
        Poin
    ";

    // Prepare and execute the SQL query
    $stmt = sqlsrv_query($conn, $query);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 'Error fetching ranking';  // Return error message
    }

    // Store the rankings in an array
    $kolom = [];
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $kolom[] = $row;
    }

    // Find the rank for the current user
    $userRank = null;
    foreach ($kolom as $row) {
        if ($row['id_akun'] === $_SESSION['id']) {  // Or use a unique identifier like $_SESSION['id_akun']
            $userRank = $row['rank'];  // Get the rank for the current user
            break;
        }
    }

    // Return the user's rank or 'Rank not found' if not found
    return $userRank ? $userRank : '-';
}

function getTotalRangking($conn)
{
    // Assuming getDataMahasiswa() is being used to set up necessary session or data.
    $jurusan = getDataMahasiswa($conn);

    // SQL query to count the total students in the same jurusan
    $query = "
    SELECT 
        COUNT(*) AS total
    FROM 
        Poin
    WHERE 
        program_studi = ?;
    ";

    // Parameters: session user's program_studi
    $params = array($jurusan['program_studi']);

    // Prepare and execute the SQL query
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 'Error fetching ranking';  // Return error message if query fails
    }

    // Fetch the result
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    // Return the total number of students
    return $row ? $row['total'] : '-';
}

function getTingkatPrestasi($conn)
{
    $userId = $_SESSION['id'];

    $query = "SELECT 
                p.tingkat, 
                COUNT(*) AS prestasi
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                ON pm.id_mahasiswa = m.id_mahasiswa 
              WHERE m.id_akun = ? AND p.status = 'Verified'
              GROUP BY p.tingkat";

    $params = array($userId);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return json_encode(['error' => 'Error fetching data']);
    }

    $data = [
        'Internasional' => 0,
        'Nasional' => 0,
        'Regional' => 0 // Default untuk kategori lainnya
    ];

    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $tingkat = $row['tingkat'];
        $jumlah = (int) $row['prestasi'];

        if (isset($data[$tingkat])) {
            $data[$tingkat] += $jumlah; // Tambahkan jika Internasional/Nasional
        } else {
            $data['Regional'] += $jumlah; // Kategori lainnya masuk Regional
        }
    }

    sqlsrv_free_stmt($stmt);

    return json_encode($data); // Kembalikan data sebagai JSON
}





