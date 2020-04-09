<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">My Profile Page</h1>
</div>

<div title="Profile Page">
    <form action="<?= base_url('crud/upd_profile'); ?>" method="post" enctype="multipart/formdata">
        <div class="row">
            <div class="col-md-6">
                <input type="hidden" name="id" value="<?= $name['id_prim']; ?>">
                <div class="form-group">
                    <label for="name">Nama Anda</label>
                    <input type="text" name="name" id="" class="form-control" value="<?= $name['username']; ?>">
                </div>
                <div class="form-group">
                    <label for="name">Email Anda</label>
                    <input type="email" name="email" id="" class="form-control" value="<?= $name['email']; ?>" placeholder="Your Email ..." readonly>
                </div>
                <div class="form-group">
                    <label for="name">No Ponsel Anda</label>
                    <input type="text" name="phone" id="" class="form-control" value="<?= "+62 (0)" . $name['phone']; ?>" placeholder="Your Phone Number ..." readonly>
                </div>
            </div>
            <div class="col-md-6">
                <!--<img src="<? base_url('assets/img_user/') . $name['photo']; ?>" alt="" class="img-profile rounded-circle" width="128" height="128">
                &nbsp;
                <div class="form-group">
                    <label for="photo">Ganti Photo Profile</label>
                    <br>
                    <input type="file" name="photo" id="photo">
                    <div class="upload-btn-wrapper">
                        <button class="btnfile"><i class="fas fa-image"></i> Upload a JPG / PNG File</button>
                        <input type="file" name="photo" />
                    </div>
                    <br>
                    <small>Maks. Photo berukuran 2 MB</small>
                </div>-->
                <div class="form-group">
                    <label for="name">Alamat Lengkap Anda</label>
                    <input type="text" name="address" id="" class="form-control" value="<?= $name['alamat']; ?>" placeholder="Your Address ...">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">RT</label>
                            <input type="text" name="rt" id="rt" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">RW</label>
                            <input type="text" name="rw" id="rw" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Kode Pos</label>
                            <input type="number" name="pos" id="pos" class="form-control" value="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Provinsi</label>
                            <select name="prov" data-placeholder="Provinsi ..." class="standardSelect">
                                <?php foreach ($prov as $key) : ?>
                                    <option value="<?= $key->id_propinsi; ?>"><?= $key->nama_propinsi; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Kota / Kabupaten</label>
                            <select name="kota" data-placeholder="Kota / Kabupaten ..." class="standardSelect">
                                <?php foreach ($kota as $key) : ?>
                                    <option value="<?= $key->id_kabkota; ?>"><?= $key->nama_kabkota; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Kecamatan</label>
                            <select name="camat" data-placeholder="Kecamatan ..." class="standardSelect">
                                <?php foreach ($camat as $key) : ?>
                                    <option value="<?= $key->id_kecamatan; ?>"><?= $key->nama_kecamatan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mx-auto text-center">
            <button class="btn btn-primary"><i class="fas fa-pencil-alt"></i> Update Profile</button>
        </div>
    </form>
</div>