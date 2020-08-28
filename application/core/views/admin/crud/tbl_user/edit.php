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
              <a href="<?= base_url('admin/crud/tbl-user') ?>" class="btn btn-success">Kembali</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="post" action="<?= base_url('admin/crud/tbl-user/edit/').$first_user['id_user'] ?>">
              <div class="form-group">
                <label for="u">Username</label>
                <input value="<?= $first_user['id_user'] ?>" type="hidden" id="iu" class="form-control" name="id_user">
                <input value="<?= $first_user['username'] ?>" type="" id="u" class="form-control" name="username">
              </div>
              <div class="form-group">
                <label for="e">Email</label>
                <input value="<?= $first_user['email'] ?>" type="e" id="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="p">Password</label>
                <input value="<?= $first_user['password'] ?>" type="hidden" id="p" class="form-control" name="old_password">
                <input type="" id="p" class="form-control" name="password">
                <small class="text-muted"><i>Kososngkan kolom jika tidak ingin diubah</i></small>
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