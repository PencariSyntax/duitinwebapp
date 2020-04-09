<!-- Page Heading -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Beranda Team DUITIN</h1>
    </div>

    <div class="alert alert-danger" role="alert">
        Mohon Maaf Aplikasi belum sempurna, Silahkan email kami di box@duitin.co.id
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-3 col-md-6" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md">
                        <div class="card-body">
                            <h5 class="card-title">
                                <?= $name['username']; ?>
                            </h5>
                            <p class="card-text"><?= ' My Phone Number is +62 (0)' . $name['phone']; ?></p>
                            <p class="card-text">Kami Adalah TEAM DUITIN</p>
                            <p class="card-text"><small class="text-muted">Registered Date on <?= date('d F Y', $name['crtdate']) ?> </small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
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
    </div>
    <div class="card">
        <div class="card-body">
            <p class="text-justify">
                Catatan :
            </p>
            <p>
                <ol>
                    <li>Setiap Sebulan Sekali Barang Wakaf akan diambil oleh <span class="text-primary">DUITIN</span></li>
                    <li>Jika Pada Bulan ini barang tidak diwakafkan kepada <span class="text-primary">DUITIN</span>, maka akan di simpan kedalam data HISTORI Wakaf dengan status <b class="text-warning">Belum diwakafkan</b></li>
                    <li>Untuk Pengajuan Serah Terima Wakaf terdapat pada menu <a href="<?= base_url('dcp/wakaf_barang') ?>"><i class="fas fa-donate"></i> Wakafkan Barang</a></li>
                    <li>Dan untuk barang yang belum diwakafkan, barang dapat diajukan untuk bulan kedepannya</li>
                </ol>
            </p>
            <p class="text-right text-primary">
                Hormat Kami
                <br>
                PT. Duitin Indonesia
            </p>
        </div>
    </div>
</div>