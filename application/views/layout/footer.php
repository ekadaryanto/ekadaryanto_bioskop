</div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <!-- <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div> -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?=site_url('admin/login/doLogout')?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<!-- Bootstrap core JavaScript-->
<script src="<?=base_url()?>assets/sb-admin-2/vendor/jquery/jquery.min.js"></script>
<script src="<?=base_url()?>assets/sb-admin-2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="<?=base_url()?>assets/sb-admin-2/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?=base_url()?>assets/sb-admin-2/js/sb-admin-2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Page level custom scripts -->
<script src="<?=base_url()?>assets/sb-admin-2/js/bootstrap-datepicker.js"></script>

<!-- Page level plugins -->
<script src="<?=base_url()?>assets/sb-admin-2/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>assets/sb-admin-2/js/demo/datatables-demo.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>



<script>
    $(function() {
        $('#datetimepicker1').datetimepicker({
          format: 'DD-MM-YYYY HH:mm'
        });
    });

    // Date picker
    $('#datepicker').datepicker({
        autoclose: true,
        format: 'dd-mm-yyyy'
    });
</script>