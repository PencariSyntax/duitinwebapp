<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?= base_url(); ?>assets/img/biruduitin.png" type="image/x-icon">

    <title><?= $title; ?></title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url('assets/') ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/') ?>css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.css" />-->
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/chosen/chosen.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('dcr'); ?>">
                <div class="sidebar-brand-icon">
                    <div class="sidebar-brand-icon">
                        <img src="<?= base_url('assets/img'); ?>/duitputih.png" alt="" class="img-fluid" width="100" height="55">
                    </div>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dcr'); ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengurus DUITIN
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDB" aria-expanded="true" aria-controls="collapseDB">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Data Pengguna DUITIN</span>
                </a>
                <div id="collapseDB" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Terdiri Dari:</h6>
                        <a class="collapse-item" href="<?= base_url('dcr/tbl_user') ?>">Data Konsumen</a>
                        <a class="collapse-item" href="<?= base_url('dcr/tbl_picker') ?>">Data Picker</a>
                        <a class="collapse-item" href="<?= base_url('dcr/tbl_harga') ?>">Data Harga Barang</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFM" aria-expanded="true" aria-controls="collapseFM">
                    <i class="fas fa-fw fa-pen-square"></i>
                    <span>Menu Daftar</span>
                </a>
                <div id="collapseFM" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Terdiri Dari:</h6>
                        <a class="collapse-item" href="<?= base_url('dcr/register'); ?>">Daftar Akun DUITIN</a>
                        <!--<a class="collapse-item" href=""></a>
                        <a href="collapse-item" href=""></a>-->
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseORD" aria-expanded="true" aria-controls="collapseORD">
                    <i class="fas fa-fw fa-clipboard-list"></i>
                    <span>Data Orderan</span>
                </a>
                <div id="collapseORD" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Terdiri Dari:</h6>
                        <a class="collapse-item" href="<?= base_url('dcr/orderlist') ?>">Orderan Konsumen</a>
                        <a class="collapse-item" href="<?= base_url('dcr/barang_picker') ?>">Data Barang Picker</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu DUITIN
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePC" aria-expanded="true" aria-controls="collapsePC">
                    <i class="fas fa-fw fa-walking"></i>
                    <span>Pickers</span>
                </a>
                <div id="collapsePC" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Menu Picker</h6>
                        <a class="collapse-item" href="<?= base_url('dcr/repair'); ?>">Hasil Barang Picker</a>
                        <a class="collapse-item" href="<?= base_url('dcr/repair'); ?>">Total Semua Barang</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUS" aria-expanded="true" aria-controls="collapseUS">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Kontributor</span>
                </a>
                <div id="collapseUS" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header text-primary">Kontributor Menu</h6>
                        <a class="collapse-item" href="<?= base_url('dcr/u_waste'); ?>">Jual Sampahku</a>
                        <a class="collapse-item" href="<?= base_url('dcr/u_order'); ?>">Riwayat Penjualan</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                DUITIN Helper
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dcr/report'); ?>">
                    <i class="fas fa-fw fa-bug"></i>
                    <span>Problems or Bugs Report</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dcr/about'); ?>">
                    <i class="fas fa-fw fa-certificate"></i>
                    <span>About Duitin App</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-info-circle fa-fw text-primary"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-primary badge-counter"><?= count($order); ?></span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    DUITIN Alerts Center
                                </h6>
                                <!--<a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>-->
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-shopping-cart text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">Notif Order</div>
                                        Notif : Kita memiliki <?= count($order); ?> orderan.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-danger" href="<?= base_url('dcr/orderlist'); ?>">Lihat Orderan</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $name['username']; ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('assets/img_user/') . $name['photo']; ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="<?= base_url('dcr/profile'); ?>">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profil Akun
                                </a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#resetPass">
                                    <i class=" fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Ganti Password Akun
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar Aplikasi
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <div class="modal fade" id="resetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Menu Ganti Kata Sandi (Password)</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('dcr/resetpassword'); ?>" method="post">
                                    <input type="hidden" value="<?= $name['id_prim']; ?>" name="id">
                                    <div class="form-group">
                                        <label for="oldpass">Password Lama</label>
                                        <input type="password" name="oldpass" class="form-control" placeholder="Masukan Password lama anda ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="newpass">Pasword Baru</label>
                                        <input type="password" name="newpass" class="form-control" placeholder="Masukan Password Baru anda ...">
                                    </div>
                                    <div class="form-group">
                                        <label for="confpass">Konfirmasi Password</label>
                                        <input type="password" name="confpass" class="form-control" placeholder="Samakan dengan pasword baru anda ...">
                                    </div>
                                    <hr />
                                    <div class="text-center">
                                        <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Ganti Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">