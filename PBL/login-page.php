<?php
session_start()
  ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Login</title>
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

  <?php
  if (isset($_COOKIE['token'])) {
    include('assets/php/verify-token.php');
  }

  if (isset($_SESSION['id'])) {
    include('assets/php/bouncer.php');
  }

  ?>
</head>

<body style="background: url('assets/img/background.jpg') no-repeat center center fixed; background-size: cover;">

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4 ">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center" style="opacity : 80%">
              <div class="card mb-3">
                <div class="card-body" >
                  <div class="pt-2 pb-2"> 
                    <div class="d-flex justify-content-center py-3">
                      <a href="index.html" class="logo-img d-flex align-items-center w-auto">
                        <img src="assets/img/logo.png" alt="">
                      </a>
                    </div>
                  </div>

                  <form class="row g-3 needs-validation" id="loginForm" action="assets/php/login.php" method="post"
                    novalidate>
                    <div class="col-12">
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="username" placeholder="Username"
                          required>
                        <div class="invalid-feedback" id="username-error"></div>
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <div class="input-group has-validation">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                          required>
                        <button type="button" id="togglePassword" class="btn btn-primary">
                          <i class="bi bi-eye-slash" id="eyeIcon"></i>
                        </button>
                        <div class="invalid-feedback" id="password-error"></div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>

                    <div class="col-12" style="text-align: center; font-weight: bold">
                      <div id="error-message" class="invalid-feedback" style="display:none;"></div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100 mb-2" type="submit">Login</button>
                    </div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
  <!-- End #main -->

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

  <!-- Login JS File -->
  <script src="assets/js/login.js"></script>

  <script>
    document.getElementById('togglePassword').addEventListener('click', function () {
      let passwordField = document.getElementById('password');
      let eyeIcon = document.getElementById('eyeIcon');

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

</body>

</html>