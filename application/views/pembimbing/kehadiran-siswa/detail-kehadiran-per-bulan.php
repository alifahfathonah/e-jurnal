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

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">

      <div class="col-lg-7">
        
        <div class="card">
          <div class="card-header"><?= substr($id_grup_absensi, 0,2).'-'.$bulan['nama_bulan'].'-'.substr($id_grup_absensi, 4,4);?>
          </div>
          <div class="card-body table-responsive">
            <?php if ($count_kehadiran>0): ?>
            <table class="table table-dark" id="datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nama siswa</th>
                  <th scope="col">Ket</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($kehadiran as $abensi): ?>
                <tr>
                  <th scope="row"><?= $no++; ?></th>
                  <td><?= $abensi['nama_siswa'] ?></td>
                  <td><?= $abensi['badge_keterangan_absensi'] ?></td>
                  <td>#</td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <?php else: ?>
              <div class="alert alert-danger" role="alert">
                <h4 class="alert-heading">Kehadiran Tidak Tersedia</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
                <hr>
                <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
              </div>
            <?php endif; ?>
          </div>
        </div>

      </div>

      <div class="col-lg-5">
        
      </div>

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper