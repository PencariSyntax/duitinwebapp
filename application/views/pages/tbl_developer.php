<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Administrator DUITIN</div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?= count($admin); ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">CEO DUITIN</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($ceo); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Accounting DUITIN</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($accounting); ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Developers Data Table</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0" id="">
                    <thead>
                        <tr>
                            <th>ID User</th>
                            <th>Nama User</th>
                            <th>No Telp User</th>
                            <th>Tgl Bergabung</th>
                            <th>Setelan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($developer as $row) : ?>
                            <tr>
                                <td><?= $row->id_user; ?></td>
                                <td><?= $row->username; ?></td>
                                <td><?= $row->phone; ?></td>
                                <td><?= date("d F Y", $row->crtdate); ?></td>
                                <td><a class="text-primary" href="<?= base_url('dam/user_detail/') . $row->id_user; ?>"><i class="fas fa-info"></i></a> | <a class="text-danger" href="<?= base_url('crud/dlt_user') . '?user=' . $row->id_user . '&admin=' . $name['id_user']; ?>" onclick="return confirm('Apakah anda ingin menghapus data ?');"> <i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>