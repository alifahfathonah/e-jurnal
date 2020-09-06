<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $judul; ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a href="<?= base_url('siswa/Kegiatan/create_kegiatan') ?>" class="btn btn-primary">Tambah Kegiatan</a>
        </div>
        <div class="card-body">
          <table class="table table-dark" id="datatable">
            <thead>
              <tr>
                <th scope="col">NO</th>
                <th scope="col">TGL</th>
                <th scope="col">JAM MASUK</th>
                <th scope="col">JAM PULANG</th> 
                <th scope="col">STATUS</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($kegiatan as $kg) : ?>
                <tr>
                  <th><?= $no++; ?></th>
                  <td><?= $kg['tanggal']; ?></td>
                  <td><?= $kg['jam_masuk']; ?></td>
                  <td><?= $kg['jam_pulang']; ?></td>
                  <td></td>
                  <td> <a href="<?= base_url('siswa/Kegiatan/detail/'.$kg['id_kegiatan']);?> "class="btn btn-primary">Detail</a></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
      </div>

      </div>
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content<i class="fas fa-fw fa-edit"></i> -->
</div>
<!-- /.content-wrapper -->