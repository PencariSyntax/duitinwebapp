<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Beranda DUITIN</h1>
</div>

<div class="alert alert-danger" role="alert">
    Mohon Maaf, aplikasi ini masih versi BETA (Uji Coba), Jadi silahkan hubungi pihak DUITIN jika menemukan masalah
</div>

<div class="row">
    <div class="card mb-3 col-md-6" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md">
                <div class="card-body">
                    <h5 class="card-title">
                        <?= $name['username']; ?>
                    </h5>
                    <p class="card-text"><?= ' My Phone Number is +62 (0)' . $name['phone']; ?></p>
                    <p class="card-text">Saya Adalah Pengguna DUITIN</p>
                    <p class="card-text"><small class="text-muted">Registered Date on <?= date('d F Y', $name['crtdate']) ?> </small></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3 col-md-6" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="<?= base_url('assets/qrcode-user/') . $name['qr_code']; ?>" class="card-img" alt="Img Profile" width="100%" height="100%">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">
                        QR Code Saya
                    </h5>
                    <p class="card-text"><?= ' ID Saya ' . $name['id_user']; ?></p>
                    &nbsp;
                    <a href="<?= base_url('download/qrcode') ?>?qrcode=<?= $name['qr_code']; ?>" class="btn btn-info"><i class="fas fa-download fa-fw"></i> Unduh QR Code Saya</a>
                </div>
            </div>
        </div>
    </div>
</div>