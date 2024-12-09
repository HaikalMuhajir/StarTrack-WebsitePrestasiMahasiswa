<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard Mahasiswa - PRESMA POLINEMA</title>
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
    .achievement-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-radius: 15px;
      overflow: hidden;
    }
    .achievement-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .achievement-icon {
      font-size: 2.5rem;
      margin-bottom: 0.5rem;
    }
    .top-students-list {
      list-style-type: none;
      padding: 0;
    }
    .top-students-list li {
      padding: 10px 0;
      border-bottom: 1px solid #e0e0e0;
    }
    .top-students-list li:last-child {
      border-bottom: none;
    }
    .student-rank {
      font-weight: bold;
      margin-right: 10px;
      color: #4154f1;
    }
    .progress-title {
      margin-bottom: 5px;
      font-weight: 600;
    }
    .chart-container {
      position: relative;
      margin: auto;
      height: 80vh;
      width: 80vw;
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
        <a class="nav-link" href="dashboard.php">
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
        <a class="nav-link collapsed" href="input-data.php">
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
      <h1>Dashboard Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Total Prestasi Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card achievement-card">
                <div class="card-body">
                  <h5 class="card-title">Total Prestasi</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-award text-primary achievement-icon"></i>
                    </div>
                    <div class="ps-3">
                      <h6>12</h6>
                      <span class="text-success small pt-1 fw-bold">+3</span> 
                      <span class="text-muted small pt-2 ps-1">bulan ini</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Total Poin Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card achievement-card">
                <div class="card-body">
                  <h5 class="card-title">Total Poin</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-star text-warning achievement-icon"></i>
                    </div>
                    <div class="ps-3">
                      <h6>450</h6>
                      <span class="text-success small pt-1 fw-bold">+100</span> 
                      <span class="text-muted small pt-2 ps-1">bulan ini</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Peringkat Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card achievement-card">
                <div class="card-body">
                  <h5 class="card-title">Peringkat Jurusan</h5>
                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-trophy text-success achievement-icon"></i>
                    </div>
                    <div class="ps-3">
                      <h6>#5</h6>
                      <span class="text-success small pt-1 fw-bold">Top 10</span> 
                      <span class="text-muted small pt-2 ps-1">dari 120 mahasiswa</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Prestasi Chart -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Perkembangan Prestasi <span>| 6 Bulan Terakhir</span></h5>
                  <div id="achievementChart"></div>
                </div>
              </div>
            </div>

            <!-- Prestasi Terbaru -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">
                <div class="card-body">
                  <h5 class="card-title">Prestasi Terbaru <span>| 5 Terakhir</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Prestasi</th>
                        <th scope="col">Tingkat</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>14 Feb 2024</td>
                        <td>Juara 1 Hackathon Nasional 2024</td>
                        <td><span class="badge bg-primary">Nasional</span></td>
                        <td><span class="badge bg-success">Tervalidasi</span></td>
                      </tr>
                      <tr>
                        <td>28 Jan 2024</td>
                        <td>Best Paper ICACSIS 2024</td>
                        <td><span class="badge bg-info">Internasional</span></td>
                        <td><span class="badge bg-warning">Menunggu</span></td>
                      </tr>
                      <tr>
                        <td>15 Jan 2024</td>
                        <td>Juara 2 Competitive Programming</td>
                        <td><span class="badge bg-secondary">Regional</span></td>
                        <td><span class="badge bg-success">Tervalidasi</span></td>
                      </tr>
                      <tr>
                        <td>5 Jan 2024</td>
                        <td>Finalis Innovation Challenge</td>
                        <td><span class="badge bg-primary">Nasional</span></td>
                        <td><span class="badge bg-success">Tervalidasi</span></td>
                      </tr>
                      <tr>
                        <td>20 Des 2023</td>
                        <td>Juara 3 UI/UX Design Competition</td>
                        <td><span class="badge bg-primary">Nasional</span></td>
                        <td><span class="badge bg-success">Tervalidasi</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>
        </div>

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Top 5 Mahasiswa Berprestasi -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Top 5 Mahasiswa Berprestasi</h5>
              <ul class="top-students-list">
                <li>
                  <span class="student-rank">#1</span>
                  <img src="assets/img/profile-img.jpg" alt="Student" class="rounded-circle" width="30">
                  <span>Ahmad Fauzi</span>
                  <span class="float-end">750 pts</span>
                </li>
                <li>
                  <span class="student-rank">#2</span>
                  <img src="assets/img/profile-img.jpg" alt="Student" class="rounded-circle" width="30">
                  <span>Siti Nurhaliza</span>
                  <span class="float-end">720 pts</span>
                </li>
                <li>
                  <span class="student-rank">#3</span>
                  <img src="assets/img/profile-img.jpg" alt="Student" class="rounded-circle" width="30">
                  <span>Budi Santoso</span>
                  <span class="float-end">695 pts</span>
                </li>
                <li>
                  <span class="student-rank">#4</span>
                  <img src="assets/img/profile-img.jpg" alt="Student" class="rounded-circle" width="30">
                  <span>Rina Wulandari</span>
                  <span class="float-end">680 pts</span>
                </li>
                <li>
                  <span class="student-rank">#5</span>
                  <img src="assets/img/profile-img.jpg" alt="Student" class="rounded-circle" width="30">
                  <span>Doni Kusuma</span>
                  <span class="float-end">665 pts</span>
                </li>
              </ul>
            </div>
          </div>

          <!-- Tingkat Prestasi -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Tingkat Prestasi <span>| Total</span></h5>
              <div id="achievementLevelChart"></div>
            </div>
          </div>

          <!-- Target Prestasi -->
          <div class="card">
            <div class="card-body pb-0">
              <h5 class="card-title">Target Prestasi</h5>
              <div class="news">
                <div class="post-item clearfix">
                  <h4 class="progress-title">Target Poin Tahunan</h4>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 45%" aria-valuenow="450" aria-valuemin="0" aria-valuemax="1000">
                      450/1000
                    </div>
                  </div>
                </div>

                <div class="post-item clearfix mt-3">
                  <h4 class="progress-title">Target Prestasi Internasional</h4>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 60%" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5">
                      3/5
                    </div>
                  </div>
                </div>

                <div class="post-item clearfix mt-3">
                  <h4 class="progress-title">Target Prestasi Nasional</h4>
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 75%" aria-valuenow="6" aria-valuemin="0" aria-valuemax="8">
                      6/8
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </section>

  </main>

  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>PRESMA POLINEMA</span></strong>. All Rights Reserved
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
    document.addEventListener("DOMContentLoaded", () => {
      // Achievement Chart
      new ApexCharts(document.querySelector("#achievementChart"), {
        series: [{
          name: 'Prestasi',
          data: [2, 3, 1, 2, 3, 1]
        }],
        chart: {
          height: 350,
          type: 'bar',
          toolbar: {
            show: true
          }
        },
        plotOptions: {
          bar: {
            borderRadius: 4,
            columnWidth: '60%',
          }
        },
        dataLabels: {
          enabled: false
        },
        xaxis: {
          categories: ['Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Feb'],
          position: 'bottom'
        },
        colors: ['#4154f1']
      }).render();

      // Achievement Level Chart
      new ApexCharts(document.querySelector("#achievementLevelChart"), {
        series: [3, 6, 3],
        chart: {
          height: 250,
          type: 'pie',
        },
        labels: ['Internasional', 'Nasional', 'Regional'],
        colors: ['#4154f1', '#2eca6a', '#ff771d'],
        legend: {
          position: 'bottom'
        }
      }).render();
    });
  </script>

</body>

</html>

