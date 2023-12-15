<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AL-KHAIR | <?= $judul ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css">


    <!-- jQuery -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>

    <!-- Select2 -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/select2/js/select2.full.min.js"></script>

    <!-- AdminLTE App -->
    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <?php
    $db = \Config\Database::connect();
    $web = $db->table('tbl_setting')->get()->getRowArray();
    ?>
    <div class="wrapper">

        <!-- Navbar --> 
        <nav class="main-header navbar navbar-expand navbar-white bg-white" style="color:white">
            <!-- Left navbar links -->
            <ul class="navbar-nav" >
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <h4 class="nav-link"><b><?= $web['nama_masjid'] ?></b></h4>
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
                    <a class="nav-link" href="<?= base_url('Login/Logout') ?>">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-black elevation-4">
            <!-- Brand Logo -->
            <a href="<?= base_url('Admin') ?>" class="brand-link text-center">
                <i class="fas fa-mosque text-green fa-3x"></i>
                <h4><b>Masjid AL-KHAIR</b></h4>
            </a>
            <a class="brand-link text-center text-green">
                <b><?= session()->get('nama_user') ?></b>
            </a>
            <!-- Sidebar -->
            <div class="sidebar">


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <li class="nav-item" style="color:black">
                            <a href="<?= base_url('Admin') ?>" class="nav-link"  <?= $menu == 'dashboard' ? 'style="background-color:green"' : '' ?>>
                                <i class="nav-icon fas fa-tachometer-alt" style="color: white" ;></i>
                                <p style="color: white">
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" >
                            <a href="<?= base_url('Agenda') ?>" class="nav-link" <?= $menu == 'agenda' ? 'style="background-color:green"' : '' ?> >
                                <i class="nav-icon fas fa-calendar-alt" style="color: white"></i>
                                <p style="color: white">
                                    Agenda
                                </p>
                            </a>
                        </li>

                        <li class="nav-item <?= $menu == 'kas-masjid' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link" <?= $menu == 'kas-masjid' ? 'style="background-color:green"' : '' ?>>
                                <i class="nav-icon fas fa-money-bill-wave" style="color: white"></i>
                                <p style="color: white">
                                    Kas Masjid
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMasjid/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-yellow"></i>
                                        <p>Kas Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMasjid/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Kas Keluar</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMasjid') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Rekap Kas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= $menu == 'kas-sosial' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link" <?= $menu == 'kas-sosial' ? 'style="background-color:green;"' : '' ?>>
                                <i class="nav-icon fas fa-hand-holding-heart" style="color: white"></i>
                                <p style="color: white">
                                    Zakat Fitrah
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('KasSosial/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-green"></i>
                                        <p>Kas Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasSosial/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Kas Keluar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('KasSosial') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Rekap Kas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= $menu == 'kas-zakat-mal' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link" <?= $menu == 'kas-zakat-mal' ? 'style="background-color:green;"' : '' ?>>
                                <i class="nav-icon fas fa-hand-holding-heart" style="color: white"></i>
                                <p style="color: white">
                                    Zakat Mal
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMal/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-green"></i>
                                        <p>Kas Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMal/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Kas Keluar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('KasMal') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Rekap Kas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= $menu == 'kas-zakat-penghasilan' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link" <?= $menu == 'kas-zakat-penghasilan' ? 'style="background-color:green;"' : '' ?>>
                                <i class="nav-icon fas fa-hand-holding-heart" style="color: white"></i>
                                <p style="color: white">
                                    Zakat Penghasilan
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('KasPenghasilan/KasMasuk') ?>" class="nav-link <?= $submenu == 'kas-masuk' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-green"></i>
                                        <p>Kas Masuk</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasPenghasilan/KasKeluar') ?>" class="nav-link <?= $submenu == 'kas-keluar' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Kas Keluar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="<?= base_url('KasPenghasilan') ?>" class="nav-link <?= $submenu == 'rekap-kas' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-primary"></i>
                                        <p>Rekap Kas</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item <?= $menu == 'laporan-kas' ? 'menu-open' : '' ?>">
                            <a href="#" class="nav-link" <?= $menu == 'laporan-kas' ? 'style="background-color:green;"' : '' ?>>
                                <i class="nav-icon fas fa-file-invoice-dollar" style="color: white"></i>
                                <p style="color: white">
                                    Laporan Kas
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMasjid/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-masjid' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-green"></i>
                                        <p>Laporan Kas Masjid</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasSosial/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-sosial' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Laporan Zakat fitrah</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasMal/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-zakatmal' ? 'active' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Laporan Zakat mal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url('KasPenghasilan/Laporan') ?>" class="nav-link <?= $submenu == 'laporan-kas-zakatpenghasilan' ? 'style="background-color:green"' : '' ?>">
                                        <i class="far fa-circle nav-icon text-danger"></i>
                                        <p>Laporan Zakat penghasilan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item" >
                            <a href="<?= base_url('Rekening') ?>" class="nav-link" <?= $menu == 'rekening' ? 'style="background-color:green"' : '' ?> >
                                <i class="nav-icon fas fa-money-check"></i>
                                <p style="color:white">
                                    Rekening
                                </p>
                            </a>
                        </li> 

                        <li class="nav-item" >
                            <a href="<?= base_url('Admin/DonasiMasuk') ?>" class="nav-link" <?= $menu == 'donasi' ? 'style="background-color:green"' : '' ?> >
                                <i class="nav-icon fas fa-donate" style="color: white"></i>
                                <p style="color:white">
                                    Bukti Infaq dan Zakat
                                </p>
                            </a>
                        </li>

                        <!-- <li class="nav-item" >
                            <a href="<?= base_url('User') ?>" class="nav-link" <?= $menu == 'user' ? 'style="background-color:green"' : '' ?> >
                                <i class="nav-icon fas fa-users" style="color: white"></i>
                                <p style="color:white">
                                    User
                                </p>
                            </a>
                        </li> -->

                        <li class="nav-item" >
                            <a href="<?= base_url('Admin/Setting') ?>" class="nav-link" <?= $menu == 'setting' ? 'style="background-color:green"' : '' ?> >
                                <i class="nav-icon fas fa-cog" style="color: white"></i>
                                <p style="color:white">
                                    Setting
                                </p>
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
            <!-- Content Header (Page header) -->
            <div class="content-header" style="background-color: white;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"> <?= $judul ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content" >
                <div class="container-fluid">
                    <div class="row">

                        <?php
                        if ($page) {
                            echo view($page);
                        }

                        ?>
                        <!-- /.col-md-6 -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->

            <!-- Default to the left -->
            <strong>Copyright &copy; <?= date('Y') ?> <a href="<?= base_url('home') ?>"><?= $web['nama_masjid'] ?></a>.</strong> <?= $web['alamat'] ?>.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->



    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "paging": true,
                "lengthChange": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>