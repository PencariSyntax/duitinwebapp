<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header bg-gradient-success">
            <h5 class="font-weight-bold text-white"><i class="fas fa-user-clock"></i> Data Histori Wakaf <?= $name['username'] ?></h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%">
                    <thead>
                        <tr>
                            <th>Penirima</th>
                            <th>Jenis Barang</th>
                            <th>Berat Barang</th>
                            <th>Tanggal Wakaf</th>
                            <th>Status Wakaf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Pak Agy</td>
                            <td>Kertas, Kardus, Besi</td>
                            <td>15 Kg</td>
                            <td>17 Agustus 2020</td>
                            <td><button class="btn btn-sm btn-success btn-block" disabled><i class="fas fa-check"></i> Terwakafkan</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->