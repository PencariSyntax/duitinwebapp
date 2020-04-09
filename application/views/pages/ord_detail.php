<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Order Detail</h1>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">No Order</th>
            <th scope="col">Jenis Barang</th>
            <th scope="col">Berat Barang</th>
            <th scope="col">Harga Barang</th>
        </tr>
    </thead>
    <?php foreach ($detail as $key) : ?>
        <tbody>
            <tr>
                <th scope="row"><?= $key->sell_key; ?></th>
                <td><?= $key->jns_barang; ?></td>
                <td><?= $key->jml_berat; ?></td>
                <td><?= $key->harga_barang; ?></td>
            </tr>
        </tbody>
    <?php endforeach; ?>
</table>

<a href="<?= base_url('dam/orderlist') ?>" class="btn btn-info text-center">Kembali Ke Tabel Orderan</a>