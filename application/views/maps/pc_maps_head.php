<!DOCTYPE html>
<html lang="id">

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
    <link rel="stylesheet" href="<?= base_url(); ?>vendors/chosen/chosen.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/animate.css/animate.css'); ?>">
    <script src="<?= base_url('assets/js/jQuery-3.4.1.min.js'); ?>"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="<?= base_url('vendors/leaflet/plugins/leaflet-locatecontrol/dist/L.Control.Locate.css'); ?>"></script>
    <link rel="stylesheet" href="">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="<?= base_url('vendors/leaflet/plugins/leaflet-geoip-master/leaflet-geoip.js'); ?>"></script>
    <script src="<?= base_url('vendors/leaflet/plugins/leaflet-locatecontrol/dist/L.Control.Locate.min.js'); ?>"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <script src="<?= base_url('vendors/leaflet/plugins/Leaflet.AccuratePosition-master/Leaflet.AccuratePosition.js'); ?>"></script>

    <style>
        #map {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
        }
    </style>

</head>

<body id="page-top" style="background-color : #f2f2f2;">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="<?= base_url('assets/img/duitputih.png'); ?>" alt="" class="img-fluid" width="100" height="100"> Maps <sup>Beta 1.0</sup></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Menu Bantuan</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?= base_url('dpc'); ?>"><i class="fas fa-home"></i> Beranda <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dpc'); ?>"><i class="fas fa-map-marked-alt"></i> Alamat Tidak Ditemukan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dpc'); ?>"><i class="fas fa-user-secret"></i> User Anonymous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dpc'); ?>"><i class="fas fa-hands-helping"></i> Bantuan</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>