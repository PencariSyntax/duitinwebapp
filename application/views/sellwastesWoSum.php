<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Sell My Wastes</h1>
</div>
<form action="" method="post">
    <div class="row">
        <div class="col-sm-6">

            <div class="form-group">
                <label for="name" class="text-primary">Selling Key</label>
                <input type="text" class="form-control" readonly value="<?= rand(); ?>">
            </div>
            <div class="form-group">
                <label for="name" class="text-primary">Nama Penjual</label>
                <input type="text" class="form-control" readonly value="<?= $name['username']; ?>">
            </div>
            <div class="form-group">
                <label for="name" class="text-primary">No. Ponsel</label>
                <input type="text" class="form-control" readonly value="<?= $name['phone']; ?>">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="name" class="text-primary">Ingin Menjual Sampah anda ?</label>
                <select name="choose" id="jualBarang" class="form-control">
                    <option>- Mau Jual Barang ? -</option>
                    <option value="yes">Iya Tentu</option>
                    <option value="no">Tidak Terima Kasih</option>
                </select>
            </div>
            <div class="form-group" id="pilihBarang">
                <div class="row">
                    <div class="col-md-6">
                        <select name="barang1" id="barang1" class="form-control">
                            <option>-Pilih Barang 1-</option>
                            <option value="1">Plastik</option>
                            <option value="2">Kertas</option>
                            <option value="3">Kardus</option>
                            <option value="4">Besi</option>
                        </select>
                        &nbsp;
                        <select name="barang2" id="barang2" class="form-control">
                            <option>-Pilih Barang 2-</option>
                            <option value="1">Plastik</option>
                            <option value="2">Kertas</option>
                            <option value="3">Kardus</option>
                            <option value="4">Besi</option>
                        </select>
                        &nbsp;
                        <select name="barang3" id="barang3" class="form-control">
                            <option>-Pilih Barang 3-</option>
                            <option value="1">Plastik</option>
                            <option value="2">Kertas</option>
                            <option value="3">Kardus</option>
                            <option value="4">Besi</option>
                        </select>
                        &nbsp;
                        <select name="barang4" id="barang4" class="form-control">
                            <option>-Pilih Barang 4-</option>
                            <option value="1">Plastik</option>
                            <option value="2">Kertas</option>
                            <option value="3">Kardus</option>
                            <option value="4">Besi</option>
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="number" class="form-control" name="barang1" placeholder="Jumlah 1 ...">
                        &nbsp;
                        <input type="number" class="form-control" name="barang2" placeholder="Jumlah 2 ...">
                        &nbsp;
                        <input type="number" class="form-control" name="barang3" placeholder="Jumlah 3 ...">
                        &nbsp;
                        <input type="number" class="form-control" name="barang4" placeholder="Jumlah 4 ...">
                    </div>
                    <div class="col-md-1">
                        <p>Kg</p>
                        &nbsp;
                        <p>Kg</p>
                        &nbsp;
                        <p>Kg</p>
                        &nbsp;
                        <p>Kg</p>
                    </div>
                </div>
            </div>
            <hr>
        </div>
    </div>
</form>

