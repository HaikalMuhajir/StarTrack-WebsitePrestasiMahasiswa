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
include("assets/php/connection.php");
include("assets/php/queryMahasiswa.php");
$dataMahasiswa = getDataMahasiswa($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil Mahasiswa</title>
  <meta content="Login Page StarTrack - Website Pencatatan Prestasi Mahasiswa Politeknik Negeri Malang"
    name="description">
  <meta content="Login StarTrack" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

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

  <!-- MAIN -->
  <main id="main" class="main">
    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              <img src="<?php echo $dataMahasiswa['pas_foto'] ?>" alt="Profile" class="rounded-circle">
              <h2><?php echo $dataMahasiswa['nama'] ?></h2>
              <h3><?php echo $dataMahasiswa['nim'] ?></h3>
            </div>
          </div>

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab"
                    data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Ganti
                    Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                  <h5 class="card-title">Detail Profil</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dataMahasiswa['nama'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">NIM</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dataMahasiswa['nim'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Program Studi</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dataMahasiswa['jurusan'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Jurusan</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dataMahasiswa['program_studi'] ?></div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Semester</div>
                    <div class="col-lg-9 col-md-8"><?php echo $dataMahasiswa['semester'] ?></div>
                  </div>


                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="formChangePassword" action="assets/php/changePassword.php" method="post" novalidate>

                    <div class="col-12 mb-3">
                      <div class="input-group has-validation">
                        <input name="oldpassword" type="password" class="form-control" id="oldPassword"
                          placeholder="Password Lama" required>
                        <button type="button" id="toggleOldPassword" class="btn btn-primary">
                          <i class="bi bi-eye-slash" id="eyeIconOld"></i>
                        </button>
                        <div class="invalid-feedback" id="oldPassword-error"></div>
                      </div>
                    </div>

                    <div class="col-12 mb-3">
                      <div class="input-group has-validation">
                        <input name="newpassword" type="password" class="form-control" id="newPassword"
                          placeholder="Password Baru" required>
                        <button type="button" id="toggleNewPassword" class="btn btn-primary">
                          <i class="bi bi-eye-slash" id="eyeIconNew"></i>
                        </button>
                        <div class="invalid-feedback" id="newPassword-error"></div>
                      </div>
                    </div>

                    <div class="col-12 mb-4">
                      <div class="input-group has-validation">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword"
                          placeholder="Re-Enter Password Baru" required>
                        <button type="button" id="toggleRenewPassword" class="btn btn-primary">
                          <i class="bi bi-eye-slash" id="eyeIconRenew"></i>
                        </button>
                        <div class="invalid-feedback" id="renewPassword-error"></div>
                      </div>
                    </div>

                    <div class="col-12" style="text-align: center; font-weight: bold">
                      <div id="error-message" class="invalid-feedback" style="display:none;"></div>
                      <div id="success-message" class="valid-feedback" style="display:none;"></div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>
  </main>
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
<script src="assets/vendor/jquery/jquery-3.7.1.min.js"></script>

<script src="assets/js/main.js"></script>
<script src="assets/js/changePassword.js"></script>

<script>
  document.getElementById('toggleOldPassword').addEventListener('click', function () {
    let passwordField = document.getElementById('oldPassword'); // Corrected ID
    let eyeIcon = document.getElementById('eyeIconOld');

    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('bi-eye-slash');
      eyeIcon.classList.add('bi-eye');
    } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('bi-eye');
      eyeIcon.classList.add('bi-eye-slash');
    }
  });

  document.getElementById('toggleNewPassword').addEventListener('click', function () {
    let passwordField = document.getElementById('newPassword'); // Corrected ID
    let eyeIcon = document.getElementById('eyeIconNew');

    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('bi-eye-slash');
      eyeIcon.classList.add('bi-eye');
    } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('bi-eye');
      eyeIcon.classList.add('bi-eye-slash');
    }
  });

  document.getElementById('toggleRenewPassword').addEventListener('click', function () {
    let passwordField = document.getElementById('renewPassword'); // Corrected ID
    let eyeIcon = document.getElementById('eyeIconRenew');

    if (passwordField.type === 'password') {
      passwordField.type = 'text';
      eyeIcon.classList.remove('bi-eye-slash');
      eyeIcon.classList.add('bi-eye');
    } else {
      passwordField.type = 'password';
      eyeIcon.classList.remove('bi-eye');
      eyeIcon.classList.add('bi-eye-slash');
    }
  });

</script>

</html>