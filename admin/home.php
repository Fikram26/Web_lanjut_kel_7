<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard TI</title>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Optional for styling -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .nav-header {
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.2em;
        }
        #calendar-container {
            display: none;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       
        <h1 class="h2">Dashboard</h1>
    </div>

    <div class="text-center mb-4">
         <h1>kelompok 7</h1>
         <br>
        <h1 class="display-4">Welcome to the  Project</h1>
        <p class="lead">
            <strong>Selamat datang di proyek kami! Kami sangat menghargai kehadiran Anda di sini.
            Dashboard ini dirancang untuk menjadi pusat informasi yang mudah diakses, 
            tempat Anda bisa menemukan semua hal penting yang terkait dengan proyek.
            Kami percaya bahwa kolaborasi adalah kunci kesuksesan, jadi jangan ragu untuk berinteraksi dan
            memberikan masukan Anda. Bersama, kita bisa mencapai hasil yang luar biasa!</strong>
        </p>
    </div>

    <br><br>
    <!-- Dashboard Boxes Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Box Mahasiswa (Warna Biru) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>- M -</h3>
                            <p>Mahasiswa</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <a href="index.php?p=mhs" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Box Program Studi (Warna Hijau) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>- P -</h3>
                            <p>Program Studi</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                        <a href="index.php?p=prodi" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Box Dosen (Warna Kuning) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>- D -</h3>
                            <p>Dosen</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-bounding-box"></i>
                        </div>
                        <a href="index.php?p=dosen" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Box Kategori (Warna Merah) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>- K -</h3>
                            <p>Kategori</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-buildings"></i>
                        </div>
                        <a href="index.php?p=kategori" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Box Berita (Warna Ungu) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>- B -</h3>
                            <p>Berita</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bookmark-heart"></i>
                        </div>
                        <a href="index.php?p=berita" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                     <!-- Box Berita (Warna Denim) -->
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-denim">
                            <div class="inner">
                                <h3>- M -</h3>
                                <p>Matakuliah</p>
                            </div>
                            <div class="icon">
                                <i class="bi bi-book-fill"></i>
                            </div>
                            <a href="index.php?p=matakuliah" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                 <!-- Box Mahasiswa (Warna Biru) -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>- U -</h3>
                            <p>User</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-person-fill"></i>
                        </div>
                        <a href="index.php?p=user_admin" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                  <!-- Box Berita (Warna Ungu) -->
                  <div class="col-lg-3 col-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>- L -</h3>
                            <p>Level</p>
                        </div>
                        <div class="icon">
                            <i class="bi bi-bookmark-heart"></i>
                        </div>
                        <a href="index.php?p=level" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <br>

    <!-- Donut Chart Section -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Donut Chart</h3>
                </div>
                <div class="card-body">
                    <div class="chart" style="position: relative; height: 300px;">
                        <canvas id="sales-chart-canvas" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Chart.js Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Data for Donut Chart
            var donutData = {
                labels: ["Mahasiswa", "Prodi", "Dosen", "Kategori", "Berita"],
                datasets: [{
                    data: [300, 100, 50, 40, 60], // Data for each category
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc'], // Color for each section
                }]
            };

            // Create Donut Chart
            var donutChartCanvas = document.getElementById('sales-chart-canvas').getContext('2d');
            var donutChart = new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: {
                    maintainAspectRatio: false,
                    responsive: true,
                    legend: {
                        display: true,
                        position: 'right',
                    }
                }
            });
        });
    </script>

    <br>
    


</body>
</html>
