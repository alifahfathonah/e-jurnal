    <!-- ############################ BEGIN OF CONTENT ############################### -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark"><?= $judul; ?></h1>
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
              <a href="<?= base_url('admin/crud/tbl-siswa') ?>" class="btn btn-success">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="<?= base_url('admin/crud/tbl-siswa/edit/').$siswa['id_siswa']; ?>">
              <input type="hidden" value="<?= $siswa['id_siswa'] ?>" id="id_siswa" class="form-control" name="id_siswa">
              <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="" value="<?= $siswa['nama_siswa'] ?>" id="nama_siswa" class="form-control" name="nama_siswa">
              </div>
              <div class="form-group">
                <label for="nisn">Nisn</label>
                <input type="" value="<?= $siswa['nisn'] ?>" id="nisn" class="form-control" name="nisn">
              </div>
              <div class="form-group">
              <button class="btn btn-primary" type="submit">Update</button>
              </div>
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