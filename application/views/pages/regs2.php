<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laman Pendaftaran Akun Pengguna <span class="text-primary">DUITIN</span></h1>
</div>
<div title="Registration Page">
    <div class="col-md-10">
        <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('phone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('pass1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= form_error('level', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
        <?= $this->session->flashdata('message'); ?>
        <form class="user" method="post" action="<?= base_url('dam/register'); ?>">
            <div class="form-group">
                <input type="text" class="form-control" id="name" placeholder="Nama Lengkap" name="name" value="<?= set_value('name'); ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="email" placeholder="Email Pengguna" name="email" value="<?= set_value('email'); ?>">
            </div>
            <div class="form-group">
                <input type="number" class="form-control" id="phone" placeholder="No Ponsel Pengguna" name="phone" value="<?= set_value('phone'); ?>">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control" id="pass1" placeholder="Kata Sandi" name="pass1">
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass2" placeholder="Ulang Kata Sandi" name="pass2">
                </div>
            </div>
            <div class="form-group">
                <select name="level" id="role" class="form-control">
                    <option>-Pilih Role Pengguna-</option>
                    <option value="5">DUITIN Pickers</option>
                    <option value="6">DUITIN Contributors</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Daftar Akun
            </button>
        </form>
        <hr>
        <!--<p>
            <h3>Catatan :</h3>
            <ol>
                <li>Pengguna memiliki Identitas yang lengkap</li>
                <li>Cek Identi</li>
            </ol>
        </p>-->
    </div>
</div>