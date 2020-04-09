<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Table Order Logs</h1>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Orderan Baru</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($new); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-info fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Orderan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.Order</th>
                            <th>Penjual</th>
                            <th>Picker</th>
                            <th>Total Berat</th>
                            <th>Total Harga</th>
                            <th>Tanggal Order</th>
                            <th>Status</th>
                            <th>Setelan</th>
                        </tr>
                    </thead>
                    <?php foreach ($new as $key) : ?>
                        <tbody>
                            <tr>
                                <td><a href="" data-toggle="modal" data-target="#detailModal" id="noorder" onclick="viewDetail(this)" value="<?= $key->sell_key;  ?>"> <?= $key->sell_key; ?></a></td>
                                <td><?= $key->id_user; ?></td>
                                <td><?= $key->id_picker; ?></td>
                                <td><?= $key->total_barang; ?></td>
                                <td><?= $key->total_income; ?></td>
                                <td><?= $key->crtdate; ?></td>
                                <td><?= $key->status; ?></td>
                                <td><a class="text-danger"><i class="fas fa-trash"></i></a> | <a class="text-warning" data-toggle="modal" data-target="#setModal"><i class="fas fa-walking"></i></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<!-- Modal -->
<div class="modal fade" id="setModal" tabindex="-1" role="dialog" aria-labelledby="setModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="setModalLabel">Konfirmasi Barang & Tentukan Picker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm">
                        <div class="form-group">
                            <form action="<?= base_url('dam/orderlist') ?>" method="post">
                                <div class="form-group">
                                    <input type="text" name="sellkey" class="form-control" placeholder="Sell Key ...">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="idpicker" class="form-control" id="id_picker" placeholder="ID Picker ...">
                                </div>
                                <hr>
                                <small class="text-info">Silahkan Cek ID Picker di Menu <a href="<?= base_url('dam/tbl_picker'); ?>">DBase Picker</a></small>
                                <br>
                                <small class="text-danger">Form Sell Key harus di isi.</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Konfirmasi</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detModalLabel">Keterangan Order.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Jenis Barang</th>
                            <th scope="col">Berat Barang</th>
                            <th scope="col">Harga Barang</th>
                        </tr>
                    </thead>

                    <input type="hidden" value="" id="LblNoOrder" name="LblNoOrder">
                    <?php foreach ($detailOrder as $key) :
                        ?>
                        <tbody>
                            <tr>
                                <td><?= $key->jns_barang; ?></td>
                                <td><?= $key->jml_barang; ?></td>
                                <td><?= $key->harga_barang; ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach;
                    ?>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary">Konfirmasi</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    function viewDetail(ordNO) {
        // var orderNo = document.getElementById("noorder").value;
        // document.getElementById("LblNoOrder").value = orderNo;
        // window.alert(orderNo)

        var orderNo = ordNO.getAttribute('value');
        document.getElementById("LblNoOrder").value = orderNo;
        $.ajax({
            type: 'get',
            url: '<?php echo base_url('dam/view_order'); ?>',
            data: {
                valOrd: orderNO
            },
            success: function(data) {
                $('#' + result).val(data);
            }
        });
    });
    }
</script>