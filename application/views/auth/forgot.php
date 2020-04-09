<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets/img'); ?>/biruduitin.png" alt="" class="img-fluid mx-auto" width="100" height="55">
                                </div>
                                &nbsp;
                                <?= $this->session->flashdata('message'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/forgot'); ?>">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" placeholder="Masukan Email Pengguna ..." name="email">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        <i class="fas fa-check"></i>
                                        Konfirmasi
                                    </button>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>