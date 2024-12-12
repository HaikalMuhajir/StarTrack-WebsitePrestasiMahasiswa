<!DOCTYPE html>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_COOKIE['token'])) {
    include("assets/php/verify-token.php");

}

if ($_SESSION['role'] !== 'Admin Jurusan') {
    include('assets/php/bouncer.php');
}
include("assets/php/queryAdminJurusan.php");
$dataAdmin = getDataAdmin($conn);
?>

<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Prestasi Mahasiswa</title>

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
            /* Black with opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
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

        .status-btn {
            margin-bottom: 5px;
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
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        #prestasiTable th {
            text-align: center !important;
        }
    </style>
</head>

<body>
    <!-- Header and Navbar -->
    <?php include("component/header-admin-jurusan.php") ?>
    <!-- End Header and Navbar -->

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Prestasi Mahasiswa</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="dashboard-mahasiswa.php">Home</a></li>
                    <li class="breadcrumb-item active">Prestasi Mahasiswa</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">Prestasi Saya</h5>
                            <hr>

                            <!-- Table with stripped rows -->
                            <div class="table-responsive">
                                <table class="table table-striped text-center table-bordered" id="prestasiTable">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">No</th>
                                            <th scope="col">Judul Lomba</th>
                                            <th scope="col">Tingkat</th>
                                            <th scope="col">Capaian</th>
                                            <th scope="col">Kategori</th>
                                            <th scope="col">Jenis</th>
                                            <th scope="col">Lokasi</th>
                                            <th scope="col">Tanggal Pelaksanaan</th>
                                            <th scope="col">Status</th>
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
        <!-- Modal -->
        <div id="prestasiModal" class="modal">
            <div class="modal-content">
                <span class="close text-end">&times;</span>
                <h2 class="text-center pb-4">Detail Prestasi</h2>

                <div id="prestasiDetails">
                    <!-- Prestasi details will be displayed here -->
                </div>

                <div id="prestasiDocuments">
                    <p><strong>File:</strong></p>
                    <div class="document-links">
                        <a href="#" id="suratTugasLink" class="btn-primary px-3" style="display: none;" target="_blank">
                            Surat Tugas
                        </a>
                        <a href="#" id="posterLink" class="btn-primary" style="display: none;" target="_blank">
                            Poster
                        </a>
                    </div>

                    <div class="mt-2">
                        <a href="#" id="certificateLink" class="btn-primary px-3" style="display: none;"
                            target="_blank">
                            Sertifikat
                        </a>
                        <a href="#" id="fotoLink" class="btn-primary p-3" style="display: none;" target="_blank">
                            Dokumentasi
                        </a>
                    </div>
                </div>

                <div id="mahasiswaDetails" class="py-3">
                    <!-- Mahasiswa details will be displayed here -->
                </div>

                <div id="dosenDetails">
                    <!-- Dosen details will be displayed here -->
                </div>
                <div class="modal-footer justify-content-center">
                    <button id="verifikasiBtn" class="btn btn-success">Verifikasi</button>
                    <button id="tolakBtn" class="btn btn-danger">Tolak</button>
                </div>
            </div>
        </div>


    </main>

    <!-- Vendor JS Files -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            // Initialize DataTable
            const table = $('#prestasiTable').DataTable({
                ajax: {
                    url: 'assets/php/get_prestasiAdminJ.php',  // Path to the PHP file for fetching data
                    type: 'POST',
                    dataSrc: '',  // Since the PHP returns a plain array, no additional processing needed
                },
                columns: [
                    { data: null, render: (data, type, row, meta) => meta.row + 1, title: "No" },
                    { data: 'judul', title: "Judul Lomba" },
                    { data: 'tingkat', title: "Tingkat" },
                    { data: 'juara', title: "Capaian" },  // 'juara' maps to 'Capaian'
                    { data: 'kategori', title: "Kategori" },
                    { data: 'jenis', title: "Jenis" },
                    { data: 'lokasi', title: "Lokasi" },
                    {
                        data: 'tanggal_mulai',
                        title: "Tanggal Pelaksanaan",
                        render: function (data, type, row) {
                            // Try parsing directly using new Date
                            const date = new Date(data);
                            if (isNaN(date)) {
                                return 'Invalid Date'; // In case the date is invalid
                            }
                            // Return formatted date as DD/MM/YYYY
                            return date.toLocaleDateString('id-ID'); // Use 'id-ID' for Indonesian format (DD/MM/YYYY)
                        }
                    },
                    { data: 'status', title: "Status" },
                    {
                        data: null,
                        title: "Aksi",
                        render: (data, type, row) => `
                    <button class="btn btn-sm btn-primary mb-1 me-1" onclick="showDetails(${row.id_prestasi})">
                        <i class="bi bi-eye"></i> Detail
                    </button>
                    <button class="btn btn-sm btn-warning mb-1 me-1" onclick="editPrestasi(${row.id_prestasi})">
                        <i class="bi bi-pencil"></i> Edit
                    </button>
                    <button class="btn btn-sm btn-danger mb-1" onclick="deletePrestasi(${row.id_prestasi})">
                        <i class="bi bi-trash"></i> Hapus
                    </button>
                `
                    }
                ],
                pageLength: 10,
                paging: true,
                searching: false,
                ordering: false,
                lengthChange: false,
                info: true,
                autoWidth: false,
                language: {
                    paginate: { previous: "<", next: ">" },
                }
            });

            // Define global functions for button actions
            window.showDetails = function (id) {
                $.ajax({
                    url: 'assets/php/get_prestasi_details.php',  // Path to the PHP file
                    type: 'GET',
                    data: { id_prestasi: id },  // Pass the id_prestasi
                    success: function (response) {
                        if (response.error) {
                            alert(response.error); // Show an alert if there's an error
                        } else {
                            // Create the HTML for the prestasi details
                            let prestasiDetails = `
                    <p><strong>Judul:</strong> ${response[0].judul}</p>
                    <p><strong>Tingkat:</strong> ${response[0].tingkat}</p>
                    <p><strong>Juara:</strong> ${response[0].juara}</p>
                    <p><strong>Kategori:</strong> ${response[0].kategori}</p>
                    <p><strong>Jenis:</strong> ${response[0].jenis}</p>
                    <p><strong>Lokasi:</strong> ${response[0].lokasi}</p>
                    <p><strong>Tanggal Mulai:</strong> ${response[0].tanggal_mulai}</p>
                    <p><strong>Status:</strong> ${response[0].status}</p>
                `;
                            $('#prestasiDetails').html(prestasiDetails); // Set the prestasi details content

                            // Function to clean the file path and add 'PBL/' prefix
                            function cleanFilePath(path) {
                                if (path) {
                                    return path.replace(/^(\.\.\/)+/, ''); // Remove ../../ and prepend PBL/
                                }
                                return '';
                            }

                            // File links
                            if (response[0].surat_tugas) {
                                $('#suratTugasLink').attr('href', cleanFilePath(response[0].surat_tugas)).show();
                            } else {
                                $('#suratTugasLink').hide();
                            }

                            if (response[0].poster) {
                                $('#posterLink').attr('href', cleanFilePath(response[0].poster)).show();
                            } else {
                                $('#posterLink').hide();
                            }

                            if (response[0].sertifikat) {
                                $('#certificateLink').attr('href', cleanFilePath(response[0].sertifikat)).show();
                            } else {
                                $('#certificateLink').hide();
                            }

                            if (response[0].foto_kegiatan) {
                                $('#fotoLink').attr('href', cleanFilePath(response[0].foto_kegiatan)).show();
                            } else {
                                $('#fotoLink').hide();
                            }

                            // Mahasiswa details
                            let mahasiswaDetails = '<strong>Mahasiswa:</strong><ul>';
                            if (response[0].mahasiswa && response[0].mahasiswa.length > 0) {
                                response[0].mahasiswa.forEach(function (mahasiswa) {
                                    mahasiswaDetails += `
                            <li>${mahasiswa.nama} (${mahasiswa.nim}) - Peran: ${mahasiswa.peran}</li>
                        `;
                                });
                                mahasiswaDetails += '</ul>';
                                $('#mahasiswaDetails').html(mahasiswaDetails); // Set mahasiswa details content
                            } else {
                                $('#mahasiswaDetails').html('<p>No mahasiswa data available.</p>');
                            }

                            // Dosen details
                            let dosenDetails = '<strong>Dosen Pembimbing:</strong><ul>';
                            if (response[0].dosen && response[0].dosen.length > 0) {
                                response[0].dosen.forEach(function (dosen) {
                                    dosenDetails += `
                            <li>${dosen.nama} (${dosen.nidn}) - Peran: ${dosen.peran}</li>
                        `;
                                });
                                dosenDetails += '</ul>';
                                $('#dosenDetails').html(dosenDetails); // Set dosen details content
                            } else {
                                $('#dosenDetails').html('<p>No dosen data available.</p>');
                            }

                            $('#prestasiModal').css('display', 'block'); // Show the modal

                            // Add click event for Verifikasi and Tolak buttons
                            $('#verifikasiBtn').on('click', function () {
                                updatePrestasiStatus(id, 'Verified');
                            });

                            $('#tolakBtn').on('click', function () {
                                updatePrestasiStatus(id, 'Rejected');
                            });
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("Error: " + error); // Log error message
                        alert('Error fetching details.');
                    }
                });
            };

            // Function to update prestasi status
            function updatePrestasiStatus(id_prestasi, status) {
                console.log(id_prestasi);
                console.log(status);
                $.ajax({
                    url: 'assets/php/update_prestasi_status.php',  // Path to the PHP file for updating status
                    type: 'POST',
                    data: { id_prestasi: id_prestasi, status: status },  // Send id_prestasi and new status
                    success: function (response) {
                        if (response.success) {
                            alert(`Prestasi status updated to ${status}`);
                            $('#prestasiModal').css('display', 'none');  // Close the modal
                            // Optionally, refresh the page or update the UI here
                        } else {
                            alert('Failed to update status');
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log("Error: " + error);
                        alert('Error updating status.');
                    }
                });
            }




            // Close the modal when the user clicks on the <span> (x)
            $(".close").click(function () {
                $("#prestasiModal").css('display', 'none'); // Close the modal
            });



            window.editPrestasi = function (id) {
                // Logic to edit prestasi (this is a placeholder)
                alert(`Editing prestasi with ID: ${id}`);
            };

            window.deletePrestasi = function (id) {
                // Confirm the delete action
                if (confirm(`Anda Yakin Menghapus Prestasi Dengan ID : ${id}?`)) {
                    // Perform AJAX request to delete the record
                    $.ajax({
                        url: 'assets/php/delete_prestasi.php',  // Adjust path to your PHP script
                        type: 'GET',
                        data: { id_prestasi: id },  // Send the ID of the prestasi to be deleted
                        success: function (response) {
                            const result = JSON.parse(response);

                            if (result.success) {
                                alert(result.message);  // Show success message
                                // Find and remove the row from the DataTable
                                var row = table.row(`#prestasi-${id}`);
                                row.remove().draw();  // Remove the row from the table and redraw the DataTable
                                location.reload();
                            } else {
                                alert(result.error);  // Show error message
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error('Error:', error);
                            alert('An error occurred while trying to delete prestasi.');
                        }
                    });
                }
            };


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