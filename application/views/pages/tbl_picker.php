<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">QR Code Picker DUITIN</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($picker); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-qrcode fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Picker Yang Valid</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($valid); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-check fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Akun Nonaktif</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($none); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-thumbs-down fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Akun Belum Valid</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($invalid); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tabel Data Pickers</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Picker</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID Picker</th>
                            <th>Nama Picker</th>
                            <th>No Telp Picker</th>
                            <th>Tgl Bergabung</th>
                            <th>Setelan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($picker as $row) : ?>
                            <tr>
                                <td><?= $row->id_user; ?></td>
                                <td><?= $row->username; ?></td>
                                <td>+62<?= $row->phone; ?></td>
                                <td><?= date("d F Y", $row->crtdate); ?></td>
                                <td><a class="text-primary" href="<?= base_url('dam/user_detail/') . $row->id_user; ?>"><i class="fas fa-info"></i></a> | <a class="text-danger" href="<?= base_url('crud/dlt_user') . '?user=' . $row->id_user . '&admin=' . $name['id_user']; ?>"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>