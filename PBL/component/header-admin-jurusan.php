<?php
include("assets/php/connection.php");
?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

  <div class="d-flex align-items-center justify-content-between">
    <a href="" class="logo d-flex align-items-center">
      <img src="assets/img/logo.png" alt="">
      <span class="d-none d-lg-block">PRESMA
        <span class="text-primary">POLINEMA</span>
      </span>
    </a>
    <i class="bi bi-list toggle-sidebar-btn"></i>
  </div><!-- End Logo -->

  <nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

      <li class="nav-item dropdown pe-3">
        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
          <div class="px-2">
            <span class="d-none d-md-block"><?php echo $dataAdmin['nama'] ?></span>
          </div>
          <img src="/PBL<?php echo $dataAdmin['pas_foto'] ?>" alt="Profile" class="rounded-circle" style="width: 35px; object-fit: cover;">
        </a><!-- End Profile Image Icon -->

        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
          <li class="dropdown-header">
            <h6><?php echo $dataAdmin['nip'] ?></h6>
            <span><?php echo $dataAdmin['jurusan'] ?></span>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>

          <li>
            <a class="dropdown-item d-flex align-items-center" href="profile-admin-jurusan.php">
              <i class="bi bi-person"></i>
              <span>Profil Saya</span>
            </a>
          </li>
          <li>
            <hr class="dropdown-divider">
          </li>
          <li>
            <a class="dropdown-item d-flex align-items-center" href="assets/php/logout.php">
              <i class="bi bi-box-arrow-right"></i>
              <span>Sign Out</span>
            </a>
          </li>

        </ul><!-- End Profile Dropdown Items -->
      </li><!-- End Profile Nav -->

    </ul>
  </nav>

</header><!-- End Header -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link collapsed" href="
      dashboard-adminjurusan.php">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link collapsed" href="data-prestasi-admin-jurusan.php">
        <i class="bi bi-award"></i>
        <span>Prestasi Mahasiswa</span>
      </a>
    </li>
    <!-- End Data Prestasi Mahasiswa Nav -->


    <li class="nav-item">
        <a class="nav-link collapsed" href="validasi-prestasi-admin-jurusan.php">
          <i class="bi bi-check"></i>
          <span>Validasi Prestasi</span>
        </a>
      </li>

    <!-- Logout Navbar -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="assets/php/logout.php">
        <i class=" bi-door-open"></i>
        <span>Sign Out</span>
      </a>
    </li>
  </ul>
</aside><!-- End Sidebar-->