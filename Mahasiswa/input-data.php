<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Input Prestasi Mahasiswa - PRESMA POLINEMA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

  <style>
    .form-section {
      background-color: #f8f9fa;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .form-section h3 {
      color: #012970;
      margin-bottom: 20px;
    }
    .table-responsive {
      overflow-x: auto;
    }
    .required::after {
      content: " *";
      color: red;
    }
    .error-message {
      color: red;
      font-size: 0.875em;
      margin-top: 0.25rem;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">PRESMA
          <span class="text-primary">POLINEMA</span>
        </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Nindi Salva Azzahra</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Nindi Salva Azzahra</h6>
              <span>2341760158</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>Profil Saya</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a class="dropdown-item d-flex align-items-center" href="../PBL/login-page.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Log out</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </header>

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
      <li class="nav-item">
        <a class="nav-link collapsed" href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="data-mahasiswa.php">
          <i class="bi bi-award"></i>
          <span>Data Mahasiswa</span>
        </a>
      </li><!-- End Data Prestasi Mahasiswa Nav -->

      <li class="nav-item">
        <a class="nav-link" href="input-data.php">
          <i class="bi bi-plus-circle"></i>
          <span>Input Prestasi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="status.php">
          <i class="bi bi-check-circle"></i>
          <span>Status Validasi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../PBL/login-page.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Log out</span>
        </a>
      </li><!-- End Log out Nav -->
    </ul>
  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Input Prestasi Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
              <form id="prestasiForm">
                <div class="form-section">
                  <h3>Data Prestasi</h3>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="jurusan" class="form-label required">Jurusan</label>
                      <select class="form-select" id="jurusan" required>
                        <option value="">Pilih Jurusan</option>
                        <option value="Teknik Elektro">Teknik Elektro</option>
                        <option value="Teknik Mesin">Teknik Mesin</option>
                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                        <option value="Teknik Kimia">Teknik Kimia</option>
                        <option value="Teknik Sipil">Teknik Sipil</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Administrasi Niaga">Administrasi Niaga</option>
                      </select>
                      <div class="error-message" id="jurusan-error"></div>
                    </div>
                    <div class="col-md-6">
                      <label for="programStudi" class="form-label required">Program Studi</label>
                      <select class="form-select" id="programStudi" required>
                        <option value="">Pilih Program Studi</option>
                        <!-- Options will be populated dynamically -->
                      </select>
                      <div class="error-message" id="programStudi-error"></div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="tingkatPrestasi" class="form-label required">Tingkat Prestasi</label>
                      <select class="form-select" id="tingkatPrestasi" required>
                        <option value="">Pilih Tingkat Prestasi</option>
                        <option value="Internasional">Internasional</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Kabupaten">Kabupaten</option>
                        <option value="Kecamatan">Kecamatan</option>
                        <option value="Kelurahan">Kelurahan</option>
                        <option value="Kampus/Institusi">Kampus/Institusi</option>
                      </select>
                      <div class="error-message" id="tingkatPrestasi-error"></div>
                    </div>
                    <div class="col-md-6">
                      <label for="namaLomba" class="form-label required">Nama Lomba</label>
                      <input type="text" class="form-control" id="namaLomba" required>
                      <div class="error-message" id="namaLomba-error"></div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="capaianPrestasi" class="form-label required">Capaian Prestasi</label>
                      <select class="form-select" id="capaianPrestasi" required>
                        <option value="">Pilih Capaian Prestasi</option>
                        <option value="Juara 1">Juara 1</option>
                        <option value="Juara 2">Juara 2</option>
                        <option value="Juara 3">Juara 3</option>
                        <option value="Juara Umum">Juara Umum</option>
                        <option value="Juara Harapan">Juara Harapan</option>
                        <option value="Partisipan/Peserta">Partisipan/Peserta</option>
                      </select>
                      <div class="error-message" id="capaianPrestasi-error"></div>
                    </div>
                    <div class="col-md-6">
                      <label for="kategoriPerlombaan" class="form-label required">Kategori Perlombaan</label>
                      <select class="form-select" id="kategoriPerlombaan" required>
                        <option value="">Pilih Kategori Perlombaan</option>
                        <option value="Individu">Individu</option>
                        <option value="Kelompok">Kelompok</option>
                      </select>
                      <div class="error-message" id="kategoriPerlombaan-error"></div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-6">
                      <label for="tempatLomba" class="form-label required">Tempat Lomba</label>
                      <input type="text" class="form-control" id="tempatLomba" required>
                      <div class="error-message" id="tempatLomba-error"></div>
                    </div>
                    <div class="col-md-3">
                      <label for="tanggalAwalLomba" class="form-label required">Tanggal Awal Lomba</label>
                      <input type="date" class="form-control" id="tanggalAwalLomba" required>
                      <div class="error-message" id="tanggalAwalLomba-error"></div>
                    </div>
                    <div class="col-md-3">
                      <label for="tanggalAkhirLomba" class="form-label required">Tanggal Akhir Lomba</label>
                      <input type="date" class="form-control" id="tanggalAkhirLomba" required>
                      <div class="error-message" id="tanggalAkhirLomba-error"></div>
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-md-4">
                      <label for="jumlahPeserta" class="form-label required">Jumlah Peserta</label>
                      <input type="number" class="form-control" id="jumlahPeserta" required>
                      <div class="error-message" id="jumlahPeserta-error"></div>
                    </div>
                    <div class="col-md-4">
                      <label for="noSuratTugas" class="form-label">No Surat Tugas</label>
                      <input type="text" class="form-control" id="noSuratTugas">
                    </div>
                    <div class="col-md-4">
                      <label for="tanggalSuratTugas" class="form-label">Tanggal Surat Tugas</label>
                      <input type="date" class="form-control" id="tanggalSuratTugas">
                    </div>
                  </div>
                </div>

                <div class="form-section">
                  <h3>Upload File</h3>
                  <div class="row mb-3">
                    <div class="col-md-3">
                      <label for="scanSertifikat" class="form-label required">Scan Sertifikat</label>
                      <input type="file" class="form-control" id="scanSertifikat" accept=".pdf,.jpg,.jpeg,.png" required>
                      <div class="error-message" id="scanSertifikat-error"></div>
                    </div>
                    <div class="col-md-3">
                      <label for="fotoDokumentasi" class="form-label required">Foto Dokumentasi</label>
                      <input type="file" class="form-control" id="fotoDokumentasi" accept=".jpg,.jpeg,.png" required>
                      <div class="error-message" id="fotoDokumentasi-error"></div>
                    </div>
                    <div class="col-md-3">
                      <label for="scanSuratTugas" class="form-label">Scan Surat Tugas</label>
                      <input type="file" class="form-control" id="scanSuratTugas" accept=".pdf,.jpg,.jpeg,.png">
                    </div>
                    <div class="col-md-3">
                      <label for="poster" class="form-label required">Poster</label>
                      <input type="file" class="form-control" id="poster" accept=".pdf,.jpg,.jpeg,.png" required>
                      <div class="error-message" id="poster-error"></div>
                    </div>
                  </div>
                </div>

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
                  <button type="button" class="btn btn-primary" id="tambahMahasiswa">Tambah Mahasiswa</button>
                </div>

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
                  <button type="button" class="btn btn-primary" id="tambahPembimbing">Tambah Pembimbing</button>
                </div>

                <div class="text-end mt-4">
                  <button type="reset" class="btn btn-secondary me-2">Reset</button>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
              <!-- End Input Prestasi Form -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!--</main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Custom JS for Input Prestasi -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const jurusanSelect = document.getElementById('jurusan');
      const programStudiSelect = document.getElementById('programStudi');
      const anggotaTable = document.getElementById('anggotaTable').getElementsByTagName('tbody')[0];
      const tambahMahasiswaBtn = document.getElementById('tambahMahasiswa');
      const pembimbingTable = document.getElementById('pembimbingTable').getElementsByTagName('tbody')[0];
      const tambahPembimbingBtn = document.getElementById('tambahPembimbing');
      let anggotaCounter = 0;
      let pembimbingCounter = 0;

      const programStudiOptions = {
        'Teknik Elektro': ['D-III Teknik Listrik', 'D-III Teknik Elektronika', 'D-III Teknik Telekomunikasi', 'D-IV Sistem Kelistrikan', 'D-IV Teknik Elektronika', 'D-IV Teknik Jaringan Telekomunikasi Digital', 'Magister Terapan (S2) Teknik Elektro'],
        'Teknik Mesin': ['D-III Teknik Mesin', 'D-III Teknologi Pemeliharaan Pesawat Udara', 'D-IV Teknik Mesin Produksi dan Perawatan', 'D-IV Teknik Otomotif Elektronik', 'Magister Terapan (S2) Rekayasa Teknologi Manufaktur'],
        'Teknologi Informasi': ['D-II Pengembangan Piranti Lunak Situs', 'D-IV Sistem Informasi Bisnis', 'D-IV Teknik Informatika', 'Magister Terapan (S2) Rekayasa Teknologi Informasi'],
        'Teknik Kimia': ['D-III Teknik Kimia', 'D-IV Teknologi Kimia Industri'],
        'Teknik Sipil': ['D-III Teknik Sipil', 'D-III Teknologi Konstruksi Jalan, Jembatan, Dan Bangunan Air', 'D-III Teknologi Pertambangan', 'D-IV Teknologi Rekayasa Konstruksi Jalan Dan Jembatan', 'D-IV Manajemen Rekayasa Konstruksi'],
        'Akuntansi': ['D-III Akuntansi', 'D-IV Keuangan', 'D-IV Akuntansi Manajemen', 'Magister Terapan (S2) Sistem Informasi Akuntansi'],
        'Administrasi Niaga': ['D-III Administrasi Bisnis', 'D-IV Manajemen Pemasaran', 'D-IV Bahasa Inggris untuk Komunikasi Bisnis dan Profesional', 'D-IV Bahasa Inggris untuk Industri Pariwisata', 'D-IV Pengelolaan Arsip dan Rekaman Informasi', 'D-IV Usaha Perjalanan Wisata']
      };

      jurusanSelect.addEventListener('change', function() {
        const selectedJurusan = this.value;
        programStudiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
        if (selectedJurusan in programStudiOptions) {
          programStudiOptions[selectedJurusan].forEach(function(prodi) {
            const option = document.createElement('option');
            option.value = prodi;
            option.textContent = prodi;
            programStudiSelect.appendChild(option);
          });
        }
      });

      tambahMahasiswaBtn.addEventListener('click', function() {
        anggotaCounter++;
        const newRow = anggotaTable.insertRow();
        newRow.innerHTML = `
          <td>${anggotaCounter}</td>
          <td>
            <select class="form-select mahasiswa-select">
              <option value="">Pilih Mahasiswa</option>
              <option value="2341760158">2341760158 - Nindi Salva Azzahra</option>
              <!-- Add more options here -->
            </select>
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

      tambahPembimbingBtn.addEventListener('click', function() {
        pembimbingCounter++;
        const newRow = pembimbingTable.insertRow();
        newRow.innerHTML = `
          <td>${pembimbingCounter}</td>
          <td>
            <select class="form-select pembimbing-select">
              <option value="">Pilih Pembimbing</option>
              <option value="1">Dr. Eko Supriyanto, S.T., M.T.</option>
              <option value="2">Dr. Ir. Hari Putranto, M.T.</option>
              <!-- Add more options here -->
            </select>
          </td>
          <td>
            <select class="form-select peran-pembimbing-select">
              <option value="">Pilih Peran Pembimbing</option>
              <option value="1">Melakukan pembinaan kegiatan mahasiswa di bidang akademik (PA) dan kemahasiswaan (BEM, Mapelwa, dan lain-lain)</option>
              <option value="2">Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional</option>
              <option value="3">Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional</option>
              <option value="4">Membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Internasional</option>
              <option value="5">Membimbing mahasiswa mengikuti kompetisi di bidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional</option>
            </select>
          </td>
          <td>
            <button type="button" class="btn btn-danger btn-sm hapus-pembimbing">Hapus</button>
          </td>
        `;
      });

      anggotaTable.addEventListener('click', function(e) {
        if (e.target.classList.contains('hapus-anggota')) {
          e.target.closest('tr').remove();
          updateAnggotaNumbers();
        }
      });

      pembimbingTable.addEventListener('click', function(e) {
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

      document.getElementById('prestasiForm').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm()) {
          console.log('Form submitted');
          // You can add code here to collect all form data and send it to the server
        }
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

</html>