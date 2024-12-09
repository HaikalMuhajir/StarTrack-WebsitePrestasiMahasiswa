<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Data Prestasi Mahasiswa - Admin Polinema</title>
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

  <!-- DataTables CSS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

  <style>
    .status-btn {
      margin-bottom: 5px;
    }
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:after,
    table.dataTable thead .sorting_desc:after {
      opacity: 1;
    }
    table.dataTable thead .sorting:after {
      content: "\2195";
      color: #000;
    }
    table.dataTable thead .sorting_asc:after {
      content: "\2191";
      color: #007bff;
    }
    table.dataTable thead .sorting_desc:after {
      content: "\2193";
      color: #007bff;
    }
    .modal {
      display: none;
      position: fixed;
      z-index: 1000;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(0,0,0,0.4);
    }
    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 500px;
    }
    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }
    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
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
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" href="data-mahasiswa.php">
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
      <h1>Data Mahasiswa</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Data Mahasiswa</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Filter Data Mahasiswa</h5>

              <!-- Filter Form -->
              <form id="filterForm">
                <div class="row mb-3">
                  <div class="col-md-3">
                    <label for="jurusan" class="form-label">Jurusan</label>
                    <select class="form-select" id="jurusan">
                      <option value="">Pilih Jurusan</option>
                      <option value="Teknik Elektro">Teknik Elektro</option>
                      <option value="Teknik Mesin">Teknik Mesin</option>
                      <option value="Teknologi Informasi">Teknologi Informasi</option>
                      <option value="Teknik Kimia">Teknik Kimia</option>
                      <option value="Teknik Sipil">Teknik Sipil</option>
                      <option value="Akuntansi">Akuntansi</option>
                      <option value="Administrasi Niaga">Administrasi Niaga</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="programStudi" class="form-label">Program Studi</label>
                    <select class="form-select" id="programStudi">
                      <option value="">Pilih Program Studi</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="jenisPrestasi" class="form-label">Jenis Prestasi</label>
                    <select class="form-select" id="jenisPrestasi">
                      <option value="">Pilih Jenis Prestasi</option>
                      <option value="PIMNAS">Pekan Ilmiah Mahasiswa Nasional (PIMNAS)</option>
                      <option value="KIMI">Kompetisi Inovasi Mahasiswa Indonesia (KIMI)</option>
                      <option value="KBMI">Kompetisi Bisnis Mahasiswa Indonesia (KBMI)</option>
                      <option value="GEMASTIK">Pagelaran Mahasiswa Nasional Bidang Teknologi Informasi dan Komunikasi (GEMASTIK)</option>
                      <option value="LIDM">Lomba Inovasi Digital Mahasiswa (LIDM)</option>
                      <option value="LKTI">Lomba Karya Tulis Ilmiah (LKTI)</option>
                      <option value="KRI">Kompetisi Robot Indonesia (KRI)</option>
                      <option value="KN-MIPA">Kompetisi Nasional Matematika dan Ilmu Pengetahuan Alam (KN-MIPA)</option>
                      <option value="Competitive Programming">Kompetisi Pemrograman Nasional (Competitive Programming)</option>
                      <option value="Debat Konstitusi">Lomba Debat Konstitusi Mahasiswa</option>
                      <option value="Inovasi Teknologi">Lomba Inovasi Teknologi Mahasiswa</option>
                      <option value="Poster Ilmiah">Lomba Poster Ilmiah</option>
                      <option value="Film Pendek">Kompetisi Film Pendek Mahasiswa</option>
                      <option value="Inovasi Energi">Kompetisi Inovasi Energi Baru dan Terbarukan</option>
                      <option value="Desain Grafis">Kompetisi Desain Grafis Nasional</option>
                      <option value="OSN-M">Olimpiade Sains Nasional Mahasiswa (OSN-M)</option>
                      <option value="Akuntansi">Kompetisi Akuntansi Nasional</option>
                      <option value="Rencana Bisnis">Kompetisi Rencana Bisnis Mahasiswa</option>
                      <option value="Teknik Jembatan">Kompetisi Teknik Jembatan dan Bangunan</option>
                      <option value="Statistika">Kompetisi Statistika dan Data Science Mahasiswa</option>
                      <option value="Lain-lain">Lain-lain</option>
                    </select>
                  </div>
                  <div class="col-md-3">
                    <label for="tingkatPrestasi" class="form-label">Tingkat Prestasi</label>
                    <select class="form-select" id="tingkatPrestasi">
                      <option value="">Pilih Tingkat Prestasi</option>
                      <option value="Internasional">Internasional</option>
                      <option value="Nasional">Nasional</option>
                      <option value="Provinsi">Provinsi</option>
                      <option value="Kabupaten">Kabupaten</option>
                      <option value="Kecamatan">Kecamatan</option>
                      <option value="Kelurahan">Kelurahan</option>
                      <option value="Kampus/Institusi">Kampus/Institusi</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                  </div>
                </div>
              </form>
              <!-- End Filter Form -->

              <!-- Table with stripped rows -->
              <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                  <label for="showEntries" class="form-label me-2">Show entries</label>
                  <select id="entriesSelect" class="form-select me-3" style="width: auto;">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                  </select>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                  <label for="tableSearch" class="form-label me-2">Search:</label>
                  <input type="search" class="form-control w-auto" id="tableSearch">
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped" id="prestasiTable">
                  <thead>
                    <tr>
                      <th scope="col">No</th>
                      <th scope="col">NIM</th>
                      <th scope="col">Nama Lengkap</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Program Studi</th>
                      <th scope="col">Nama Lomba</th>
                      <th scope="col">Tingkat Prestasi</th>
                      <th scope="col">Capaian</th>
                      <th scope="col">Poin</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Table rows will be populated dynamically -->
                  </tbody>
                </table>
              </div>
              <!-- End Table with stripped rows -->

              <!-- Pagination Info -->
              <div class="d-flex justify-content-between align-items-center mt-3">
                <div id="tableInfo"></div>
                <div id="tablePagination"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

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

  <!-- Modal for detailed view -->
  <div id="prestasiModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h2 id="modalTitle"></h2>
      <div id="modalContent"></div>
    </div>
  </div>

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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <!-- DataTables JS -->
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

  <!-- Custom JS for Data Prestasi Mahasiswa -->
  <script>
  document.addEventListener('DOMContentLoaded', function() {
    const filterForm = document.getElementById('filterForm');
    const jurusanSelect = document.getElementById('jurusan');
    const programStudiSelect = document.getElementById('programStudi');
    const prestasiTable = document.getElementById('prestasiTable');
    const tableBody = prestasiTable.querySelector('tbody');
    const modal = document.getElementById('prestasiModal');
    const modalTitle = document.getElementById('modalTitle');
    const modalContent = document.getElementById('modalContent');

    // Program Studi options based on Jurusan
    const programStudiOptions = {
      'Teknik Elektro': [
        'D-III Teknik Listrik',
        'D-III Teknik Elektronika',
        'D-III Teknik Telekomunikasi',
        'D-IV Sistem Kelistrikan',
        'D-IV Teknik Elektronika',
        'D-IV Teknik Jaringan Telekomunikasi Digital',
        'Magister Terapan (S2) Teknik Elektro'
      ],
      'Teknik Mesin': [
        'D-III Teknik Mesin',
        'D-III Teknologi Pemeliharaan Pesawat Udara',
        'D-IV Teknik Mesin, Produksi dan Perawatan',
        'D-IV Teknik Otomotif Elektronik',
        'Magister Terapan (S2) Rekayasa Teknologi Manufaktur'
      ],
      'Teknologi Informasi': [
        'D-II Pengembangan Piranti Lunak Situs',
        'D-IV Sistem Informasi Bisnis',
        'D-IV Teknik Informatika',
        'Magister Terapan (S2) Rekayasa Teknologi Informasi'
      ],
      'Teknik Kimia': [
        'D-III Teknik Kimia',
        'D-IV Teknologi Kimia Industri'
      ],
      'Teknik Sipil': [
        'D-III Teknik Sipil',
        'D-III Teknologi Konstruksi Jalan, Jembatan, Dan Bangunan Air',
        'D-III Teknologi Pertambangan',
        'D-IV Teknologi Rekayasa Konstruksi Jalan Dan Jembatan',
        'D-IV Manajemen Rekayasa Konstruksi'
      ],
      'Akuntansi': [
        'D-III Akuntansi',
        'D-IV Keuangan',
        'D-IV Akuntansi Manajemen',
        'Magister Terapan (S2) Sistem Informasi Akuntansi'
      ],
      'Administrasi Niaga': [
        'D-III Administrasi Bisnis',
        'D-IV Manajemen Pemasaran',
        'D-IV Bahasa Inggris untuk Komunikasi Bisnis dan Profesional',
        'D-IV Bahasa Inggris untuk Industri Pariwisata',
        'D-IV Pengelolaan Arsip dan Rekaman Informasi',
        'D-IV Usaha Perjalanan Wisata'
      ]
    };

    // Sample data (replace with actual data from your database)
    const sampleData = [
      {
        id: 1,
        nim: '12345',
        namaLengkap: 'John Doe',
        jurusan: 'Teknologi Informasi',
        programStudi: 'D-IV Teknik Informatika',
        namaLomba: 'Hackathon 2023',
        tingkatPrestasi: 'Nasional',
        capaianPrestasi: 'Juara 1',
        jenisPrestasi: 'Kompetisi',
        lokasi: 'Jakarta',
        tanggalPengajuan: '2023-05-01',
        sertifikat: 'path/to/sertifikat.pdf',
        dokumentasi: 'path/to/dokumentasi.jpg',
        poin: 25
      },
      // Add more sample data here
    ];

    // Function to update Program Studi options
    function updateProgramStudiOptions() {
      const selectedJurusan = jurusanSelect.value;
      programStudiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
      if (selectedJurusan && programStudiOptions[selectedJurusan]) {
        programStudiOptions[selectedJurusan].forEach(option => {
          const optionElement = document.createElement('option');
          optionElement.value = option;
          optionElement.textContent = option;
          programStudiSelect.appendChild(optionElement);
        });
      }
    }

    // Event listener for Jurusan select
    jurusanSelect.addEventListener('change', updateProgramStudiOptions);

    function populateTable(data) {
      tableBody.innerHTML = '';
      if (data.length === 0) {
        const row = document.createElement('tr');
        row.innerHTML = '<td colspan="10" class="text-center">Belum ada data yang masuk</td>';
        tableBody.appendChild(row);
      } else {
        data.forEach((item, index) => {
          const row = document.createElement('tr');
          row.innerHTML = `
            <td>${index + 1}</td>
            <td>${item.nim}</td>
            <td>${item.namaLengkap}</td>
            <td>${item.jurusan}</td>
            <td>${item.programStudi}</td>
            <td>${item.namaLomba}</td>
            <td>${item.tingkatPrestasi}</td>
            <td>${item.capaianPrestasi}</td>
            <td>${item.poin}</td>
            <td>
              <button class="btn btn-sm btn-primary mb-1 me-1" onclick="showDetails(${item.id})">
                <i class="bi bi-eye"></i> Detail
              </button>
              <button class="btn btn-sm btn-warning mb-1 me-1" onclick="editPrestasi(${item.id})">
                <i class="bi bi-pencil"></i> Edit
              </button>
              <button class="btn btn-sm btn-danger mb-1" onclick="deletePrestasi(${item.id})">
                <i class="bi bi-trash"></i> Hapus
              </button>
            </td>
          `;
          tableBody.appendChild(row);
        });
      }
    }

    function showDetails(id) {
      const item = sampleData.find(d => d.id === id);
      if (item) {
        modalTitle.textContent = item.namaLomba;
        modalContent.innerHTML = `
          <p><strong>NIM:</strong> ${item.nim}</p>
          <p><strong>Nama:</strong> ${item.namaLengkap}</p>
          <p><strong>Jurusan:</strong> ${item.jurusan}</p>
          <p><strong>Program Studi:</strong> ${item.programStudi}</p>
          <p><strong>Jenis Prestasi:</strong> ${item.jenisPrestasi}</p>
          <p><strong>Capaian:</strong> ${item.capaianPrestasi}</p>
          <p><strong>Tingkat:</strong> ${item.tingkatPrestasi}</p>
          <p><strong>Lokasi:</strong> ${item.lokasi}</p>
          <p><strong>Tanggal Pengajuan:</strong> ${item.tanggalPengajuan}</p>
          <p><strong>Sertifikat:</strong> <a href="${item.sertifikat}" target="_blank">Lihat Sertifikat</a></p>
          <p><strong>Dokumentasi:</strong> <a href="${item.dokumentasi}" target="_blank">Lihat Dokumentasi</a></p>
          <p><strong>Poin:</strong> ${item.poin}</p>
          <div class="mt-3">
            <button class="btn btn-warning" onclick="editPrestasi(${item.id})">
              <i class="bi bi-pencil"></i> Edit
            </button>
            <button class="btn btn-danger" onclick="deletePrestasi(${item.id})">
              <i class="bi bi-trash"></i> Hapus
            </button>
          </div>
        `;
        modal.style.display = 'block';
      }
    }

    function editPrestasi(id) {
      // Placeholder function for editing prestasi
      alert(`Editing prestasi with ID: ${id}`);
      // In a real application, this would open an edit form or redirect to an edit page
    }

    function deletePrestasi(id) {
      // Placeholder function for deleting prestasi
      if (confirm(`Are you sure you want to delete prestasi with ID: ${id}?`)) {
        alert(`Deleting prestasi with ID: ${id}`);
        // In a real application, this would send a delete request to the server
        // and then remove the item from the table if successful
      }
    }

    // Close modal when clicking on <span> (x)
    document.querySelector('.close').onclick = function() {
      modal.style.display = 'none';
    }

    // Close modal when clicking outside of it
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = 'none';
      }
    }

    filterForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const filters = {
        jurusan: jurusanSelect.value,
        programStudi: programStudiSelect.value,
        jenisPrestasi: document.getElementById('jenisPrestasi').value,
        tingkatPrestasi: document.getElementById('tingkatPrestasi').value
      };

      const filteredData = sampleData.filter(item => {
        return (!filters.jurusan || item.jurusan === filters.jurusan) &&
               (!filters.programStudi || item.programStudi === filters.programStudi) &&
               (!filters.jenisPrestasi || item.jenisPrestasi === filters.jenisPrestasi) &&
               (!filters.tingkatPrestasi || item.tingkatPrestasi === filters.tingkatPrestasi);
      });

      populateTable(filteredData);
    });

    filterForm.addEventListener('reset', function() {
      populateTable(sampleData);
    });

    // Initialize DataTable
    const table = $('#prestasiTable').DataTable({
      pageLength: 10,
      lengthMenu: [10, 25, 50, 75, 100],
      info: true,
      paging: true,
      ordering: true,
      order: [[0, 'asc']],
      columnDefs: [
        { orderable: true, targets: '_all' },
        { orderable: false, targets: [9] }
      ],
      dom: "<'row'<'col-sm-12'tr>>" +
           "<'row'<'col-sm-5'i><'col-sm-7'p>>",
      language: {
        info: "Showing _START_ to _END_ of _TOTAL_ entries",
        infoFiltered: "(filtered from _MAX_ total entries)",
        search: "",
        searchPlaceholder: "Search...",
        paginate: {
          previous: "&laquo;",
          next: "&raquo;"
        }
      }
    });

    // Sync "Show entries" dropdown with DataTable
    $('#entriesSelect').on('change', function () {
      table.page.len($(this).val()).draw();
    });

    // Update search functionality
    $('#tableSearch').on('keyup', function() {
      table.search(this.value).draw();
    });

    // Initial population of the table
    populateTable(sampleData);

    // Make functions global so they can be called from inline onclick
    window.showDetails = showDetails;
    window.editPrestasi = editPrestasi;
    window.deletePrestasi = deletePrestasi;
  });
  </script>

</body>

</html>