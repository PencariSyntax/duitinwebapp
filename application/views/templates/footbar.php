</div><!-- /.container-fluid -->
</div><!-- End of Main Content -->
<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Duitin Web App <sup>1.0.7</sup> <?= date('Y'); ?></span>
        </div>
    </div>
</footer><!-- End of Footer -->
</div><!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fas fa-sign-out-alt"></i> Apakah Anda Mau Keluar ?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fas fa-times-circle text-white"></i></span>
                </button>
            </div>
            <div class="modal-body text-center">
                <div class="my-3">
                    <center><img src="<?= base_url('assets/img/biruduitin.png') ?>" alt="avatar" class="img-fluid" width="100" height="55"></center>
                </div>
                <p> Terima Kasih atas Transaksi dengan anda, dengan ini kita telah menyelamatkan dunia dari sampah.</p>
                <p class="text-muted"> Silahkan Pilih Keluar untuk Keluar dan Tidak untuk Melanjutkan Transaksi.</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary float-left" type="button" data-dismiss="modal">&times; Tidak</button>
                <a class="btn btn-success float-right" href="<?= base_url('auth/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Keluar</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/r-2.2.2/sc-2.0.0/datatables.min.js"></script>-->
<!-- Page level plugins-->
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
<script src="<?= base_url(); ?>vendors/chosen/chosen.jquery.min.js"></script>
<script>
    $("#jualBarang").change(function() {
        if ($(this).val() == "yes") {
            $('#pilihBarang').show();
            $('#pilihBarang').attr('required', '');
            $('#pilihBarang').attr('data-error', 'This field is required.');
        } else {
            $('#pilihBarang').hide();
            $('#pilihBarang').removeAttr('required');
            $('#pilihBarang').removeAttr('data-error');
        }
    });
    $("#jualBarang").trigger("change");
</script>
<script>
    jQuery(document).ready(function() {
        jQuery(".standardSelect").chosen({
            disable_search_threshold: 10,
            no_results_text: "Maaf Tidak ada DATA!",
            width: "100%"
        });
    });
</script>
</body>

</html>