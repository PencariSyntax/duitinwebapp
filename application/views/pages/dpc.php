<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-home"></i> Laman Beranda PICKER</h1>
</div>
<div class="alert alert-danger" role="alert">
    <i class="fas fa-exclamation-triangle"></i>
    Aplikasi ini belum sempurna, hubungi kami di box@duitin.co.id
</div>
<div class="row">
    <div class="col-md-6">
        <div class=" card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $name['username']; ?>
                        </h5>
                        <p class="card-text"><?= ' My Phone Number is +62 (0)' . $name['phone']; ?></p>
                        <p class="card-text">Saya Adalah PICKER DUITIN.</p>
                        <p class="card-text"><small class="text-muted">Terdaftar pada tanggal <?= date('d F Y', $name['crtdate']) ?> </small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class=" card mb-3" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= base_url('assets/qrcode-user/') . $name['qr_code']; ?>" class="card-img" alt="Img Profile" width="100%" height="100%">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            My QR Code
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
<?php $now = date('Y') . '-' . date('m') . '-' . date('d'); ?>
<?php $orderNow = $this->db->get_where('tbl_orderan', ['status' => 2, 'id_picker' => $name['id_user'],])->result(); ?>
<div class="card shadow mb-4">
    <div class="card-header py-3 bg-gradient-info">
        <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-clock"></i> Waktu Pengambilan Hari Ini</h6>
    </div>
    <div class="card-body">
        <?php if ($orderNow) { ?>
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Penjual</th>
                            <th>Berat Barang</th>
                            <th>Harga Jual</th>
                            <th>No Telp Penjual</th>
                            <th>Tanggal Pengambilan</th>
                            <th>Setelan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($orderNow as $orderNow) : ?>
                            <tr>
                                <td><?= $orderNow->id_user; ?></td>
                                <td><?= $orderNow->total_barang; ?> Kg</td>
                                <td>Rp. <?= $orderNow->total_income; ?></td>
                                <td><?= $orderNow->no_telp; ?></td>
                                <td><?= $orderNow->crtdate; ?></td>
                                <td><a href="<?= base_url('dpc/deleteorder?orderkey=') . $orderNow->sell_key; ?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin membatalkan orderan ini !');"><i class="fas fa-fw fa-trash"></i></a> | <a href="<?= base_url('dpc/acceptorder?orderkey=') . $orderNow->sell_key ?>" onclick="return confirm('Dengan ini anda bersedia untuk mengambi orderan ini !')" class="btn btn-success"><i class="fas fa-check"></i></a> | <a href="#" class="btn btn-primary"><i class="fas fa-eye"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <h5 class="text-center">Anda Belum Mendapatkan Jadwal Hari Ini.</h5>
        <?php } ?>
    </div>
</div>

<div class="modal animated rubberBand" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Ingin <span class="text-danger">Membatalkan</span> Transaksi ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-times"></i> Tidak ...</button>
                <button type="button" class="btn btn-warning"><i class="fas fa-check"></i> Iya ...</button>
            </div>
        </div>
    </div>
</div>