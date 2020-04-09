<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="text-primary" style="float:left;"><i class="fas fa-users"></i> Data Pengumpul Wakaf Sampah Bulan <?= date('F') ?></h5>
            <a href="#" class="btn btn-primary" style="float : right;" data-target="#tambahData" data-toggle="modal"><i class="fas fa-plus"></i> Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>Kode Wakaf</th>
                            <th>Nama Pengumpul</th>
                            <th>Jenis Barang</th>
                            <th>Berat Barang</th>
                            <th>Tanggal Pengumpulan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>26412846</td>
                            <td>Bu Siska</td>
                            <td>Agus</td>
                            <td>Kertas, Kardus, Besi</td>
                            <td>15 Kg</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Input Data-->
<div class="modal animated bounceInUp" id="tambahData" tabindex="-1" role="dialog" aria-labelledby="tambahData" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="tambahData">Tambah Data Pengumpul</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="fas fa-times-circle text-white"></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('dcp/data_wakaf'); ?>" method="post">
                    <div class="mx-auto justify-content-center">
                        <?= form_error('keterangan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
                        <?php endif; ?>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" value="<?= $name['id_user']; ?>">
                            <div class="form-group">
                                <label for="name" class="text-primary"><i class="fas fa-donate"></i> Kode Wakaf</label>
                                <input type="text" class="form-control" readonly value="<?= rand(); ?>" name="key">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name" class="text-primary"><i class="fas fa-user"></i> Nama Penginput</label>
                                <input type="text" class="form-control" name="penginput" placeholder="Masukan Nama Penginput ...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan" class="text-primary"><i class="fas fa-edit"></i> Keterangan Barang :</label>
                                <textarea name="keterangan" class="form-control" id="" rows="3" placeholder="Deskripsikan Barang dan Keadaanya ...."></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4 class="text-center">Jenis & Berat Barang</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <select name="barang[]" class="form-control">
                                    <option>-Jenis Limbah 1-</option>
                                    <option value="1">Plastik</option>
                                    <option value="2">Kertas</option>
                                    <option value="3">Besi</option>
                                    <option value="4">Karton</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="barang[]" class="form-control">
                                    <option>-Jenis Limbah 2-</option>
                                    <option value="1">Plastik</option>
                                    <option value="2">Kertas</option>
                                    <option value="3">Besi</option>
                                    <option value="4">Karton</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="barang[]" class="form-control">
                                    <option>-Jenis Limbah 3-</option>
                                    <option value="1">Plastik</option>
                                    <option value="2">Kertas</option>
                                    <option value="3">Besi</option>
                                    <option value="4">Karton</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="barang[]" class="form-control">
                                    <option>-Jenis Limbah 4-</option>
                                    <option value="1">Plastik</option>
                                    <option value="2">Kertas</option>
                                    <option value="3">Besi</option>
                                    <option value="4">Karton</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah /Kg ...">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah /Kg ...">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah /Kg ...">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah /Kg ...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->