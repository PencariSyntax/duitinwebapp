<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <center><img src="<?= base_url('assets/img/'); ?>biruduitin.png" alt="" width="135" height="35" class="img-fluid mx-auto"></center>
            &nbsp;
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Form Validasi QR Code & Akun DUITIN !</h1>
            </div>
            <?= form_error('name', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('phone', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('pass1', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('alamat', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= form_error('email', '<div class="alert alert-danger" role="alert">', '</div>'); ?>
            <?= $this->session->flashdata('message'); ?>
            <form class="user" method="post" action="<?= base_url('auth/VaFhxiAZ2JvRnW88hO63HmLzW3Db5a8FODc5AT7aT5ED'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="id" readonly value="<?= $regs['id_user']; ?>" name="id">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="link" readonly value="<?= $regs['qr_link']; ?>" name="link">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="name" placeholder="Nama Anda ..." name="name" value="<?= set_value('name'); ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" placeholder="Email Anda ..." name="email" value="<?= set_value('email'); ?>">
              </div>
              <div class="form-group">
                <input type="number" class="form-control form-control-user" id="phone" placeholder="No Ponsel ..." name="phone" value="<?= set_value('phone'); ?>">
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="pass1" placeholder="Kata Sandi ..." name="pass1">
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="pass2" placeholder="Ulang Kata Sandi ..." name="pass2">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Validasi Akun
              </button>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth') ?>">Sudah Punya Akun Silahkan, Login</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>