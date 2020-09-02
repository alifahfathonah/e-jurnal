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
            	<form action="<?= base_url('User/Profile/edit/'.$user['id_user']); ?>" method="post" class="form-group ml-3" enctype="multipart/form-data">
		<input type="text" name="id" value="<?=$user['id_user']; ?>" class="form-control col-lg-4 mt-2" readonly>
		<input type="text" name="nama" value="<?=$user['username'] ?>" class="form-control col-lg-4 mt-3" required>
    <img src="<?= base_url('assets/img/profile/'.$user['image']); ?>" width="40" class="mt-2">
		<input type="file" name="gambar" value="<?=$user['image']; ?>" class="form-control col-lg-4 mt-3" required>
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