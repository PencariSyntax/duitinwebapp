<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jual Limbah</h1>
</div>
<form action="<?= base_url('dus/sellwastes') ?>" method="post">
    <?= form_error('keterangan', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success'); ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-sm-6">
            <input type="hidden" value="<?= $name['id_user']; ?>">
            <div class="form-group">
                <label for="name" class="text-primary">Nomor Order</label>
                <input type="text" class="form-control" readonly value="<?= rand(); ?>" name="key">
            </div>
            <div class="form-group">
                <label for="name" class="text-primary">Nama Penjual</label>
                <input type="text" class="form-control" readonly value="<?= $name['username']; ?>" name="id">
            </div>
            <div class="form-group">
                <label for="name" class="text-primary">No. Ponsel</label>
                <input type="text" class="form-control" readonly value="+62 (0)<?= $name['phone']; ?>">
            </div>
            <div class="form-group">
                <label for="keterangan" class="text-primary">Keterangan Barang :</label>
                <textarea name="keterangan" class="form-control" id="" rows="2" placeholder="Barang Dalam Keadaan ...."></textarea>
            </div>
            <div class="form-group">
                <label for="alamat" class="text-primary">Alamat / Posisi Anda :</label>
                <textarea name="alamat" class="form-control" id="" rows="2" required placeholder="Alamat / Posisi Anda ..." value="<?= $name['alamat'] ?>"></textarea>
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
                    <div class="col-sm-4">
                        <div class="form-group">
                            <select name="barang[]" field-jumlah="jml1" field-result="val1" id="barang1" class="form-control">
                                <option>-Jenis Limbah 1-</option>
                                <option value="1">Plastik</option>
                                <option value="2">Kertas</option>
                                <option value="3">Besi</option>
                                s <option value="4">Karton</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="barang[]" field-jumlah="jml2" field-result="val2" id="barang2" class="form-control">
                                <option>-Jenis Limbah 2-</option>
                                <option value="1">Plastik</option>
                                <option value="2">Kertas</option>
                                <option value="3">Besi</option>
                                <option value="4">Karton</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="barang[]" field-jumlah="jml3" field-result="val3" id="barang3" class="form-control">
                                <option>-Jenis Limbah 3-</option>
                                <option value="1">Plastik</option>
                                <option value="2">Kertas</option>
                                <option value="3">Besi</option>
                                <option value="4">Karton</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="barang[]" field-jumlah="jml4" field-result="val4" id="barang4" class="form-control">
                                <option>-Jenis Limbah 4-</option>
                                <option value="1">Plastik</option>
                                <option value="2">Kertas</option>
                                <option value="3">Besi</option>
                                <option value="4">Karton</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="number" class="form-control" data-jumlah data-barang="barang1" data-result="val1" id="jml1" name="jumlah[]" placeholder="Jumlah /Kg ...">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" data-jumlah data-barang="barang2" data-result="val2" id="jml2" name="jumlah[]" placeholder="Jumlah /Kg ...">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" data-jumlah data-barang="barang3" data-result="val3" id="jml3" name="jumlah[]" placeholder="Jumlah /Kg ...">
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" data-jumlah data-barang="barang4" data-result="val4" id="jml4" name="jumlah[]" placeholder="Jumlah /Kg ...">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <input type="Number" name="total[]" value="" id="val1" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="Number" name="total[]" value="" id="val2" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="Number" name="total[]" value="" id="val3" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <input type="Number" name="total[]" value="" id="val4" class="form-control" readonly>
                        </div>
                    </div>
                    <hr>
                    &nbsp;
                    <!--<p>
                        <strong>Total Semua Harga Barang :</strong>
                        <span class="text-success">Rp. </span>
                        <output id="Total" class="text-success text-right"></output>
                    </p>-->
                </div>
                <button type="submit" class="btn btn-primary oval mx-auto"><i class="fas fa-trash-alt"></i> Jual Limbah</button>
            </div>
        </div>
    </div>
</form>
<script src="<?= base_url('assets/'); ?>js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $('[data-jumlah]').on('keyup', function() {
        let id = $(this).attr('data-barang');
        let result = $(this).attr('data-result');
        let jumlah = $(this).val();
        let barang1 = $('#' + id).val();
        $.ajax({
            type: 'get',
            url: '<?php echo base_url('dus/hargabarangsatu'); ?>',
            data: {
                jumlah: jumlah,
                barangnya: barang1
            },
            success: function(data) {
                $('#' + result).val(data);
            }
        });
    });
    $('select').on('change', function() {
        let result = $(this).attr('field-result');
        let idjumlah = $(this).attr('field-jumlah');
        let jumlah = $('#' + idjumlah).val();
        let barang1 = $(this).val();
        if (jumlah == '') {
            jumlah = 0;
        }

        $.ajax({
            type: 'get',
            url: '<?php echo base_url('dus/hargabarangsatu'); ?>',
            data: {
                jumlah: jumlah,
                barangnya: barang1
            },
            success: function(data) {
                $('#' + result).val(data);
            }
        });
    });
</script>