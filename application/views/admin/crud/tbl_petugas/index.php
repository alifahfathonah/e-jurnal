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
              <a href="<?= base_url('Admin/Crud/Tbl_Pembimbing/add') ?>" class="btn btn-primary">Tambah Data</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="datatable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ID PETUGAS</th>
                  <th>USER ID</th>
                  <th>NAMA PETUGAS</th>
                  <th>SARAN PETUGAS</th>
                  <th>NO TELP.</th>
                  <th>AKSI</th>
                 </tr>
                </thead>
                <tbody>
                <?php $no=1; 
                foreach ($petugas as $p): ?>
                <tr>
                  <td><?= $no++; ?></td>
                  <td><?= $p['id_petugas_monitoring']; ?></td>
                  <td><?= $p['user_id']; ?></td>
                  <td><?= $p['nama_petugas_monitoring']; ?></td>
                  <td><?= $p['saran_petugas_monitoring']; ?></td>
                  <td><?= $p['no_telp_petugas']; ?></td>
                  
                  <td>
                      <a href="<?= base_url('Admin/Crud/Tbl_Petugas/update/').$p['id_petugas_monitoring'] ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger"><i class="fas fa-fw fa-edit"></i></a>

                      <a href="<?= base_url('Admin/Crud/Tbl_Petugas/delete/').$p['id_petugas_monitoring'] ?>" onclick="return confirm('Yakin ?')" class="btn btn-success"><i class="fas fa-fw fa-trash"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                
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