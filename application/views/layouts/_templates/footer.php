</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>&copy E-Jurnal <?= date('Y') ?></strong>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/templates/admin/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script src="<?= base_url('assets/plugins/mousewheel/mousewheel.js'); ?>"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/chart.js/Chart.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/templates/Admin/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/templates/Admin/'); ?>dist/js/adminlte.js"></script>
<script src="<?= base_url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
<script>
  $(function() {
    $("#datatable").DataTable();
    // $('#datatable').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
<script>
  CKEDITOR.replace('ckeditor');
</script>
</body>

</html>