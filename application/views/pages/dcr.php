<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laman Beranda Admin</h1>
</div>
<div class="alert alert-danger" role="alert">
    <i class="fas fa-exclamation-triangle"></i>
    Aplikasi ini belum sempurna, hubungi kami di box@duitin.co.id
</div>
<?= $this->session->flashdata('message'); ?>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Duitin Users</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($user); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Duitin Pickers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($picker); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-walking fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Duitin Developers</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($dev); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-laugh-wink fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Order Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="<?= base_url('dam/orderlist'); ?>"><?= count($order); ?></a></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $name['username']; ?>
                        </h5>
                        <p class="card-text"><?= ' No. Ponsel saya is +62 (0)' . $name['phone']; ?></p>
                        <p class="card-text">Saya adalah <i>Pengurus</i> DUITIN.</p>
                        <p class="card-text"><small class="text-muted">Tanggal Registrasi <?= date('d F Y', $name['crtdate']) ?> </small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/qrcode-user/') . $name['qr_code']; ?>" class="card-img" alt="Img Profile" width="100%" height="100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            Kode QR saya
                        </h5>
                        <p class="card-text"><?= ' My ID is ' . $name['id_user']; ?></p>
                        &nbsp;
                        <a href="<?= base_url('download/qrcode') ?>?qrcode=<?= $name['qr_code']; ?>" class="btn btn-info"><i class="fas fa-download fa-fw"></i> Unduh Kode QR Saya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>