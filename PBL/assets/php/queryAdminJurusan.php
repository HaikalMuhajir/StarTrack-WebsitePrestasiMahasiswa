<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include('connection.php');
function getBarChartDataAllTime($conn)
{
    $jurusan = $_SESSION['jurusan'];
    $query = "SELECT DISTINCT FORMAT(p.tanggal_akhir, 'yyyy') AS tahun, COUNT(DISTINCT p.id_prestasi) AS jumlah_prestasi 
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.program_studi = ? AND p.status = 'Verified'
              GROUP BY FORMAT(p.tanggal_akhir, 'yyyy')";

    $params = array($jurusan);
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
    $jurusan = $_SESSION['jurusan'];
    $query = "SELECT DISTINCT p.jenis, COUNT(DISTINCT p.id_prestasi) AS jumlah
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.program_studi = ? AND p.status = 'Verified'
              GROUP BY p.jenis";
    $params = array($jurusan);
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
    if (!isset($_SESSION['jurusan'])) {
        return 0;
    }

    $jurusan = $_SESSION['jurusan'];

    $query = "SELECT COUNT(DISTINCT p.id_prestasi) AS total_prestasi
    FROM Prestasi_Mahasiswa AS pm
    JOIN Mahasiswa AS m
      ON pm.id_mahasiswa = m.id_mahasiswa
    JOIN Prestasi AS p
      ON pm.id_prestasi = p.id_prestasi
    WHERE m.program_studi = ? AND p.status = 'Verified'";


    $params = array($jurusan);

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
    if (!isset($_SESSION['jurusan'])) {
        return 0;
    }

    $jurusan = $_SESSION['jurusan'];

    $query = "SELECT SUM(poin_akumulasi) AS poin 
              FROM Poin
              WHERE program_studi= ?";

    $params = array($jurusan);

    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 0;
    }

    if ($stmt && sqlsrv_has_rows($stmt)) {
        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return (int) $row['poin'];
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

function getDataAdmin($conn)
{
    if (!isset($_SESSION['id'])) {
        return null;
    }

    $userId = $_SESSION['id'];

    $query = "SELECT *
              FROM Admin_Jurusan
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
    // Ensure session variables are set
    if (!isset($_SESSION['jurusan'])) {
        return ['error' => 'Jurusan not set in session'];
    }

    $jurusan = $_SESSION['jurusan'];

    // SQL Query to get the count of achievements per month for a specific program_studi and year
    $query = "SELECT DISTINCT MONTH(p.tanggal_akhir) AS month_number, COUNT(DISTINCT p.id_prestasi) AS jumlah_prestasi
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                  ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                  ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.program_studi = ? 
              AND YEAR(p.tanggal_akhir) = ? AND p.status = 'Verified'
              GROUP BY MONTH(p.tanggal_akhir)
              ORDER BY MONTH(p.tanggal_akhir)";

    // Bind the parameters for program_studi and year
    $params = array($jurusan, $year);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return ['error' => 'Error executing query'];
    }

    // Array for month names
    $monthNames = [
        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr', 5 => 'Mei', 6 => 'Jun',
        7 => 'Jul', 8 => 'Agu', 9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des'
    ];

    // Data structure to hold chart data
    $data = [
        'labels' => array_values($monthNames),
        'values' => array_fill(0, 12, 0)
    ];

    // Fetch the data and populate the chart values
    while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
        $monthNumber = $row['month_number'];
        $data['values'][$monthNumber - 1] = $row['jumlah_prestasi'];
    }

    return $data;
}


function getMahasiswa($conn)
{
    // Get the jurusan value from the session
    $jurusan = $_SESSION['jurusan'];

    // Query to count the number of mahasiswa in the Poin table with the same jurusan
    $query = "SELECT COUNT(*) AS total_mahasiswa 
              FROM Poin 
              WHERE program_studi = ?";

    // Prepare and execute the query with parameters
    $params = array($jurusan);
    $stmt = sqlsrv_query($conn, $query, $params);

    // Check if the query executed successfully
    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return '0';  // Return error message
    }

    // Fetch the result and return the total count
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    return $row['total_mahasiswa'];  // Return the number of students
}


function getTotalRangking($conn)
{
    // Assuming getDataMahasiswa() is being used to set up necessary session or data.

    // SQL query to count the total students in the same jurusan
    $query = "
    SELECT 
        COUNT(*) AS total
    FROM 
        Poin
    ";

    // Parameters: session user's program_studi

    // Prepare and execute the SQL query
    $stmt = sqlsrv_query($conn, $query);

    if ($stmt === false) {
        error_log(print_r(sqlsrv_errors(), true));
        return 'Error fetching ranking';  // Return error message if query fails
    }

    // Fetch the result
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);

    // Return the total number of students
    return $row ? $row['total'] : '0';
}

function getTingkatPrestasi($conn)
{
    $jurusan = $_SESSION['jurusan'];

    $query = "SELECT DISTINCT
                p.tingkat, 
                COUNT(DISTINCT p.id_prestasi) AS prestasi
              FROM Prestasi AS p
              JOIN Prestasi_Mahasiswa AS pm
                ON p.id_prestasi = pm.id_prestasi
              JOIN Mahasiswa AS m
                ON pm.id_mahasiswa = m.id_mahasiswa
              WHERE m.program_studi = ? AND p.status = 'Verified'
              GROUP BY p.tingkat";

    $params = array($jurusan);
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





