<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Web Programing UBL <?= date('Y'); ?></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

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
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Sweet Alert -->
<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>

<!-- My Script -->
<script src="<?= base_url('assets/') ?>js/script.js"></script>

<script>
    //script untuk edit profile
    $('.custom-file-input').on('change', function() {
        let filename = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(filename);
    })

    // SCRIPT UNTUK PENCARIAN PENDUDUK DI FORM SURAT IZIN USAHA

    function load_data(key) {
        $.ajax({
            url: "<?= base_url('/surat/cariPenduduk') ?>",
            method: "post",
            data: {
                key: key
            },
            success: data => {
                $("#result").html(data);
            }
        });
    }

    $("#keyword").on("keyup", function() {
        const keyword = $(this).val();

        if (keyword != "") {
            load_data(keyword);
        } else {
            load_data();
        }
    });

    $(document).on("click", ".tombolSubmit", function(e) {
        e.preventDefault();
        const id = $(this).data("id");
        $.ajax({
            url: "<?= base_url('/surat/getPendudukById/') ?>" + id,
            method: "post",
            data: {
                id: id
            },
            dataType: "json",
            success: function(data) {
                $("#nama").val(data.nama);
                $("#no_ktp").val(data.no_ktp);
                $("#ttl").val(data.tmpt_tgl_lahir);
                $("#jk").val(data.jk);
                $("#kewarganegaraan").val(data.kewarganegaraan);
                $("#agama").val(data.content_agama);
                $("#alamat").val(data.alamat);

                $("#result").html('');
                $("#keyword").val('');
            }
        });
    });
</script>

</body>

</html>