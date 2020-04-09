<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Profile Detail Anggota DUITIN</h1>
</div>
<form action="<?= base_url('crud/upd_user'); ?>">
    <?php foreach ($user as $key) : ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">ID Primary Anggota</label>
                    <input type="text" id="prim" class="form-control" value="<?= $key->id_prim; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">ID User Anggota</label>
                    <input type="text" id="iduser" class="form-control" value="<?= $key->id_user; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Nama Anggota</label>
                    <input type="text" id="name" class="form-control" value="<?= $key->username; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="name">Email Anggota</label>
                    <input type="text" id="name" class="form-control" value="<?= $key->email; ?>" readonly>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="img-fluid col-sm-6">
                        <img src="<?= base_url('assets/qrcode-user/') . $key->qr_code; ?>" alt="QRCode" width="150" height="150">
                        <label for="img">QR Code</label>
                    </div>
                    <div class="img-fluid col-sm-6">
                        <img src="<?= base_url('assets/img_user/') . $key->photo; ?>" alt="PP User" width="150" height="150">
                        <label for="img">Photo Profile</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="Alamat">Alamat Anggota :</label>
                    <textarea name="alamat" id="address" rows="2" value="<?= $key->alamat; ?>" class="form-control" readonly></textarea>
                </div>
                <div class="row">
                    <div class="col-sm-4 form-group">
                        <label for="level">Level User</label>
                        <input type="text" class="form-control" value="<?= $key->level_id; ?>" name="level" readonly>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="status">Status User</label>
                        <input type="text" class="form-control" value="<?= $key->active; ?>" name="aktif" readonly>
                    </div>
                    <div class="col-sm-4 form-group">
                        <label for="status">Status Validasi User</label>
                        <input type="text" class="form-control" value="<?= $key->valid; ?>" name="aktif" readonly>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <center>
        <a href="<?= base_url('dam/tbl_user') ?>" class="btn btn-info">Kembali Ke Tabel User</a>
    </center>
</form>