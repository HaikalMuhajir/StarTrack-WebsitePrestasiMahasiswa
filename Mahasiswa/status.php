<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Status Validasi Prestasi - PRESMA POLINEMA</title>
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
    .status-badge {
      padding: 0.5rem 1rem;
      border-radius: 50px;
      font-size: 0.875rem;
      font-weight: 600;
    }
    .status-pending {
      background-color: #fff4d9;
      color: #ffc107;
    }
    .status-valid {
      background-color: #e0f8e3;
      color: #198754;
    }
    .status-invalid {
      background-color: #ffe7e7;
      color: #dc3545;
    }
    .comment-box {
      background-color: #f8f9fa;
      border-radius: 8px;
      padding: 1rem;
      margin-top: 1rem;
      border-left: 4px solid #dc3545;
    }
    .achievement-card {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 15px rgba(0,0,0,0.1);
      margin-bottom: 1.5rem;
      transition: transform 0.2s;
    }
    .achievement-card:hover {
      transform: translateY(-5px);
    }
    .achievement-details {
      font-size: 0.9rem;
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
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
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
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="data-mahasiswa.php">
          <i class="bi bi-award"></i>
          <span>Data Mahasiswa</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="input-data.php">
          <i class="bi bi-plus-circle"></i>
          <span>Input Prestasi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="status.php">
          <i class="bi bi-check-circle"></i>
          <span>Status Validasi</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="../PBL/login-page.php">
          <i class="bi bi-box-arrow-right"></i>
          <span>Log out</span>
        </a>
      </li>
    </ul>
  </aside>

  <main id="main" class="main">
    <div class="pagetitle">
      <h1>Status Validasi Prestasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Status Validasi</li>
        </ol>
      </nav>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Daftar Prestasi Anda</h5>

              <!-- Achievement Cards -->
              <div class="achievement-card p-4">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h5>Hackathon 2023</h5>
                    <p class="text-muted mb-2">Nasional • D4 Teknik Informatika</p>
                    <p class="mb-2"><strong>Capaian:</strong> Juara 1</p>
                  </div>
                  <div class="col-md-4">
                    <span class="status-badge status-valid">
                      <i class="bi bi-check-circle me-1"></i>Valid
                    </span>
                  </div>
                  <div class="col-md-2 text-end">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal1">
                      Detail
                    </button>
                  </div>
                </div>
              </div>

              <div class="achievement-card p-4">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h5>Kompetisi Robotika 2023</h5>
                    <p class="text-muted mb-2">Internasional • D4 Teknik Informatika</p>
                    <p class="mb-2"><strong>Capaian:</strong> Juara 2</p>
                  </div>
                  <div class="col-md-4">
                    <span class="status-badge status-invalid">
                      <i class="bi bi-x-circle me-1"></i>Tidak Valid
                    </span>
                    <div class="comment-box mt-2">
                      <i class="bi bi-chat-left-text me-2"></i>
                      <strong>Komentar Admin:</strong>
                      <p class="mb-0 mt-1">Sertifikat yang dilampirkan tidak jelas. Mohon upload ulang sertifikat dengan resolusi yang lebih baik.</p>
                    </div>
                  </div>
                  <div class="col-md-2 text-end">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal2">
                      Detail
                    </button>
                  </div>
                </div>
              </div>

              <div class="achievement-card p-4">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <h5>Lomba Karya Tulis Ilmiah</h5>
                    <p class="text-muted mb-2">Provinsi • D4 Teknik Informatika</p>
                    <p class="mb-2"><strong>Capaian:</strong> Juara 3</p>
                  </div>
                  <div class="col-md-4">
                    <span class="status-badge status-pending">
                      <i class="bi bi-clock me-1"></i>Belum Divalidasi
                    </span>
                  </div>
                  <div class="col-md-2 text-end">
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#detailModal3">
                      Detail
                    </button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

  </main>

  <!-- Detail Modal -->
  <div class="modal fade" id="detailModal1" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Prestasi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col-md-6">
              <h6>Informasi Lomba</h6>
              <table class="table table-borderless">
                <tr>
                  <td>Nama Lomba</td>
                  <td>: Hackathon 2023</td>
                </tr>
                <tr>
                  <td>Tingkat</td>
                  <td>: Nasional</td>
                </tr>
                <tr>
                  <td>Capaian</td>
                  <td>: Juara 1</td>
                </tr>
                <tr>
                  <td>Tempat Lomba</td>
                  <td>: Jakarta Convention Center</td>
                </tr>
                <tr>
                  <td>Tanggal Awal Lomba</td>
                  <td>: 15 November 2023</td>
                </tr>
                <tr>
                  <td>Tanggal Akhir Lomba</td>
                  <td>: 17 November 2023</td>
                </tr>
                <tr>
                  <td>Kategori Perlombaan</td>
                  <td>: Kelompok</td>
                </tr>
                <tr>
                  <td>Jumlah Peserta</td>
                  <td>: 5</td>
                </tr>
                <tr>
                  <td>No Surat Tugas</td>
                  <td>: 123/ST/2023</td>
                </tr>
                <tr>
                  <td>Tanggal Surat Tugas</td>
                  <td>: 1 November 2023</td>
                </tr>
              </table>
            </div>
            <div class="col-md-6">
              <h6>Status Validasi</h6>
              <div class="mt-3">
                <span class="status-badge status-valid">
                  <i class="bi bi-check-circle me-1"></i>Valid
                </span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <h6>Dokumen</h6>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="border rounded p-3">
                    <i class="bi bi-file-earmark-pdf me-2"></i>
                    Sertifikat.pdf
                    <a href="#" class="btn btn-sm btn-primary float-end" onclick="viewDocument('sertifikat.pdf')">Lihat</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="border rounded p-3">
                    <i class="bi bi-image me-2"></i>
                    Dokumentasi.jpg
                    <a href="#" class="btn btn-sm btn-primary float-end" onclick="viewDocument('dokumentasi.jpg')">Lihat</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="border rounded p-3">
                    <i class="bi bi-file-earmark-pdf me-2"></i>
                    Surat_Tugas.pdf
                    <a href="#" class="btn btn-sm btn-primary float-end" onclick="viewDocument('surat_tugas.pdf')">Lihat</a>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="border rounded p-3">
                    <i class="bi bi-file-earmark-image me-2"></i>
                    Poster.jpg
                    <a href="#" class="btn btn-sm btn-primary float-end" onclick="viewDocument('poster.jpg')">Lihat</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>

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

  <script>
  function viewDocument(documentName) {
    // In a real application, you would typically use a server-side URL here
    // For this example, we'll just show an alert
    alert("Viewing document: " + documentName);
    
    // In a real scenario, you might do something like:
    // window.open("/view-document.php?file=" + encodeURIComponent(documentName), "_blank");
  }
  </script>

</body>

</html>