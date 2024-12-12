<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_COOKIE['token'])) {
    include("assets/php/verify-token.php");

}

if ($_SESSION['role'] !== 'Mahasiswa') {
    include('assets/php/bouncer.php');
}

include("assets/php/queryMahasiswa.php");
$dataMahasiswa = getDataMahasiswa($conn);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Prestasi</title>

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header and Navbar -->
    <?php include("component/header-mahasiswa.php") ?>
    <!-- End Header and Navbar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Input Prestasi Mahasiswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-mahasiswa.php">Home</a></li>
                    <li class="breadcrumb-item active">Input Prestasi</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Form Input Prestasi Mahasiswa</h5>

                            <!-- Input Prestasi Form -->
                            <form id="prestasiForm" action="assets/php/input_prestasi.php" method="POST">
                                <div class="form-section">
                                    <h3>Data Prestasi</h3>

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="namaLomba" class="form-label required">Nama Lomba</label>
                                            <input type="text" class="form-control" id="namaLomba" name="namaLomba"
                                                required>
                                            <div class="error-message" id="namaLomba-error"></div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kategoriPerlombaan" class="form-label required">Kategori
                                                Perlombaan</label>
                                            <select class="form-select" id="kategoriPerlombaan"
                                                name="kategoriPerlombaan" required>
                                                <option value="">Pilih Kategori Perlombaan</option>
                                                <option value="Individu">Individu</option>
                                                <option value="Kelompok">Kelompok</option>
                                            </select>
                                            <div class="error-message" id="kategoriPerlombaan-error"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="tempatLomba" class="form-label required">Lokasi
                                                Kompetisi</label>
                                            <input type="text" class="form-control" id="tempatLomba" name="tempatLomba"
                                                required>
                                            <div class="error-message" id="tempatLomba-error"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tanggalAwalLomba" class="form-label required">Tanggal
                                                Mulai</label>
                                            <input type="date" class="form-control" id="tanggalAwalLomba"
                                                name="tanggalAwalLomba" required>
                                            <div class="error-message" id="tanggalAwalLomba-error"></div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tanggalAkhirLomba" class="form-label required">Tanggal Berakhir
                                                Lomba</label>
                                            <input type="date" class="form-control" id="tanggalAkhirLomba"
                                                name="tanggalAkhirLomba" required>
                                            <div class="error-message" id="tanggalAkhirLomba-error"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="jenis" class="form-label required">Jenis Prestasi</label>
                                            <select class="form-select" id="jenis" name="jenis" required>
                                                <option value="">Pilih Jenis Prestasi</option>
                                                <option value="Akademik">Akademik</option>
                                                <option value="Non Akademik">Non Akademik</option>
                                            </select>
                                            <div class="error-message" id="jenis-error"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tingkatPrestasi" class="form-label required">Tingkat
                                                Prestasi</label>
                                            <select class="form-select" id="tingkatPrestasi" name="tingkatPrestasi"
                                                required>
                                                <option value="">Pilih Tingkat Prestasi</option>
                                                <option value="Internasional">Internasional</option>
                                                <option value="Nasional">Nasional</option>
                                                <option value="Provinsi">Provinsi</option>
                                                <option value="Kabupaten">Kabupaten</option>
                                                <option value="Kecamatan">Kecamatan</option>
                                                <option value="Kelurahan">Kelurahan</option>
                                                <option value="Universitas">Kampus/Institusi</option>
                                            </select>
                                            <div class="error-message" id="tingkatPrestasi-error"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="capaianPrestasi" class="form-label required">Capaian
                                                Prestasi</label>
                                            <select class="form-select" id="capaianPrestasi" name="capaianPrestasi"
                                                required>
                                                <option value="">Pilih Capaian Prestasi</option>
                                                <option value="juara 1">Juara 1</option>
                                                <option value="juara 2">Juara 2</option>
                                                <option value="juara 3">Juara 3</option>
                                                <option value="Juara Harapan">Juara Harapan</option>
                                                <option value="Partisipan/Peserta">Partisipan/Peserta</option>
                                            </select>
                                            <div class="error-message" id="capaianPrestasi-error"></div>
                                        </div>
                                    </div>
                                    <div class="row mb-5">
                                        <div class="col-md-4">
                                            <label for="jumlahPeserta" class="form-label required">Jumlah
                                                Peserta</label>
                                            <input type="number" class="form-control" id="jumlahPeserta"
                                                name="jumlahPeserta" required>
                                            <div class="error-message" id="jumlahPeserta-error"></div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="noSuratTugas" class="form-label">No Surat Tugas</label>
                                            <input type="text" class="form-control" id="noSuratTugas"
                                                name="noSuratTugas">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tanggalSuratTugas" class="form-label">Tanggal Surat
                                                Tugas</label>
                                            <input type="date" class="form-control" id="tanggalSuratTugas"
                                                name="tanggalSuratTugas">
                                        </div>
                                    </div>
                                </div>

                                <div class="card pt-3 my-5">
                                    <div class="card-body">
                                        <div class="form-section">
                                            <h3>Upload File</h3>
                                            <div class="row mb-3">
                                                <div class="col-md-3">
                                                    <label for="scanSertifikat" class="form-label required">Scan
                                                        Sertifikat</label>
                                                    <input type="file" class="form-control" id="scanSertifikat"
                                                        name="scanSertifikat" accept=".pdf,.jpg,.jpeg,.png" required>
                                                    <div class="error-message" id="scanSertifikat-error"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="fotoDokumentasi" class="form-label required">Foto
                                                        Dokumentasi</label>
                                                    <input type="file" class="form-control" id="fotoDokumentasi"
                                                        name="fotoDokumentasi" accept=".jpg,.jpeg,.png" required>
                                                    <div class="error-message" id="fotoDokumentasi-error"></div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="scanSuratTugas" class="form-label">Scan Surat
                                                        Tugas</label>
                                                    <input type="file" class="form-control" id="scanSuratTugas"
                                                        name="scanSuratTugas" accept=".pdf,.jpg,.jpeg,.png">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="poster" class="form-label required">Poster</label>
                                                    <input type="file" class="form-control" id="poster" name="poster"
                                                        accept=".pdf,.jpg,.jpeg,.png" required>
                                                    <div class="error-message" id="poster-error"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card pt-3 mt-5">
                                    <div class="card-body">
                                        <div class="form-section">
                                            <h3>Anggota Kelompok</h3>
                                            <div class="table-responsive mb-3">
                                                <table class="table table-bordered" id="anggotaTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Mahasiswa</th>
                                                            <th>Peran</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Rows will be added dynamically -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="tambahMahasiswa">Tambah
                                                Mahasiswa</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="card pt-3">
                                    <div class="card-body">
                                        <div class="form-section">
                                            <h3>Pembimbing</h3>
                                            <div class="table-responsive mb-3">
                                                <table class="table table-bordered" id="pembimbingTable">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Pembimbing</th>
                                                            <th>Peran Pembimbing</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- Rows will be added dynamically -->
                                                    </tbody>
                                                </table>
                                            </div>
                                            <button type="button" class="btn btn-primary" id="tambahPembimbing">Tambah
                                                Pembimbing</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="text-center mt-2">
                                            <button type="submit" class="btn btn-primary px-5 py-2">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <!-- End Input Prestasi Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const anggotaTable = document.getElementById('anggotaTable').getElementsByTagName('tbody')[0];
            const tambahMahasiswaBtn = document.getElementById('tambahMahasiswa');
            const pembimbingTable = document.getElementById('pembimbingTable').getElementsByTagName('tbody')[0];
            const tambahPembimbingBtn = document.getElementById('tambahPembimbing');
            let anggotaCounter = 0;
            let pembimbingCounter = 0;

            tambahMahasiswaBtn.addEventListener('click', function () {
                anggotaCounter++;
                const newRow = anggotaTable.insertRow();
                newRow.innerHTML = `
          <td>${anggotaCounter}</td>
          <td>
      <input type="text" class="form-control" placeholder="Masukkan NIM" id="nimMahasiswa-${anggotaCounter}">
    </td>
          <td>
            <select class="form-select peran-select">
              <option value="">Pilih Peran</option>
              <option value="Ketua">Ketua</option>
              <option value="Anggota">Anggota</option>
              <option value="Personal">Personal</option>
            </select>
          </td>
          <td>
            <button type="button" class="btn btn-danger btn-sm hapus-anggota">Hapus</button>
          </td>
        `;
            });

            tambahPembimbingBtn.addEventListener('click', function () {
                pembimbingCounter++;
                const newRow = pembimbingTable.insertRow();
                newRow.innerHTML = `
        <td>${pembimbingCounter}</td>
        <td>
            <input type="text" class="form-control" placeholder="Masukkan NIDN" id="nidnDosen-${pembimbingCounter}">
        </td>
        <td>
            <select class="form-select peran-pembimbing-select" id="peranPembimbing-${pembimbingCounter}">
                <option value="">Pilih Peran Pembimbing</option>
                <option value="Melakukan pembinaan kegiatan mahasiswa di bidang akademik (PA) dan kemahasiswaan (BEM, Mapelwa, dan lain-lain)">Melakukan pembinaan kegiatan mahasiswa di bidang akademik (PA) dan kemahasiswaan (BEM, Mapelwa, dan lain-lain)</option>
                <option value="Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional">Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional</option>
                <option value="Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional">Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional</option>
                <option value="Membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Internasional">Membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Internasional</option>
                <option value="Membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional">Membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional</option>
            </select>
        </td>
        <td>
            <button type="button" class="btn btn-danger btn-sm hapus-pembimbing">Hapus</button>
        </td>
    `;
            });

            anggotaTable.addEventListener('click', function (e) {
                if (e.target.classList.contains('hapus-anggota')) {
                    e.target.closest('tr').remove();
                    updateAnggotaNumbers();
                }
            });

            pembimbingTable.addEventListener('click', function (e) {
                if (e.target.classList.contains('hapus-pembimbing')) {
                    e.target.closest('tr').remove();
                    updatePembimbingNumbers();
                }
            });

            function updateAnggotaNumbers() {
                const rows = anggotaTable.rows;
                for (let i = 0; i < rows.length; i++) {
                    rows[i].cells[0].textContent = i + 1;
                }
                anggotaCounter = rows.length;
            }

            function updatePembimbingNumbers() {
                const rows = pembimbingTable.rows;
                for (let i = 0; i < rows.length; i++) {
                    rows[i].cells[0].textContent = i + 1;
                }
                pembimbingCounter = rows.length;
            }

            $('#prestasiForm').on('submit', function (e) {
                e.preventDefault();

                let anggotaKelompok = [];
                const anggotaRows = document.querySelectorAll('#anggotaTable tbody tr');

                anggotaRows.forEach(function (row) {
                    const nim = row.querySelector('input[type="text"]').value;
                    const peran = row.querySelector('.peran-select').value;

                    anggotaKelompok.push({ nim: nim, peran: peran });
                });

                let pembimbing = [];
                const pembimbingRows = document.querySelectorAll('#pembimbingTable tbody tr'); // Assuming you have a table for pembimbing

                pembimbingRows.forEach(function (row) {
                    const nidn = row.querySelector('input[type="text"]').value;
                    const peranPembimbing = row.querySelector('.peran-pembimbing-select').value;

                    pembimbing.push({ nidn: nidn, peran: peranPembimbing });
                });

                const formData = new FormData(this);
                formData.append('anggotaKelompok', JSON.stringify(anggotaKelompok)); // Add anggotaKelompok data
                formData.append('pembimbing', JSON.stringify(pembimbing)); // Add pembimbing data

                $.ajax({
                    url: 'assets/php/input_prestasi.php',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log('Form submitted successfully:', response);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error('Error submitting form:', textStatus, errorThrown);
                    }
                });
            });




            function validateForm() {
                let isValid = true;
                const requiredFields = document.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!field.value) {
                        isValid = false;
                        showError(field, 'This field is required');
                    } else {
                        clearError(field);
                    }
                });
                return isValid;
            }

            function showError(field, message) {
                const errorElement = document.getElementById(`${field.id}-error`);
                if (errorElement) {
                    errorElement.textContent = message;
                }
                field.classList.add('is-invalid');
            }

            function clearError(field) {
                const errorElement = document.getElementById(`${field.id}-error`);
                if (errorElement) {
                    errorElement.textContent = '';
                }
                field.classList.remove('is-invalid');
            }
        });
    </script>
</body>
<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.umd.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>

<script src="assets/js/main.js"></script>

</html>