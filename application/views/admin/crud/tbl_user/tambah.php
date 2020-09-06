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
              <a href="<?= base_url('admin/crud/Tbl_User') ?>" class="btn btn-success">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="<?= base_url('admin/crud/Tbl_User/tambah') ?>">
              <div class="form-group">
                <label for="u">Username</label>
                <input type="" id="u" class="form-control" name="username">
              </div>
              <div class="form-group">
                <label for="e">Email</label>
                <input type="e" id="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="p">Password</label>
                <input type="" id="p" class="form-control" name="password">
              </div>
              <div class="form-group">
                <label for="r_i">Level</label>
                <select name="role_id" id="r_i" class="form-control">
                  <?php if ($all_role): ?>
                    <?php foreach ($all_role as $role): ?>
                    <option value="<?= $role['id_role'] ?>"><?= $role['nama_role'] ?></option>  
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