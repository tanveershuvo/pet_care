<!-- Control Sidebar -->

<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="plugins/select2/js/select2.full.min.js"></script>
<!-- jquery-validation -->
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/select2/js/select2.full.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>


<script type="text/javascript">
  var dateToday = new Date();
  setTimeout(function() {
    $('.msg').fadeOut('slow');
  }, 1500);

  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2();
  });

  $(function() {
    $(".datatable").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false
    });

  });
</script>

</body>

</html>