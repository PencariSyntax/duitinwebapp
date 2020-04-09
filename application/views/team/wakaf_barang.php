<?php
$hasil = $this->db->get_where('tbl_wakaf_team', ['id_team' => $name['id_user'], 'status' => 3])->result();
?>
<?php if ($hasil) : ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-weight-hanging text-white fa-fw"></i> Total Barang Wakaf Bulan Ini</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Plastik Bulan Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Kertas Bulan Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Karton Bulan Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Besi Bulan Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-10">
                            <label>Total Semua Berat Barang Bulan Ini :</label>
                        </div>
                        <div class="col-md-2">
                            <span class="text-success text-right">K/g</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <center><a href="#" class="btn btn-success" data-toggle="modal" data-target="#terimaWakaf"><i class="fas fa-check"></i> Terima Wakaf Bulan Ini</a></center>
    <div class="modal animated rubberBand" id="terimaWakaf" tabindex="-1" role="dialog" aria-labelledby="terimaWakaf" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" id="serahGaji"><i class="fas fa-handshake"></i> Serah terima Wakaf <?= $name['username']?> </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> Dengan ini Kami dari <?= $name['username']; ?> Telah Bersepakat atas Serah & Terima Wakaf kami kepada Duitin Indonesia</p>
                    <div class="form-check">
                        <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                        <label class="form-check-label" for="Sepakat">Kami Setuju</label>
                    </div>
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
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-gradient-danger">
                    <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-weight-hanging text-white fa-fw"></i>Total Barang Wakaf Bulan Ini</h6>
                </div>
                <div class="card-body">
                    <h6 class="text-center">Anda Belum Memiliki Barang Wakaf di bulan Ini.</h6>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>