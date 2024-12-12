<?php
session_start(); // Start the session to access session variables
include('connection.php'); // Include your SQL Server connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $jenis = $_POST['jenis']; // Jurusan field
    $tingkat = $_POST['tingkatPrestasi']; // Tingkat field
    $judul = $_POST['namaLomba']; // Nama Lomba field
    $juara = $_POST['capaianPrestasi']; // Capaian Prestasi field
    $kategori = $_POST['kategoriPerlombaan']; // Kategori field
    $lokasi = $_POST['tempatLomba']; // Tempat Lomba field
    $tanggal_mulai = $_POST['tanggalAwalLomba']; // Tanggal Awal field
    $tanggal_akhir = $_POST['tanggalAkhirLomba']; // Tanggal Akhir field
    $no_surat_tugas = $_POST['noSuratTugas']; // No Surat Tugas field
    $tgl_surat_tugas = $_POST['tanggalSuratTugas']; // Tanggal Surat Tugas field
    $status = 'On Hold'; // Default status, adjust as needed

    $anggotaKelompok = json_decode($_POST['anggotaKelompok'], true);
    $pembimbing = json_decode($_POST['pembimbing'], true);


    // File upload handling
    $uploads_dir = '../../uploads/';
    $sertifikat = handle_file_upload('scanSertifikat', $uploads_dir . 'Sertifikat/');
    $foto_kegiatan = handle_file_upload('fotoDokumentasi', $uploads_dir . 'Dokumentasi/');
    $surat_tugas = handle_file_upload('scanSuratTugas', $uploads_dir . 'Surat_tugas/');
    $poster = handle_file_upload('poster', $uploads_dir . 'Poster/');


    // SQL Server query to insert data into Prestasi table
    $query = "INSERT INTO Prestasi (jenis, tingkat, judul, juara, kategori, lokasi, tanggal_mulai, tanggal_akhir, no_surat_tugas, tgl_surat_tugas, status, sertifikat, foto_kegiatan, surat_tugas, poster) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $params = array($jenis, $tingkat, $judul, $juara, $kategori, $lokasi, $tanggal_mulai, $tanggal_akhir, $no_surat_tugas, $tgl_surat_tugas, $status, $sertifikat, $foto_kegiatan, $surat_tugas, $poster);
    $stmt = sqlsrv_query($conn, $query, $params);

    if ($stmt === false) {
        die(json_encode(['error' => 'Database error inserting into Prestasi', 'details' => sqlsrv_errors()]));
    }

    // Get the last inserted id from Prestasi table
    $result = sqlsrv_query($conn, "SELECT TOP 1 id_prestasi FROM Prestasi ORDER BY id_prestasi DESC");
    if ($result === false) {
        die(json_encode(['error' => 'Error fetching id_prestasi', 'details' => sqlsrv_errors()]));
    }
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
    $id_prestasi = $row['id_prestasi']; // Correctly assign id_prestasi after insertion

    // Debugging step: Check if $id_prestasi is valid
    if (empty($id_prestasi)) {
        die(json_encode(['error' => 'Failed to retrieve id_prestasi', 'id_prestasi' => $id_prestasi]));
    }

    // Now insert into Prestasi_Mahasiswa table for each mahasiswa
    if (isset($anggotaKelompok)) {
        foreach ($anggotaKelompok as $anggota) {
            $nim_mahasiswa = $anggota['nim'];
            $peran = $anggota['peran'];

            // Query to fetch the id_mahasiswa based on nim
            $query_search = "SELECT id_mahasiswa FROM Mahasiswa WHERE nim = ?";
            $params_search = array($nim_mahasiswa);

            // Execute the query
            $stmt_search = sqlsrv_query($conn, $query_search, $params_search);

            if ($stmt_search === false) {
                die(json_encode(['error' => 'Error searching for mahasiswa', 'details' => sqlsrv_errors()]));
            }

            // Fetch the id_mahasiswa
            $row = sqlsrv_fetch_array($stmt_search, SQLSRV_FETCH_ASSOC);

            if ($row) {
                $id_mahasiswa = $row['id_mahasiswa'];

                // Prepare the query for inserting into the Prestasi_Mahasiswa table
                $query_mahasiswa = "INSERT INTO Prestasi_Mahasiswa (id_prestasi, id_mahasiswa, peran) VALUES (?, ?, ?)";
                $params_mahasiswa = array($id_prestasi, $id_mahasiswa, $peran);

                // Execute the insert query
                $stmt_mahasiswa = sqlsrv_query($conn, $query_mahasiswa, $params_mahasiswa);

                if ($stmt_mahasiswa === false) {
                    die(json_encode(['error' => 'Database error for Prestasi_Mahasiswa', 'details' => sqlsrv_errors()]));
                }
            } else {
                // If no mahasiswa found with the given NIM
                die(json_encode(['error' => 'Mahasiswa with NIM ' . $nim_mahasiswa . ' not found']));
            }
        }

        // If everything is successful, return a success message
        echo json_encode(['success' => true, 'message' => 'Data submitted successfully!']);
    } else {
        die(json_encode(['error' => 'No anggota data found']));
    }

    if (isset($pembimbing) && !empty($pembimbing)) {
        foreach ($pembimbing as $pembimbingDetail) {
            $nidn = $pembimbingDetail['nidn'];
            $peran = $pembimbingDetail['peran'];

            // Query untuk mencari ID dosen berdasarkan NIDN
            $query_search = "SELECT id_dosen FROM Dosen WHERE nidn = ?";
            $params_search = array($nidn);
            $stmt_search = sqlsrv_query($conn, $query_search, $params_search);

            if ($stmt_search === false) {
                die(json_encode(['error' => 'Error searching for pembimbing', 'details' => sqlsrv_errors()]));
            }

            $row = sqlsrv_fetch_array($stmt_search, SQLSRV_FETCH_ASSOC);
            if ($row) {
                $id_dosen = $row['id_dosen'];

                // Masukkan data ke tabel Prestasi_Pembimbing
                $query_pembimbing = "INSERT INTO Prestasi_Dosen (id_prestasi, id_dosen, peran) VALUES (?, ?, ?)";
                $params_pembimbing = array($id_prestasi, $id_dosen, $peran);

                $stmt_pembimbing = sqlsrv_query($conn, $query_pembimbing, $params_pembimbing);

                if ($stmt_pembimbing === false) {
                    die(json_encode(['error' => 'Database error for Prestasi_Pembimbing', 'details' => sqlsrv_errors()]));
                }
            } else {
                // Jika dosen tidak ditemukan
                die(json_encode(['error' => 'Dosen with NIDN ' . $nidn . ' not found']));
            }
        }
    }
    echo json_encode(['success' => true, 'message' => 'Data submitted successfully including pembimbing!']);

}

// Function to handle file uploads
function handle_file_upload($input_name, $uploads_dir)
{
    if (isset($_FILES[$input_name]) && $_FILES[$input_name]['error'] == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES[$input_name]['tmp_name'];
        $name = basename($_FILES[$input_name]['name']);
        $target_path = $uploads_dir . $name;

        // Move the uploaded file to the 'uploads' directory
        if (move_uploaded_file($tmp_name, $target_path)) {
            return $target_path; // Return the file path to be stored in the database
        } else {
            return ''; // Return empty string if upload fails
        }
    }
    return ''; // Return empty string if no file was uploaded
}

?>