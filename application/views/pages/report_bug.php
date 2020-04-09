<div class="row">
    <div class="col-md mt-2 mb-2">
        <div class="card">
            <div class="card-header bg-primary text-center">
                <h4 class="text-white">Selamat Datang di Laman Bantuan kami.</h4>
            </div>
            <div class="card-body">
                <p class="text-center">
                    Menjaga Keamanan dan Kenyamanan anda ketika bertransaksi adalah kewajiban kami, jika anda memiliki kesulitan atau pertanyaan tentang kami silakkan tanyakan dan ceritakan kepada kami dan kami akan menjawabnya dengan cepat.
                </p>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a href="https://instagram.com/" target="_blank">
                            <span class="fab fa-instagram fa-3x fa-fw"></span>
                            <center>
                                <h5 class="nav-link" style="size:20px;">@duitin</h4>
                            </center>
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="col-md-6 text-center">
                            <a href="mailto:box@duitin.co.id" target="_blank">
                                <span class="fas fa-envelope fa-3x fa-fw"></span>
                                <center>
                                    <h5 class="nav-link" style="size:20px;">box@duitin.co.id</h5>
                                </center>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->session->flashdata('message'); ?>
<div class="justify-content-center text-center">
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-3 my-4">
            <div class="card" style="width: 18rem;">
                <div class="card-img-top mt-4">
                    <span class="fas fa-bug fa-4x text-danger"></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Aplikasi DUITIN Bermasalah</h5>
                    <p class="card-text">Jika anda menemukan kesalahan dalam aplikasi kami, segera laporkan kepada kami.</p>
                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#bugModal"><i class="fas fa-bug"></i> Masalah Aplikasi</a>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-4 col-md-6 mb-3 my-4">
            <div class="card" style="width: 18rem;">
                <div class="card-img-top mt-4">
                    <span class="fas fa-exclamation-triangle fa-4x text-warning"></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Memiliki Keluhan dengan kami</h5>
                    <p class="card-text">Memiliki Keluhan dengan petugas kami, segera laporkan kepada kami.</p>
                    <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#problemModal"><i class="fas fa-exclamation-circle"></i> Pusat Masalah</a>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3 my-4">
            <div class="card" style="width: 18rem;">
                <div class="card-img-top mt-4">
                    <span class="fas fa-question-circle fa-4x text-info"></span>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Forum Tanya Jawab tentang kami</h5>
                    <p class="card-text">Memiliki Pertanyaan untuk kami, segera tanyakan tersebut disini.</p>
                    <a href="#" class="btn btn-info" data-toggle="modal" data-target="#qnaModal"><i class="fas fa-question-circle"></i> Pertanyaan</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bugModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporkan masalah anda tentang Aplikasi kami.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dam/report'); ?>" method="post">
                    <input type="hidden" class="form-control" name="id" value="<?= $name['id_user'] ?>" readonly>
                    <input type="hidden" name="tipe" value="1">
                    <div class="form-group">
                        <label for="Name">Nama Pengguna :</label>
                        <input type="text" name="name" id="name" value="<?= $name['username']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="report">Tuliskan Bentuk Masalah / Pertanyaan :</label>
                        <textarea name="laporan" id="laporan" rows="5" class="form-control" placeholder="Silahkan deskripsikan bentuk masalah / pertanyaan ...."></textarea>
                        <?= form_error('laporan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="problemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Laporkan Masalah anda tentang DUITIN.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dam/report'); ?>" method="post">
                    <input type="hidden" class="form-control" name="id" value="<?= $name['id_user'] ?>" readonly>
                    <input type="hidden" name="tipe" value="2">
                    <div class="form-group">
                        <label for="Name">Nama Pengguna :</label>
                        <input type="text" name="name" id="name" value="<?= $name['username']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="report">Tuliskan Bentuk Masalah / Pertanyaan :</label>
                        <textarea name="laporan" id="laporan" rows="5" class="form-control" placeholder="Silahkan deskripsikan bentuk masalah / pertanyaan ...."></textarea>
                        <?= form_error('laporan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="qnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Berikan Pertanyaan anda tentang DUITIN.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dam/report'); ?>" method="post">
                    <input type="hidden" class="form-control" name="id" value="<?= $name['id_user'] ?>" readonly>
                    <input type="hidden" name="tipe" value="3">
                    <div class="form-group">
                        <label for="Name">Nama Pengguna :</label>
                        <input type="text" name="name" id="name" value="<?= $name['username']; ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="report">Tuliskan Bentuk Masalah / Pertanyaan :</label>
                        <textarea name="laporan" id="laporan" rows="5" class="form-control" placeholder="Silahkan deskripsikan bentuk masalah / pertanyaan ...."></textarea>
                        <?= form_error('laporan', '<small class="text-danger">', '</small>') ?>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>