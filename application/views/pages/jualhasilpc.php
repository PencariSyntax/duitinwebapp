<?php if ($hasil) : ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-weight-hanging text-white fa-fw"></i> Total Pengambilan Barang Hari Ini</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Plastik Hari Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Kertas Hari Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Karton Hari Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Besi Hari Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Barang Hari Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3  bg-success">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-money-bill-alt"></i> Total Pendapatan Hari ini</h6>
                </div>
                <div class="card-body">
                    <h5 class="text-success">Rp.</h5>
                    <h5 class="text-success">Rp.</h5>
                    <h5 class="text-success">Rp.</h5>
                    <h5 class="text-success">Rp.</h5>
                    <hr />
                    <h4 class="text-success">Rp. </h4>
                    <span></span>
                </div>
            </div>
        </div>
    </div>
    <center><a href="#" class="btn btn-success" data-toggle="modal" data-target="#serahGaji"><i class="fas fa-check"></i> Terima Gaji Hari Ini</a></center>
    <div class="modal animated rubberBand" id="serahGaji" tabindex="-1" role="dialog" aria-labelledby="serahGaji" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="serahGaji">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php if (empty($hasil)) : ?>
    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-weight-hanging text-white fa-fw"></i>Total Pengambilan Hari Ini</h6>
                </div>
                <div class="card-body">
                    <h6 class="text-center">Anda Belum Mengambil Barang Hari Ini.</h6>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3  bg-success">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-money-bill-alt"></i> Total Pendapatan Hari ini</h6>
                </div>
                <div class="card-body">
                    <h6 class="text-center">Anda Belum Memiliki Pendapatan Hari Ini.</h6>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>