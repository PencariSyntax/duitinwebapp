<?php $uniqid = "022" . rand('0', '99999'); ?>
<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">DUITIN User QR Code Generator</h1>
            </div>
            <?= $this->session->flashdata('message'); ?>
            <form class="user" method="post" action="<?= base_url('duitincode/qrsave'); ?>">
              <!--<div class="form-group">
                <input type="text" class="form-control form-control-user" id="id" readonly value="<?php echo $uniqid; ?>" name="idprim">
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="link" readonly value="<?php echo base_url('auth/link/') . $uniqid; ?>" name="qrlink">
              </div>
              <div class="form-group">
                <select name="level" id="role" class="form-control form-control-user">
                  <option>-Choose The Level-</option>
                  <option value="1">Administrator</option>
                  <option value="2">CEO</option>
                  <option value="3">Treasure Man</option>
                  <option value="4">Counters</option>
                  <option value="5">Pickers</option>
                  <option value="6">Users</option>
                </select>
              </div>-->
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Generate QR Code
              </button>
              <hr>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>