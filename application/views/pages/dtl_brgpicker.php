<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ganti Jumlah Barang Picker</h1>
</div>
<form action="<?= base_url('crud/edit_brg_picker?key=') ?>">
    <div class="rows">
        <div class="col-md-6">
            <div class="form-group">
                <label for="Plastik"></label>
                <input type="text" class="form-control" name="plastik" value="<?= $key; ?>">
            </div>
            <div class="form-group">
                <label for="Kertas"></label>
                <input type="text" class="form-control" name="kertas" value="<?= $key; ?>">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="Besi"></label>
                <input type="text" class="form-control" name="besi" value="<?= $key ?>">
            </div>
            <div class="form-group">
                <label for="Karton"></label>
                <input type="text" class="form-control" name="karton" value="<?= $key; ?>">
            </div>
        </div>
        <center><button class="btn btn-primary" type="submit"><i class="fas fa-pencil"></i> Ganti Data</button></center>
    </div>
</form>