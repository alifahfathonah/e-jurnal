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
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url('siswa/home') ?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url('siswa/kehadiran') ?>">Kembali</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">

        

        <div class="row">
          <div class="col-lg-6">
            
            <?php if ($count_kehadiran_saya): ?>
              <table class="table table-dark">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tgl</th>
                    <th scope="col">Ket</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kehadiran_saya as $kehadiran): ?>
                    <tr>
                      <th scope="row"></th>
                      <td><?= date('d',strtotime($kehadiran['tanggal_absensi'])) ?></td>
                      <td><?= $kehadiran['badge_keterangan_absensi'] ?></td>
                      <td></td>
                  </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            <?php else: ?>  
              
            <?php endif ?>
          
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">


          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper