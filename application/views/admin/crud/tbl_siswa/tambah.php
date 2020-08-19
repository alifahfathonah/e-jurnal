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
              <form method="post" action="<?= base_url('admin/crud/tbl-siswa/tambah') ?>">
              <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <input type="" id="nama_siswa" class="form-control" name="nama_siswa">
              </div>
              <div class="form-group">
                <label for="nisn">Nisn</label>
                <input type="" id="nisn" class="form-control" name="nisn">
              </div>
              <div class="form-group">
                <label for="s">Username & Email Dari User</label>
                
                <select name="user_id" id="s" class="form-control">
                  <?php if ($user_siswa): ?>
                    <?php foreach ($user_siswa as $u_siswa): ?>
                    <option value="<?= $u_siswa['id_user'] ?>"><?= $u_siswa['username'] ?> || <?= $u_siswa['email'] ?></option>  
                    <?php endforeach; ?>
                  <?php else: ?>
                    <option>Kosong</option>
                  <?php endif; ?>
                </select>

              </div>
              <div class="form-group">
              <button class="btn btn-primary" type="submit">Tambah</button>
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