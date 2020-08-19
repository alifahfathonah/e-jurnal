  <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"></h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- ############################ BEGIN OF CONTENT ############################### -->
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

          <div class="card">
            <div class="card-header">
            	<form action="<?= base_url('Admin/Crud/Tbl_Role/edit'); ?>" method="post" class="form-group ml-3">
		<input type="text" name="id" value="<?=$role['id_role']; ?>" class="form-control col-lg-4 mt-2" readonly>
		<input type="text" name="nama" value="<?=$role['nama_role'] ?>" class="form-control col-lg-4 mt-3">
		<input type="text" name="redirect" value="<?=$role['redirect'] ?>" class="form-control col-lg-4 mt-3">
		<input type="submit" name="kirim" class="btn btn-primary mt-3" value="simpan">
	</form>


            

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->	


</body>
</html>