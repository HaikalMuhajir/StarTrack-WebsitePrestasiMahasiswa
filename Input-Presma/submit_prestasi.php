<?php
include 'koneksi.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $jurusan = $_POST['jurusan'];
    $program_studi = $_POST['programStudi'];
    $tingkat_prestasi = $_POST['tingkatPrestasi'];
    $jenis_prestasi = $_POST['jenisPrestasi'];
    $jenis_juara = $_POST['jenisJuara'];
    $nama_lomba = $_POST['namaLomba'];
    $kategori_perlombaan = $_POST['kategoriPerlombaan'];
    $tempat_lomba = $_POST['tempatLomba'];
    $tanggal_awal = $_POST['tanggalAwal'];
    $tanggal_akhir = $_POST['tanggalAkhir'];
    $jumlah_peserta = $_POST['jumlahPeserta'];
    $no_surat_tugas = $_POST['noSuratTugas'];
    $tanggal_surat_tugas = $_POST['tanggalSuratTugas'];

    // Handle file uploads
    $scan_sertifikat = $_FILES['scanSertifikat']['name'];
    $foto_penyerahan = $_FILES['fotoPenyerahan']['name'];
    $scan_surat_tugas = $_FILES['scanSuratTugas']['name'];

    // Specify the directory where files will be uploaded
    $target_dir = "uploads/";
    move_uploaded_file($_FILES['scanSertifikat']['tmp_name'], $target_dir . $scan_sertifikat);
    move_uploaded_file($_FILES['fotoPenyerahan']['tmp_name'], $target_dir . $foto_penyerahan);
    move_uploaded_file($_FILES['scanSuratTugas']['tmp_name'], $target_dir . $scan_surat_tugas);

    // Prepare SQL statement
    $sql = "INSERT INTO prestasi (jurusan, program_studi, tingkat_prestasi, jenis_prestasi, jenis_juara, nama_lomba, kategori_perlombaan, tempat_lomba, tanggal_awal, tanggal_akhir, jumlah_peserta, no_surat_tugas, tanggal_surat_tugas, scan_sertifikat, foto_penyerahan, scan_surat_tugas) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssssisssss", $jurusan, $program_studi, $tingkat_prestasi, $jenis_prestasi, $jenis_juara, $nama_lomba, $kategori_perlombaan, $tempat_lomba, $tanggal_awal, $tanggal_akhir, $jumlah_peserta, $no_surat_tugas, $tanggal_surat_tugas, $scan_sertifikat, $foto_penyerahan, $scan_surat_tugas);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Data successfully submitted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>