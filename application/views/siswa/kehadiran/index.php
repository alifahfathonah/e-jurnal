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
        
        <?php $this->load->view('layouts/components/alert-bootstrap') ?>

        <div class="row">
          <div class="col-lg-6">
            
            <div class="card card-primary card-outline mb-3">
              <div class="card-header">
                <h5 class="m-0">Penggunaan Kehadiran</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">Special title treatment</h6>

                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
                <a href="#" class="btn btn-primary">#E-JURNAL</a>
              </div>
            </div>
          
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">

            <div class="card card-primary card-outline mb-3">
            <div class="list-group">
              <span class="list-group-item list-group-item-action">
                Bulan
              </span>
              <?php foreach ($bulan_aktif as $bulan): ?>
                <?php if ($bulan_sekarang==$bulan['nama_bulan_english']): ?>
                  <a href="<?= base_url('siswa/kehadiran/bulan/').$bulan['slug_bulan']; ?>" class="list-group-item list-group-item-action bg-dark"><?= $bulan['nama_bulan'] ?></a>
                <?php else: ?>
                  <a href="<?= base_url('siswa/kehadiran/bulan/').$bulan['slug_bulan']; ?>" class="list-group-item list-group-item-action"><?= $bulan['nama_bulan'] ?></a>
                <?php endif ?>
              <?php endforeach; ?>
            </div>
            </div>

          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->