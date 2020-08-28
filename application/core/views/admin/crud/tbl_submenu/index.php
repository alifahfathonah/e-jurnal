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
              <a href="<?= base_url('admin/crud/tbl-submenu/tambah') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Submenu</th>
                  <th>Icon</th>
                  <th>Status</th>
                  <th>Menu Id</th>
                  <th>Handle</th>
                </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach ($all_submenu as $submenu): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $submenu['nama_submenu'] ?></td>
                  <td><span class="btn btn-primary"><i class="<?= substr($submenu['icon_submenu'], 9) ?> fa-fw"></i></span> <?= '('.$submenu['icon_submenu'].')'; ?></td>
                  <td>
                    <?php if ($submenu['is_active']>0): ?>
                    <span class="badge badge-success">Aktif</span>
                    <?php else: ?>
                    <span class="badge badge-danger">Nonaktif</span>
                    <?php endif ?>
                  </td>
                  <td></td>
                  <td>
                      <a href="<?= base_url('admin/crud/tbl-submenu/edit/').$submenu['id_submenu'] ?>" class="btn btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                      <a href="<?= base_url('admin/crud/tbl-submenu/hapus/').$submenu['id_submenu'] ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>No</th>
                  <th>Nama Submenu</th>
                  <th>Icon</th>
                  <th>Status</th>
                  <th>Menu Id</th>
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