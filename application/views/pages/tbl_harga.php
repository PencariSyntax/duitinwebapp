<!-- Begin Page Content -->
<form action="<?= base_url('dam/tbl_harga'); ?>" method="post">
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tabel Data Harga Barang</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Harga Barang</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Barangr</th>
                                <th>Harga Barang</th>
                                <th>Ganti Harga</th>
                            </tr>
                        </thead>
                        <?php foreach ($harga as $row) : ?>
                            <tbody>
                                <tr>
                                    <td><?= $row->id_barang; ?></td>
                                    <td><?= $row->jns_barang; ?></td>
                                    <td>Rp.<?= $row->harga; ?></td>
                                    <td><input type="text" class="form-control" name="price" placeholder="Harga"></td>
                                </tr>
                            </tbody>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</form>