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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($brgpicker); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-info fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
&nbsp;
<?= $this->session->flashdata('message'); ?>
<?= form_error('sellkey', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
<?= form_error('idpicker', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
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
                        <th>Alamat</th>
                        <th>Setelan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($brgpicker as $key) : ?>
                        <tr>
                            <td><a href="<?= base_url('dam/view_order/') . $key->sell_key; ?>"><?= $key->sell_key; ?></a></td>
                            <td><?= $key->id_user; ?></td>
                            <td><?= $key->id_picker; ?></td>
                            <td><?= $key->total_barang; ?></td>
                            <td><?= 'Rp. ' . $key->total_income; ?></td>
                            <td><?= $key->crtdate; ?></td>
                            <td><?= $key->status; ?></td>
                            <td><?= $key->alamat; ?></td>
                            <td><a class="text-danger" href="<?= base_url('crud/fake_order?key=') . $key->sell_key . '&admin=' . $name['id_user']; ?>"><i class="fas fa-times"></i></a> | <a class="text-success" href="<?= base_url('crud/order_done?key=') . $key->sell_key . '&admin=' . $name['id_user']; ?>"><i class="fas fa-check"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /.container-fluid -->