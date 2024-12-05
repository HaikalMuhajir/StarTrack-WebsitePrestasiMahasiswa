<?php
session_start();
if (isset($_COOKIE['token'])) {
    include("assets/php/verify-token.php");

}

if ($_SESSION['role'] !== 'Mahasiswa') {
    include('assets/php/bouncer.php');
}
include("assets/php/connection.php");
include("assets/php/chart-query-mahasiswa.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
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
    <?php include("component/header.php") ?>
    <!-- End Header and Navbar -->

    <!-- MAIN -->
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Home</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-mahasiswa.php">Dashboard</a></li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        <div class="row d-flex align-items-stretch">
            <div class="col-lg-5">
                <div class="card h-90 ">
                    <div class="card-body">
                        <h5 class="card-title text-center">Grafik Prestasi Mahasiswa</h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 300px;"></canvas>
                        <script>
                            <?php
                            $barCharData = getBarChartData($conn)
                                ?>
                            document.addEventListener("DOMContentLoaded", () => {
                                const barCharData = <?php echo json_encode($barCharData); ?>;
                                const maxValue = Math.max(...barCharData.values);
                                const yMax = maxValue + 5;
                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: barCharData.labels,
                                        datasets: [{
                                            label: 'Perolehan',
                                            data: barCharData.values,
                                            backgroundColor: [
                                                'rgba(54, 162, 235, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(54, 162, 235)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true,
                                                max: yMax
                                            }
                                        }
                                    }
                                });
                            });
                        </script>
                        <!-- End Bar CHart -->

                    </div>
                </div>
            </div>


            <div class="col-lg-3">
                <div class="card h-80">
                    <div class="card-body">
                        <h5 class="card-title text-center">Kategori Prestasi Mahasiswa</h5>

                        <!-- Pie Chart -->
                        <canvas id="pieChart" style="max-height: 300px;"></canvas>
                        <script>
                            <?php
                            $pieChartData = getPieChartData($conn)
                                ?>
                            document.addEventListener("DOMContentLoaded", () => {
                                // Mendapatkan data dari PHP ke dalam JavaScript
                                const pieChartData = <?php echo json_encode($pieChartData); ?>;

                                // Membuat Pie Chart
                                new Chart(document.querySelector('#pieChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: pieChartData.labels,
                                        datasets: [{
                                            data: pieChartData.values,
                                            backgroundColor: [
                                                'rgb(54, 162, 235)',
                                                'rgb(255, 99, 132)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    },
                                    options: {
                                        plugins: {
                                            legend: {
                                                display: true,
                                                position: 'bottom'  // Menampilkan legend di bawah chart
                                            }
                                        }
                                    }
                                });
                            });

                        </script>
                        <!-- End Pie Chart -->
                    </div>
                </div>
            </div>
        </div>




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

</html>