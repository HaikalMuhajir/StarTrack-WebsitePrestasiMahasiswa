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
$barCharData = getBarChartDataAllTime($conn);
$dataMahasiswa = getDataMahasiswa($conn);
?>
<html lang="en">
<style>
    .leaderboard {
        font-family: "Rubik", sans-serif;
        color: white;
    }

    .leaderboard .big-three {
        max-height: 70px;
        width: 70px;
        object-fit: cover;
    }

    .gold {
        background-color: #c99200;
        border-radius: 10px;
    }

    .silver {
        background-color: #918D86;
        border-radius: 10px;
    }

    .bronze {
        background-color: #a15727;
        border-radius: 10px;
    }

    .rank-gold {
        font-size: 3rem;
        color: #c99200;
        font-weight: bold;
    }

    .rank-silver {
        font-size: 3rem;
        color: #918D86;
        font-weight: bold;
    }

    .rank-bronze {
        font-size: 3rem;
        color: #a15727;
        font-weight: bold;
    }

    .rank {
        font-size: 2.5rem;
        color: #383630;
        font-weight: 500;
    }

    .normal-rank {
        color: #383630;
        border-radius: 10px;
        background-color: gainsboro;
    }

    .filter-form {
        margin-bottom: 20px;
    }

    .leaderboard img {
        max-height: 50px;
        width: auto;
        object-fit: cover;
        width: 50px;
    }

    .revenue-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }

    .revenue-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .revenue-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .sales-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }

    .sales-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .sales-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }

    .customers-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
        overflow: hidden;
    }

    .customers-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .customers-icon {
        font-size: 2.5rem;
        margin-bottom: 0.5rem;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>

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
        <section class="section dashboard">
            <div class="row">
                <!-- Left side columns -->
                <div class="col-lg-7">
                    <div class="row">

                        <div class="col-12">
                            <div class="row">
                                <!-- Total Prestasi Card -->
                                <div class="col-xxl-4 col-md-6 ">
                                    <div class="card info-card sales-card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Total Prestasi</h5>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                                    style="padding-top:5px;">
                                                    <i class="bi bi-award text-primary achievement-icon"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><?php echo getTotalPrestasi($conn) ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Total Poin Card -->
                                <div class="col-xxl-4 col-md-6">
                                    <div class="card info-card customers-card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Total Poin</h5>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center "
                                                    style="padding-top:5px;">
                                                    <i class="bi bi-star text-warning achievement-icon"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><?php echo (getTotalPoinAkademik($conn) + getTotalPoinNonAkademik($conn)) ?>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Peringkat Card -->
                                <div class="col-xxl-4 col-xl-12">
                                    <div class="card info-card revenue-card">
                                        <div class="card-body">
                                            <h5 class="card-title text-center">Peringkat</h5>
                                            <div class="d-flex justify-content-center align-items-center text-center">
                                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"
                                                    style="padding-top:5px;">
                                                    <i class="bi bi-trophy text-success achievement-icon"></i>
                                                </div>
                                                <div class="ps-3">
                                                    <h6><span
                                                            class="text-success"><?php echo getRangking($conn) ?></span>
                                                        / <?php echo getTotalRangking($conn) ?></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <!-- Grafik Prestasi -->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            Grafik Prestasi
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb d-flex" style="margin-bottom: 0;">
                                                    <li class="breadcrumb-item"><a href="#" id="allTimeLink">AllTime</a>
                                                    </li>
                                                    <li class="breadcrumb-item active" aria-current="page"
                                                        id="breadcrumbYear">
                                                    </li>
                                                </ol>
                                            </nav>
                                        </h5>

                                        <!-- Bar Chart -->
                                        <canvas id="barChart"></canvas>
                                        <script>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                const barCharData = <?php echo json_encode($barCharData); ?>;

                                                if (barCharData.values.length === 0) {
                                                    barCharData.labels = ['No Data'];
                                                    barCharData.values = [0];
                                                }

                                                const maxValue = Math.max(...barCharData.values);
                                                const yMax = maxValue + 6;

                                                const chart = new Chart(document.querySelector('#barChart'), {
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
                                                        maintainAspectRatio: true,
                                                        responsive: true,
                                                        onClick: function (event) {
                                                            const activePoints = chart.getElementsAtEventForMode(event, 'nearest', { intersect: true }, true);
                                                            if (activePoints.length > 0) {
                                                                const firstPoint = activePoints[0];
                                                                const label = chart.data.labels[firstPoint.index];
                                                                updateBreadcrumbs(label);
                                                                filterDataByYear(label);
                                                            }
                                                        },
                                                        scales: {
                                                            y: {
                                                                beginAtZero: true,
                                                                max: yMax
                                                            }
                                                        }
                                                    }
                                                });

                                                function updateBreadcrumbs(year) {
                                                    if (Number.isInteger(Number(year))) {
                                                        document.getElementById('breadcrumbYear').textContent = year;
                                                    }
                                                }

                                                document.getElementById('allTimeLink').addEventListener('click', (e) => {
                                                    e.preventDefault();
                                                    updateBreadcrumbs('');
                                                    chart.data.labels = barCharData.labels;
                                                    chart.data.datasets[0].data = barCharData.values;
                                                    chart.maxValue = Math.max(...barCharData.values);
                                                    chart.yMax = chart.maxValue + 6;
                                                    chart.options.scales.y.max = chart.yMax;
                                                    chart.update();
                                                });

                                                function filterDataByYear(year) {
                                                    if (Number.isInteger(Number(year))) {
                                                        $.ajax({
                                                            url: 'assets/php/queryMahasiswa.php',
                                                            type: 'POST',
                                                            data: {
                                                                year: year
                                                            },
                                                            success: function (response) {
                                                                let data = JSON.parse(response);
                                                                chart.data.labels = data.labels;
                                                                chart.data.datasets[0].data = data.values;
                                                                chart.maxValue = Math.max(...data.values);
                                                                chart.yMax = chart.maxValue + 6;
                                                                chart.options.scales.y.max = chart.yMax;
                                                                chart.update();
                                                            },
                                                            error: function (xhr, status, error) {
                                                                console.error('AJAX error:', status, error);
                                                                console.error("Response Text:", xhr.responseText);
                                                            }
                                                        });
                                                    }
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Start Rangking -->
                        <div class="col-12 p-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Rangking Prestasi Mahasiswa</h5>
                                    <!-- Filter Form -->
                                    <form method="get" action="assets/php/rangking.php" class="filter-form mb-3">
                                        <label for="category" class="form-label text-dark fw-bold">Pilih
                                            Kategori:</label>
                                        <select name="category" class="form-select" id="category">
                                            <option value="Akademik" selected>Akademik</option>
                                            <option value="Non Akademik">Non Akademik</option>
                                        </select>
                                    </form>
                                    <!-- Leaderboard -->
                                    <div class="leaderboard">
                                        <!-- Data akan dimuat secara dinamis -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Rangking -->
                    </div>
                </div>

                <!-- Right Side Start  -->
                <div class="col-lg-5">
                    <div class="row">
                        <!-- Container Pie Chart -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title text-center">Jenis Perlombaan</h5>

                                    <!-- Pie Chart -->
                                    <canvas id="pieChart">
                                        <script>
                                            <?php
                                            $pieChartData = getPieChartDataAllTime($conn)
                                                ?>
                                            document.addEventListener("DOMContentLoaded", () => {
                                                const pieChartData = <?php echo json_encode($pieChartData); ?>;

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
                                                        maintainAspectRatio: true,
                                                        plugins: {
                                                            legend: {
                                                                display: true,
                                                                position: 'bottom'
                                                            }
                                                        }
                                                    }
                                                });
                                            });

                                        </script>
                                    </canvas>
                                    <!-- End Pie Chart -->
                                </div>
                            </div>
                        </div>

                        <!-- End Container Pie Chart -->

                        <!-- Start Pie Chart Tingkat -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body pb-0 text-center">
                                    <h5 class="card-title">Tingkat Prestasi</h5>
                                    <div id="achievementLevelChart" class="pb-4"></div>
                                </div>
                            </div>
                        </div>

                        <!--  -->

                    </div>
                </div>
                <!-- Right Side End -->
            </div>
        </section>
    </main>
    <?php
    include('component/footer.php');
    $tingkat = getTingkatPrestasi($conn);
    ?>
    </div>

    <script>
        const chartData = <?= $tingkat; ?>;
        document.addEventListener("DOMContentLoaded", () => {
            // Ambil data dari PHP
            const seriesData = [chartData.Internasional, chartData.Nasional, chartData.Regional];

            // Buat chart
            new ApexCharts(document.querySelector("#achievementLevelChart"), {
                series: seriesData,
                chart: {
                    height: 700,
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

    <!-- Tambahkan Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fungsi untuk memuat leaderboard berdasarkan kategori
            function loadLeaderboard(category) {
                $.get('assets/php/rangking.php', { category: category }, function (data) {
                    const leaderboard = $('.leaderboard');
                    leaderboard.empty(); // Kosongkan leaderboard lama
                    console.log(data);


                    // Render leaderboard baru
                    let rank = 1;
                    data.forEach(row => {
                        const { nama, poin_akumulasi, pas_foto } = row;

                        let rankClass, bgClass, imgClass, pointClass;

                        if (rank === 1) {
                            rankClass = 'rank-gold';
                            bgClass = 'gold';
                            imgClass = 'big-three';
                            pointClass = 'fs-1';
                        } else if (rank === 2) {
                            rankClass = 'rank-silver';
                            bgClass = 'silver';
                            imgClass = 'big-three';
                            pointClass = 'fs-1';
                        } else if (rank === 3) {
                            rankClass = 'rank-bronze';
                            bgClass = 'bronze';
                            imgClass = 'big-three';
                            pointClass = 'fs-1';
                        } else {
                            rankClass = 'rank';
                            bgClass = 'normal-rank';
                            imgClass = '';
                            pointClass = 'fs-3';
                        }

                        // Tambahkan elemen leaderboard
                        leaderboard.append(`
                        <div class="row align-items-center mb-2">
                            <div class="col-1 ${rankClass} d-flex justify-content-end align-items-center">${rank}</div>
                            <div class="col-1 d-flex justify-content-centere align-items-center p-0">
                                <img src="${pas_foto}" alt="" class="rounded-circle ${imgClass}">
                            </div>
                            <div class="col-10">
                                <div class="col-12 ${bgClass}">
                                    <div class="row align-items-center">
                                        <div class="col-8"><div class="fs-5" style="margin-left:10px">${nama}</div></div>
                                        <div class="col-3 text-end fw-bold ${pointClass}">${poin_akumulasi}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);

                        rank++;
                    });
                }, 'json');
            }

            // Muat leaderboard pertama kali
            loadLeaderboard($('#category').val());

            // Tangani perubahan dropdown
            $('#category').change(function () {
                loadLeaderboard($(this).val());
            });
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