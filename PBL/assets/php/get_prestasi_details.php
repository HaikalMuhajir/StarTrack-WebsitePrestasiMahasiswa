<?php
session_start();  // Start the session to access session variables
include('connection.php');

// Check if id_prestasi is passed from the frontend
if (!isset($_GET['id_prestasi']) || empty($_GET['id_prestasi'])) {
    die(json_encode(['error' => 'id_prestasi is required']));
}

$id_prestasi = $_GET['id_prestasi'];  // Get id_prestasi from GET request

// Query to fetch prestasi details along with mahasiswa and dosen names and roles
$query = "
    SELECT p.*, 
           m.nama AS nama_mahasiswa, m.nim, pm.peran AS peran_mahasiswa, 
           d.nama AS nama_dosen, d.nidn, pd.peran AS peran_dosen
    FROM Prestasi p
    LEFT JOIN Prestasi_Mahasiswa pm ON p.id_prestasi = pm.id_prestasi
    LEFT JOIN Mahasiswa m ON pm.id_mahasiswa = m.id_mahasiswa
    LEFT JOIN Prestasi_Dosen pd ON p.id_prestasi = pd.id_prestasi
    LEFT JOIN Dosen d ON pd.id_dosen = d.id_dosen
    WHERE p.id_prestasi = ?";
$params = array($id_prestasi);

// Execute query
$stmt = sqlsrv_query($conn, $query, $params);

// Handle errors
if ($stmt === false) {
    die(json_encode(['error' => 'Database error', 'details' => sqlsrv_errors()])); 
}

// Prepare data for JSON response
$prestasiData = [];
$mahasiswaList = [];  // Array to hold multiple mahasiswa
$dosenList = [];      // Array to hold multiple dosen

while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    // Format dates
    $row['tanggal_mulai'] = $row['tanggal_mulai']->format('Y-m-d');
    $row['tanggal_akhir'] = $row['tanggal_akhir']->format('Y-m-d');
    
    // Push mahasiswa data into the mahasiswaList array if mahasiswa exists
    if ($row['nama_mahasiswa']) {
        $mahasiswaList[] = [
            'nama' => $row['nama_mahasiswa'],
            'nim' => $row['nim'],
            'peran' => $row['peran_mahasiswa']  // Add peran for mahasiswa
        ];
    }
    
    // Push dosen data into the dosenList array if dosen exists
    if ($row['nama_dosen']) {
        $dosenList[] = [
            'nama' => $row['nama_dosen'],
            'nidn' => $row['nidn'],
            'peran' => $row['peran_dosen']  // Add peran for dosen
        ];
    }

    // Add prestasi details (will include mahasiswa and dosen later)
    $prestasiData[] = [
        'id_prestasi' => $row['id_prestasi'],
        'jenis' => $row['jenis'],
        'tingkat' => $row['tingkat'],
        'judul' => $row['judul'],
        'juara' => $row['juara'],
        'kategori' => $row['kategori'],
        'lokasi' => $row['lokasi'],
        'tanggal_mulai' => $row['tanggal_mulai'],
        'tanggal_akhir' => $row['tanggal_akhir'],
        'status' => $row['status'],
        'sertifikat' => $row['sertifikat'],
        'foto_kegiatan' => $row['foto_kegiatan'],
        'surat_tugas' => $row['surat_tugas'],
        'poster' => $row['poster'],
        'mahasiswa' => $mahasiswaList,  // Add list of mahasiswa to the prestasi data
        'dosen' => $dosenList           // Add list of dosen to the prestasi data
    ];
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($prestasiData);
?>
