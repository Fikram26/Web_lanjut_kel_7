<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APP TI</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="adminlte/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="adminlte/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="adminlte/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="adminlte/plugins/summernote/summernote-bs4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="image/TI.jpeg" alt="AdminLTELogo" height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
               
            
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="image/TI.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">App-TI</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="image/fikram.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Fikram Maha Devin</a>
                    </div>
                </div>

              

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=home">
                                <i class="fas fa-tachometer-alt"> Dashboard</i> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=mhs">
                                <i class="fas fa-user-graduate"> Mahasiswa</i> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=prodi">
                                <i class="fas fa-building"> Prodi</i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=dosen">
                                <i class="fas fa-chalkboard-teacher"> Dosen</i> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=kategori">
                                <i class="fas fa-tag"> Kategori</i> 
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=berita">
                                <i class="fas fa-newspaper"> Berita</i>  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=matkul">
                                <i class="fas fa-newspaper"> Matakuliah</i>  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=user">
                                <i class="fas fa-user-graduate"> User</i>  
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center gap-2" href="index.php?p=level">
                                <i class="fas fa-user-graduate"> Level</i>  
                            </a>
                        </li>
                       
                        <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="../logout.php">
                    <i class="fas fa-door-open"> Sign out</i>
                         
                    </a>
                </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <!-- Optional Content Header -->
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="content">
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <?php
                        $page = isset($_GET['p']) ? $_GET['p'] : 'home';
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
                                include '404.php'; // Page not found
                        }
                    ?>
                </main>
            </div>
        </div>

        <!-- Footer -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.2.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark"></aside>
    </div>

    <!-- jQuery -->
    <script src="adminlte/plugins/jquery/jquery.min.js"></script>
    <script src="adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="adminlte/dist/js/adminlte.js"></script>
</body>

</html>
