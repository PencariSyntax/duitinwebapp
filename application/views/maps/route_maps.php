<div class="container-fluid mt-4 mb-4">
    <div class="alert alert-success text-center" role="alert"><i class="fas fa-map"></i> Route anda hari ini, dan hati hati dijalan</div>
    <div class="card mt-3 mb-4">
        <div class="card-body" style="height : 275px">
            <div id="map"></div>
        </div>
    </div>
    <form action="" method="post">
        <input type="hidden" name="geoip" value="<?= $geoip ?>" id="geoipp">
        <input type="hidden" name="lat" id="latp" value="<?= $lat ?>">
        <input type="hidden" name="long" id="longp" value="<?= $long ?>">
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header bg-gradient-primary text-center text-white">
                        <i class="fas fa-map-marked-alt"></i> Estimasi perjalanan anda
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Picker :</label>
                        </div>
                        <div class="form-group">
                            <label>Jarak Tempuh :</label>
                        </div>
                        <div class="form-group">
                            <label>Estimasi Waktu :</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-gradient-success text-center text-white">
                        <i class="fas fa-user"></i> Data Penjual
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="#" alt="User Profile" class="img-fluid img-thumbnail img-user">
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Nama Penjual :</label>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Barang :</label>
                                </div>
                                <div class="form-group">
                                    <label>Berat Barang :</label>
                                </div>
                                <div class="form-group">
                                    <label>Note Penjual :</label>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>