<!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      <i class="fas fa-code"></i>CodeDX
			
    </div>
    <!-- Default to the left -->
    <strong>SICEA 3.0 &copy; 2020.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<!--JQUERY PRINT -->
<script src="<?php echo base_url()?>assets/jQuery-print-master/jQuery.print.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- DataTables export-->
<script src="<?php echo base_url()?>assets/datatable_export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable_export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable_export/js/buttons.print.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable_export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable_export/js/jszip.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable_export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url()?>assets/datatable_export/js/vfs_fonts.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-validation/additional-methods.min.js"></script>
<script src="<?php echo base_url()?>assets/func.js"></script>
<script src="<?php echo base_url()?>assets/datos.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url()?>assets/sweetalert/sweetalert.min.js"></script>
<!-- Alertify -->
<script src="<?php echo base_url()?>assets/alertifyjs/alertify.js"></script>
<!-- InputMask -->
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
</body>
</html>

<script type="text/javascript">
	function mayus(e) {

    var tecla=e.value;
    var tecla2=tecla.toUpperCase();
}

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
		})
	}
</script>
