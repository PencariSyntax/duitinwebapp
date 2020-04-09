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
                                    <img src="<?= base_url('assets/img'); ?>/biruduitin.png" alt="" class="img-fluid mx-auto mb-2" width="100" height="55">
                                </div>
                                &nbsp;
                                <div class="alert alert-success" role="alert">Silahkan Aktivasi akun anda di email yang telah anda daftarkan !</div>
                                <?= form_error('phone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                <?= form_error('password', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
                                <form class="user" method="post" action="<?= base_url('auth/index'); ?>">
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="phone" placeholder="Masukan No Ponsel ..." name="phone" value="<?= set_value('phone'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" placeholder="Kata Sandi ..." name="password">
                                    </div>
                                    <div class="form-group">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/forgotpassword'); ?>">Lupa Password ?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>