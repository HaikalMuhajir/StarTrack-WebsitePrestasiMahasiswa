<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Input Prestasi - NiceAdmin Bootstrap Template</title>
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
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="form-input.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo-polinema.png" alt="">
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
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a>
        </li>
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="data-mahasiswa.php">
            <i class="bi bi-person"></i>
            <span>Data Mahasiswa</span>
          </a>
        </li><!-- End Data Mahasiswa Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#   ">
          <i class="bi bi-grid"></i>
          <span>Input Prestasi</span>
        </a>
      </li><!-- End Dashboard Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Input Prestasi</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="form-input.php">Home</a></li>
          <li class="breadcrumb-item">Pages</li  >
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <!-- MAIN CONTENT -->
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Prestasi</h5>

          <!-- Data Prestasi -->
          <form action="submit_prestasi.php" method="POST" enctype="multipart/form-data">
            <!-- Jurusan -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jurusan<span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <select class="form-select" id="jurusan" aria-label="Pilih Jurusan">
                  <option selected>Pilih Jurusan</option>
                  <option value="Teknik Elektro">Teknik Elektro</option>
                  <option value="Teknik Mesin">Teknik Mesin</option>
                  <option value="Teknologi Informasi">Teknologi Informasi</option>
                  <option value="Teknik Kimia">Teknik Kimia</option>
                  <option value="Teknik Sipil">Teknik Sipil</option>
                  <option value="Akuntansi">Akuntansi</option>
                  <option value="Administrasi Niaga">Administrasi Niaga</option>
                </select>
              </div>
            </div>

            <!-- Prodi -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Program Studi <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <select class="form-select" id="programStudi" aria-label="Pilih Program Studi">
                  <option selected>Pilih Program Studi</option>
                </select>
              </div>
            </div>
            <script>
              // Data jurusan dan program studi
              const dataProgramStudi = {
                "Teknik Elektro": [
                  "D-III Teknik Listrik",
                  "D-III Teknik Elektronika",
                  "D-III Teknik Telekomunikasi",
                  "D-IV Sistem Kelistrikan",
                  "D-IV Teknik Elektronika",
                  "D-IV Teknik Jaringan Telekomunikasi Digital",
                  "Magister Terapan (S2) Teknik Elektro"
                ],
                "Teknik Mesin": [
                  "D-III Teknik Mesin",
                  "D-III Teknologi Pemeliharaan Pesawat Udara",
                  "D-IV Teknik Mesin Produksi dan Perawatan",
                  "D-IV Teknik Otomotif Elektronik",
                  "Magister Terapan (S2) Rekayasa Teknologi Manufaktur"
                ],
                "Teknologi Informasi": [
                  "D-II Pengembangan Piranti Lunak Situs",
                  "D-IV Sistem Informasi Bisnis",
                  "D-IV Teknik Informatika",
                  "Magister Terapan (S2) Rekayasa Teknologi Informasi"
                ],
                "Teknik Kimia": [
                  "D-III Teknik Kimia",
                  "D-IV Teknologi Kimia Industri"
                ],
                "Teknik Sipil": [
                  "D-III Teknik Sipil",
                  "D-III Teknologi Konstruksi Jalan, Jembatan, Dan Bangunan Air",
                  "D-III Teknologi Pertambangan",
                  "D-IV Teknologi Rekayasa Konstruksi Jalan Dan Jembatan",
                  "D-IV Manajemen Rekayasa Konstruksi"
                ],
                "Akuntansi": [
                  "D-III Akuntansi",
                  "D-IV Keuangan",
                  "D-IV Akuntansi Manajemen",
                  "Magister Terapan (S2) Sistem Informasi Akuntansi"
                ],
                "Administrasi Niaga": [
                  "D-III Administrasi Bisnis",
                  "D-IV Manajemen Pemasaran",
                  "D-IV Bahasa Inggris untuk Komunikasi Bisnis dan Profesional",
                  "D-IV Bahasa Inggris untuk Industri Pariwisata",
                  "D-IV Pengelolaan Arsip dan Rekaman Informasi",
                  "D-IV Usaha Perjalanan Wisata"
                ]
              };
          
              // Referensi dropdown
              const jurusanSelect = document.getElementById("jurusan");
              const programStudiSelect = document.getElementById("programStudi");
          
              // Event listener untuk dropdown jurusan
              jurusanSelect.addEventListener("change", function() {
                const selectedJurusan = this.value;
          
                // Kosongkan dropdown program studi
                programStudiSelect.innerHTML = '<option selected>Pilih Program Studi</option>';
          
                // Isi ulang program studi sesuai dengan jurusan yang dipilih
                if (dataProgramStudi[selectedJurusan]) {
                  dataProgramStudi[selectedJurusan].forEach(prodi => {
                    const option = document.createElement("option");
                    option.value = prodi;
                    option.textContent = prodi;
                    programStudiSelect.appendChild(option);
                  });
                }
              });
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
          
          <!--Tingkat Prestasi-->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Tingkat Prestasi <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih Prestasi</option>
                  <option value="1">Internasional</option>
                  <option value="2">Nasional</option>
                  <option value="3">Provinsi</option>
                  <option value="4">Kabupaten/Kota</option>
                  <option value="5">Lainnya</option>
                </select>
              </div>
            </div>

            <!--Jenis Prestasi -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jenis Prestasi <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih Prestasi</option>
                  <option value="1">Riset dan Inovasi</option>
                  <option value="2">Seni Budaya</option>
                  <option value="2">Olahraga</option>
                </select>
              </div>
            </div>

            <!-- Jenis Juara -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Jenis Juara <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih Juara</option>
                  <option value="1">Juara 1</option>
                  <option value="2">Juara 2</option>
                  <option value="3">Juara 3</option>
                  <option value="4">Juara Umum</option>
                  <option value="5">Juara Harapan</option>
                  <option value="6">Partisipan/Peserta</option>
                </select>
              </div>
            </div>

            <!-- Nama Lomba -->
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Lomba <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText">
              </div>
            </div>

            <!-- Kategori Perlombaan -->
            <div class="row mb-3">
              <label class="col-sm-2 col-form-label">Kategori Perlombaan <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example">
                  <option selected>Pilih Kategori</option>
                  <option value="1">Individu</option>
                  <option value="2">Kelompok</option>
                </select>
              </div>
            </div>

            <!-- Tempat Kejuaraan -->
            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Tempat Lomba <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Awal Lomba <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Akhir Lomba <span class="text-danger">*</span></label><br>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Peserta</label><br>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputEmail3" class="col-sm-2 col-form-label">No Surat Tugas</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputText">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Surat Tugas</label>
              <div class="col-sm-10">
                <input type="date" class="form-control">
              </div>
            </div>

          </form><!-- End Horizontal Form -->

        </div>
      </div>

      <div class="card">
        <div class="card-body">
            <h5 class="card-title">Upload File</h5>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Scan Sertifikat <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Foto Penyerahan <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">Scan Surat Tugas <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputNumber" class="col-sm-2 col-form-label">File Poster <span class="text-danger">*</span></label>
              <div class="col-sm-10">
                <input class="form-control" type="file" id="formFile">
              </div>
            </div>

        </div>
      </div>  

      <div class="card">
        <div class="card-body">
            <h5 class="card-title">Data Mahasiswa</h5>
            <p>Kosongkan jika kategori perlombaan adalah individu <span class="text-danger">*</span></p>

            <table class="table table-bordered" id="mahasiswaTable">
              <thead>
                  <tr>
                      <th>No</th>
                      <th>Mahasiswa</th>
                      <th>Peran</th>
                      <th>Hapus</th>
                  </tr>
              </thead>
              <tbody>
                  <!-- Baris pertama -->
                  <tr>
                      <td>1</td>
                      <td>
                          <select class="form-select">
                              <option value="">Pilih Mahasiswa</option>
                              <option value="">-</option>
                          </select>
                      </td>
                      <td>
                            <select class="form-select">
                                <option value="">Pilih Peran</option>
                                <option value="">Ketua</option>
                                <option value="">Anggota</option>
                                <option value="">Personal</option>
                            </select>
                      </td>
                      <td>
                          <button class="btn btn-danger btn-sm" onclick="removeMahasiswaRow(this)">Hapus</button>
                      </td>
                  </tr>
              </tbody>
          </table>

            <span class="btn btn-success col fileinput-button" onclick="addMahasiswaRow()">
                <i class="fas fa-plus"></i>
                <span>Tambah Mahasiswa </span>
            </span>

            <!-- Tambahkan link ke Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
            <!-- Tambahkan link ke Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
            <!-- End Bordered Table -->
        </div>
    </div>

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Pembimbing</h5>
          
          <table class="table table-bordered" id="pembimbingTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pembimbing</th>
                    <th>Peran Pembimbing</th>
                    <th>Hapus</th>
                </tr>
            </thead>
            <tbody>
                <!-- Baris pertama -->
                <tr>
                    <td>1</td>
                    <td>
                        <select class="form-select">
                            <option value="">Pilih Pembimbing</option>
                            <option value="">-</option>
                            <option value="Abdul Chalim, SAg., MPd.I">Abdul Chalim, SAg., MPd.I</option>
                            <option value="Ade Ismail">Ade Ismail</option>
                            <option value="Agung Nugroho Pramudhita ST., MT.">Agung Nugroho Pramudhita ST., MT.</option>
                            <option value="Ahmadi Yuli Ananta ST., MM.">Ahmadi Yuli Ananta ST., MM.</option>
                            <option value="Ane Fany Novitasari, SH.MKn.">Ane Fany Novitasari, SH.MKn.</option>
                            <option value="Annisa Puspa Kirana MKom.">Annisa Puspa Kirana MKom.</option>
                            <option value="Annisa Taufika Firdausi ST., MT.">Annisa Taufika Firdausi ST., MT.</option>
                            <option value="Anugrah Nur Rahmanto SSn., MDs.">Anugrah Nur Rahmanto SSn., MDs.</option>
                            <option value="Ariadi Retno Ririd SKom., MKom.">Ariadi Retno Ririd SKom., MKom.</option>
                            <option value="Arie Rachmad Syulistyo SKom., MKom.">Arie Rachmad Syulistyo SKom., MKom.</option>

                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" placeholder="Masukkan Peran">
                    </td>
                    <td>
                        <button class="btn btn-danger btn-sm" onclick="removePembimbingRow(this)">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>

          <span class="btn btn-success col fileinput-button" onclick="addPembimbingRow()">
                <i class="fas fa-plus"></i>
                <span>Tambah Pembimbing </span>
            </span>

            <!-- Tambahkan link ke Font Awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
            <!-- Tambahkan link ke Bootstrap Icons -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
        </div>
      </div>

      <!--Persetujuan -->
      <div class="card">
        <div class="card-body">
          
        </div>
      </div>    

    <!-- Tombol Simpan dan Kembali -->
    <div class="d-flex justify-content-end mt-3">
      <button type="button" class="btn btn-secondary me-2" onclick="goBack()">
        <i class="bi bi-arrow-left-circle"></i> Kembali
      </button>
      <button type="button" class="btn btn-primary">
        <i class="bi bi-save"></i> Simpan
      </button>
    </div>
    
    <script>
    function goBack() {
      window.location.href = 'data-mahasiswa.php';
    }
    </script>

    <script>
      function addMahasiswaRow() {
        const table = document.getElementById('mahasiswaTable').getElementsByTagName('tbody')[0];
        const newRow = table.insertRow(table.rows.length);
        const cellCount = table.rows[0].cells.length;
        
        for (let i = 0; i < cellCount; i++) {
          const cell = newRow.insertCell(i);
          if (i === 0) {
            cell.innerHTML = table.rows.length;
          } else {
            cell.innerHTML = table.rows[0].cells[i].innerHTML;
          }
        }
      }

      function removeMahasiswaRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        updateMahasiswaRowNumbers();
      }

      function updateMahasiswaRowNumbers() {
        const table = document.getElementById('mahasiswaTable').getElementsByTagName('tbody')[0];
        const rows = table.getElementsByTagName('tr');
        for (let i = 0; i < rows.length; i++) {
          rows[i].cells[0].innerHTML = i + 1;
        }
      }

      function addPembimbingRow() {
          const table = document.getElementById('pembimbingTable').getElementsByTagName('tbody')[0];
          const newRow = table.insertRow(table.rows.length);
          const cellCount = table.rows[0].cells.length;
          
          for (let i = 0; i < cellCount; i++) {
            const cell = newRow.insertCell(i);
            if (i === 0) {
              cell.innerHTML = table.rows.length;
            } else {
              cell.innerHTML = table.rows[0].cells[i].innerHTML;
            }
          }
        }

        function removePembimbingRow(button) {
          const row = button.parentNode.parentNode;
          row.parentNode.removeChild(row);
          updatePembimbingRowNumbers();
        }

        function updatePembimbingRowNumbers() {
          const table = document.getElementById('pembimbingTable').getElementsByTagName('tbody')[0];
          const rows = table.getElementsByTagName('tr');
          for (let i = 0; i < rows.length; i++) {
            rows[i].cells[0].innerHTML = i + 1;
          }
        }
    </script>

  <!-- link ikon Bootstrap simpan dan kembali -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- END -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
  </footer>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>