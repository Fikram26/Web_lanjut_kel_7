<?php
// Memastikan koneksi database menggunakan PDO
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button"><i class="fas fa-expand-arrows-alt"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="index.php" class="brand-link">
                <img src="image/TI.jpeg" alt="App Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">App-TI</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="image/fikram.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">kelompok 7</a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" role="menu">
                        <li class="nav-item"><a class="nav-link" href="index.php?p=home"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=mhs"><i class="fas fa-user-graduate"></i> Mahasiswa</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=prodi"><i class="fas fa-building"></i> Prodi</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=dosen"><i class="fas fa-chalkboard-teacher"></i> Dosen</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=kategori"><i class="fas fa-tag"></i> Kategori</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=berita"><i class="fas fa-newspaper"></i> Berita</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=matkul"><i class="fas fa-book"></i> Matakuliah</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=user"><i class="fas fa-user"></i> User</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?p=level"><i class="fas fa-layer-group"></i> Level</a></li>
                        <li class="nav-item"><a class="nav-link" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                          
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="content">
                <div class="container-fluid">
                    <?php
                    // Ambil halaman berdasarkan parameter 'p'
                    $page = isset($_GET['p']) ? htmlspecialchars($_GET['p']) : 'home';

                    try {
                        switch ($page) {
                            case 'home':
                                include 'home.php';
                                break;
                            case 'mhs':
                                include 'mahasiswa.php';
                                break;
                            case 'prodi':
                                include 'prodi.php';
                                break;
                            case 'dosen':
                                include 'dosen.php';
                                break;
                            case 'kategori':
                                include 'kategori.php';
                                break;
                            case 'berita':
                                include 'berita.php';
                                break;
                            case 'matkul':
                                include 'matkul.php';
                                break;
                            case 'user':
                                include 'user.php';
                                break;
                            case 'level':
                                include 'level.php';
                                break;
                            default:
                                include '404.php'; // Halaman tidak ditemukan
                        }
                    } catch (Exception $e) {
                        echo "<div class='alert alert-danger'>Error: " . $e->getMessage() . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>


    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</body>

</html>