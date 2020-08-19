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
              <a href="<?= base_url('admin/crud/tbl-user/tambah') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Handle</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($all_user as $user): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $user['username'] ?></td>
                  <td><?= $user['email'] ?></td>
                  <td>
                      <a href="<?= base_url('admin/crud/tbl-user/edit/').$user['id_user'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                      <a href="<?= base_url('admin/crud/tbl-user/hapus/').$user['id_user'] ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Handle</th>
                </tr>
                </tfoot>
              </table>
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