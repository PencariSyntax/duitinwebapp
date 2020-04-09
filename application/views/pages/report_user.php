<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Laporkan <span class="text-danger">MASALAH</span> anda kepada kita !</h1>
</div>

<div>
    <p class="text-primary">Fasilitas ini di buat untuk anda semua, jika anda menemukan masalah / error dalam aplikasi kita atau anda ingin melaporkan bentuk masalah dalam sistem kerja kita !</p>
</div>
<?= $this->session->flashdata('message');?>
<form action="<?= base_url('dus/report');?>" method="post">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id">ID :</label>
                    <input type="text" class="form-control" name="id" value="<?= $name['id_user']?>" readonly>
                </div>
                <div class="form-group">
                    <label for="Name">Nama Pengguna :</label>
                    <input type="text" name="name" id="name" value="<?= $name['username'];?>" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="type">Bentuk Masalah / Pertanyaan :</label>
                    <select name="tipe" id="tipe" class="form-control">
                        <option>- Silahkan Pilih Bentuk Masalah -</option>
                        <option value="1">Saya mendapatkan error/bugs dalam aplikasi !</option>
                        <option value="2">Saya mendapatkan masalah dengan pekerja duitin !</option>
                        <option value="3">Saya mendapatkan kekurangan ! </option>
                        <option value="4">Saya ingin Bertanya ?</option>
                    </select>
                    <small class="text-danger">* Pilih yang sesuai dengan kekurangan yang anda dapat !</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="report">Tuliskan Bentuk Masalah / Pertanyaan :</label>
                    <textarea name="laporan" id="laporan" rows="5" class="form-control" placeholder="Silahkan deskripsikan bentuk masalah / pertanyaan ...."></textarea>
                    <?= form_error('laporan','<small class="text-danger">','</small>')?>
                </div>
            </div>
        </div>
        <center><button type="submit" class="btn btn-primary btn-lg"><i class="fas fa-check"></i> Laporkan !</button></center>
</form>