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
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($order); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-info fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg">
            <form action="<?= base_url('dam/orderlist'); ?>" method="post">
                <input type="hidden" value="<?= $name['id_user']; ?>" name="admin">
                <div class="form-group">
                    <select name="sellkey" id="sellkey" class="form-control">
                        <option>- Silahkan Pilih No. Order -</option>
                        <?php foreach ($order as $key) : ?>
                            <option value="<?= $key->sell_key; ?>"><?= $key->id_user; ?> (<?= $key->sell_key ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <select name="picker" id="picker" class="form-control">
                        <option>- Silahkan Pilih Picker -</option>
                        <?php foreach ($picker as $key) : ?>
                            <option value="<?= $key->id_user; ?>"><?= $key->username; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-primary" type="submit"><i class="fas fa-check"></i> Konfirmasi Orderan</button>
            </form>
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
                    <?php foreach ($order as $key) : ?>
                        <tr>
                            <td><a href="<?= base_url('dam/view_order/') . $key->sell_key; ?>"><?= $key->sell_key; ?></a></td>
                            <td><?= $key->id_user; ?></td>
                            <td><?= $key->id_picker; ?></td>
                            <td><?= $key->total_barang; ?></td>
                            <td><?= 'Rp. ' . $key->total_income; ?></td>
                            <td><?= $key->crtdate; ?></td>
                            <td><?= $key->status; ?></td>
                            <td><?= $key->alamat; ?></td>
                            <td><a class="text-danger" href="<?= base_url('crud/dlt_order?key=') . $key->sell_key . '&admin=' . $name['id_user']; ?>"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- /.container-fluid -->